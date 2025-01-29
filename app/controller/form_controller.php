<?php
session_start();
require_once __DIR__ . "/../model/form_model.php";
require_once __DIR__ . '/../view/form.php';

class formController {

    private $model;

    public function __construct() {
        $this->model = new formModel();
        $this->userValidation();

    }

    private function userValidation (){

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            header("Content-Type: application/json");
            ob_clean(); // Prevent extra output

            $username = trim(htmlspecialchars($_POST["username"] ?? ""));
            $password = trim($_POST["password"] ?? "");


            $userExist = $this->model->getUser($username);

            if($userExist && password_verify($password , $userExist['password'])) {
                    
                // Set session variables
                $_SESSION['user'] = [
                    'firstName' => $userExist['firstName'],
                    'lastName' => $userExist['lastName'],
                ];

                http_response_code(200);
                echo json_encode(["success" => true, "message" => "User successfully Login."]);

            }else{

                http_response_code(401);
                echo json_encode(["success" => false, "message" => "Invalid Username or Password"]);
                
            }       

        }

    }

}

new formController();