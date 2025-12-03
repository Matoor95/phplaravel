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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <h1>Ajouter un produit</h1>
    <div class="d-flex justify-content-center">
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Libelle</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="libelle">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prix</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="prix">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="description">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>