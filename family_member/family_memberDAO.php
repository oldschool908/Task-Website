<?php
class Family_MemberDAO {
  function getFamilyMemberByUserId($user_id){
    require 'setenv.php';

    $SERVER_NAME = 'cs3620-team4finalproject.mysql.database.azure.com';
    $DATABASE_USER = $_SESSION['SQLUSER'];
    $DATABASE_PASS = $_SESSION['SQLPW'];
    $DATABASE_NAME = 'team4project';

    $conn = mysqli_connect($SERVER_NAME, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    
    $sql = "SELECT family_member_id, user_id, family_member_name, family_member_color FROM family_member WHERE user_id =" . $user_id;
    $result = $conn->query($sql);

    $familyMembers = [];
    $index = 0;

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $family_member = new family_member();

            $family_member->setFamilyMemberId($row["family_member_id"]);
            $family_member->setUserId($row["user_id"]);
            $family_member->setFamilyMemberName($row["family_member_name"]);
            $family_member->setFamilyMemberColor($row["family_member_color"]);
            $familyMembers[$index] = $family_member;
            $index++;
        }
    }
    $conn->close();
    return $familyMembers;
  }

  function createFamilyMember($family_member){
    require_once('./utilities/connection.php');

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO team4project.family_member (`family_member_name`,
    `user_id`,
    `family_member_color`) VALUES (?, ?, ?)");

    $name = $family_member->getFamilyMemberName();
    $color = $family_member->getFamilyMemberColor();
    $user_id = $family_member->getUserId();


    $stmt->bind_param("sss", $name, $user_id, $color);
    $stmt->execute();
   
    $stmt->close();
    $conn->close();
    echo "Family Member Created";
  }

  function deleteFamilyMember($family_member_id, $user_id){
    require_once('./utilities/connection.php');
    
    $sql = "DELETE FROM team4project.family_member WHERE family_member_id = " . $family_member_id . " AND user_id = " . $user_id .";";
    
    if($conn->query($sql) == TRUE){
        echo "Family Member Deleted";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
  
  function updateFamilyMember($family_member){
    require_once('./utilities/connection.php');
    

    $sql = 'UPDATE team4project.family_member SET family_member_name="'. $family_member->getFamilyMemberName() .'" , family_member_color="'. $family_member->getFamilyMemberColor() .'"
    WHERE family_member_id = ' . $family_member->getFamilyMemberId() . ';';
    
    if($conn->query($sql) == TRUE){
        echo "Family Member Updated";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    
}

  
}
?>