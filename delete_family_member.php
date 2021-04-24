<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./sessioncheck.php');

require_once('./family_member/family_member.php');

$family_member = new family_member();
$family = $family_member->deleteFamilyMember($_GET["family_member_id"], $_SESSION["user_id"]);  


header("Location: ./create_family_member.php?del=true");

?>