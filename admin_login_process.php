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


?>