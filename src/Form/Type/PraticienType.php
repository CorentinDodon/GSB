<?php

namespace GSB\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PraticienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
        ->add('nom','text', array(
            'disabled' => $options['disable']
            ))
        ->add('prenom','text', array(
            'disabled' => $options['disable']
            ))
        ->add('adresse','text', array(
            'disabled' => $options['disable']
            ))
        ->add('CP','text', array(
            'disabled' => $options['disable']
            ))
        ->add('ville','text', array(
            'disabled' => $options['disable']
            ))
        ->add('coefNotoriete','text', array(
            'disabled' => $options['disable']
            ))
        ->add('coefConfiance','text', array(
            'disabled' => $options['disable'],
            'required' => false
            ))
        ->add('idType','choice', array(
            'choices' => $options['typePraticienChoices'],
            'disabled' => $options['disable']
            ))
      ;
    }

    public function getName()
    {
        return 'praticien';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(['typePraticienChoices']);
        $resolver->setDefaults(['typePraticienChoices' => array()]);

        $resolver->setRequired(['disable']);
    }
}