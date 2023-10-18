<?php


try {
    $db = new PDO('mysql:host=localhost;dbname=taxibokko', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    throw $e;
}

if (isset($_POST['valider'])) {

    $nom = htmlspecialchars($_POST['prenom'], ENT_QUOTES, 'UTF-8');
    $prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES, 'UTF-8');
    $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    @$numero = $_POST['numero'];

    if (!preg_match("/^(77|78|76)[0-9]{7}/", $numero)) {
        echo "Bad numero";
    } else {

        $sele = $db->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $sele->bindParam(':email', $email);
        $sele->execute();

        $resultat = $sele->fetch(PDO::FETCH_ASSOC);

        if (!preg_match("/^(77|78|76)[0-9]{7}/", $numero)) {
            echo "Bad numero";
        } elseif (!preg_match("/^[a-zA-Z]+$/", $nom)) {
            echo "Le champ 'nom' ne doit contenir que des lettres.";
        } elseif (!preg_match("/^[a-zA-Z]+$/", $prenom)) {
            echo "Le champ 'prenom' ne doit contenir que des lettres.";
        } else {
            $req = $db->prepare('INSERT INTO utilisateurs(nom, prenom, motdepass, numero, email) VALUES(:nom, :prenom, :motdepass, :numero, :email)');
            $req->bindParam(':nom', $nom);
            $req->bindParam(':prenom', $prenom);
            $req->bindParam(':motdepass', $mdp);
            $req->bindParam(':numero', $numero);
            $req->bindParam(':email', $email);

            if ($req->execute()) {
                echo "Insertion reussi";
            } else {
                echo "Insertion Echoué";
            }
        }
    }
}
