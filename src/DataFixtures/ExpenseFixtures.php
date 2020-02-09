<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Expense;
use App\Entity\ExpenseLine;
use App\Entity\User;

class ExpenseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $users = $this->getDoctrine()->getRepository(User::class);
        $expanseline =  $this->getDoctrine()->getRepository(ExpenseLine::class);

        $expense = new Expense();
        $expense->setAuthor($users)
                ->setLines($expanseline)
                ->setTitle("Achat canettes")
                ->setText("txt")
                ->setcreatedON(new \DateTime())
                ->setRefundedBy($users)
                ->setRefundWay("pumpkin")
                ->setTotal(300)
                ->setYear(2019);
        
        $manager->persist($expense);

        $manager->flush();
    }
}
