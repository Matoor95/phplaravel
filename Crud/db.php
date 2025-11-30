<?php
$host = '127.0.0.1';
$dbname = "mentorat";
$user = 'root';
$pass = '';

try {
    //code...
    // creation de l'objet PDO
    $pdo = new PDO("mysql:k=host=-$host; port=3306 ;dbname=$dbname;charset=utf8", $user, $pass);
    // mode d'erreur : exception ( pratique pour le dev)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion ' . $e->getMessage());
    //throw $th;
}
