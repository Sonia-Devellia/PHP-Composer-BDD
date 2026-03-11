<?php

namespace Kerx03\PhpDataBase\Cls;
use PDO;
/** CLasse Database - Singleton
 *Garantit une seule instance de connexion PDO 
 */

class Database
{
        //Attribut qui stock l'instance doit etre static
    private static ?PDO $instance = null;

       //COnstrcuteur du singleton  privé
    private function __construct(){
        self::$instance = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

        //controle de l'accès à l'instance du singleton
    public static function getInstance(): PDO {
        // Si pas encore de connexion on en crée une
        if (self::$instance === null) new Database ();
        // Retourne toujours la même connexion
        return self::$instance;
    }
}
