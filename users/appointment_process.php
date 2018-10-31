<?php
session_start();
include('../functions/function.php');
if(isset($_POST['appointment_submit'])){

$doctor_id=$_POST['doctor_id'];
$patient_id=$_POST['user_id'];
$disease=$_POST['disease'];
$description=$_POST['description'];
$appoint_date=$_POST['appoint_date'];


/*Check Appointment is available or Not*/
$appointment_check=appointment_check($doctor_id,$appoint_date);
//patient_serial
$serial_of_patient = serial_of_patient($doctor_id,$appoint_date);
$patient_serial = $serial_of_patient['TOTOAL_PATIENT']+1;


//$appointment_check['total_appointment'];
            if($appointment_check['total_appointment']<5) {
            $pdo = $db->prepare("INSERT INTO `appointments`(`patient_id`,`doctor_id`,`disease`,`disease_description`,`appoint_date`,`patient_serial`)
             VALUES (:patient_id,:doctor_id,:disease,:disease_description,:appoint_date,:patient_serial)");
              $pdo->bindParam(':patient_id', $patient_id, PDO::PARAM_STR);
              $pdo->bindParam(':doctor_id', $doctor_id, PDO::PARAM_STR);
              $pdo->bindParam(':disease', $disease, PDO::PARAM_STR);
              $pdo->bindParam(':disease_description', $description, PDO::PARAM_STR);
              $pdo->bindParam(':appoint_date', $appoint_date, PDO::PARAM_STR);
              $pdo->bindParam(':patient_serial', $patient_serial, PDO::PARAM_STR);
              $pdo->execute();

              $_SESSION['msg'] = 'Appointment Submit Successfully. Your Serial Number is: '.$patient_serial .' We will get confirmation in Mobile SMS';
              redirect_to('doctor_list.php');
              
            }else{
              $_SESSION['msg'] = 'No available Appointment on your date. Please try another day';
              redirect_to('doctor_list.php');

            }

}//end isset if
else{
  $_SESSION['msg'] = 'Error Appointment is submitted';
  redirect_to('doctor_list.php');
}


?>