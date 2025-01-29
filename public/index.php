<?php

$uri = $_SERVER["REQUEST_URI"];

if ($uri == "/Login-System/public/index.php") {
    require "../app/controller/form_controller.php";   
} elseif ($uri == "/Login-System/public/index.php/forgot") {
    require "../app/controller/forgot_controller.php";  
} elseif ($uri == "/Login-System/public/index.php/register") {
    require "../app/controller/registration_controller.php";  
} elseif ($uri == "/Login-System/public/index.php/update_password") {
    require "../app/controller/update_password_controller.php";  
}else {
    http_response_code(404);
}
