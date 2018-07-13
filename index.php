<?php
include( 'login_process.php' ); // Includes Login Script
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<title>Login</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
        <div class="main-wrapper">
			<div class="account-page">
				<div class="container">
					<h3 class="account-title">Login Area</h3>
					<div class="account-box">
						<div class="account-wrapper">
							<div class="account-logo">
								<a href="index.php"><img src="assets/img/200.png" alt="Focus Technologies"></a>
							</div>
							<form action="" method="post">
								<div class="form-group form-focus">
									<label class="control-label">Username</label>
									<input name="username" type="text" class="form-control floating" id="username">
								</div>
								<div class="form-group form-focus">
									<label class="control-label">Password</label>
									<input name="password" type="password" class="form-control floating"/>
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary btn-block account-btn" type="submit" name="submit">Login</button>
								</div>
								<div class="form-group text-center">
									<font color="red">
									<center>
								<?php echo $error; ?>
									</center>
								</font>
								</div>
								<div class="text-center">
									<a href="#">Forgot your password?</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
    </body>
