<?php 
session_start();
ob_start();
include('functions/function.php');

//User Login 
if (isset($_POST['user_login'])) {
    $email      = $_POST['email'];
    $password   = md5($_POST['password']);
    $user_data = check_login('users_info',$email,$password);
    if($user_data>0){
      $data=get_data('users_info','email',$email);
      // Set Session
      $_SESSION['fullname'] = $data['fullname']; 
      $_SESSION['user_id']=$data['user_id'];
      $_SESSION['phone']=$data['phone'];
      $dashboard='http://localhost/Diagnostic-Management-System/users/user_dashboard.php';    
     //if condtion true then redirect
        header('Location: '.$dashboard);     
    }else{
      $_SESSION['msg'] = 'Email or Password Wrong';
          redirect_to('login.php');
    }
  }
  


















?>