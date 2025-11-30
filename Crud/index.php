<?php
require 'db.php';

// requete pour recuperer les produits

$sql = "SELECT *  FROM produits ORDER BY id DESC";
// comme il ny a pas de parametre , on puet utiliser query
// query = rewquete directe 
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
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

<body>
    <h1>liste des produits</h1>
    <p>
        <a href="add_produit.php"> + Ajouter un produit</a>
    </p>
    <table class="border-collapse border border-gray-400 ...">
        <thead>
            <tr>
                <th class="border border-gray-300 ...">Libelle</th>
                <th class="border border-gray-300 ...">prix</th>
                                <th class="border border-gray-300 ...">description</th>

            </tr>
        </thead>
        <tbody>
            <?php if(count($produits)>0): ?>
                <?php  foreach ($produits as $produit) : ?>
            <tr>
                <td class="border border-gray-300 ..."><?php echo $produit['libelle'] ;?></td>
                <td class="border border-gray-300 ..."><?php echo $produit['prix'] ; ?> $</td>
                 <td class="border border-gray-300 ..."><?php echo nl2br(htmlspecialchars($produit['description'])) ?> </td>
                 <td>
                    <a href="update_produit.php?id=<?php echo $produit['id']; ?>">Modifier</a>
                    <a href="delete_produit.php?id=<?php echo $produit['id'];?>">Supprimer</a>

                 </td>

            </tr>
           <?php endforeach; ?>
           <?php else:?>
            <tr>
                <td> Aucun produit trouve</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>

</html>