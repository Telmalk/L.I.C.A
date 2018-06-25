<?php
/**
 * Created by PhpStorm.
 * User: mallano
 * Date: 25/06/2018
 * Time: 15:13
 */

namespace App\Form;

use  Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MyCustomDate extends DateType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefault('years', range(date('Y') + 460, date('Y') + 500));

        $resolver->setDefault('hours', range(8, 23));
    }
}