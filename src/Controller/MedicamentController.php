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
		$medicaments = $app['dao.medicaments']->findAllAsArray();
		$medicament = new Medicaments();
		$medicamentForm = $app['form.factory']->create(new ListeMedicamentType(), $medicament, [
			'medicamentsChoices'  => $medicaments, 
			]);
		$medicamentForm->handleRequest($request);

        return $app['twig']->render('listeMedicament.html.twig', array(
        	'medicaments' => $medicaments,
        	'title'       => 'Choix medicament',
            'medicamentForm' => $medicamentForm->createView(),
        	));
	}

	public function afficheAction($id, Application $app, Request $request)
	{
		$medicaments = $app['dao.medicaments']->find($id);
		$idFamilleMedic = $medicaments->getIdFamille();
		$nom = $app['dao.medicaments']->findFamilleMedic($idFamilleMedic);
		$medicaments->setIdFamille($nom['nom']);

		$medicamentForm = $app['form.factory']->create(new MedicamentType(), $medicaments);
        $medicamentForm->handleRequest($request);

        return $app['twig']->render('medicament.html.twig', array(
        	'medicaments' => $medicaments,
        	'title'		=> 'Détail du medicament',
        	'medicamentForm' => $medicamentForm->createView(),
        	));
	}
}