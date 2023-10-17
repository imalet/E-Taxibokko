<?php

$host = "localhost";
$user = "root";
$motdepass = "";
$database = "taxibokko";

$db = new mysqli($host, $user, $motdepass, $database);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (isset($_POST['valider'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp = hash('sha256',$_POST['password']);
    $email = $_POST['email'];

    

    $req = $db->prepare("INSERT INTO users (nom, prenom, mtdpasse, email) VALUES (?, ?, ?, ?)");
    $req->bind_param("ssss", $nom, $prenom, $mdp, $email);

    if ($req->execute()) {
        echo "Oki";
    } else {
        echo "Bad";
    }
}
