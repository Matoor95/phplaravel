<?php
//Matar Ndiaga SECK
// Guillemets simples : texte brut
$nom = 'Ahmed';
echo 'Bonjour $nom';  // Affiche : Bonjour $nom (pas d'interprétation)

// Guillemets doubles : interprétation des variables
$nom = "Ahmed";
echo "Bonjour $nom";  // Affiche : Bonjour Ahmed

// Concaténation
$prenom = "Fatima";
$nom = "El Amrani";
$complet = $prenom . " " . $nom;  // Fatima El Amrani

// Fonctions utiles
$texte = "Bonjour le monde";
echo strlen($texte);           // Longueur : 16
echo strtoupper($texte);       // BONJOUR LE MONDE
echo strtolower($texte);       // bonjour le monde
echo substr($texte, 0, 7);     // Bonjour
echo str_replace("monde", "PHP", $texte);  // Bonjour le PHP
echo strpos($texte, "monde");  // Position : 11

// Heredoc (pour textes multiligne)
$html = <<<HTML
<div>
    <h1>Titre</h1>
    <p>Mon texte avec $nom</p>
</div>
HTML;

// Nowdoc (comme heredoc mais sans interprétation)
$texte = <<<'TEXTE'
Ceci est du texte brut
$nom ne sera pas interprété
TEXTE;
