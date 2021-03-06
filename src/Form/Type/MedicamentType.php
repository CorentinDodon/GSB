<?php

namespace GSB\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MedicamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
        ->add('nom','text', array(
            'disabled' => true
            ))
         ->add('composition','textarea', array(
            'disabled' => true
            ))
        ->add('effets','textarea', array(
            'disabled' => true
            ))
        ->add('contreindication','textarea', array(
            'disabled' => true
            ))
        ->add('idFamille','text', array(
            'disabled' => true
            ))
      ;
    }

    public function getName()
    {
        return 'medicament';
    }
}