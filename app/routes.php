<?php


$app->get('/login', "GSB\Controller\LoginController::loginAction")
->bind('login');