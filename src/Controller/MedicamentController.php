<?php

namespace GSB\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use GSB\Domain\Medicament



class MedicamentController
{
	public function indexAction(Application $app, Request $request)
	{
		$medicaments = $app['dao.medicament']->findAllAsArray();
		$medicament = new medicament();
		$medicamentForm = $app['form.factory']->create(new ListeMedicamentType(), $medicament, [
			'medicamentChoices'  => $medicament, 
			]);
		$medicamentForm->handleRequest($request);

        return $app['twig']->render('listeMedicament.html.twig', array(
        	'medicament' => $medicament,
        	'title'       => 'Choix medicament',
            'medicamentForm' => $medicamentForm->createView(),
        	));
	}

	public function afficheAction($id, Application $app, Request $request)
	{
		$medicament = $app['dao.medicament']->find($id);
		$idType = $medicament->getIdType();
		$nom = $app['dao.medicament']->findType($idType);
		$medicament->setIdType($nom['nom']);

		$medicamentForm = $app['form.factory']->create(new medicamentType(), $medicament);
        $medicamentForm->handleRequest($request);

        return $app['twig']->render('medicament.html.twig', array(
        	'medicament' => $medicament,
        	'title'		=> 'Détail du medicament',
        	'medicamentForm' => $praticienForm->createView(),
        	));
	}
}