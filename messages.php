<!doctype html>
<html>

<head>
	<?php
	include( "database/db.php" );
	include( "navigation.php" );
	?>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<title>Registration</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
	<!-- MAIN PAGE -->
	<div class="main-wrapper">
		<div class="page-wrapper">
			<div class="content container-fluid">

				<div class="row">
					<div class="col-xs-4">
						<h4 class="page-title"> Mass Mailer </h4>
					</div>
				</div>

				<div class="col-md-7">
					<ul class="personal-info">
						<li>
							<span class="title">Mailing List</span>
							<span class="text">
							<a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#add_parent">Form</a></span>				
						</li>

						<li>
							<span class="title">Send Message</span>
							<span class="text">
							<a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#add_student">Form</a></span>					
						</li>
						<li>
							<span class="title">Mass Message</span>
							<span class="text">
							<a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#add_management">Form</a></span>						
						</li>
					</ul>
				</div>
			</div>
		</div>





		<!-- Parent -->

		<div id="add_parent" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-content modal-lg">
					<div class="modal-header">
						<h4 class="modal-title">Add Parent</h4>
					</div>
					<div class="modal-body">
					
					
						<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Username</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Password</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
									  <div class="form-group"></div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="text">
										</div>
									</div>
									</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">Home number
										  <input class="form-control" type="text">
										</div>
									</div> 
									<div class="col-md-6">
										<div class="form-group">
											<label>Mobile</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">Emergancy Number</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">Address
										  <input class="form-control" type="text">
										</div>
									</div>
								</div>
							  <div class="row">
									<div class="col-md-6">
										<div class="form-group">Postode</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">Sort Code
										  <input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Account Number</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Date Joined</label>
									<input class="form-control" type="text">
								</div>
								<div class="m-t-20 text-center"></div>
							</form>
						
						
					</div>
				</div>
			</div>
		</div>


		<!-- Student -->

		<div id="add_student" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-content modal-lg">
					<div class="modal-header">
						<h4 class="modal-title">Add Student</h4>
					</div>
					<div class="modal-body">
					
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										  <label>Age</label>
											<input class="form-control" type="text">
										</div>
									</div>
							  </div>
								<div class="row">
									<div class="col-md-6">
									  <div class="form-group">Medical Description
									    <input class="form-control" type="text">
									  </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">Nationality
										  <input class="form-control" type="text">
										</div>
									</div>
							  </div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">Ethnicity
										  <input class="form-control" type="text">
									  </div>
									</div> 
									<div class="col-md-6">
										<div class="form-group">Nationaliy	
										  <input class="form-control" type="text">
									  </div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">Gender
										  <input class="form-control" type="text">
									  </div>
									</div>
								  <div class="col-md-6">
										<div class="form-group">
										  <p>Special needs
										  <input class="form-control" type="text">
										  </p>
									  </div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">Date Joined
										  <input class="form-control" type="text">
									  </div>
									</div>
									<div class="col-md-6">
										<div class="form-group"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group"></div>
									</div>
								</div>
								<div class="form-group">
									<label>Upload Picture</label>
									<input class="form-control" type="file">
								</div>
								<div class="m-t-20 text-center"></div>
							</form>
						
						
						
					</div>
				</div>
			</div>
		</div>

		<!-- Management -->

		<div id="add_management" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-content modal-lg">
					<div class="modal-header">
						<h4 class="modal-title">Add Staff</h4>
					</div>
						
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Username</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Password</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
									  <div class="form-group">
											<label>Job Role</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="text">
										</div>
									</div>
									</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Address</label>
											<input class="form-control" type="text">
										</div>
									</div> 
									<div class="col-md-6">
										<div class="form-group">
											<label>Postcode</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Home Number</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Mobile Number</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>National Insurance Number</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>DBS check</label>
											<select class="select">
												<option>Yes</option>
												<option>No</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Permission</label>
											<select class="select">
												<option>Management</option>
												<option>Staff</option>
												<option>Perant</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Upload Files</label>
									<input class="form-control" type="file">
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Create Account</button>
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
	<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
	<script type="text/javascript" src="assets/js/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="assets/js/app.js"></script>


</body>

</html>