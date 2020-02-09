<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\ExpanseLine;

class ExpenseLineFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=1; $i<=10; $i++){
            $expenseLine = new ExpenseLine();
            $expenseLine->setNature("n°$i")
                ->setDescription("description")
                ->setInvoiceDate(new \DateTime())
                ->setAmount(840)
                ->setInvoiceFile("File $i");


            $manager->persist($expenseLine);
        }

        $manager->flush();
    }
}
