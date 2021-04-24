<?php
require_once('./family_member/family_memberDAO.php');

class Family_Member implements \JsonSerializable{
    // Properties   
    private $family_member_id;
    private $user_id;
    private $family_member_name;
    private $family_member_color;

    // Methods
    function __construct(){
   }

   // Getters and Setters
   function getFamilyMemberId(){
       return $this->family_member_id;
    }
   function setFamilyMemberId($family_member_id){
        $this->family_member_id = $family_member_id;
    }
   function getUserId(){
       return $this->user_id;
    }   
    function setUserId($user_id){
       $this->user_id = $user_id;
    }
    function getFamilyMemberName(){
        return $this->family_member_name;
    }
    function setFamilyMemberName($family_member_name){
        $this->family_member_name = $family_member_name;
    }
    function getFamilyMemberColor(){
        return $this->family_member_color;
    }
    function setFamilyMemberColor($family_member_color){
        $this->family_member_color = $family_member_color;
    }

    // Methods for DAO

    function getFamilyMembers($user_id){
        // This function will get all the Family Members based on the user id
        $family_memberDAO = new family_memberDAO();
        return $family_memberDAO->getFamilyMemberByUserId($user_id);
    }

    function createFamilyMember($family_member){
        // This function will create a new family member
        $family_memberDAO = new family_memberDAO();
        return $family_memberDAO->createFamilyMember($family_member);
    }

    function deleteFamilyMember($family_member, $user_id){
        // This function will delete a existing family member
        $family_memberDAO = new family_memberDAO();
        return $family_memberDAO->deleteFamilyMember($family_member, $user_id);
    }

    function updateFamilyMember($family_member_id){
        // This function will Update a existing family member
        $family_memberDAO = new family_memberDAO();
        return $family_memberDAO->updateFamilyMember($family_member_id);
    }


    // Json Method
    public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }

}



?>