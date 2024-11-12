<?php

$uri = $_SERVER["REQUEST_URI"];

if ($uri == "/Login/index.php") {
    require "controller/form_controller.php";   
} elseif ($uri == "/Login/index.php/forgot") {
    require "controller/forgot_controller.php";  
} elseif ($uri == "/Login/index.php/register") {
    require "controller/registration_controller.php";   
} else {
    http_response_code(404);
}
