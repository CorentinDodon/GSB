<?php

namespace GSB\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use GSB\Domain\Medicaments;
use GSB\Form\Type\ListemedicamentType;
use GSB\Form\Type\medicamentType;


class medicamentController
{
	public function indexAction(Application $app, Request $request)
	{
		$medicaments = $app['dao.medicament']->findAllAsArray();
		$medicamet = new Medicaments();
		$medicamentForm = $app['form.factory']->create(new ListemedicamentType(), $medicament, [
			'medicamentsChoices'  => $medicaments, 
			]);
		$medicamentForm->handleRequest($request);

        return $app['twig']->render('listemedicament.html.twig', array(
        	'medicaments' => $medicaments,
        	'title'       => 'Choix medicament',
            'medicamentForm' => $medicamentForm->createView(),
        	));
	}

	public function afficheAction($id, Application $app, Request $request)
	{
		$medicaments = $app['dao.medicament']->find($id);
		$idType = $medicaments->getIdType();
		$nom = $app['dao.medicament']->findType($idType);
		$medicaments->setIdType($nom['nom']);

		$medicamentForm = $app['form.factory']->create(new medicamentType(), $medicaments);
        $medicamentForm->handleRequest($request);

        return $app['twig']->render('medicament.html.twig', array(
        	'medicaments' => $medicaments,
        	'title'		=> 'Détail du medicament',
        	'medicamentForm' => $medicamentForm->createView(),
        	));
	}
}