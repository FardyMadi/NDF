<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=1; $i<=10; $i++){
            $user = new User();
            $user->setUsername("User n°$i")
                ->setEmail("user$i@ec-m.fr")
                ->setPassword("azerty")
                ->setRoles(array("coucou"))
                ->setFirstName("Louis $i")
                ->setLastName("Madi")
                ->setPromo(2022)
                ->setPosition("Membre actif");


            $manager->persist($user);
        }

        $manager->flush();
    }
}
