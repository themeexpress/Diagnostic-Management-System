<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="backend/bower_components/font-awesome/css/font-awesome.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="backend/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  
  <link rel="stylesheet" href="backend/dist/css/adminstyle.css">

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
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><img src="img/logo.png" ></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <?php if (isset($_SESSION['msg'])): ?>
                        <div class="alert alert-warning">
                            <?php echo $_SESSION['msg']; ?>
                        </div>
                        <?php
                        unset($_SESSION["msg"]);
                    endif;
                    ?>
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="user_login_process.php" method="POST">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="from-group text-center">
        <label style="padding:5px 20px;"><input type="radio" name="user_role" checked value="1" required> As Patient</label>
        <label><input type="radio" name="user_role" value="2" required> As Manager</label>
      </div>
           
      <div class="social-auth-links text-center">
          <button type="submit" class="btn btn-block btn-social btn-facebook btn-flat" name="user_login"> <i class="fa fa-user-plus"></i>Have Account ? Sign In</button>
      </div>
        <!-- /.col -->
      
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>     
      <a href="user_register.php" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-user-plus"></i> Register a new membership</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="forget_password.php">I forgot my password</a><br>   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="backend/plugins/iCheck/icheck.min.js"></script>

</body>
</html>
