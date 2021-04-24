//<?php
//echo $_GET["task_id"];


ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./sessioncheck.php');

require_once('./task/task.php');

$task = new task();
$tasks = $task->deleteTask($_GET["task_id"], $_SESSION["user_id"]);  


header("Location: ./dashboard.php?del=true");
?>