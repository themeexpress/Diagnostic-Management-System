<?php
session_start();

include('functions/function.php');

//Users Login
if(isset($_POST['users_login'])){
  $user_name  = $_POST['user_name'];
  $password   = md5($_POST['password']);
  $user_role = $_POST['user_role'];

  //check user exist or not
  $users_data = check_users_login('all_users',$user_name,$password,$user_role);
  

  //if data exit then
  if($users_data>0 && $users_data['user_role']==3){  

    $_SESSION['name'] = $users_data['name']; 
    $_SESSION['userid']=$users_data['userid']; 
    $_SESSION['user_name'] = $users_data['user_name'];
    $_SESSION['user_role'] = $users_data['user_role'];

    $dashboard='http://localhost/DMS/backend/sales_man_dashboard.php';    
   //if condtion true then redirect
    header('Location: '.$dashboard);
  }
  elseif($users_data>0 && $users_data['user_role']==2){  

    $_SESSION['name'] = $users_data['name']; 
    $_SESSION['user_name'] = $users_data['user_name'];
    $_SESSION['user_role'] = $users_data['user_role'];

    $dashboard='http://localhost/DMS/backend/manager_dashboard.php';    
   //if condtion true then redirect
    header('Location: '.$dashboard);
  }
    elseif($users_data>0 && $users_data['user_role']==1){  

    $_SESSION['name'] = $users_data['name']; 
    $_SESSION['user_name'] = $users_data['user_name'];
    $_SESSION['user_role'] = $users_data['user_role'];

    $dashboard='http://localhost/DMS/despensary/index.php';    
   //if condtion true then redirect
    header('Location: '.$dashboard);
  }
  elseif($users_data>0 && $users_data['user_role']==4){  

    $_SESSION['name'] = $users_data['name']; 
    $_SESSION['user_name'] = $users_data['user_name'];
    $_SESSION['user_role'] = $users_data['user_role'];

    $dashboard='http://localhost/DMS/backend/doctor_dashboard.php';    
   //if condtion true then redirect
    header('Location: '.$dashboard);
  }


  else{
    $_SESSION['msg'] = 'User Name or Password Wrong';
        redirect_to('users_login.php');
  }

 //End the Main If 
}else{
  redirect_to('users_login.php');
}


?>