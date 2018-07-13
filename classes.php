<!doctype html>
<html>

<head>
	<?php
	include_once "database/db.php";
	include( "navigation.php" );
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<title>Classes</title>
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
<body>
	<!-- MAIN PAGE -->
	<div class="main-wrapper">
		<div class="page-wrapper">
			<div class="content container-fluid">

				<div class="row">
					<div class="col-xs-4">
						<h4 class="page-title">Classes</h4>
					</div>
				</div>

				<div class="col-md-7">
					<ul class="personal-info">
						<li>
							<span class="title">Perant</span>
							<span class="text">
							<a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#add_parent">Form</a></span>				
						</li>

						<li>
							<span class="title">Student</span>
							<span class="text">
							<a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#add_student">Form</a></span>					
						</li>
						<li>
							<span class="title">Management</span>
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
