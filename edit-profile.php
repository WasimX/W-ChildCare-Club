<!DOCTYPE html>
<html>

<head>
	<?php
	session_start();
	include( "session.php" );
	//	include( "navigation.php" );





	if ( isset( $_POST[ 'submit' ] ) ) {
		/*$fname = strip_tags( $_POST[ 'fname' ] ) ;
		$lname = strip_tags( $_POST[ 'lname' ] ) ;*/
		$gender = strip_tags( $_POST[ 'gender' ] );
		$address = strip_tags( $_POST[ 'address' ] );
		$postcode = strip_tags( $_POST[ 'postcode' ] );
		$hno = strip_tags( $_POST[ 'phone' ] );
		$mno = strip_tags( $_POST[ 'mobile' ] );
		$eno = strip_tags( $_POST[ 'em_number' ] );
		$pw = strip_tags( $_POST[ 'password' ] );

		mysqli_query( $connection, "UPDATE `management` SET `gender` = '$gender', `address` = '$address', `postcode` = '$postcode', `phone` = $hno, `mobile` = $mno, `em_number` = $eno WHERE password = '$pw'" );

		echo( "Update has been made" );
	}


	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<title>Edit Profile - HRMS admin template</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
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
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="row">
					<div class="col-sm-8">
						<h4 class="page-title">Edit Profile</h4>
					</div>
				</div>
				<form action="" method="POST">
					<div class="card-box">
						<h3 class="card-title">Basic Informations</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="profile-img-wrap">
									<img class="inline-block" src="assets/img/user.jpg" alt="user">
									<div class="fileupload btn btn-default">
										<span class="btn-text">edit</span>
										<input class="upload" type="file">
									</div>
								</div>

								<div class="profile-basic">
									<div class="row">

										<?php

										$result = mysqli_query( $connection, "SELECT fname, lname FROM management" );

										while ( $row = mysqli_fetch_array( $result ) ) {
											$fname = $row[ 'fname' ];
											$lname = $row[ 'lname' ];
											?>


										<div class="col-md-6">
											<div class="form-group form-focus">
												<label class="control-label">
													<?php echo $fname; ?> </label>
												<input name="fname" type="text" disabled="disabled" class="form-control floating"/>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus">
												<label class="control-label">
													<?php echo $lname; ?>
												</label>
												<input name="lname" type="text" disabled="disabled" class="form-control floating"/>
											</div>
										</div>
										<?php } ?>
										<div class="col-md-6">
											<div class="form-group form-focus">
												<label class="control-label">Birth Date</label>
												<div class="cal-icon"><input class="form-control floating datetimepicker" type="text">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus select-focus">
												<label class="control-label">Gender</label>
												<select class="select form-control floating" name="gender">
													<option value="">Select Gender</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-box">
						<h3 class="card-title">Contact Informations</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group form-focus">
									<label class="control-label">Address</label>
									<input type="text" class="form-control floating" name="address"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-focus">
									<label class="control-label">Postcode</label>
									<input type="text" class="form-control floating" name="postcode"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-focus">
									<label class="control-label">Home Number</label>
									<input type="text" name="phone" class="form-control floating"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-focus">
									<label class="control-label">Mobile number</label>
									<input type="text" name="mobile" class="form-control floating"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-focus">
									<label class="control-label">Emergency Number</label>
									<input type="text" name="em_number" class="form-control floating"/>
								</div>
							</div>
						</div>
					</div>
					<div class="card-box">
						<h3 class="card-title">Confirm Password</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group form-focus">
									<label class="control-label">New Password</label>
									<input type="password" class="form-control floating" name="password"/>
								</div>
							</div>
						</div>
						<!--<button class="btn btn-primary" name="submit">Update</button>-->
						<input name="submit" type="submit" value=" Login ">

				</form>

				<div class="sidebar-overlay" data-reff="#sidebar"></div>
				<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
				<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
				<script type="text/javascript" src="assets/js/select2.min.js"></script>
				<script type="text/javascript" src="assets/js/moment.min.js"></script>
				<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
				<script type="text/javascript" src="assets/js/app.js"></script>
</body>

</html>