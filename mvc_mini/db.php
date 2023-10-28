<?php

class Database {
    private $host = 'localhost';
    private $dbname = 'taxibokko';
    private $username = 'root';
    private $password = '';
    private $pdo;

    // public function __construct($host, $dbname, $username, $password) {
    //     $this->host = $host;
    //     $this->dbname = $dbname;
    //     $this->username = $username;
    //     $this->password = $password;
    // }

    public function connect() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getPDO() {
        return $this->pdo;
    }
}
