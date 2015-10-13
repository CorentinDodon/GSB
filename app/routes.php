<?php

// Home page
$app->get('/', function () use ($app) {

    ob_start();             // start buffering HTML output
    require '../views/layout.html.twig';
    $view = ob_get_clean(); // assign HTML output to $view
    return $view;
});

$app->get('/login', "GSB\Controller\LoginController::loginAction")
->bind('login');

$app->get('/saisie', function () use ($app) {
	$praticiens = $app['dao.praticien']->findAll();
	return $app['twig']->render('saisie.html.twig', array('praticiens' => $praticiens));

});