
<?php   
require_once __DIR__ . "/../Database.php";

class RegistrationModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function registerUser($firstName, $lastName, $username, $password) {
 
        try {
            $validateUser = "SELECT * FROM user WHERE username = :username";
            $stmt = $this->pdo->prepare($validateUser);
            $stmt->execute(['username' => $username]);

            if ($stmt->rowCount() > 0) {
                return ["success" => false, "message" => "Username already exists."];
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO user (firstName, lastName, username, password) 
                    VALUES (:firstName, :lastName, :username, :password)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'firstName' => $firstName,
                'lastName' => $lastName,
                'username' => $username,
                'password' => $hashedPassword
            ]);

            return ["success" => true, "message" => "User registered successfully."];
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Error: " . $e->getMessage()];
        }
    }
}