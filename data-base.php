<?php
class Database
{
        //Attribut qui stock l'instance doit etre static
    private static ?PDO $instance = null;
    private PDO $conn;

        //COnstrcuteur du singleton doit être privé
    private function __construct()
    {
        // Code d'initialisation de la connexion au serveur de la Bdd
        self::$instance = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

        //controle de l'accès à l'instance du singleton
    public static function getInstance(): PDO {
        if (self::$instance === null) new Database ();
        return self::$instance;
    }
}
