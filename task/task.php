<?php
require_once('./task/taskDAO.php');

class Task implements \JsonSerializable{

// Properties
private $task_id;
private $task_name;
private $task_start;
private $task_end;
private $task_description;
private $user_id;
private $family_member_id;

// Methods
function __construct(){

}
// Getters and Setters
function getTaskId(){
    return $this->task_id;
}
function setTaskId($task_id){
    $this->task_id = $task_id;
}
function getTaskName(){
    return $this->task_name;
}
function setTaskName($task_name){
    $this->task_name = $task_name;
}
function getTaskStart(){
    return $this->task_start;
}
function setTaskStart($task_start){
    $this->task_start = $task_start;
}
function getTaskEnd(){
    return $this->task_end;
}
function setTaskEnd($task_end){
    $this->task_end = $task_end;
}
function getTaskDesc(){
    return $this->task_description;
}
function setTaskDesc($task_description){
    $this->task_description = $task_description;
}
function getUserId(){
    return $this->user_id;
}
function setUserId($user_id){
    $this->user_id = $user_id;
}
function getFamilyMemberId(){
    return $this->family_member_id;
}
function setFamilyMemberId($family_member_id){
    $this->family_member_id = $family_member_id;
}

function __toString(){
    return $this->task_name;
}


// Methods for DAO

function getTasks($user_id){
    // This function wil find all the tasks for the user that is logged in.
    $taskDAO = new taskDAO();
    return $taskDAO->getTaskByUserId($user_id);
}

// Don't use this one unless for testing.
function getAllTasks(){
    // This function wil find all the tasks that has been created regardless of user.
    $taskDAO = new taskDAO();
    return $taskDAO->getAllTasks();
}

function getTaskById($task_id){
    $taskDAO = new taskDAO();
    return $taskDAO->getTaskById($task_id);
}

function createTask($user_id){
    // Craetes a new Task
    $taskDAO = new taskDAO();
    $taskDAO->createTask($this,$user_id);
}

function deleteTask($task_id, $user_id){
    // Deletes a existing Task
    $taskDAO = new taskDAO();
    return $taskDAO->deleteTask($task_id, $user_id);
}

function updateTask($task_id){
    // Updates a existing Task
    $taskDAO = new taskDAO();
    return $taskDAO->updateTask($task_id);

}

// Json Method
public function jsonSerialize(){
    $vars = get_object_vars($this);
    return $vars;
}

}


?>