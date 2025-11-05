<?php

// echo  " Bonjour les dev";

// $a =24;
// $b=50;

// $somme=$a +$b;
// echo " La somme de a et b est : " . $somme;


$nom = "Mohamed";

// type $nomVariable
// une function qui permet de prendre deux parametre de type entier et calcule la somme 
function somme(int $a, int $b)
{
    return $a + $b;
}


echo somme(10, 20);

$taille = strlen($nom);
echo " La taille du nom est : " . $taille;


// verifier le max entre deux chiffre entier 
$s = 12;
$t = 25;

// condition ternaire
// if ($s > $t) {
//     echo " Le max est :" . $s;
// }
// else{
//     echo "le max est : " . $t;
// }

$max=($a>$t) ? $s : $t;
echo " Le max est : " . $max;
