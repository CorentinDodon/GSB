<?php

namespace GSB\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ListeRapportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('id', 'choice', array(
                    'choices' => $options['rapportChoices'],
            ));
    }

    public function getName()
    {
        return 'rapport';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(['rapportChoices']);
        $resolver->setDefaults(['rapportChoices' => array()]);
    }
}