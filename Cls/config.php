<?php

/**
 * Configuration globale de l'application
 */

// chargement de l'autoloader composer

require  __DIR__ . "/../vendor/autoload.php";

// Charment des variables d'environnement depuis .env 
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

// chemin absolu de l'appilication 
define("RACINE", dirname(__DIR__));