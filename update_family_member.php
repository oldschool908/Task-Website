<?php
require_once('./header.php');
require_once('./footer.php');
require_once('./sessioncheck.php');
require_once('./family_member/family_member.php');

$family_member = new family_member();
$family_member->setFamilyMemberName($_POST['name']);

$family_member->setFamilyMemberColor($_POST['color']);

$family_member->setUserId($_SESSION["user_id"]);

$family_member->setFamilyMemberId($_GET['family_member_id']);

$family_member->updateFamilyMember($family_member);

header("Location: ./create_family_member.php")
?>