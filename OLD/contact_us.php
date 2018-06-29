<!DOCTYPE html>
<html>

<head>
	<?php
	session_start();
	include_once( 'database/db.php' );
	//include_once( "func/adminPriv.php" );
	include( 'session.php' )
	?>
	
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
	<link rel="icon" href="assets/img/152.png">
	<script type="text/javascript" src="assets/js/script.js"></script>
	<title>Contact Us</title>
</head>

<body>
	<!-- div used to make the body blur -->
	<div class="overlay" id="overlay" onclick="closeNav()"></div>

	<section class="element-full">
		<section class="head-bar">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-xs-6 col-sm-6 col-md-6">
						<a href="index.php"><img class="img-responsive" src="assets/img/50.png"></a>
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
							<?php
							if ( isset( $_SESSION[ 'login_user' ] ) ) {
								$search = mysqli_query( $connection, "SELECT * FROM user WHERE username='$username'" );
								$accesslvl = mysqli_fetch_object( $search );
							}

							if ( isset( $_SESSION[ 'login_user' ] ) ) {
								if ( $_SESSION[ 'login_user' ] && $_SESSION[ 'login_user' ] == true ) {
									?>
									<a href = "login/logout.php" > Log Out </a>
									<hr>
									<?php if ($accesslvl->adminPriv != 0){ ?>
									<a href = "dashboard.php" > Dashboard </a>
									<?php
									}
								}
							}
	else{ ?>
			<a href="login.php">Login</a>
			<?php
			}
			?>
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
					<h2 class="text-center">Form</h2>
					<hr class="hr-mid">
					<section class="font-2">
						<p class="generic-p">
							If there are any inquiries or anything contact feel free to contact us using the form below.
						</p>
					</section>
					<form>
						<fieldset>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<input type="text" name="name" placeholder="Name">
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<input type="text" name="email" placeholder="Email">
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<select id="select">
										<option>-Select a catagory</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<textarea rows="14" id="comment" placeholder="Message"></textarea>
								</div>
							</div>
							<button type="submit" class="btn btn-default">Send massage</button>
							<button type="submit" class="btn btn-default">Cancel</button>
						</fieldset>
					</form>


		<section class="social">
			<ul>
				<p class="font-2">Follow us on:</p>
				</li>
				<li><a href="#" class="fa fa-facebook fa-2x" aria-hidden="true"></a>
				</li>
				<li><a href="#" class="fa fa-twitter fa-2x" aria-hidden="true"></a>
				</li>
				<li><a href="#" class="fa fa-youtube fa-2x" aria-hidden="true"></a>
				</li>
				<li><a href="#" class="fa fa-instagram fa-2x" aria-hidden="true"></a>
				</li>
			</ul>
		</section>
		<section class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
						<div class="footer-p1">
							<p class="font-2"> Opening times?? </p>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
						<img class="img-responsive foot-img" src="assets/img/50.png">
					</div>
					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
						<div class="footer-p2">
							<p class="font-2"> other infomation??? </a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
</body>

</html>