<?php


try {
    $db = new PDO('mysql:host=localhost;dbname=taxibokko','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    throw $e;
}

if (isset($_POST['valider'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp = hash('sha256',$_POST['password']);
    $email = $_POST['email'];

    $req = $db->prepare('INSERT INTO users(nom, prenom, motdepasse, email) VALUES(:nom, :prenom, :motdepasse, :email)');
    $req->bindParam(':nom',$nom);
    $req->bindParam(':prenom',$prenom);
    $req->bindParam(':motdepasse',$mdp);
    $req->bindParam(':email',$email);

    if ($req->execute()) {
        echo "Insertion reussi";
    }else {
        echo "Insertion Echoué";
    }

}
