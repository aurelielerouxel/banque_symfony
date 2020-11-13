<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        return $this->render('bank/sign_in.html.twig', [
            'controller_name' => 'BankController',
        ]);
    }

    /**
     * @Route("/signUp", name="sign_up")
     */
    public function signUp(): Response
    {
        return $this->render('bank/sign_up.html.twig', [
            'controller_name' => 'BankController',
        ]);
    }

    /**
     * @Route("/accounts", name="accounts")
     */
    public function accounts(): Response
    {
        return $this->render('bank/accounts.html.twig', [
            'controller_name' => 'BankController',
        ]);
    }

    /**
     * @Route("/singleAccount", name="single_account")
     */
    public function singleAccount(): Response
    {
        return $this->render('bank/single_account.html.twig', [
            'controller_name' => 'BankController',
        ]);
    }
}
