<?php
session_start();
ob_start();
include('functions/function.php');

//Admin Login
if(isset($_POST['admin_login'])){
  $email      = $_POST['email'];
  $password   = md5($_POST['password']);
  $admin_data = check_login('admin_users',$email,$password);
  if($admin_data>0){
    $data=get_data('admin_users','email',$email);
    // Set Session
    $_SESSION['fullname'] = $data['fullname']; 
    $dashboard='http://localhost/Diagnostic-Management-System/admin/admin_dashboard.php';    
   //if condtion true then redirect
    header('Location: '.$dashboard);

  }else{
    $_SESSION['msg'] = 'Email or Password Wrong';
        redirect_to('admin-login.php');
  }
}

//User Login 
if (isset($_POST['user_login'])) {
  $email      = $_POST['email'];
  $password   = md5($_POST['password']);
  $user_data = check_login('users_info',$email,$password);
  if($user_data>0){
    $data=get_data('users_info','email',$email);
    // Set Session
    $_SESSION['fullname'] = $data['fullname']; 
    $dashboard='http://localhost/Diagnostic-Management-System/users/user_dashboard.php';    
   //if condtion true then redirect
    header('Location: '.$dashboard);
  }else{
    $_SESSION['msg'] = 'Email or Password Wrong';
        redirect_to('login.php');
  }
}

//User Register

if(isset($_POST['register_user'])){
  $fullname=$_POST['fullname'];
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $re_pass=$_POST['re_password'];
  if($pass!=$re_pass){
    $_SESSION['pass_msg'] = 'Password and Re-password should match';
      redirect_to('user_register.php');
  }
  else{
  $password=md5($_POST['password']);
  $pdo = $db->prepare('INSERT INTO users_info (fullname,email,password) 
  VALUES (:fullname,:email,:password)');
  $pdo->bindParam(':fullname', $fullname, PDO::PARAM_STR);
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