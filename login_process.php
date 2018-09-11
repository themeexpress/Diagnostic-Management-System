<?php
session_start();
ob_start();
include('functions/function.php');


//Admin Login
if(isset($_POST['admin_login'])){
  $email      = $_POST['email'];
  $password   = md5($_POST['password']);
  $admin_data = check_login('users_info',$email,$password);
  if($admin_data>0){
    $data=get_data('users_info','email',$email);
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
    $client_id = $_POST['client_id'];
    $password = md5($_POST['password']);
    $user_data = check_user_login($client_id, $password);

    if ($user_data > 0) {
        $data = get_data('clients', 'client_id', $client_id);
        $_SESSION['c_id'] = $data[0]['id']; // Set Session
        $_SESSION['client_id'] = $data[0]['client_id']; // Set Session
        $_SESSION['username'] = $data[0]['client_name'];
        $_SESSION['name'] = $user_data['client_name'];
        header("Location: " . BASE_URL . "index.php?module=client&page=client_dashboard");
    } else {
         $_SESSION['msg'] = 'ID/Password Wrong';
        redirect_to('login.php');
    }
}
?>