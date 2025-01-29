<?php   
require_once __DIR__ . "/../../config/database.php";


class RegistrationModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    // Find the username in the database
    public function findUsername($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Insert the user in the database
    public function registerUser($firstName, $lastName,$secretId, $username, $password) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (firstName, lastName,secretId,username, password) 
                    VALUES (:firstName, :lastName,:secretId ,:username, :password)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                'firstName' => $firstName,
                'lastName' => $lastName,
                'secretId' => $secretId,
                'username' => $username,
                'password' => $hashedPassword,
            ]);
        } catch (PDOException $e) {
            return false; // Log the error in production
        }
    }
}
