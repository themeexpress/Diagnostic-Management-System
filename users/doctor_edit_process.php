<?php
session_start();
$admin_name=$_SESSION['fullname'];
//include funtion file
include('../functions/function.php');

//add doctor
if(isset($_POST['edit_doctor_submit'])){
    $fullname = $_POST['fullname'];
    $designation = $_POST['designation'];
    $degree = $_POST['degree'];
    $specialty =$_POST['specialty'];
    $work_place =$_POST['work_place'];
    $email =$_POST['email_address'];
    $phone =$_POST['phone'];
    $address =$_POST['address'];    
    $apoint_time =$_POST['apoint_time'];    
    $patient_limit = $_POST['limit_of_patient'];    
    $profile_pic=$_FILES['profile_pic']['name'];
    $dest="uploads/".$profile_pic;
    $src=$_FILES['profile_pic']['tmp_name'];

    //Move file source to destination
    move_uploaded_file($src,$dest);

    //insert query
    $pdo = $db->prepare("UPDATE doctors SET fullname='$fullname',designation='$designation',degree='$degree',
    specialty='$specialty',work_place='$work_place',email_address='$email',phone='$phone',
    chamber_address='$address',profile_pic='$profile_pic',
    apoint_time='$apoint_time',limit_of_patient='$patient_limit'");
    
 
    $_SESSION['msg'] = 'Doctor Information Insert Successfully';
    redirect_to('doctor_list_manage.php');
}
else{
    $_SESSION['msg'] = 'Error !! Doctor information not inserted, Try Again';
        redirect_to('doctor_list_manage.php');
}

?>