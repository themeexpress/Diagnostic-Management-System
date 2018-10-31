<?php 
session_start();
include('functions/function.php');

//User Login 
if (isset($_POST['user_login'])) {

    $email      = $_POST['email'];
    $password   = md5($_POST['password']);
    $user_role = $_POST['user_role'];

    $user_data = check_login('users_info',$email,$password);
   
    if($user_data['user_role']==1){     
      // Set Session
     $_SESSION['fullname'] = $user_data['fullname']; 
     $_SESSION['user_id']=$user_data['user_id'];
      $_SESSION['phone']=$user_data['phone'];
      $_SESSION['user_role']=$user_data['user_role'];      

      $dashboard='http://localhost/DMS/users/user_dashboard.php';    
     //if condtion true then redirect
        header('Location: '.$dashboard);  

    }elseif($user_data['user_role']==2){
      
      // Set Session
      $_SESSION['fullname'] = $user_data['fullname']; 
      $_SESSION['user_id']=$user_data['user_id'];
      $_SESSION['phone']=$user_data['phone'];
      $_SESSION['user_role']=$user_data['user_role'];
      $dashboard='http://localhost/DMS/users/manager_dashboard.php';    
      //if condtion true then redirect
         header('Location: '.$dashboard);
    }else{
      $_SESSION['msg'] = 'User Not Found. Please Register First';
      redirect_to('login.php');
    }
  }
    else{
      $_SESSION['msg'] = 'Email or Password Wrong';
          redirect_to('login.php');
    }

  


















?>