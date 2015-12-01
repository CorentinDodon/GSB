<?php

namespace GSB\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ListeVisiteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('idSecteur', 'choice', array(
                    'choices' => $options['visiteurChoices'],
            ));
    }

    public function getName()
    {
        return 'visiteur';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(['visiteurChoices']);
        $resolver->setDefaults(['visiteurChoices' => array()]);
    }
}