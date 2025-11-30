<?php
require 'db.php';
// variable pour preremplir le formulaire en cas d'ereur
$libelle = '';
$prix = '';
$description = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $libelle = $_POST['libelle'] ?? '';
    $prix = $_POST['prix'] ?? '';
    $description = $_POST['description'] ?? '';

    // verification simple
    if ($libelle == '' || $prix == '') {
        $message = "le libelle et le prix sont obligatoires";
    } elseif (!is_numeric($prix) || $prix <= 0) {
        $message = "le prix doit etre un nombre positif";
    } else {
        try {
            //code...
            $sql = "INSERT INTO produits (libelle, prix, description) VALUES(:libelle, :prix, :description)";
            // preparer la requete
            $stm = $pdo->prepare($sql);
            // lies les valeurs
            $stm->bindValue(':libelle', $libelle, PDO::PARAM_STR);
            $stm->bindValue(':prix', $prix, PDO::PARAM_STR);

            $stm->bindValue(':description', $description, PDO::PARAM_STR);
            $stm->execute();
            // Redirection vers la listes des produits
            header('Location:index.php');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ajouter un produit</h1>
    <form method="POST">
        <div>
            <label for="libelle">Libelle :</label>
            <input type="text" name="libelle" id="libelle">
        </div>
        <div>
            <label for="prix"> Prix</label>
            <input type="number" name="prix">
        </div>
        <div>
            <label for="description"> Description</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <button type="submit"> Ajoutert</button>
        <a href="index.php">Annuler</a>

    </form>


</body>

</html>