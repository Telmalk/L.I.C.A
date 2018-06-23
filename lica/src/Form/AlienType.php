<?php

namespace App\Form;

use App\Entity\Alien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('race')
            ->add('weight')
            ->add('height')
            ->add('sex')
            ->add('origin')
            ->add('nutrition')
            ->add('attack')
            ->add('defense')
            ->add('speed')
            ->add('threat')
            ->add('description_card')
            ->add('trait')
            ->add('win')
            ->add('defeat')
            ->add('healthStatus')
            ->add('adopted')
            ->add('rating')
            ->add('price')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Alien::class,
        ]);
    }
}
