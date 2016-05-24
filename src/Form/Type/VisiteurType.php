<?php 

	namespace GSB\Form\Type;

	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;

	class VisiteurType extends AbstractType
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
        ->add('idSecteur','choice', array(
            'choices' => $options['typeVisiteurChoices'],
            'disabled' => $options['disable']
            ))
      ;}
	
		public function getName()
		{
			return 'visiteur';
		}

    

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(['typeVisiteurChoices']);
        $resolver->setDefaults(['typeVisiteurChoices' => array()]);

        $resolver->setRequired(['disable']);
    }
		

		
}
	