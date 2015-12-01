<?php

namespace GSB\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use GSB\Domain\Visiteur;
use GSB\Form\Type\ListeVisiteurType;
use GSB\Form\Type\VisiteurType;


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

		$visiteurForm = $app['form.factory']->create(new VisiteurType(), $visiteurs);
        $visiteurForm->handleRequest($request);

        return $app['twig']->render('visiteur.html.twig', array(
        	'visiteurs' => $visiteurs,
        	'title'		=> 'Détail du visiteur',
        	'visiteurForm' => $visiteurForm->createView(),
        	));
	}
}