<?php

namespace Kerx03\PhpDataBase\Controleur;

use Kerx03\PhpDataBase\Modele\DBArticle;

/**Classe ArticleController gère le formulaire et la liste des articles ajoutés*/

class ArticleController
{

    public function index()
    {
        //charge le modele
        include RACINE . "/Modele/DBArticle.php";
        $erreur  = "";
        $success = false;
        $designation = "";
        $tarif = "";

        // si le form est soumis 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $designation = $_POST["designation"];
            $tarif = $_POST["tarif"];

            // validation des champs du form 
            if (empty($_POST['designation']) || empty($_POST['tarif'])) {
                $erreur = "Tous les champs sont obligatoires.";
            } elseif ($_POST['tarif'] < 0) {
                $erreur = "Le tarif doit être un nombre positif ou nul.";
            } else {
                // appel du modele pour inserer l'article
                $result = DBArticle::addArticle($designation, $tarif);

                if ($result === true) {
                    // si c'est bon on vide les variables du form 
                    $success = true;
                    $designation = "";
                    $tarif = "";
                } else
                    // erreur bd 
                    $erreur = "Erreur : " . $result;
            }
        }

        // recuperation des articles 
        $articles = DBArticle::getArticlesDuJour();

        // chargement des vues 
        include RACINE . "/vue/entete.php";
        include RACINE . "/vue/form_vue.php";
        include RACINE . "/vue/liste_vue.php";
        include RACINE . "/vue/pied.php";
    }
}
