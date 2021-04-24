<?php
require_once('./header.php');
require_once('./family_member/family_member.php');
$family_member = new family_member();
$family = $family_member->getFamilyMembers($_SESSION['user_id']);

$familylength = count($family);

echo '<div style="margin: 150px; margin-top: 25px;">
<h1 class="title" >Create Task</h1>
<form action="insert_task.php" method="POST">
            <div class="field" style="width: 300px;">
                <label class="label">Task Name</label>
                <div class="control">
                <input type="text" class="input" name="task_name" placeholder="Task Name"/>
                </div>
            </div>
            <div class="field">
        <label class="label">Select Family Member</label>
            <div class="select">
                <select name="family_member_id">
                    <option value="0">Select Family Member</option>';
                    for($y = 0; $y < $familylength; $y++){
                        echo '<option value="'. $family[$y]->getFamilyMemberId() .'">' . $family[$y]->getFamilyMemberName() . '</option>';
                        }
            echo '</select>
            </div>
        </div>
            <div class="field" style="width: 250px;">
                <label class="label">Start Date</label>
                <div class="control">
                <input type="datetime-local" class="input" name="task_start"/>
                </div>
            </div>
            <div class="field" style="width: 250px;">
                <label class="label">End Date</label>
                <div class="control">
                <input type="datetime-local" class="input" name="task_end"/>
                </div>
            </div>
            <div class="field" style="width: 600px;">
                <label class="label">Task Description</label>
                <div class="control">
                <textarea width="50pxpx" class="textarea" name="task_description" placeholder="Task description"></textarea>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input type="submit" class="button is-success" value="Add Task">
                </div>
            </div>
        </form>
        <br>
        <br>
</div';

require_once('./footer.php')
?>