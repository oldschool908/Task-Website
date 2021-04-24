<?php
require_once('./header.php');
require_once('./footer.php');
require_once('./family_member/family_member.php');

$family_member = new family_member();
$family_member->setFamilyMemberName($_POST['name']);

$family_member->setFamilyMemberColor($_POST['color']);

$family_member->setUserId($_SESSION["user_id"]);

$family_member->createFamilyMember($family_member);

header("Location: ./dashboard.php")
?>