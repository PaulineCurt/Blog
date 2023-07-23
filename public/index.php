<?php

// Démarrage de la session
session_start();

// Inclusion de l'autoloader de composer
require '../vendor/autoload.php';

// Inclusion de la config
require '../app/config.php';

// Inclusion des dépendances
require '../lib/functions.php';

// dump(constructUrl('/article', ['id' => 34]));

// Récupération du path (chemin)
$path = str_replace(BASE_URL, '', $_SERVER['REQUEST_URI']);
$path = str_replace('/index.php', '', $path);
$path = explode('?', $path)[0];

    if($path == ''){
        $path = '/';
    }

// Routing
// Test la variable
switch($path) {
    case '/':
    require '../controlers/home.php';
    break;

    case '/article':
    require '../controlers/article.php';
    break;

    default : 
    http_response_code(404);
    echo 'toz';
    exit; // Fin de l'exécution du script PHP
}
