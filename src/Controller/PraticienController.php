<?php

namespace GSB\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use GSB\Domain\Praticiens;
use GSB\Form\Type\ListePraticienType;
use GSB\Form\Type\PraticienType;


class PraticienController
{
	public function indexAction(Application $app, Request $request)
	{
		$praticiens = $app['dao.praticien']->findAllAsArray();
		$praticien = new Praticiens();
		$praticienForm = $app['form.factory']->create(new ListePraticienType(), $praticien, [
			'praticiensChoices'  => $praticiens, 
			]);
		$praticienForm->handleRequest($request);

        return $app['twig']->render('listePraticien.html.twig', array(
        	'praticiens' => $praticiens,
        	'title'       => 'Choix praticien',
            'praticienForm' => $praticienForm->createView(),
        	));
	}

	public function afficheAction($id, Application $app, Request $request)
	{
		$praticiens = $app['dao.praticien']->find($id);
		$idType = $praticiens->getIdType();
		$nom = $app['dao.praticien']->findType($idType);
		$praticiens->setIdType($nom['nom']);

		$praticienForm = $app['form.factory']->create(new PraticienType(), $praticiens);
        $praticienForm->handleRequest($request);

        return $app['twig']->render('praticien.html.twig', array(
        	'praticiens' => $praticiens,
        	'title'		=> 'Détail du praticien',
        	'praticienForm' => $praticienForm->createView(),
        	));
	}
}