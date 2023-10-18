<?php


try {
    $db = new PDO('mysql:host=localhost;dbname=taxibokko', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    throw $e;
}

if (isset($_POST['valider'])) {

    $nom = htmlspecialchars($_POST['prenom'], ENT_QUOTES, 'UTF-8');
    $prenom = $_POST['prenom'];
    $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    $sele = $db->prepare("SELECT * FROM users WHERE email = :email");
    $sele->bindParam(':email', $email);
    $sele->execute();

    @$resultat = $sele->fetch(PDO::FETCH_ASSOC);

    if ($resultat['email'] === $email) {
        echo "Il existe";
    } else {
        $req = $db->prepare('INSERT INTO users(nom, prenom, motdepasse, email) VALUES(:nom, :prenom, :motdepasse, :email)');
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':motdepasse', $mdp);
        $req->bindParam(':email', $email);

        if ($req->execute()) {
            echo "Insertion reussi";
        } else {
            echo "Insertion Echoué";
        }
    }
}
