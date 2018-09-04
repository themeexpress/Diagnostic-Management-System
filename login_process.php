<?php
session_start();
ob_start();
include('functions/function.php');
if(isset($_POST['admin_login'])){
  $email      = $_POST['email'];
  $password   = md5($_POST['password']);
  $admin_data = check_login('users_info',$email,$password);
  if($admin_data>0){
    $data=get_data('users_info','email',$email);
    // Set Session
    $_SESSION['fullname'] = $data['fullname']; 
    
    echo 'I am dashboard';
  }else{
    echo 'Email or Password is incorrect';
  }
}
?>