<?php
require_once("db.php");
require_once("Auth.php");

$database = new Database();
$database->connect();

$auth = new Auth($database);

if (isset($_POST['valider'])) {

    $nom = htmlspecialchars($_POST['prenom'], ENT_QUOTES, 'UTF-8');
    $prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES, 'UTF-8');
    $mdp = $_POST['password'];
    $email = $_POST['email'];

    @$numero = $_POST['numero'];

    if (!preg_match("/^(77|78|76)[0-9]{7}/", $numero)) {
        echo "Bad numero";
    } else {

        if (!preg_match("/^(77|78|76)[0-9]{7}/", $numero)) {
            echo "Bad numero";
        } elseif (!preg_match("/^[a-zA-Z]+$/", $nom)) {
            echo "Le champ 'nom' ne doit contenir que des lettres.";
        } elseif (!preg_match("/^[a-zA-Z]+$/", $prenom)) {
            echo "Le champ 'prenom' ne doit contenir que des lettres.";
        } elseif (!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$/', $email)) {
            echo "Bad email";
        } else {
            $auth->registerUser($nom, $prenom, $mdp, $numero, $email);
        }
    }
}


    
// Pour inscrire un utilisateur
// $auth->registerUser('IMALET','IMALET','imalet',787878788,'imalet@gmail.com');

// // Pour authentifier un utilisateur
// $user = $auth->loginUser("imaletbenji58@gmail.com", "qwerty");
// if ($user) {
//     echo "Utilisateur authentifié avec succès, vous pouvez gérer la session ici";
// } else {
//     echo "Authentification échouée";
// }