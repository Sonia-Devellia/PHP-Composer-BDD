<?php
use Kerx03\PhpDataBase\Controleur\ArticleController;

/** Controleur principal */

// Démarrage de la SESSION en premier 
session_start();

// charment de la recine et .env
require __DIR__ . "/Cls/config.php";

// chargement de la classe Dtabase 
// require RACINE . "/cls/database.php";


// Chargement et appel direct du contrôleur
//require RACINE . "/controleur/article_ctl.php";
$ctrl = new ArticleController();
$ctrl->index();
