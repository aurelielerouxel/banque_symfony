<?php

namespace App\Form;

use App\Entity\Operation;
use App\Entity\Account;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('account', EntityType::class,[
                "class"=> Account::class,
                "choice_label"=>"account_type"

            ])
            ->add('operation_type', ChoiceType::class, [
                'choices' => [
                    'Dépôt' => "+",
                    'Retrait' => "-",
                ],

            ])
            ->add('operation_amount')
            ->add('operation_label')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Operation::class,
        ]);
    }
}
