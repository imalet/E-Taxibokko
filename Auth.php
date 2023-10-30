<?php

class Auth
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function registerUser($nom, $prenom, $motdepass, $numero, $email)
    {

        $sql = "INSERT INTO utilisateurs (nom, prenom, motdepass, numero, email) VALUES (:nom, :prenom, :motdepass, :numero, :email)";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":motdepass", $motdepass);
        $stmt->bindParam(":numero", $numero);
        $stmt->bindParam(":email", $email);

        if ($stmt->execute()) {
            echo "Ok c'est Bon";
        } else {
            echo "okok";
        }
    }

    public function loginUser($email, $motdepass)
    {
        $sql = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($motdepass == $user["motdepass"]) {
                return $user;
            }
        }

        return false; // Authentification échouée
    }

    public function select()
    {
        $sql = "SELECT * FROM utilisateurs";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $key) {
            echo $key['nom'] . "\n";
            echo $key['prenom'] . "\n";
            echo $key['numero'] . "\n";
        }


        // return false; // Authentification échouée
    }
}
