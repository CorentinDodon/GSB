<?php 

	namespace GSB\Form\Type;

	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;

	class VisiteurType extends AbstractType
	{
		public function buildForm(FormBuilderInterface $builder, array $options)
		{
		  $builder
			->add('nom','text', array('disabled' => true))
			->add('prenom','text', array('disabled' => true))
			->add('adresse','text', array('disabled' => true))
			->add('CP','text', array('disabled' => true))
			->add('ville','text', array('disabled' => true))
			->add('idSecteur','text', array('disabled' => true));
		}

		public function getName()
		{
			return 'visiteur';
		}
	}