<?php

namespace GSB\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RapportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateRap','text',array(
                  'disabled' => true
                  ))
            ->add('dateVisite','text',array(
                  'disabled' => true
                  ))
            ->add('idPraticien', 'text',array(
                  'disabled' => true
                  ))
            ->add('idMotif', 'text',array(
                  'disabled' => true
                  ))
            ->add('bilan','textarea',array(
                  'disabled' => true
                  ))
            ->add('echantillon', 'textarea',array(
                  'disabled' => true
                  ))
            ;

    }

    public function getName()
    {
        return 'rapport';
    }

}