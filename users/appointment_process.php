<?php
session_start();
include('../functions/function.php');


$doctor_id=$_POST['doctor_id'];
$user_id=$_POST['user_id'];
$disease=$_POST['disease'];
$description=$_POST['description'];
$appoint_date=$_POST['appoint_date'];

$pdo = $db->prepare('INSERT INTO appointments (patient_id,doctor_id,disease,description,appoint_date) 
  VALUES (:patient_id,:doctor_id,:disease,:description,:appoint_date)');
  $pdo->bindParam(':patient_id', $user_id, PDO::PARAM_STR);
  $pdo->bindParam(':doctor_id', $doctor_id, PDO::PARAM_STR);
  $pdo->bindParam(':disease', $disease, PDO::PARAM_STR);
  $pdo->bindParam(':description', $description, PDO::PARAM_STR);
  $pdo->bindParam(':appoint_date', $appoint_date, PDO::PARAM_STR);      
  $pdo->execute();
  $_SESSION['msg'] = 'Appointment Submit Successfully. We will get confirmation in Mobile SMS';
  redirect_to('doctor_list.php');








?>