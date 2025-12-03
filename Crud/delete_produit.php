<?php
require 'db.php';

// 1/ Recuperer L'id dans l'url
if (!isset($_GET['id'])) {
    die('Id du produit manquant');
}
$id = (int) $_GET['id'];
try {
    //code...
    $sql="DELETE FROM produits WHERE id=:id ";
    //prparee la requete 
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    //Retour a liste de produit
    header('Location:index.php');
} catch (PDOException $e) {
    die("Erreur lors de la suppression".$e->getMessage());
    //throw $th;
}

?>