<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setName($faker->userName);
            $user->setEmail($faker->email);
            $user->setRoles(["ROLE_USER"]);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                '111111'
            ));
            $user->setIsVerified(true);
            $manager->persist($user);
        }
        for ($i = 0; $i < 1; $i++) {
            $user = new User();
            $user->setName("admin");
            $user->setEmail("admin@admin.com");
            $user->setRoles(["ROLE_ADMIN"]);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                '111111'
            ));
            $user->setIsVerified(true);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
