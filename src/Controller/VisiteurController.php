<?php

namespace GSB\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use GSB\Domain\Visiteur;
use GSB\Form\Type\ListeVisiteurType;
use GSB\Form\Type\VisiteurType;
use GSB\Form\Type\VisiteurAType;


class VisiteurController
{
	public function indexAction(Application $app, Request $request)
	{
		$visiteurs = $app['dao.visiteur']->findAllAsArray();
		$visiteur = new Visiteur();
		$visiteurForm = $app['form.factory']->create(new ListeVisiteurType(), $visiteur, [
			'visiteurChoices'  => $visiteurs, 
			]);
		$visiteurForm->handleRequest($request);

        return $app['twig']->render('listeVisiteur.html.twig', array(
        	'visiteur' => $visiteurs,
        	'title'       => 'Choix visiteur',
            'visiteurForm' => $visiteurForm->createView(),
        	));
	}

	public function afficheAction($id, Application $app, Request $request)
	{
		$visiteurs= $app['dao.visiteur']->find($id);
		$idSecteur = $visiteurs->getIdSecteur();
		$nom = $app['dao.visiteur']->findSecteur($idSecteur);
		$visiteurs->setIdSecteur($nom['nom']);

		$visiteurForm = $app['form.factory']->create(new visiteurAType(), $visiteurs);
        $visiteurForm->handleRequest($request);

        return $app['twig']->render('visiteur.html.twig', array(
        	'visiteurs' => $visiteurs,
        	'title'		=> 'Détail du visiteur',
        	'visiteurForm' => $visiteurForm->createView(),
        	));
	}
	
	public function editAction ($id, Application $app, Request $request)
	{
		$typeVisiteur = $app['dao.visiteur']->findAllTypeAsArray();
		$visiteur = $app['dao.visiteur']->find($id);

		$visiteurForm = $app['form.factory']->create(new visiteurType(),$visiteur, ['disable' => false,'typeVisiteurChoices' => $typeVisiteur]);
        $visiteurForm->handleRequest($request);

         if ($visiteurForm->isSubmitted() && $visiteurForm->isValid()) {
            $app['dao.visiteur']->save($visiteur);
            $app['session']->getFlashBag()->add('success', 'Le visiteur a été correctement modifié.');
			$url = "/".$visiteur->getId();

			return $app->redirect($app['url_generator']->generate('listVisiteur').$url);
        }

        return $app['twig']->render('visiteurForm.html.twig', array(
        	'visiteurs' => $visiteur,
        	'title'		=> 'Modification du visiteur',
        	'visiteurForm' => $visiteurForm->createView(),
        	));
	}

	public function ajoutAction(Application $app, Request $request)
	{
		$typeVisiteur = $app['dao.visiteur']->findAllTypeAsArray();
		$visiteurs = new Visiteur();
		$visiteurForm = $app['form.factory']->create(new visiteurType(), $visiteurs, ['disable' => false, 'typeVisiteurChoices' => $typeVisiteur]);
		$visiteurForm->handleRequest($request);

		 if ($visiteurForm->isSubmitted() && $visiteurForm->isValid()) {
			$app['dao.visiteur']->save($visiteurs);
			$app['session']->getFlashBag()->add('success', 'Le visiteur a été correctement créé.');
			$url = "/".$app['dao.visiteur']->lastId();

			return $app->redirect($app['url_generator']->generate('listVisiteur').$url);
		 }

		return $app['twig']->render('visiteurForm.html.twig', array(
			'visiteurs' => $visiteurs,
			'title'		=> 'Ajout de un  visiteur',
			'visiteurForm' => $visiteurForm->createView(),
		));

	}
}