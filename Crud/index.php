<?php
require 'db.php';

// requete pour recuperer les produits

$sql = "SELECT *  FROM produits ORDER BY id DESC";
// comme il ny a pas de parametre , on puet utiliser query
// query = requete directe 
// prepare + execute = requete avec parametre
$stm = $pdo->query($sql);
// on recupere tous les produits dans un tableau associatif

$produits = $stm->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <h1>liste des produits</h1>
    <p>
        <a href="add_produit.php">+ Ajouter un produit</a>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th h scope="col">Libelle</th>
                <th h scope="col">prix</th>
                <th h scope="col">description</th>

            </tr>
        </thead>
        <tbody>
            <?php if (count($produits) > 0): ?>
                <?php foreach ($produits as $produit) : ?>
                    <tr>
                        <td><?php echo $produit['libelle']; ?></td>
                        <td><?php echo $produit['prix']; ?> $</td>
                        <td><?php echo nl2br(htmlspecialchars($produit['description'])) ?> </td>
                        <td>
                            <a href="update_produit.php?id=<?php echo $produit['id']; ?>">Modifier</a>
                            <a href="delete_produit.php?id=<?php echo $produit['id']; ?>">Supprimer</a>

                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td> Aucun produit trouve</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>