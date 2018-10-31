<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Users | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="backend/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="backend/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="backend/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="backend/dist/css/adminstyle.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="backend/plugins/iCheck/square/blue.css"> 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-wrapper">
    <div class="login-box custom-login">
      <div class="login-logo">
        <a href="admin-login.php"><img src="img/logo.png" ></a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php if (isset($_SESSION['msg'])): ?>
                        <div class="alert alert-warning">
                            <?php echo $_SESSION['msg']; ?>
                        </div>
                        <?php
                        unset($_SESSION["msg"]);
                    endif;
                    ?>
                            <form action="all_users_login_process.php" method="POST">
                              <div class="form-group has-feedback">
                                <input type="text" name="user_name" class="form-control" placeholder="User Name" required="">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                              </div>
                              <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                              </div>
                              <div class="form-group has-feedback">
                              <label class="la-padding"><input type="radio" name="user_role" value='3' checked> Sales Man</label>
                              <label class="la-padding"><input type="radio" name="user_role" value='2'> Manager</label>
                              <label class="la-padding"><input type="radio" name="user_role" value='1'> Admin</label>
                              <label class="la-padding"><input type="radio" name="user_role" value='4'> Doctor</label>
                              </div>

                              <div class="form-group has-feedback">
                                <div class="col-md-6"><a href="#">I have Lost my Password</a><br/></div>
                                <div class="col-md-6">
                                  <input type="submit" class="btn btn-success form-control" value="User login" name='users_login'>
                                </div>
                              </div>
                              
                            </form>    
        <!-- /.social-auth-links -->
        <p></p><br/><br/> 

      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
</div>

<!-- jQuery 3 -->
<script src="backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="backend/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
