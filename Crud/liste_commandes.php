<?php
require 'db.php';
$sql = " SELECT  c.id , p.libelle, p.prix, c.quantite, c.total, c.created_at FROM 
commandes c JOIN produits p ON c.produit_id=p.id ORDER BY c.id DESC";
$stmt = $pdo->query($sql);
$commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($commandes);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Listes des commandes</h3>
    <p>
        <a href="add_commande.php"> Ajouter une commandes </a>
        <a href="index.php">Retour aux produits</a>
    </p>

    <table border="1" cellpadding="'8">
        <tr>
            <th>ID</th>
            <th>Produit</th>
            <th>Prix unitaire </th>
            <th>Quantite</th>
            <th>Total</th>
            <th>Date</th>
            <th>Action</th>

        </tr>
        <?php if (count($commandes) > 0): ?>
            <?php foreach ($commandes as $c) : ?>
                <tr>
                    <td><?php echo $c['id'] ?></td>
                    <td><?php echo $c['libelle'] ?></td>
                    <td><?php echo $c['prix'] ?></td>
                    <td><?php echo $c['quantite'] ?></td>
                    <td><?php echo $c['total'] ?></td>
                    <td><?php echo $c['created_at'] ?></td>
                    <td><a href="">Modifier</a>
                    <a href="">Supprimer</a>
                </td>



                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6"> Aucune Commande pour le moment</td>
            </tr>
        <?php endif ?>

    </table>

</body>

</html>