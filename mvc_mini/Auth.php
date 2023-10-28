<?php

class Auth {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function registerUser($nom, $prenom, $motdepass, $numero, $email) {
        // $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO utilisateurs (nom, prenom, motdepass, numero, email) VALUES (:nom, :prenom, :motdepass, :numero, :email)";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":motdepass", $motdepass);
        $stmt->bindParam(":numero", $numero);
        $stmt->bindParam(":email", $email);
        // $stmt->execute();

        if ($stmt->execute()) {
            echo "Ok c'est Bon";
        }else {
            echo "okok";
        }
    }

    public function loginUser($email, $motdepass) {
        $sql = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($motdepass == $user["motdepass"]) {
                // L'utilisateur est authentifié avec succès
                return $user;
            }
        }

        return false; // Authentification échouée
    }
}
