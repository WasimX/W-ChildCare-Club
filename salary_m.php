<!doctype html>
<html>

<head>
	<?php

	include_once "database/db.php";


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
	<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
	<script type="text/javascript" src="assets/js/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="assets/js/app.js"></script>
	<title>Salary</title>
</head>

<body>
	<!-- MAIN PAGE -->
	<div class="main-wrapper">
		<?php include("header.php");
					 include("sideNav.php");
					  ?>


		
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="row">
					<div class="col-xs-4">
						<h4 class="page-title">Employee Salary</h4>
					</div>
					<div class="col-xs-8 text-right m-b-30">
						<a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
					</div>
				</div>
				<div class="row filter-row">
					<div class="col-sm-3 col-md-2 col-xs-6">
						<div class="form-group form-focus">
							<label class="control-label">Employee Name</label>
							<input type="text" name="query" class="form-control floating"/>
						</div>
					</div>
					<div class="col-sm-3 col-md-2 col-xs-6">
						<div class="form-group form-focus select-focus">
							<label class="control-label">Role</label>
							<select class="select floating">
								<option value=""> -- Select -- </option>
								<option value="">Employee</option>
								<option value="1">Manager</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3 col-md-2 col-xs-6">
						<div class="form-group form-focus select-focus">
							<label class="control-label">Leave Status</label>
							<select class="select floating">
								<option value=""> -- Select -- </option>
								<option value="0"> Pending </option>
								<option value="1"> Approved </option>
								<option value="2"> Rejected </option>
							</select>
						</div>
					</div>
					<div class="col-sm-3 col-md-2 col-xs-6">
						<div class="form-group form-focus">
							<label class="control-label">From</label>
							<div class="cal-icon"><input class="form-control floating datetimepicker" type="text">
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-2 col-xs-6">
						<div class="form-group form-focus">
							<label class="control-label">To</label>
							<div class="cal-icon"><input class="form-control floating datetimepicker" type="text">
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-2 col-xs-6">
						<a href="#" class="btn btn-success btn-block" type="submit"> Search </a>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">

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
									$result = mysqli_query( $connection, "SELECT salary_m.ID AS s_id, salary_m.management_ID AS sm_id, management.ID, management.fname, management.lname, management.email, management.photo, management.date_join, management.job_role
FROM management INNER JOIN salary_m ON management.ID = salary_m.management_ID" );

		
				
									while ( $row = mysqli_fetch_array( $result ) ) {
										$id = $row['s_id'];
										
										
										?>

									<tr>
										<td>
											<a href="profile.html" class="avatar">
												<?php echo $row ['photo']; ?>
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
										<td>?????</td>
										<td><a class="btn btn-xs btn-primary" href="salary-view.php">Generate Slip</a>
										</td>
										<td class="text-right">
											<div class="dropdown">

												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

												<ul class="dropdown-menu pull-right">
													<li><a href="#edit<?php echo $row['ID'] ?>" data-toggle="modal" data-target="#edit_salary" data- title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													</li>

													<li><a href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete_salary" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									</tr>
									</tr>
								</tbody>
								<?php }?>
							</table>
						</div>
					</div>
				</div>
			</div>


			<!-- ADD SALARY HERE -->

			<?php if ( isset( $_POST[ 'submit' ] ) ) {

		$management = addslashes( strip_tags( $_POST[ 'management' ] ) );
		$hours = addslashes( strip_tags( $_POST[ 'hours' ] ) );
		$date = gmdate( 'Y-m-d h:i:s' );
		$method = addslashes( strip_tags( $_POST[ 'method' ] ) );
		$period = addslashes( strip_tags( $_POST[ 'period' ] ) );
		$ovetime = addslashes( strip_tags( $_POST[ 'overtime' ] ) );

		$query = mysqli_query( $connection, "INSERT INTO `salary_m` ( `ID`, `management_ID`, `hours`, `tdate`, `method`, `period`, `overtime`) VALUES ('', '$management', '$hours', '$date', '$method','$period','$ovetime')" )or die( mysqli_error( $connection ) );
		echo "Update has been added to the news page successfully.";
	}
	
	?>




			<div id="add_salary" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Add Staff Salary</h4>
						</div>
						<div class="modal-body">


							<form action="" method="post">
								<div class="form-group">
									<label>Select Staff</label>
									<select class="select" name="management">
										<?php $result = mysqli_query(
$connection, "SELECT `ID`, `fname`, `lname` FROM `management`"
);
	 while ( $row = mysqli_fetch_array( $result ) ) { ?>

										<option value="<?php echo $row[ 'ID' ] ?>">
											<?php echo $row ['fname']," ", $row ['lname'] ?> </option>
										<?php } ?>
									</select>


								</div>

								<div class="form-group">
									<label> Hours </label>
									<input class="form-control" type="text" name="hours">
								</div>
								<div class="form-group">
									<label> Method </label>
									<select class="select" name="method">
										<option value="cash">Cash</option>
										<option value="DD">Direct Debit</option>

									</select>
								</div>
								<div class="form-group">
									<label> Period </label>
									<input class="form-control" type="text" name="period"> </div>
								<div class="form-group">
									<label> Overtime (If applicable)</label>
									<input class="form-control" type="text" name="overtime"> </div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary" name="submit">Create Salary</button>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>


			<!-- EDIT SALARY-->

			<?php

				if ( isset( $_POST[ 'edit' ] ) ) {
						$id = $_POST[ 'edit_id' ]  ;
						$hours =  strip_tags( $_POST[ 'hours' ] ) ;
						$method =  strip_tags( $_POST[ 'method' ] ) ;
						$period =  strip_tags( $_POST[ 'period' ] ) ;
						$overtime =  strip_tags( $_POST[ 'overtime' ] );
					

						mysqli_query( $connection, "UPDATE salary_m SET hours =  $hours,method = '$method', period = '$period', overtime =  $overtime WHERE ID = $id" )or die( mysqli_error( $connection ) );
						echo "Update has been added to the news page successfully.";
					}
				
			
			?>

			<div id="edit_salary" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Update Staff Salary</h4>
						</div>
						<div class="modal-body">
						


							<form action="" method="post">
								<input type="hidden" name="edit_id" value="<?php echo $id; ?>">

								<div class="form-group">
									<label> Hours </label>
									<input class="form-control" type="text" name="hours">
								</div>
								<div class="form-group">
									<label> Method </label>
									<select class="select" name="method">
										<option value=""></option>
										<option value="cash">Cash</option>
										<option value="DD">Direct Debit</option>
									</select>
								</div>
								<div class="form-group">
									<label> Period </label>
									<input class="form-control" type="text" name="period"> </div>
								<div class="form-group">
									<label> Overtime (If applicable)</label>
									<input class="form-control" type="text" name="overtime"> </div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary" name="edit">Save & Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>




			<!-- DELETE SALARY-->
			<?php
	
			
	
                            if(isset($_POST['delete'])){
								$delete_id = $_POST['delete_id'];
                                // sql to delete a record
                                mysqli_query( $connection, "DELETE FROM salary_m WHERE ID = $delete_id" )or die( mysqli_error( $connection ) );
						echo "Update has been added to the news page successfully.";
							}
							
			?>


			<div id="delete_salary" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Delete Salary</h4>
						</div>
						<form action="" method="post">
							<div class="modal-body card-box">
							<input type="hidden" name="delete_id" value="<?php echo $id; ?>">
								<p>Are you sure want to delete this?</p>
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


</body>

</html>