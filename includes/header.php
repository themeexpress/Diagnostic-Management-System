<?php include('functions/function.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Diagnostic Management System </title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="frontend/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="frontend/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="frontend/css/appointment_style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="frontend/css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700" rel="stylesheet">
</head>

<body>
	<!-- header -->
	<div class="header" id="home">
		<div class="top_menu_w3layouts">
		<div class="container">
			<div class="header_left">
				<ul>
					<li><i class="fa fa-map-marker" aria-hidden="true"></i> 1143 New York, USA</li>
					<li><i class="fa fa-phone" aria-hidden="true"></i> +(010) 221 918 811</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>
				</ul>
			</div>
			<div class="header_right">
				<ul class="forms_right">
					<li><a href="login.php"> Make an Appointment</a></li>
					<li><a href="login.php">Login / Register </a> </li>
				</ul>

			</div>
			<div class="clearfix"> </div>
			</div>
		</div>
		<div class="content white">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
						<a class="navbar-brand" href="index.php">
							<h1><span class="fa fa-stethoscope" aria-hidden="true"></span>New Clinic </h1>
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav>
							<ul class="nav navbar-nav">
								<li><a href="index.php" class="active">Home</a></li>
								<li><a href="doctor_list.php">Doctors</a></li>							
								
								<li><a href="departments.html">Departments</a></li>
								<li><a href="gallery.html">Gallery</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="codes.html">Codes</a></li>
										<li class="divider"></li>
										<li><a href="icons.html">Icons</a></li>
										<li class="divider"></li>										
									</ul>
								</li>
								<li><a href="mail.html">Mail Us</a></li>
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>