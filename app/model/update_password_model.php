<?php 


require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../model/forgot_model.php";

class UpdateModel {

    public function __construct () {
        $this->pdo = Database::getInstance()->getConnection();
        $this->ForgotModel = new ForgotModel();
    }


    public function updateUserPassword($username,$secretId,$newPassword){

            $isValid = $this->ForgotModel->getUserCredentials($username,$secretId);

            if($isValid) {

                $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $stmt = $this->pdo->prepare("UPDATE user SET password = :newHashedPassword WHERE username = :username ");
                $stmt->bindParam(':newHashedPassword', $newHashedPassword);
                $stmt->bindParam(':username', $username);
                
                return $stmt->execute();

            }else{

                return false;

            }

    } 

    


}