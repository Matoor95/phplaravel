<?php
// creer unr function qui prend deux parametre de type entier et qui return la somme de ces deux entier
function somme($a, $b): int {
    return $a +$b;
}

$resultat=somme(12, 5);
// echo $resultat;

// void : return rien 

function afficher( string $message){
    echo $message;
}

// $texte="Bonjour les devs";
// afficher("bonjour les devs ");
// surtface carre 
// function anonyme 
$carre=function($c){
    return $c*$c;
};

// echo $carre(5);

// function flechee
// creer une function qui permet de calculer double d'un chiffre
$double=fn($x)=> $x +5;
echo $double(10);

$nombres=[1,2,3,4,5];

// [2,4,6,8,10]
// function anonyme
$doubles=array_map(function ($nombres){
return $nombres *2;
},$nombres);
print_r($doubles);// function flechee
$d=array_map(fn($n) =>$n*2 , $nombres);