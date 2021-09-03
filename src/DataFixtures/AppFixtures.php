<?php

namespace App\DataFixtures;

use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $manager->persist($this->newPerson('Marco', 31));
        $manager->persist($this->newPerson('Lara', 27));
        $manager->persist($this->newPerson('Lorenzo', 21));

        $manager->flush();
    }

    private function newPerson(string $name, int $age): Person
    {
        $person = new Person();
        $person->setName($name);
        $person->setAge($age);

        return $person;
    }
}
