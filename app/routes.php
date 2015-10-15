<?php

$app->get('/', function () use ($app) {
    return $app->redirect('index.php/admin/');
});

$app->get('/login', "GSB\Controller\LoginController::loginAction")
	->bind('login');
$app->get('/admin/a', "GSB\Controller\LoginController::indexAction")
	->bind('index');
$app->get('/admin/praticien', "GSB\Controller\PraticienController::indexAction")
	->bind('listPraticien');
$app->get('/admin/medicament', "GSB\Controller\MedicamentController::indexAction")
	->bind('listMedicament');
$app->get('/admin/visiteur', "GSB\Controller\VisiteurController::indexAction")
	->bind('listVisiteur');
$app->get('/admin/rapport', "GSB\Controller\RapportController::indexAction")
	->bind('listRapport');
$app->get('/admin/rapport/add', "GSB\Controller\RapportController::addRapportAction")
	->bind('addRapport');
