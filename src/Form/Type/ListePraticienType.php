<?php

namespace GSB\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ListePraticienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('idType', 'choice', array(
                    'choices' => $options['praticiensChoices'],
            ));
    }

    public function getName()
    {
        return 'praticien';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(['praticiensChoices']);
        $resolver->setDefaults(['praticiensChoices' => array()]);
    }
}