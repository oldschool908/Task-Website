<?php
require 'config.php';
require_once('./header.php');
require_once('./family_member/family_member.php');

$family_member = new family_member();
$family = $family_member->getFamilyMembers($_SESSION['user_id']);

$familylength = count($family);
for($x = 0; $x < $familylength; $x++) {
    if($_GET['family_member_id'] == $family[$x]->getFamilyMemberId()){
echo '<div class = "columns">

    <div class = "column" >
        <!-- START PAGE CONTENT -->
        <div style="margin: 150px; margin-top: 25px;">
        <h1 class="title">Edit Family Member</h1>

        <form action="update_family_member.php?family_member_id='. $family[$x]->getFamilyMemberId() .'" method="POST">
            <div class="field" style="width: 350px;">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input" value="'. $family[$x]->getFamilyMemberName() .'"type="text" name="name" placeholder="Name" required>
                </div>
            </div>
            
            <div class="control">
                <div class="select">
                    <select name="color">
                    <option>Family Member Color</option>
                    <option value="FF0000">Red</option>
                    <option value="FFA500">Orange</option>
                    <option value="FFFF00">Yellow</option>
                    <option value="00ff00">Green</option>
                    <option value="0000FF">Blue</option>
                    <option value="800080">Purple</option>
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
    </div>
</div>
</div>';
}
}
?>
    <!-- END PAGE CONTENT -->



<?= template_footer() ?>
