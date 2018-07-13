<!DOCTYPE html>
<html>

<?php
session_start(); // Starting Session

if ( !$_SESSION[ 'login_user' ] ) {
	header( 'location: index.php' );
	exit;
}

include_once( 'database/db.php' );
include( "session.php" );

$result = mysqli_query( $connection, "SELECT * FROM management WHERE username = '" . $_SESSION[ 'login_user' ] . "'" )
or die( mysqli_error() );

while ( $row = mysqli_fetch_array( $result ) ) {

	?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/50.png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="index.html" class="logo">
						<img src="assets/img/50.png" width="50" height="50" alt="">
					</a>			
			</div>
			<div class="page-title-box pull-left">
				<h3>W ChildCare Club</h3>
			</div>
			<a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
			<ul class="nav navbar-nav navbar-right user-menu pull-right">

				<li class="dropdown">
					<a href="profile.php" class="dropdown-toggle user-link" data-toggle="dropdown" title="User">
							<span class="user-img"><img class="img-circle" src="<?php echo $row['photo']; ?>" width="40" alt="User">
							</span>
							<?php echo $row['fname'], " ", $row['lname'] ; ?>
							<i class="caret"></i>
						</a>
				




					<ul class="dropdown-menu">
						<li><a href="profile.php">My Profile</a>
						</li>
						<li><a href="edit-profile.php">Edit Profile</a>
						</li>
						<li><a href="login.php">Logout</a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="dropdown mobile-user-menu pull-right">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				<ul class="dropdown-menu pull-right">
					<li><a href="profile.html">My Profile</a>
					</li>
					<li><a href="edit-profile.html">Edit Profile</a>
					</li>
					<li><a href="settings.html">Settings</a>
					</li>
					<li><a href="login.html">Logout</a>
					</li>
				</ul>
			</div>
		</div>

		<?php } ?>
		<?php
		if ( isset( $_SESSION[ 'login_user' ] ) ) {
			$search = mysqli_query( $connection, "SELECT * FROM management WHERE username='$username'" );
			$accesslvl = mysqli_fetch_object( $search );

			if ( isset( $_SESSION[ 'login_user' ] ) ) {
				if ( $_SESSION[ 'login_user' ] && $_SESSION[ 'login_user' ] == true ) {

					?>


		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>

						<?php if ($accesslvl->pLevel <= 6){ ?>
						<li class="submenu">
							<a href="#"> Admin </a>
							<ul class="list-unstyled" style="display: none;">
								<li><a href="localhost/phpmuadmin">phpMyAdmin</a>
								</li>
								<li><a href="https://login.one.com/cp/">One.com</a>
								</li>
								<li><a href="permission.php">Permission</a>
								</li>

							</ul>
						</li>

						<?php } if ($accesslvl->pLevel >= 5){ ?>
						<li class="submenu">
							<a href="#"> Management </a>
							<ul class="list-unstyled" style="display: none;">
								<li><a href="registration.php">Register</a>
								</li>
								<li><a href="classes.php">Classes (WIP)</a>
								</li>
								<li><a href="subjects.php">Subjects</a>
								</li>
			
													<li><a href="a_staff.php">Staff</a>
								</li>
								<li><a href="a_students.php">Children</a>
								</li>
								<li><a href="salary_m.php">Salary</a>
								</li>
								<li><a href="invoices.php">Invoice (WIP)</a>
								</li>
								<li><a href="assets.php">Assets</a>
								</li>
								<li><a href="#">Accident/Injury (WIP)</a>
								</li>
								<li><a href="#">Illness (WIP)</a>
								</li>
								<li><a href="#">Acknowledgment (WIP)</a>
								</li>
								<li><a href="#">In/Out (WIP)</a>
								</li>
								<li><a href="#">Mass Mailer (WIP)</a>
								</li>
								<li><a href="#">EDIT</a>
								</li>
								<li><a href="#">EDIT</a>
								</li>
								<li><a href="#">ETC...</a>
								</li>
							</ul>
						</li>

						<?php } if ($accesslvl->pLevel >= 4){ ?>
						<li class="submenu">
							<a href="#"> Accountant </a>
							<ul class="list-unstyled" style="display: none;">
								<li><a href="#">ETC...</a>
								</li>
							</ul>
						</li>

						<?php } if ($accesslvl->pLevel >= 3){ ?>
						<li class="submenu">
							<a href="#"> Staff </a>
							<ul class="list-unstyled" style="display: none;">
								<li><a href="attendence.php">Attendence</a>
								</li>
								<li><a href="progress.php">Progress Report</a>
								</li>
								<li><a href="profile.php">Profile</a>
								</li>
								<li><a href="#">EDIT</a>
								</li>
							</ul>
						</li>
						<?php } if ($accesslvl->pLevel >= 2){ ?>
						<li class="submenu">
							<a href="#"> Parents </a>
							<ul class="list-unstyled" style="display: none;">
								<li><a href="progress.php">Progress Report</a>
								</li>
								<li><a href="profile.php">Profile</a>
								</li>
								<li><a href="#">EDIT</a>
								</li>
							</ul>
						</li>

						<?php } if ($accesslvl->pLevel >= 1){ ?>
						<li class="submenu">
							<a href="#"> Guest </a>
							<ul class="list-unstyled" style="display: none;">
								<li><a href="#">EDIT</a>
								</li>
								<li><a href="#">EDIT</a>
								</li>
								<li><a href="#">EDIT</a>
								</li>
							</ul>
						</li>
						<?php } if ($accesslvl->pLevel >= 0) { ?>
						<li>
							<a href="logout.php">Secret Control Panel</a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>

		<?php
		}
		}
		}
		?>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
</body>

</html>