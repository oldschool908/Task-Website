<?php
//session_start();

require_once('./user/user.php');

$user = new user();
$user->setUsername($_POST["username"]);
$user->setFirstName($_POST["first_name"]);
$user->setLastName($_POST["last_name"]);
$user->setPassword($_POST["password"]);
$user->createUser();

header("Location: ./login.php")

?>