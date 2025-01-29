<?php
    session_start();
    require_once __DIR__ . '/../view/forgot.php';
    require_once __DIR__ . "/../model/forgot_model.php";


    class ForgotController {

        private $model;

        public function __construct(){

            $this->model = new ForgotModel();
            $this->userValidation();

        }


        private function userValidation(){

                
            if ($_SERVER["REQUEST_METHOD"] === "POST") {

                header("Content-Type: application/json");
                ob_clean();

                $username = trim(htmlspecialchars($_POST["username"] ?? ""));
                $secretId = trim($_POST["secretId"] ?? "");

                $userCheck = $this->model->getUserCredentials($username,$secretId);

                if($userCheck) {
                    
                                    // Set session variables
                    $_SESSION['user'] = [
                        'username' => $userCheck['username'],
                        'secretId' => $userCheck['secretId'],
                    ];

                    http_response_code(200);
                    echo json_encode(["success" => true, "message" => "User successfully Login."]);

                }else{

                    http_response_code(401);
                    echo json_encode(["success" => false, "message" => "Invalid Username or Secret ID"]);
               
                }


            }


        }

    }


    new ForgotController();
