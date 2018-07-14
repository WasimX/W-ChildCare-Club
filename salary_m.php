<!doctype html>
<html>

<head>
	<?php
	include_once "database/db.php";
	// include( "navigation.php" );
	?>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<title>Salary</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<title>Salary</title>
</head>

<body>
	<!-- MAIN PAGE -->
	<div class="main-wrapper">
		<div class="page-wrapper">
			<div class="content container-fluid">
				<form action="" method="POST">
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Employee Salary</h4>
						</div>
						<div class="col-xs-8 text-right m-b-30">
							<a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
						</div>
					</div>
					<div class="row filter-row">
						<div class="row filter-row">
							<div class="col-sm-3 col-md-2 col-xs-6">
								<div class="form-group form-focus">
									<label class="control-label">First Name</label>
									<input type="text" name="fname" class="form-control floating"/>
								</div>

							</div>
							<div class="col-sm-3 col-md-2 col-xs-6">
								<div class="form-group form-focus">
									<label class="control-label">Last Name</label>
									<input type="text" name="lname" class="form-control floating"/>
								</div>
							</div>
							<div class="col-sm-3 col-md-2 col-xs-6">
								<div class="form-group form-focus select-focus">
									<label class="control-label">Role</label>
									<select class="select floating" name="role">
										<option value=""> -- Select -- </option>
										<?php $result = mysqli_query($connection,"SELECT DISTINCT `job_role` 
FROM  `management` ") ;
										while ( $row = mysqli_fetch_array( $result ) ){
										
										?>
										<option value="Web Dev"><?php echo $row['job_role']; ?> </option>
										
										<?php } ?>
										
									</select>
								</div>
							</div>
							<div class="col-sm-3 col-md-2 col-xs-6">
								<div class="form-group form-focus">
									<label class="control-label">From</label>
									<div class="cal-icon"><input class="form-control floating datetimepicker" type="text" name="date_from">
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-md-2 col-xs-6">
								<div class="form-group form-focus">
									<label class="control-label">To</label>
									<div class="cal-icon"><input class="form-control floating datetimepicker" type="text" name="date_to">
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-md-2 col-xs-6">
								<input type="submit" value="Search" name="search" class="btn btn-success btn-block"/>
							</div>
						</div>
				</form>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">

							<?php
							if ( isset( $_POST[ 'search' ] ) ) {
								$fname = $_POST[ 'fname' ];
								$lname = $_POST[ 'lname' ];
								$role = $_POST[ 'role' ];
								$f_date = $_POST[ 'date_from' ];
								$t_date = $_POST[ 'date_to' ];


								$raw_results = mysqli_query( $connection, "SELECT salary_m.sID AS s_id, salary_m.management_ID AS sm_id, salary_m.amount, management.ID, management.fname, management.lname, management.email, management.photo, management.date_join, management.job_role, salary_m.tdate FROM management INNER JOIN salary_m ON management.ID = salary_m.management_ID WHERE management.fname LIKE '%$fname%' AND management.lname LIKE '%$lname%' AND management.job_role LIKE '%$role%'" );
								?>

							<table class="table table-striped custom-table datatable">
								<thead>
									<tr>
										<th style="width:30%;">Employee</th>
										<th>Employee ID</th>
										<th>Salary ID</th>
										<th>Email</th>
										<th>Joining Date</th>
										<th>Role</th>
										<th>Salary</th>
										<th>Payslip</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									while ( $row = mysqli_fetch_array( $raw_results ) ) {
										$id = $row[ 's_id' ];
										?>
									<tr>
										<td>
											<a href="profile.html">
											<img class="img-circle" src="<?php echo $row['photo']; ?>" width="40" alt="User">
										</a>
										

											<h2><a href="profile.html">
											<?php echo $row ['fname']," ", $row['lname']; ?></a></h2>
										


										</td>
										<td>
											<?php echo $row ['ID']; ?>
										</td>
										<td>
											<?php echo $id ?>
										</td>
										<td>
											<?php echo $row ['email']; ?>
										</td>
										<td>
											<?php echo $row ['date_join']; ?>
										</td>
										<td>
											<?php echo $row ['job_role']; ?>
										</td>
										<td>
											<?php echo $row ['amount']; ?>
										</td>
										<td><a class="btn btn-xs btn-primary" href="salary-view.php">Generate Slip</a>
										</td>
										<td class="text-right">
											<div class="dropdown">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<ul class="dropdown-menu pull-right">
													<li><a href="?edit=<?php echo $row['ID'] ?>" data-toggle="modal" data-target="#edit_salary" data- title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													</li>
													<li><a href="#delete<?php $_POST[$id] ;?>" data-toggle="modal" data-target="#delete_salary" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									<?php }} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				</div>




				<!-- DELETE SALARY-->



				<div id="delete_salary" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content modal-md">
							<div class="modal-header">
								<h4 class="modal-title">Delete Salary</h4>
							</div>
							<form action="salary_m.php" method="post">
								<div class="modal-body card-box">
									<input type="hidden" name="delete_id" value="">
									<?php
									if ( isset( $_POST[ 'delete' ] ) ) {
										echo "<p>Are you sure to delete this salary ID " . $_POST[ 'delete_id' ] . " ?<p>";
										echo '<a href="salary_m.php?delete_this=' . $_POST[ 'delete_id' ] . '">Yes</a><br>';
										echo '<a href="salary_m.php">No</a>';
									}
									if ( isset( $_GET[ 'delete_this' ] ) ) {
										$sql = "SELECT * FROM salary_m";
										$selectresult = mysqli_query( $connection, $sql );
										if ( mysqli_num_rows( $selectresult ) > 0 ) {
											while ( $row = mysqli_fetch_assoc( $selectresult ) ) {
												$delete_id = $row[ 's_id' ];
											}
											mysqli_query( $connection, "DELETE FROM salary_m WHERE sID = $delete_id" )or die( mysqli_error( $connection ) );
											echo "Deletedd";
										}
										// sql to delete a record

									}
									?>
									<div class="m-t-20 text-left">
										<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
										<button class="btn btn-danger" name="delete">Delete</button>
									</div>
								</div>
							</form>
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