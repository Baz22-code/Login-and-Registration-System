<?php

require_once __DIR__ . "/../../config/database.php";


class ForgotModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getUserCredentials($username,$secretId){
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE username = :username AND secretId = :secretId");
        $stmt->execute(['username' => $username , 'secretId' => $secretId ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}