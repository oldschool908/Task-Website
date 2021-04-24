<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./session/session.php');
require_once('./utilities/connection.php');

$session = new session();
$login_result = $session->login($_POST["username"], $_POST["password"]);

if(!$login_result){
    header("Location: login.php?error=true");
    message("Incorrect username or password!", 'login.php', false);
    exit();
}
else{
    header("Location: dashboard.php");
    exit();
}
