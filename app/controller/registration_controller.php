<?php
require_once __DIR__ . "/../model/register_model.php";
require_once __DIR__ . "/../view/registration.php";


class RegistrationController {
    private $model;

    public function __construct() {
        $this->model = new RegistrationModel();
        $this->handleRequest();  
    
    }
    private function handleRequest() {


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    header("Content-Type: application/json");
    ob_clean(); // Prevent extra output
    $firstName = trim(htmlspecialchars($_POST["firstName"] ?? ""));
    $lastName = trim(htmlspecialchars($_POST["lastName"] ?? ""));
    $username = trim(htmlspecialchars($_POST["username"] ?? ""));
    $password = trim($_POST["password"] ?? "");

    $existingUser = $this->model->findUsername($username);

    if ($existingUser) {
        http_response_code(400);
        echo json_encode(["success" => false, "message" => "User already exists."]);
        return;
    }

    $isRegistered = $this->model->registerUser($firstName, $lastName, $username, $password);

    if ($isRegistered) {
        http_response_code(201);
        echo json_encode(["success" => true, "message" => "User registered successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Failed to register user."]);
    }
}

    }
}

new RegistrationController();




























/*
require_once __DIR__ . "/../model/register_model.php";
require_once __DIR__ . "/../view/registration.php";
class RegistrationController {
    private $model;

    public function __construct() {
        $this->model = new RegistrationModel();
        $this->handleRequest();          
    }

    private function handleRequest() {
        // Check if the form is submitted via POST
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $errors = [];

            // Sanitize and validate input fields
            $firstName = trim(htmlspecialchars($_POST["firstName"] ?? ""));
            $lastName = trim(htmlspecialchars($_POST["lastName"] ?? ""));
            $username = trim(htmlspecialchars($_POST["username"] ?? ""));
            $password = trim($_POST["password"] ?? "");
            $confirmPassword = trim($_POST["confirmPassword"] ?? "");

            // Validate inputs
            if (empty($firstName) || strlen($firstName) < 3) {
                $errors["firstName"] = "Firstname must be at least 3 characters.";
            }

            if (empty($lastName) || strlen($lastName) < 3) {
                $errors["lastName"] = "Lastname must be at least 3 characters.";
            }

            if (empty($username) || strlen($username) < 3) {
                $errors["username"] = "Username must be at least 3 characters.";
            }

            if (empty($password) || strlen($password) < 8 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/', $password)) {
                $errors["password"] = "Password must be at least 8 characters, with uppercase, lowercase, and a number.";
            }

            if ($password !== $confirmPassword) {
                $errors["confirmPassword"] = "Passwords do not match.";
            }

            if (!empty($errors)) {
                header("Content-Type: application/json");
                echo json_encode(["success" => false, "errors" => $errors]);
                exit;
            }
            
            // If validation passes, attempt to register the user
            $registrationResult = $this->model->registerUser($firstName, $lastName, $username, $password);

            if ($registrationResult) {
                header("Content-Type: application/json");
                echo json_encode(["success" => true, "message" => "Registration successful."]);
            } else {
                header("Content-Type: application/json");
                echo json_encode(["success" => false, "message" => "Registration failed."]);
            }
            exit;
        }
    }
}

// Instantiate the controller
new RegistrationController();
*/