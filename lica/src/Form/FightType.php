<?php

namespace App\Form;

use App\Entity\Fight;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FightType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bet')
            ->add('odd_fighter1')
            ->add('odd_fighter2')
            ->add('date')
            ->add('accepted')
            ->add('user1')
            ->add('user2')
            ->add('alien1')
            ->add('alien2')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fight::class,
        ]);
    }
}
