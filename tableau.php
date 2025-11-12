<?php

// tableau indexe commence par 0

$fruits = ["banane", "pomme", "orange"];
// 
// echo $fruits[1];

// tableau associatif (cle =>valeur)
$personne = [
    "prenom" => "moussa",
    "nom" => "Diouf",
    "age" => 25,
    "ville" => "Dakar"

];



// echo $personne["age"];

//tableau multidimensionnel
$etudiants = [
    //index 0
    [
        "nom" => "Ali",
        "note" => 13
    ],
    // index 1
    [
        "nom" => "Mbene",
        "note" => 18
    ],
    //index 2
    [
        "nom" => "omar",
        "note" => 8
    ]
];

// echo $etudiants[0]["nom"];

// echo  $etudiants[1]['note'];


$nombres = [1, 2, 3, 4, 5, 6];
// $nombres[]=6 ; // ajoute a la fin du tableau
// array_push($nombres,7); // ajouter a la fin du tableau

// array_unshift($nombres, 10); // ajoute au debut 
// array_pop($nombres); // Retire le dernier
// array_shift($nombres); // retire le premier
// unset($nombres[3]);

// $compte=count($nombres); // count permet de compter le nombre d'element d'un tableau

// verifier si un element existe dans mon tableau
// $trouve=in_array(8,$nombres);
// echo $trouve;
// recuperer les cles d'un tableau
// array_keys($personne);
// parcourir un tableau pour afficher les elements

// foreach( $fruits as $fruit){
//     echo $fruit ."<br>";
// }


// afficher les personnes
// foreach ($personne as $cle => $valeur) {
//     echo "$cle: $valeur<br>";
//     echo " Bonjour les devs";
// }


$teachers = [
    //index 0
    [
        "nom" => "Ali",
        "email" => "ali@gmail.com"
    ],
    //index 1
    [
        "nom"=>"omar", "email"=>"omar@gmail.com",

    ],
    //index 2
    [
        "nom"=>"Nogaye", "email"=>"nogaye@gmaqil.com"
    ]

];

// echo $teachers[0]["email"];
//methode 1
foreach($teachers as $teacher){
    // echo " les nom sont :". $teacher['nom'] ."<br>";

    echo $teacher["nom"] ." : ". $teacher['email']."<br>";

}
//methode 2 avec l'index

foreach($teachers as $index=> $teacher){
    $numero= $index +1;

    echo "$numero . {$teacher['nom']} avec son email {$teacher['email']} <br>";

}
