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
    $pdo = $db->prepare('INSERT INTO doctors (fullname,designation,degree,specialty,work_place,email_address,phone,chamber_address,profile_pic,apoint_time,limit_of_patient) 
    VALUES (:fullname,:designation,:degree,:specialty,:work_place,:email_address,:phone,:chamber_address,:profile_pic,:apoint_time,:limit_of_patient)');
    $pdo->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $pdo->bindParam(':designation', $designation, PDO::PARAM_STR);
    $pdo->bindParam(':degree', $degree, PDO::PARAM_STR);
    $pdo->bindParam(':specialty', $specialty, PDO::PARAM_STR);
    $pdo->bindParam(':work_place', $work_place, PDO::PARAM_STR);
    $pdo->bindParam(':email_address', $email, PDO::PARAM_STR);
    $pdo->bindParam(':phone', $phone, PDO::PARAM_STR);    
    $pdo->bindParam(':chamber_address', $address, PDO::PARAM_STR);    
    $pdo->bindParam(':profile_pic', $profile_pic, PDO::PARAM_STR);
    $pdo->bindParam(':apoint_time', $apoint_time, PDO::PARAM_STR);
    $pdo->bindParam(':limit_of_patient', $patient_limit, PDO::PARAM_STR);    
    $pdo->execute();
    $_SESSION['msg'] = 'Doctor Information Insert Successfully';
    redirect_to('add_doctor.php');
}
else{
    $_SESSION['msg'] = 'Error !! Doctor information not inserted, Try Again';
        redirect_to('add_doctor.php');
}

?>