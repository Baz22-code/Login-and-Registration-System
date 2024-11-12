<?php

function url_Sr($value){
    return $_SERVER["REQUEST_URI"] === $value;  
}

$basePath = dirname($_SERVER['SCRIPT_NAME']) . '/view/assets/css/';