<?php

namespace GSB\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ListeMedicamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('idFamille', 'choice', array(
                    'choices' => $options['medicamentsChoices'],
            ));
    }

    public function getName()
    {
        return 'medicament';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(['medicamentsChoices']);
        $resolver->setDefaults(['medicamentsChoices' => array()]);
    }
}