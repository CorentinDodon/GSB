<?php

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
	'db.options' => array(
		'driver'   => 'pdo_mysql',
		'charset'  => 'utf8',
		'host'     => 'localhost',
		'port'     => '3306',
		'dbname'   => 'GSB',
		'user'     => 'root',
		'password' => 'root'
	)
));
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'secured' => array(
            'pattern' => '^/admin',
            'logout'  => array('logout_path' => '/admin/logout'),
            'form'    => array('login_path' => '/login', 'check_path' => '/admin/login_check'),
            'users' => $app->share(function () use ($app) {
				return new GSB\Controller\UserProvider($app['db']);
				}),
        ),
    ),
));

$app['dao.praticien'] = $app->share(function ($app) {
    return new GSB\DAO\PraticienDAO($app['db']);
});

$app['dao.medicaments'] = $app->share(function ($app) {
    return new GSB\DAO\MedicamentsDAO($app['db']);
});

$app['dao.rapport'] = $app->share(function ($app) {
    return new GSB\DAO\RapportDAO($app['db']);
});

$app['dao.motif'] = $app->share(function ($app) {
    return new GSB\DAO\MotifDAO($app['db']);
});

$app['dao.visiteur'] = $app->share(function ($app) {
    return new GSB\DAO\VisiteurDAO($app['db']);
});