<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;
use Faker\Factory;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();
        $categories = $manager->getRepository(Category::class)->findAll();

        foreach ($categories as $category) {
            $product = new Product();
            $product->setName($faker->text(25));
            $product->setPrice($faker->numberBetween(100, 1000));
            $product->setCategory($category);
            $product->setCreatedAt($faker->dateTime);
            $product->setDescription($faker->realText(25));
            $manager->persist($product);
        }

        $manager->flush();
    }
}