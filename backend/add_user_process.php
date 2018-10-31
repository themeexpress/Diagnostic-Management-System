<?php
session_start();
$userid=$_SESSION['userid'];
//include funtion file
include('../functions/function.php');

//add Patholoty test
if(isset($_POST['add_user'])){
    $name = $_POST['name'];
    $email=$_POST['email'];
    $user_name = $_POST['user_name'];
    $password = md5($_POST['password']);
    $user_role = $_POST['user_role']; 

    $pdo = $db->prepare('INSERT INTO all_users(name,email,user_name,password,user_role) 
    VALUES (:name,:email,:user_name,:password,:user_role)');
    $pdo->bindParam(':name', $name, PDO::PARAM_STR); 
    $pdo->bindParam(':email', $email, PDO::PARAM_STR);
    $pdo->bindParam(':user_name', $user_name, PDO::PARAM_STR);    
    $pdo->bindParam(':password', $password, PDO::PARAM_STR);
    $pdo->bindParam(':user_role', $user_role, PDO::PARAM_STR);   
          
    $pdo->execute();
    
    //Show Notification
    $_SESSION['msg'] = 'User Insert Successfully';
    redirect_to('user_add.php');
}
else{
    $_SESSION['msg'] = 'Error !! User not inserted, Try Again';
        redirect_to('user_add.php');
}

?>