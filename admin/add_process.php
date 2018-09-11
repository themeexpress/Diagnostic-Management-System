<?php
session_start();
$admin_name=$_SESSION['fullname'];
//include funtion file
include('../functions/function.php');

//add doctor
if(isset($_POST['add_doctor_submit'])){
    $fullname = $_POST['fullname'];
    $designation = $_POST['designation'];
    $degree = $_POST['degree'];
    $_POST['specialty'];
    $_POST['work_place'];
    $_POST['email_address'];
    $_POST['phone'];
    $_POST['address'];
    $_POST['profile_pic'];
    $_POST['apoint_time'];    
    $_POST['limit_of_patient'];
    
    



}





?>