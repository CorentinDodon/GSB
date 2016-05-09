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
		$typePraticien = $app['dao.praticien']->findAllTypeAsArray();
		$praticiens = $app['dao.praticien']->find($id);

		$praticienForm = $app['form.factory']->create(new PraticienType(), $praticiens, ['typePraticienChoices' => $typePraticien, 'disable' => true]);
        $praticienForm->handleRequest($request);

        return $app['twig']->render('praticien.html.twig', array(
        	'praticiens' => $praticiens,
        	'title'		=> 'Détail du praticien',
        	'praticienForm' => $praticienForm->createView(),
        	));
	}

	public function editAction ($id, Application $app, Request $request)
	{
		$typePraticien = $app['dao.praticien']->findAllTypeAsArray();
		$praticiens = $app['dao.praticien']->find($id);

		$praticienForm = $app['form.factory']->create(new PraticienType(), $praticiens, ['disable' => false,'typePraticienChoices' => $typePraticien]);
        $praticienForm->handleRequest($request);

        if ($praticienForm->isSubmitted() && $praticienForm->isValid()) {
            $app['dao.praticien']->save($praticiens);
            $app['session']->getFlashBag()->add('success', 'Le praticien a été correctement modifié.');
			$url = "/".$praticiens->getId();

			return $app->redirect($app['url_generator']->generate('listPraticien').$url);
        }

        return $app['twig']->render('praticienForm.html.twig', array(
        	'praticiens' => $praticiens,
        	'title'		=> 'Modification du praticien',
        	'praticienForm' => $praticienForm->createView(),
        	));
	}

	public function ajoutAction(Application $app, Request $request)
	{
		$typePraticien = $app['dao.praticien']->findAllTypeAsArray();
		$praticiens = new Praticiens();
		$praticienForm = $app['form.factory']->create(new PraticienType(), $praticiens, ['disable' => false, 'typePraticienChoices' => $typePraticien]);
		$praticienForm->handleRequest($request);

		if ($praticienForm->isSubmitted() && $praticienForm->isValid()) {
			$app['dao.praticien']->save($praticiens);
			$app['session']->getFlashBag()->add('success', 'Le praticien a été correctement créé.');
			$url = "/".$app['dao.praticien']->lastId();

			return $app->redirect($app['url_generator']->generate('listPraticien').$url);
		}

		return $app['twig']->render('praticienForm.html.twig', array(
			'praticiens' => $praticiens,
			'title'		=> 'Modification du praticien',
			'praticienForm' => $praticienForm->createView(),
		));

	}
}