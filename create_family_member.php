<?php
require 'config.php';
require_once('./header.php');


?>

<div class = "columns">

    <div class = "column" >
        <!-- START PAGE CONTENT -->
        <div style="margin: 150px; margin-top: 25px;">
        <h1 class="title">Add Family Member</h1>

        <form action="insert_family_member.php" method="POST">
            <div class="field" style="width: 350px;">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input" type="text" name="name" placeholder="Name" required>
                </div>
            </div>
            
            <div class="control">
                <div class="select">
                    <select name="color">
                    <option>Family Member Color</option>
                    <option value='FF0000'>Red</option>
                    <option value='FFA500'>Orange</option>
                    <option value='FFFF00'>Yellow</option>
                    <option value='00ff00'>Green</option>
                    <option value='0000FF'>Blue</option>
                    <option value='800080'>Purple</option>
                    </select>
                </div>
                </div>
                <br>
                <div class="field">
                <div class="control">
                    <button class="button is-success">Submit</button>
                </div>
            </div>
            </form>
    <?php
    require_once('./family_member/family_member.php');
    $family_member = new family_member();
    $family = $family_member->getFamilyMembers($_SESSION['user_id']);

    $familyLength = count($family);
    echo '<h1 class="title" style="margin-top: 50px;">Current Family Members</h1>';
    foreach($family as &$fm){
        echo '<div>
                <labal style="font-size: 17px;"><br>'. $fm->getFamilyMemberName() .'</label>
                <a class="button is-small" style="color:#5cb85c;"  href="edit_family_member.php?family_member_id='. $fm->getFamilyMemberId() .'">Edit</a>
                <a class="button is-small" style="color:red;  " href="delete_family_member.php?family_member_id='. $fm->getFamilyMemberId() .'">Delete</a>
             </div>';

    }

        ?>

    </div>
</div>
</div>




<?= template_footer() ?> 