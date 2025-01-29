<?php

require_once __DIR__ . '/../view/update_password.php';
require_once __DIR__ . "/../model/update_password_model.php";

class UpdateController {

    private $model;


    public function __construct (){

        $this->model = new UpdateModel();
        $this->updateUser();

    }


    private function updateUser(){

        if ($_SERVER ["REQUEST_METHOD"] === "POST") {

            header("Content-Type: application/json");
            ob_clean();

            $username = trim(htmlspecialchars($_POST["username"] ?? ""));
            $secretId = trim(htmlspecialchars($_POST["secretId"] ?? ""));
            $newPassword = trim(htmlspecialchars($_POST["newPassword"] ?? ""));

            $userUpdate = $this->model->updateUserPassword($username,$secretId,$newPassword);

            if($userUpdate){

                http_response_code(200);
                echo json_encode(["success" => true, "message" => "Your Are Successfully Update the Password."]);

            }else{

                http_response_code(401);
                echo json_encode(["success" => false, "message" => "Invalid Username or Secret ID"]);
               
            }



        }

    }


}


new UpdateController();