<?php
$nom=$_GET['name'] ?? 'invite'; // operateur null coalescent
$age=$_GET['age'] ?? '0';
$ville=$_GET['ville'] ?? 'inconnue';

echo "Nom : $nom<br>";
echo "Age : $age<br>";
echo "Ville : $ville<br>";
// verifier si une cle existe

if(isset($_GET['nom'])){
    echo "La cle 'nom' existe dans le tableau \$_GET.<br>";
} else {
    echo "La cle 'nom' n'existe pas dans le tableau \$_GET.<br>";

}