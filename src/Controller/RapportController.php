<?php

namespace GSB\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class RapportController
{
	public function addRapportAction (Request $request, Application $app)
	{
		$praticiens = $app['dao.praticien']->findAll();
		$medicaments = $app['dao.medicament']->findAll();
		return $app['twig']->render('saisie.html.twig', array('praticiens' => $praticiens, 'medicaments' => $medicaments));
	}
}