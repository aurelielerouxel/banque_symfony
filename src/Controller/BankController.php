<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\SignUpType;
use App\Form\SignInType;
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
     * @Route("/signIn", name="sign_in")
     */
    public function signIn(): Response
    {
        $signIn = new User();
        $form = $this->createForm(SignInType::class, $signIn);
        return $this->render('bank/sign_in.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/signUp", name="sign_up")
     */
    public function signUp(): Response
    {
        $signUp = new User();
        $form = $this->createForm(SignUpType::class, $signUp);
        return $this->render('bank/sign_up.html.twig', [
            'form' => $form->createView(),
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
        // $accountRepository = $this->getDoctrine()->getRepository(Account::class);
        // $singleAccount = $accountRepository->findAll();
        // dump($singleAccount);
        // return $this->render('bank/single_account.html.twig', [
        //     'singleAccount' => $singleAccount,
        // ]);
        $operationRepository = $this->getDoctrine()->getRepository(Operation::class);
        $operations = $operationRepository->findAll();
        dump($operations);
        return $this->render('bank/single_account.html.twig', [
            'operations' => $operations,
        ]);
    }

    // /**
    //  * @Route("/operation/{id}", name="operation", requirements={"id"="\d+"})
    //  */
    // public function operation(int $id): Response
    // {
    //     $operationRepository = $this->getDoctrine()->getRepository(Operation::class);
    //     $operations = $operationRepository->findBy(['account_id' => $id]);
    //     dump($operations);
    //     return $this->render('bank/operation.html.twig', [
    //         'operations' => $operations,
    //     ]);
    // }

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
