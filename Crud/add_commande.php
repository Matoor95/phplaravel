<?php
require 'db.php';
$message = '';
$produit_id = '';
$quantite = '';
try {
    //code...

    // recuperer tous les produits pour le select
    $sql = "SELECT id, libelle, prix FROM produits ORDER BY libelle";
    $stmt = $pdo->query($sql);
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // pour debuguer 
    // var_dump($produits);

} catch (PDOException $e) {
    //throw $th;
    die("Erreur lors du chargement des produits" . $e->getMessage());
}

// traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produit_id = $_POST['produit_id'];
    $quantite = $_POST['quantite'];
    if ($produit_id == '' || $quantite == '') {
        $message = "le produit et la quantite sont obligatoire";
    } elseif (!is_numeric($quantite) || $quantite <= 0) {
        $message = " La quantite doit etre un nombre positif";
    } else {
        try {
            //code...
            // verifier que le produit existe et recuperer son id
            $sql = "SELECT prix  FROM produits where id= :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $produit_id, PDO::PARAM_INT);
            $stmt->execute();
            $produit = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$produit) {
                $message = " Produit introuvable";
            } else {
                $prix_unitaire = $produit['prix'];
                $total = $prix_unitaire * $quantite;
                // Inser la commande dans notre BD
                $sql = "INSERT INTO commandes (produit_id, quantite, total) Values (:produit_id, :quantite, :total)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':produit_id', $produit_id, PDO::PARAM_INT);
                $stmt->bindValue(':quantite', $quantite, PDO::PARAM_INT);

                $stmt->bindValue(':total', $total);
                $stmt->execute();
                header('Location:liste_commandes.php');
            }
        } catch (PDOException $e) {
            $message = "Erreur lose de l'ajout de la commande".$e->getMessage();
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
    <h3>Ajouter une commande</h3>
    <!-- <?php


            ?> -->
    <div class=" d-flex justify-content-center">
        <form action="" method="POST">
            <label for="" class="form-label"> Choisir un produit</label>
            <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="produit_id">
                <option selected>---choisir un produit---</option>
                <?php foreach ($produits as $produit) : ?>
                    <option value="<?php echo $produit['id'] ?>"
                        <?php echo ($produit['id'] == $produit_id) ?  'selected' : ''; ?>>
                        <?php echo htmlspecialchars($produit['libelle']) . "  (" . $produit['prix'] . "$)"; ?>



                    </option>
                <?php endforeach; ?>

            </select>
            <label for="" class="form-label"> Quantite</label>
            <input type="number" class="form-control" name="quantite" min="1" value="<?php echo htmlspecialchars($quantite); ?>">
            <button type="submit" class="m-4 btn btn-primary">Valider la commande </button>

        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>