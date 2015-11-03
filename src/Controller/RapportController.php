<?php

namespace GSB\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use GSB\Domain\Rapport;
use GSB\Form\Type\SaisieType;


class RapportController
{
	public function addRapportAction (Request $request, Application $app)
	{
		$praticiens = $app['dao.praticien']->findAllAsArray();
		$motifs		= $app['dao.motif']->findAllAsArray();
		$rapport = new Rapport();
		$rapportForm = $app['form.factory']->create(new SaisieType(), $rapport, ['praticiensChoices' => $praticiens, 'motifChoices' => $motifs]);
		$rapportForm->handleRequest($request);
		if ($rapportForm->isSubmitted() && $rapportForm->isValid()) {
			$app['dao.rapport']->save($rapport,$app);
		}
		return $app['twig']->render('saisie.html.twig', array(
			'title' 	  => 'Nouveau Rapport',
			'rapportForm' => $rapportForm->createview()));
	}
}