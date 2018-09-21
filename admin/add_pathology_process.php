<?php
session_start();
$admin_name=$_SESSION['fullname'];
//include funtion file
include('../functions/function.php');

//add Patholoty test
if(isset($_POST['add_pathology_submit'])){
    $test_name = $_POST['test_name'];
    $description=$_POST['description'];
    $reporting_time = $_POST['reporting_time'];
    $test_price = $_POST['test_price'];   
    

    $pdo = $db->prepare('INSERT INTO pathology_test_info(test_name,description,reporting_time,test_price) 
    VALUES (:test_name,:description,:reporting_time,:test_price)');
    $pdo->bindParam(':test_name', $test_name, PDO::PARAM_STR); 
    $pdo->bindParam(':description', $description, PDO::PARAM_STR);
    $pdo->bindParam(':reporting_time', $reporting_time, PDO::PARAM_STR);    
    $pdo->bindParam(':test_price', $test_price, PDO::PARAM_STR);  
          
    $pdo->execute();
    
    //Show Notification
    $_SESSION['msg'] = 'Test Information Insert Successfully';
    redirect_to('add_pathology_test.php');
}
else{
    $_SESSION['msg'] = 'Error !! Test information not inserted, Try Again';
        redirect_to('add_pathology_test.php');
}

?>