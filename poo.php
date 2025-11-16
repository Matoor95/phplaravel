<?php
// la poo est un paradigme de programmation qui organise le code autour d'objet plutot que fonction et logique 

// une voiture est un object qui a des caracteristiques ( couleur, marque, vitesse) et action ( demarrer, accelerer, freiner)
// POO , nous creaons des modeles( classes) pour representer des objets



/* 
les 4 piliers de la POO

1. Encapsulation: Proteger lwes donnees internes
2. Heritage : Reutiliser le code d'une classe parent 
3. Polymorphisme :Utiliser une meme interface pour differents types
4.  Abstraction: Simplifier la complexite en cachant les details
Pourquoi Utiliser La POO
Organisation
Reutilisabilite
Modularite
Maintenabilite
Evolutivite 

Qu'est qu'une classe?
Une classe est un modele ou un plan pour creer des objets.
C'est comme un moule a gateau 
Qu'est ce qu'un objet?
Un objet est une instance d'une classe. C'est le gateau cree avec le moule 



*/

declare(strict_types=1);
class Voiture
{
    // proprietes
    public string $marque;
    public string $couleur;
    public int $vitesse;

    // Methode
    // $this permet d'acceder a une propriete de la classe
    public function demarrer(): void
    {
        echo " la voiture demarre  ... \n";
    }
    public function accelerer(int $augmentation)
    {
        $this->vitesse += $augmentation;
        echo " Vitesse actuelle : {$this->vitesse} km/h  ";
    }
    public function afficherInfo()
    {
        echo " Marque :{$this->marque} \n";
        echo " Couleur :{$this->couleur} \n";
        echo " Vitesse :{$this->vitesse} \n";
    }
};

// creer un objet (instance)

$mavoiture = new Voiture();
$votreVoiture = new Voiture();
// var_dump($mavoiture);
// var_dump($mavoiture instanceof Voiture);

// Utilisation
$voiture= new Voiture();
$voiture->marque="Renauld";
$voiture->couleur="Gris";
$voiture->vitesse=5;

$voiture->demarrer();
$voiture->accelerer(60);
$voiture->afficherInfo();