<?php
require_once __DIR__ . '/../config/config.php';
class Database
{
    private static ?PDO $pdo = null;

    // Retounr une instnace PDO (singleton)
    // on ne creer qu'une seule connexion à la BDD
    // tout les modeles partagent la meme connexion via Database::getConnection()
    public static function getConnection(): PDO
    {
        $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8mb4';
        try {
            //code...
            self::$pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            //throw $th;
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
        return self::$pdo;
    }
}
