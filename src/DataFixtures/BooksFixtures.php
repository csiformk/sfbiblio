<?php

namespace App\DataFixtures;

use App\Entity\Books;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BooksFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) :
            $book = new Books();
            //title
            $book->setTitle($faker->words(3, true));
            //summary
            $book->setSummary($faker->sentence());
            //edition
            $book->setEdition($faker->word());
            //auteur
            $book->setAuthor($faker->name());
            //image
            $book->setImage($faker->imageUrl());
            //année publication
            $book->setPublicationYear($faker->dateTime());
            $manager->persist($book);
        endfor;

        $manager->flush();
    }
}
