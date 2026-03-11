<?php
namespace Kerx03\PhpDataBase\Modele;
use PDO;
use PDOException;
use Kerx03\PhpDataBase\Cls\Database;

/**Classe DBArticle gère les operation de la BD sur la tacle article */

class DBArticle
{

    //ajout un article dans la bd 
    public static function addArticle($designation, $tarif)
    {
        try {
            // connexion unique , singleton crée dans database.php
            $conn = Database::getInstance();

            $sql = "INSERT INTO ARTICLE (designation, tarif) VALUES (:designation, :tarif)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':designation' => $designation,
                ':tarif' => $tarif
            ]);

            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    // recup les 10 derniers articles ajoutés aujourd'hui
    public static function getArticlesDuJour()
    {
        try {
            $conn = Database::getInstance();

            $sql = "SELECT designation, tarif FROM ARTICLE WHERE DATE(created_at) = CURDATE() ORDER BY created_at DESC LIMIT 10";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // retourne tableau associatif
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
