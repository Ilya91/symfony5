up: docker-up
down: docker-down
restart: docker-down docker-up
init: docker-down-clear clear docker-pull docker-build docker-up app-init
test: test
test-coverage: test-coverage
test-unit: test-unit
test-unit-coverage: test-unit-coverage

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

app-init: composer-install assets-install oauth-keys wait-db migrations fixtures ready

clear:
	docker run --rm -v ${PWD}/app:/app --workdir=/app alpine rm -f .ready

composer-install:
	docker-compose run --rm php-cli composer install

assets-install:
	docker-compose run --rm node yarn install
	docker-compose run --rm node npm rebuild node-sass

oauth-keys:
	docker-compose run --rm php-cli mkdir -p var/oauth
	docker-compose run --rm php-cli openssl genrsa -out var/oauth/private.key 2048
	docker-compose run --rm php-cli openssl rsa -in var/oauth/private.key -pubout -out var/oauth/public.key
	docker-compose run --rm php-cli chmod 644 var/oauth/private.key var/oauth/public.key

wait-db:
	until docker-compose exec -T postgres pg_isready --timeout=0 --dbname=app ; do sleep 1 ; done

migrations:
	docker-compose run --rm php-cli php bin/console doctrine:migrations:migrate --no-interaction

fixtures:
	docker-compose run --rm php-cli php bin/console doctrine:fixtures:load --no-interaction

ready:
	docker run --rm -v ${PWD}/app:/app --workdir=/app alpine touch .ready

assets-dev:
	docker-compose run --rm node npm run dev

test:
	docker-compose run --rm php-cli php bin/phpunit

test-coverage:
	docker-compose run --rm php-cli php bin/phpunit --coverage-clover var/clover.xml --coverage-html var/coverage

test-unit:
	docker-compose run --rm php-cli php bin/phpunit --testsuite=unit

test-unit-coverage:
	docker-compose run --rm php-cli php bin/phpunit --testsuite=unit --coverage-clover var/clover.xml --coverage-html var/coverage