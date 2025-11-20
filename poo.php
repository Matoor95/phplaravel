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
// class Voiture
// {
//     // proprietes
//     public string $marque;
//     public string $couleur;
//     public int $vitesse;

//     // Methode
//     // $this permet d'acceder a une propriete de la classe
//     public function demarrer(): void
//     {
//         echo " la voiture demarre  ... \n";
//     }
//     public function accelerer(int $augmentation)
//     {
//         $this->vitesse += $augmentation;
//         echo " Vitesse actuelle : {$this->vitesse} km/h  ";
//     }
//     public function afficherInfo()
//     {
//         echo " Marque :{$this->marque} \n";
//         echo " Couleur :{$this->couleur} \n";
//         echo " Vitesse :{$this->vitesse} \n";
//     }
// };

// creer un objet (instance)

// $mavoiture = new Voiture();
// $votreVoiture = new Voiture();
// var_dump($mavoiture);
// var_dump($mavoiture instanceof Voiture);

// Utilisation
// $voiture= new Voiture();
// $voiture->marque="Renauld";
// $voiture->couleur="Gris";
// $voiture->vitesse=5;

// $voiture->demarrer();
// $voiture->accelerer(60);
// $voiture->afficherInfo();

// constructeur et Destructeur

// Constructeur __construct()
// le contructeur est une methode speciale appelee automatiquement lors de la creation d'un objet

// class Personne{

//     // proprietes
//     public string $nom;
//     public string $prenom;
//     public int $age;
//     // constructeur
//     public function __construct(string $nom, string $prenom, int $age){
//         $this->nom=$nom;
//         $this->prenom=$prenom;
//         $this->age=$age;
//     }
//     public function sePresenter():string{
//         return "Bonjour, je suis {$this->prenom} {$this->nom} et j'ai {$this->age} ans.";
//     }

// }
// // creer un objet (instancier) de la classe Personne 
// $personne1=new Personne('Fall', 'Omar',25);

// echo $personne1->sePresenter();
// sythase 2
class Animnal
{
    // declaration et initialisation en seuke ligne
    public function __construct(
        public string $nom,
        public string $espece,
        public int $age
    ) {
        echo " Un nouvel animal est ajoute :{$this->nom}, {$this->espece}, {$this->age} ans.\n";
    }
    public function sePresenter(): string
    {
        return "Bonjour voici votre animal {$this->nom} de l'espece{$this->espece} et il agee de {$this->age}";
    }
}


// Destructeur 
// le destrcuteur est appele quand l'objet est detruit ou que le script se termine
class Connexion
{
    private string $serveur;
    public function __construct(string $serveur)
    {
        $this->serveur = $serveur;
        echo "connexion au serveur {$this->serveur} \n";
    }
    public function __destruct()
    {
        echo " Fermeture de la connexion au serveur {$this->serveur}";
    }
}
// $connexion = new Connexion("localhost");
// le destructeur sera appele automatiquement a la fin du script

// Encapsulation : Propriete et Methode d'acces
// public : accessible partout( de 'interieur et exterieur de la classe)
// proteted: Accessible dans la classe et les classes enfants
// private: Accessible uniquement dans la classe elle meme

class ComptBancaire
{
    public string $titulaire;
    protected string $numeroCarte;
    private float $solde;
    public  function __construct(string $titulaire, float $soldeInitial)
    {
        $this->titulaire = $titulaire;
        $this->solde = $soldeInitial;
        $this->numeroCarte = $this->genererNumeroCarte();
    }

    public function genererNumeroCarte(): string
    {
        return "MMMM" . rand(1000, 9999);
    }


    public function deposer(float $montant): void
    {
        if ($montant > 0) {
            $this->solde += $montant;
            echo " Depot de {$montant} $ effectue .\n";
        }
    }
    public function retirer( float $montant):void{
        if($montant> 0 && $montant <=$this->solde){
            $this->solde -=$montant;
            echo "Retrait DE {$montant} $ effectue avec success";
        }
        echo " Solde insuffisant .\n";

    }
    public function consulterSolde(): float
    {
        return $this->solde;
    }

}

$compte= new ComptBancaire("Mbene", 1000);
echo $compte->titulaire . "\n";
// echo $compte->solde . "\n"; // Erreur: propriete privee

$compte->deposer(5000);
$compte->retirer(2000);
echo " Solde actuel : " . $compte->consulterSolde() . "\n";