<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Account;
use App\Entity\Operation;

class BankController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @Route("/bank", name="bank")
     */
    public function index(): Response
    {
        return $this->render('bank/index.html.twig', [
            'controller_name' => 'BankController',
        ]);
    }

    /**
     * @Route("/accounts", name="accounts")
     */
    public function accounts(): Response
    {
        $accountRepository = $this->getDoctrine()->getRepository(Account::class);
        $accounts = $accountRepository->findAll();
        return $this->render('bank/accounts.html.twig', [
            'accounts' => $accounts,
        ]);
    }

    /**
     * @Route("/singleAccount", name="single_account")
     */
    public function singleAccount(): Response
    {
        $accountRepository = $this->getDoctrine()->getRepository(Account::class);
        $singleAccount = $accountRepository->findAll();
        dump($singleAccount);

        $operationRepository = $this->getDoctrine()->getRepository(Operation::class);
        $operations = $operationRepository->findAll();
        dump($operations);

        return $this->render('bank/single_account.html.twig', [
            'singleAccount' =>$singleAccount,
            'operations' => $operations,
        ]);
    }

    /**
     * @Route("/addBankAccount", name="add_bank_account")
     */
    public function addBankAccount(): Response
    {
        return $this->render('bank/add_bank_account.html.twig', [
            'controller_name' => 'BankController',
        ]);
    }
}
