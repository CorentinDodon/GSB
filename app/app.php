<?php

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
	'db.options' => array(
		'driver'   => 'pdo_mysql',
		'charset'  => 'utf8',
		'host'     => '172.17.21.12',
		'port'     => '3306',
		'dbname'   => 'GSB',
		'user'     => 'root',
		'password' => 'mdp'
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
				return new UserProvider($app['db']);
				}),
        ),
    ),
));

