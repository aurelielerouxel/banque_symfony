<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Account;
use App\Entity\Operation;
use App\Form\TransactionType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


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
     * Require ROLE_USER for only this controller method.
     * @IsGranted("ROLE_USER")
     * 
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
     * Require ROLE_USER for only this controller method.
     * @IsGranted("ROLE_USER")
     * 
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
     * Require ROLE_USER for only this controller method.
     * @IsGranted("ROLE_USER")
     * 
     * @Route("/addBankAccount", name="add_bank_account")
     */
    public function addBankAccount(): Response
    {
        return $this->render('bank/add_bank_account.html.twig', [
            'controller_name' => 'BankController',
        ]);
    }

    /**
     * Require ROLE_USER for only this controller method.
     * @IsGranted("ROLE_USER")
     * 
     * @Route("/bankTransaction", name="bank_transaction")
     */
    public function bankTransaction(Request $request, ValidatorInterface $validator): Response
    {
        $errors = null;
        $operation = new Operation();
        $form = $this->createForm(TransactionType::class, $operation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On associe l'opération au compte sélectionné 
            // $operation->setAccount($this->getAccount());
            // On vérifie la présence d'erreur dans l'objet sur la base des règles définies par le  validateur dans l'entité
            $errors = $validator->validate($operation);
            // Si le tableau ne contient pas d'erreurs
            if(count($errors) === 0) {
                $operation->setOperationDate(new \DateTime('now'));
              // On enregistre la nouvelle opération
              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->persist($operation);
              // Attention les requêtes ne sont exécutées que lors du flush donc à ne pas oublier
              $entityManager->flush();
              // On crée des message de succès en session appelés flash messages
              $this->addFlash('success','Votre opération a bien été enregistrée');
              // On redirige la route 
              return $this->redirectToRoute('bank_transaction');
            }




        }

        return $this->render('bank/bank_transaction.html.twig', [
            'form' => $form->createView(),
            'errors' => $errors,

        ]);
    }
        
}
