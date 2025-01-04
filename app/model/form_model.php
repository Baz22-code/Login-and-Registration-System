<?php

require_once __DIR__ . "/../../config/database.php";


class formModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getUser($username){
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->execute(['username' => $username ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
      
}   