<?php

namespace App\DataFixtures;

use App\Entity\Film;
use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $film = new Film();
            $film->setTitle($faker->firstNameFemale)
                ->setDate($faker->dateTimeBetween('-6months'))
                ->setAbstract($faker->sentence);
            $manager->persist($film);

            for ($j =0; $j < 1; $j++) {
                $person = new Person();
                $person->setName($faker->firstName)
                ->addFilm($film);
                $manager->persist($person);
            }
            $manager->flush();
        }
    }
}
