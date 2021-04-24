<?php
require_once('./header.php');
require_once('./family_member/family_member.php');
require_once('./task/task.php');
//echo $_GET["task_id"];

$task = new task();
$tasks = $task->getTaskById($_GET["task_id"]);  
$task->__toString();

$family_member = new family_member();
$family = $family_member->getFamilyMembers($_SESSION['user_id']);

$arrlength = count($tasks);
$familylength = count($family);
  
for($x = 0; $x < $arrlength; $x++) {
    echo '<div style="margin: 150px; margin-top: 25px;">
    <h1 class="title" >Edit Task</h1>
    <form action="update_task.php?task_id=' . $tasks[$x]->getTaskId() . '" method="POST">
                <div class="field" style="width: 300px;">
                    <label class="label">Task Name</label>
                    <div class="control">
                    <input type="text" class="input" name="task_name" placeholder="Task Name" value="'. $tasks[$x]->getTaskName() .'"/>
                    </div>
                </div>
                <div class="field">
            <label class="label">Select Family Member</label>';
            foreach($family as &$fm){
                if($tasks[$x]->getFamilyMemberId() ==  $fm->getFamilyMemberId()){
                    echo '<h2>Currently Assigned To: '. $fm->getFamilyMemberName() .'</h2>';
                }
             }
               echo'<div class="select">
                    <select name="family_member_id">
                        <option value="0">Select dropdown</option>';
                        for($y = 0; $y < $familylength; $y++){
                            echo '<option value="'. $family[$y]->getFamilyMemberId() .'">' . $family[$y]->getFamilyMemberName() . '</option>';
                            }
                echo '</select>
                </div>
            </div>
                <div class="field" style="width: 250px;">
                    <label class="label">Start Date</label>
                    <div class="control">
                    <input type="datetime-local" value="' . $tasks[$x]->getTaskStart() . '" class="input" name="task_start"/>
                    </div>
                </div>
                <div class="field" style="width: 250px;">
                    <label class="label">End Date</label>
                    <div class="control">
                    <input type="datetime-local" value="' . $tasks[$x]->getTaskEnd() . '" class="input" name="task_end"/>
                    </div>
                </div>
                <div class="field" style="width: 600px;">
                    <label class="label">Task Description</label>
                    <div class="control">
                    <textarea width="50pxpx" class="textarea" name="task_description" placeholder="Task description">' . $tasks[$x]->getTaskDesc() . '</textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input type="submit" class="button is-success" value="Update Task">
                    </div>
                </div>
            </form>
            <br>
            <br>
    </div';
}
    require_once('./footer.php');

    ?>