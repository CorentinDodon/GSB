<?php

namespace GSB\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RapportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateRap','text',array(
                  'disabled' => $options['disable']
                  ))
            ->add('dateVisite','text',array(
                  'disabled' => $options['disable']
                  ))
            ->add('idPraticien', 'text',array(
                  'disabled' => $options['disable']
                  ))
            ->add('idMotif', 'text',array(
                  'disabled' => $options['disable']
                  ))
            ->add('bilan','textarea',array(
                  'disabled' => $options['disable']
                  ))
            ->add('echantillon', 'textarea',array(
                  'disabled' => $options['disable']
                  ))
            ;

    }

    public function getName()
    {
        return 'rapport';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
      $resolver->setRequired(['disable']);
    }
}