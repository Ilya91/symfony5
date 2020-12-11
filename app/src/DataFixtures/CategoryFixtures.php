<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = [
            'Electronics',
            'Computers',
            'Art',
            'Auto',
            'Fashion',
            'Health',
            'Software',
            'Games',
            'Sports',
            'Home'
        ];

        foreach ($categories as $category) {
            $item = new Category();
            $item->setName($category);
            $manager->persist($item);
        }

        $manager->flush();
    }
}