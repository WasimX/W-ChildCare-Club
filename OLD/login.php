<!DOCTYPE html>

<?php
include( 'login/login_process.php' ); // Login Script
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lora:400i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="icon" href="assets/img/favicon.png">
	<script type="text/javascript" src="assets/js/script.js"></script>
	<title>About Us</title>
</head>

<body>
	<!-- div used to make the body blur -->
	<div class="overlay" id="overlay" onclick="closeNav()"></div>

	<section class="element-full">
		<section class="head-bar">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-xs-6 col-sm-6 col-md-6">
						<a href="index.php"><img class="img-responsive" src="assets/img/logo.png"></a>
					</div>
					<div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 text-right">
						<div id="mySidenav" class="sidenav text-center">
							<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><br>
							<a href="index.php">Home</a>
							<hr>
							<a href="about_us.php">About Us</a>
							<hr>
							<a href="contact_us.php">Contact Us</a>
							<hr>
							<a href="login.php">Login</a>
							<hr>
						</div>
						<div class="main" id="main">
							<a href="#" onclick="openNav()">MENU &#9776;</a>
						</div>
					</div>
				</div>
				<hr>
			</div>
		</section>
		
	
<div class="container">
	
	<div id="login">
  <form method="post" action="">
    <table width="30%" border="0" align="center">
      <tbody align="center">
        <tr>
          <td><p>Login</p></td>
        </tr>
        <tr>
          <td><input name="username" type="text" class="active" id="username" placeholder="Username"></td>
        </tr>
        <tr>
          <td><input name="password" type="password" class="password" placeholder="Password"/></td>
        </tr>
        <tr>
          <td colspan="2"><p>
              <input name="submit" type="submit" value=" Login ">
            </p></td>
			<font color="red"><center> <?php echo $error; ?> </tr></center></font>
        <tr>
          <td colspan="2"><p><a href="login/register.php">Register</a> | <a href="login/forgot.php">Forgot Password</a> </p></td>
        </tr>
      </tbody>
    </table>
  </form>
</div>
	
		</div>

<section class="social">
      <ul>
       <p class="font-2">Follow us on Facebook and an Twitter</p></li>
        <li><a href="#" class="fa fa-facebook fa-2x" aria-hidden="true"></a></li> 
        <li><a href="#" class="fa fa-twitter fa-2x" aria-hidden="true"></a></li>        
      </ul>
    </section>

    <section class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            <div class="footer-p1">
                    <p class="font-2">Copyright 2016 by wow technology</p>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <img class="img-responsive foot-img" src="assets/img/footer-logo.png">
          </div>
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            <div class="footer-p2" >
                     <p class="font-2">Made with  <i class="fa fa-heart" aria-hidden="true" ></i> by <a href="https://themewagon.com/themes/" target="_blank">themewagon</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>
</html>

