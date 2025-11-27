<?php
// verifier quer le formulaire a ete soumis
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Acces non autorise";
    exit;
}

$nom = $_POST['nom'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
// c'est un tableau vide ;
$erreurs = [];
if (empty($nom)) {
    $erreurs[] = "Le nom est requis.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreurs[] = "EMAIL INVALIDE";
}
if (strlen($password) < 8) {
    $erreurs[] = "le mot de passe doit contenir 8 caracteres";
}
// afficher les erreurs
if (!empty($erreurs)) {
    echo "<h3>Erreurs :</h3>";
    echo "<ul>";
    foreach ($erreurs as $erreur) {
        echo "<li>". htmlspecialchars($erreur) . "</li>";
    }
}
else{
    echo "<h3>Formulaire soumis avec succes !</h3>";
    echo "votre nom est : ". htmlspecialchars($nom) ."<br>";
    echo "votre email est : ". htmlspecialchars($email) ."<br>";
    $password_hash=password_hash($password, PASSWORD_DEFAULT);
    echo "votre mot de passe est : ". htmlspecialchars($password_hash) ."<br>";


}


// echo "Nom : $nom<br>";
// echo "Email : $email<br>";
// echo "Password : $password<br>";