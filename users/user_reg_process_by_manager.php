<?php
session_start();
ob_start();
include('../functions/function.php');


//User Register

if(isset($_POST['register_user'])){

 $phone=$_POST['phone'];
 $fullname=$_POST['fullname'];
 $gender=$_POST['gender']; 
 $age=$_POST['age'];
 $register_by=2;
 $appoint_date=$_POST['appoint_date'];
 $disease = $_POST['disease'];
 $doctor_id = $_POST['doctor_id'];

 //for seria Number
 $serial_of_patient = serial_of_patient($doctor_id,$appoint_date);
 $patient_serial = $serial_of_patient['TOTOAL_PATIENT']+1;

    
  $pdo = $db->prepare('INSERT INTO users_info (fullname,phone,age,gender,register_by) 
  VALUES (:fullname,:phone,:age,:gender,:register_by)');
  $pdo->bindParam(':fullname', $fullname, PDO::PARAM_STR);
  $pdo->bindParam(':phone', $phone, PDO::PARAM_STR);
  $pdo->bindParam(':age', $age, PDO::PARAM_STR); 
  $pdo->bindParam(':gender', $gender, PDO::PARAM_STR);  
  $pdo->bindParam(':register_by', $register_by, PDO::PARAM_STR);   
  $pdo->execute();
  $patient_id= $db->lastInsertId();

  $pdo = $db->prepare("INSERT INTO `appointments`(`patient_id`,`doctor_id`,`disease`,`appoint_date`,`patient_serial`)
             VALUES (:patient_id,:doctor_id,:disease,:appoint_date,:patient_serial)");
              $pdo->bindParam(':patient_id', $patient_id, PDO::PARAM_STR);
              $pdo->bindParam(':doctor_id', $doctor_id, PDO::PARAM_STR);
              $pdo->bindParam(':disease', $disease, PDO::PARAM_STR);              
              $pdo->bindParam(':appoint_date', $appoint_date, PDO::PARAM_STR);
              $pdo->bindParam(':patient_serial', $patient_serial, PDO::PARAM_STR);
              
              $pdo->execute();

              $_SESSION['msg'] = 'Resisterd and Appointment Submit Successfully. Serial Number is: '.$patient_serial .' We will get confirmation in Mobile SMS';
             
              redirect_to('manager_dashboard.php');
}
else{
  $_SESSION['msg'] = 'Unexpected Error Occure !! Registration failed';
      redirect_to('manager_dashboard.php');
}

?>