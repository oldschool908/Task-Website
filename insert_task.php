<?php
require_once('./header.php');
require_once('./footer.php');
require_once('./task/task.php');


$task = new task();
$task->setTaskName($_POST["task_name"]);
//echo "name: " . $_POST["task_name"];

$task->setTaskStart($_POST["task_start"]);
//echo " Start: " . $_POST["task_start"];

$task->setTaskEnd($_POST["task_end"]);
//echo " End: " . $_POST["task_end"];

//$user_id = $_SESSION["user_id"];
//echo " user id: " . $_SESSION["user_id"];
$task->setUserId($_SESSION["user_id"]);

$task->setFamilyMemberId($_POST['family_member_id']);
//echo "family Member Id: " . $_POST['family_member_id'];

$task->setTaskDesc($_POST["task_description"]);
//echo " desc: " . $_POST["task_description"];


$task->createTask($task, $_SESSION["user_id"]);

header("Location: ./dashboard.php")
?>

<!-- <h1>Task Created!!!</h1> -->