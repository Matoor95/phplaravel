<?php
$host = 'phpmyadmin.test';
$dbname = "mentorat";
$user = 'root';
$pass = '';

$dns="mysql:host=$host; port=3306 ;dbname=$dbname;charset=utf8";
try {
    //code...
    // creation de l'objet PDO
    $pdo = new PDO($dns, $user, $pass);
    // mode d'erreur : exception ( pratique pour le dev)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion ' . $e->getMessage());
    //throw $th;
}
