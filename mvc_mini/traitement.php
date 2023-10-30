<?php
require_once("db.php");
require_once("Auth.php");

$database = new Database();
$database->connect();

$auth = new Auth($database);

if (isset($_POST['valider'])) {

    $nom = htmlspecialchars($_POST['prenom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mdp = $_POST['password'];
    $email = $_POST['email'];
    @$numero = $_POST['numero'];

    $auth->registerUser($nom, $prenom, $mdp, $numero, $email);
}


if (isset($_POST['inscrire'])) {
    
    $user = $auth->loginUser($_POST['email'], $_POST['password']);

    if ($user) {
        echo "Utilisateur authentifié avec succès" ;
    } else {
        echo "Authentification échouée";
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