<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Account;
use App\Entity\Operation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname('Penneflamme');
        $user->setLastname('Katty');
        $user->setBirthDate(new \DateTime('02/20/2002'));
        $user->setEmail('tunespas@lol.fr');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'lollol'
        ));
        $user->setAdress('2 notre');
        $user->setPostalCode('10101');
        $user->setCity('Galaxie');
        $manager->persist($user);

        $account = new Account();
        $account->setAccountType('compte courant');
        $account->setAccountNumber('lol101lol');
        $account->setOpeningDate(new \DateTime('02/20/2020'));
        $account->setAccountAmount('1500');
        $account->setUser($user);
        $manager->persist($account);

        $operation = new Operation();
        $operation->setOperationLabel('Achat Leclerc');
        $operation->setOperationType('debit');
        $operation->setOperationAmount('100');
        $operation->setOperationDate(new \DateTime());
        $operation->setAccount($account);
        $manager->persist($operation);

        $manager->flush();
    }
}
