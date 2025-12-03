<?php
require 'db.php';

$message = "";
// 1/ Recuperer L'id dans l'url
if (!isset($_GET['id'])) {
    die('Id du produit manquant');
}
$id = (int) $_GET['id'];
// 2) Si le formulaire est soumis-> mise a jour
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $libelle = $_POST['libelle'] ?? '';
    $prix = $_POST['prix'] ?? '';

    $description = $_POST['description'] ?? '';
    if ($libelle == "" || $prix == '') {
        $message = "le libelle et le prix sont obligatoire";
    } elseif (!is_numeric($prix) || $prix <= 0) {
        $message = "le prix doit etre un nombre positif";
    } else {
        try {
            //code...
            $sql = "UPDATE produits SET  libelle=:libelle, prix=:prix, description=:description WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':libelle', $libelle, PDO::PARAM_STR);
            $stmt->bindValue(':prix', $prix);
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);
            $stmt->bindValue(':id',$id, PDO::PARAM_INT);

            $stmt->execute();
            header("Location:index.php");
        } catch (PDOException $e) {
            //throw $th;
            $message = "Erreur lors de la mise a jour " . $e->getMessage();
        }
    }
} else {
    //3 Charger les info du produits selectionne pour le edit
    try {
        //code...
        $sql = "SELECT * FROM produits WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $produit = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$produit) {
            die("Produit introuvable");
        }
        // variable pour preremoplir le formulaire
        $libelle = $produit['libelle'];
        $prix = $produit['prix'];

        $description = $produit['description'];
    } catch (PDOException $e) {
        //throw $th;
        die("Erreur :" . $e->getMessage());
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
    <h1>Modifier le produit</h1>
    <?php if ($message): ?>
        <p style="color:red"><?php echo $message ?> </p>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Libelle</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="libelle" value="<?php echo htmlspecialchars($libelle); ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Prix</label>
            <input type="number" step="0.01" class="form-control" id="exampleInputPassword1" name="prix" value="<?php echo htmlspecialchars($prix); ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="description" value="<?php echo htmlspecialchars($description); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>