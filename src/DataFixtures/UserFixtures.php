<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $userPasswordHasherInterface;
    
    public function __construct (UserPasswordHasherInterface $userPasswordHasherInterface) 
    {
        $this->userPasswordHasherInterface = $userPasswordHasherInterface;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 5; $i++) :
            $user = new User();
            //firstname
            $user->setFirstname($faker->firstName());
            //lastname
            $user->setLastname($faker->lastName());
            //email
            $user->setEmail($faker->email());
            //phone
            $user->setPhone($faker->randomNumber(9, true));
            //password
            $user->setPassword($this->userPasswordHasherInterface->hashPassword(
                $user, "test"
            ));
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);
        endfor;

        $manager->flush();
    }
}
