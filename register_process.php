<?php
session_start();
ob_start();
include('functions/function.php');


//User Register

if(isset($_POST['register_user'])){
  $fullname=$_POST['fullname'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $pass=$_POST['password'];
  $re_pass=$_POST['re_password'];
  if($pass!=$re_pass){
    $_SESSION['pass_msg'] = 'Password and Re-password should match';
      redirect_to('user_register.php');
  }
  else{
  $password=md5($_POST['password']);
  $pdo = $db->prepare('INSERT INTO users_info (fullname,phone,email,password) 
  VALUES (:fullname,:phone,:email,:password)');
  $pdo->bindParam(':fullname', $fullname, PDO::PARAM_STR);
  $pdo->bindParam(':phone', $phone, PDO::PARAM_STR);
  $pdo->bindParam(':email', $email, PDO::PARAM_STR);
  $pdo->bindParam(':password', $password, PDO::PARAM_STR);    
  $pdo->execute();
  $_SESSION['msg'] = 'Register Successfully. Please login';
  redirect_to('login.php');
  }
}
else{
  $_SESSION['msg'] = 'Unexpected Error Occure !! Registration failed';
      redirect_to('user_register.php');
}

?>