<?php

namespace GSB\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SaisieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           	->add('dateRap','date', array(
           			'format' => 'ddMMyyyy'
           		))
           	->add('dateVisite','date', array(
           			'format' => 'ddMMyyyy'
           		))
           	->add('idPraticien', 'choice', array(
           			'choices' => $options['praticiensChoices'],
           	))
           	->add('idMotif', 'choice', array(
           			'choices' => $options['motifChoices'],
           	))
           	->add('bilan','textarea')
           	//->add('echantillon', 'choice')
           	;

    }

    public function getName()
    {
        return 'rapport';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	$resolver->setRequired(['praticiensChoices']);
    	$resolver->setDefaults(['praticiensChoices' => array()]);

    	$resolver->setRequired(['motifChoices']);
    	$resolver->setDefaults(['motifChoices' => array()]);
    }
}