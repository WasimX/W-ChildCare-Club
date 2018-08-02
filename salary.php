<!DOCTYPE html>
<html>

<head>
	<?php
	include_once "database/db.php";
	include( "navigation.php" );
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
</head>

<body>
	<div class="main-wrapper">
		<div class="page-wrapper">
			<div class="content container-fluid">
				<form action="" method="POST">
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Employee Wages</h4>
						</div>
						<div class="col-xs-8 text-right m-b-30"><a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_salary"><em class="fa fa-plus"></em> Add Wage</a>
						</div>
					</div>
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
								<input name="lname" type="text" class="form-control floating"/>
							</div>
						</div>
						<div class="col-sm-3 col-md-2 col-xs-6">
							<div class="form-group form-focus select-focus">
								<label class="control-label">Role</label>
								<select class="select floating" name="role">
									<option value=""> -- Select -- </option>
									<?php
									$result = mysqli_query( $connection, "SELECT DISTINCT job_role FROM management" );
									while ( $row = mysqli_fetch_array( $result ) ) {
										$role = $row[ 'job_role' ];
										?>
									<option value="<?php echo $role ?>">
										<?php echo $role ?>
									</option>
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
							<table class="table table-striped custom-table datatable">
								<thead>
									<tr>
										<th>Wage ID</th>
										<th style="width:30%;">Employee</th>
										<th>Role</th>
										<th>Period</th>
										<th>Date</th>
										<th>Wage</th>
										<th>Payslip</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if ( isset( $_POST[ 'search' ] ) ) {
										$fname = addslashes( $_POST[ 'fname' ] );
										$lname = addslashes( $_POST[ 'lname' ] );
										$role = addslashes( $_POST[ 'role' ] );

										$from_date = addslashes( $_POST[ 'date_from' ] );
										$fdate = str_replace( '/', '-', $from_date );
										$fdate = date( 'Y-m-d', strtotime( $fdate ) );

										$to_date = addslashes( $_POST[ 'date_to' ] );
										$tdate = str_replace( '/', '-', $to_date );
										$tdate = date( 'Y-m-d', strtotime( $tdate ) );


										if ( empty( $_POST[ 'date_from' ] ) && empty( $_POST[ 'date_to' ] ) ) {

											$sql = "SELECT salary_m.sID AS s_id, salary_m.management_ID AS sm_id, salary_m.amount, management.ID, management.fname, management.lname, management.email, management.photo, management.date_join, management.job_role, salary_m.tdate, salary_m.period FROM management INNER JOIN  salary_m  ON management.ID = salary_m.management_ID WHERE management.fname LIKE '%" . $fname . "%' AND management.lname LIKE '%" . $lname . "%' AND management.job_role LIKE '%" . $role . "%'";

											$raw_results = mysqli_query( $connection, $sql ); // to generate the query in mysql server

										} else if ( isset( $_POST[ 'fname' ] ) && isset( $_POST[ 'lname' ] ) && isset( $_POST[ 'role' ] ) ) {
											$sql = "SELECT salary_m.sID AS s_id, salary_m.management_ID AS sm_id, salary_m.amount, management.ID, management.fname, management.lname, management.email, management.photo, management.date_join, management.job_role, salary_m.tdate FROM management INNER JOIN salary_m ON management.ID = salary_m.management_ID WHERE salary_m.tdate >= '" . $fdate . "' AND salary_m.tdate <= '" . $tdate . "' AND management.fname LIKE '%" . $fname . "%' AND management.lname LIKE '%" . $lname . "%' AND management.job_role LIKE '%" . $role . "%'";

											$raw_results = mysqli_query( $connection, $sql );
										}

										while ( $row = mysqli_fetch_array( $raw_results ) ) {

											$id = $row[ 's_id' ];
											$fname = $row[ 'fname' ];
											$lname = $row[ 'lname' ];
											$job = $row[ 'job_role' ];
											$period = $row[ 'period' ];
											$tdate = $row[ 'tdate' ];
											$amount = $row[ 'amount' ];
											$photo = $row[ 'photo' ];

											?>
									<tr>
										<td>
											<?php echo $id ?>
										</td>
										<td>
											<a href="profile.php"><img class="img-circle" src="<?php echo $row['photo']; ?>" width="40" alt="User"></a>
											<h2><a href="profile.php"><?php echo $fname," ", $lname ?></a></h2>
										</td>
										<td>
											<?php echo $job ?>
										</td>
										<td>
											<?php echo $period ?>
										</td>
										<td>
											<?php echo $tdate ?>
										</td>
										<td>
											<?php echo $amount ?>
										</td>
										<td><a class="btn btn-xs btn-primary" href="salary_view.php?id=<?php echo $id?> ">Generate Slip</a>
										</td>
										<td class="text-right">
											<div class="dropdown">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<ul class="dropdown-menu pull-right">
													<li><a href="javascript:void(0)" data-toggle="modal" data-target="#edit_salary<?php echo $id ?>" data-title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													</li>
													<li><a href="#delete_salary" data-toggle="modal" data-target="#delete_salary<?php echo $id ?>" data-title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									<div id="edit_salary<?php echo $id ?>" class="modal custom-modal fade" role="dialog">
										<div class="modal-dialog">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<div class="modal-content modal-lg">
												<div class="modal-header">
													<h4 class="modal-title">Update Emplyee Wage</h4>
												</div>
												<div class="modal-body">
													<form action="salary.php" method="POST">
														<input type="hidden" name="edit_id" value="<?php echo $id ?>">

														<div class="form-group">
															<label> Wage ID </label>
															<input class="form-control" type="text" placeholder="<?php echo $id ?>" readonly>
														</div>

														<div class="form-group">
															<label> Hours </label>
															<input class="form-control" type="text" name="hours" maxlength="2">
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
															<label> Period (Month) </label>
															<input class="form-control" type="text" name="period"> </div>
														<div class="form-group">
															<label> Overtime (If applicable)</label>
															<input class="form-control" type="text" name="overtime" maxlength="2"> </div>
														<div class="m-t-20 text-center">
															<button type="submit" class="btn btn-primary" name="edit"> Submit</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>

									<div id="delete_salary<?php echo $id ?>" class="modal custom-modal fade" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content modal-md">
												<div class="modal-header">
													<h4 class="modal-title">Delete Wage</h4>
												</div>
												<div class="modal-body card-box">
													<form method="post" action="salary.php">
														<input type="hidden" name="delete_id" value="<?php echo $id ?>">
														<p>Are you sure want to delete this?</p>
														<div class="m-t-20 text-left">
															<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
															<button type="submit" name="delete" class="btn btn-danger"></span> Delete</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<?php 
										}
									}
							
									if ( isset( $_POST[ 'edit' ] ) ) {
										$id =  addslashes ($_POST[ 'edit_id' ]);
										$hours = addslashes (strip_tags( $_POST[ 'hours' ] ));
										$method = addslashes (strip_tags( $_POST[ 'method' ] ));
										$period = addslashes (strip_tags( $_POST[ 'period' ] ));
										$overtime = addslashes (strip_tags( $_POST[ 'overtime' ] ));

											if ( empty( $hours ) || empty( $method ) || empty( $period ) || empty( $overtime ) ) {
												echo "<br /><font color='red'>Please complete all fields.</font><br />";
											} elseif ( !preg_match_all( "/[0-9]/m", $hours ) ) {
												echo "<br /><font color='red'>Hours requires numbers only.</font><br />";
											} elseif ( !preg_match_all( "/[0-9]/m", $overtime ) ) {
												echo "<br /><font color='red'>Overtime requires numbers only.</font><br />";
											} elseif ( !preg_match_all( "/[0-9a-zA-Z]/m", $period ) ) {
												echo "<br /><font color='red'>Illegal Charaters found.</font><br />";
											} 

										else {
											mysqli_query( $connection, "UPDATE salary_m SET hours = $hours, method = '$method', period = '$period', overtime = $overtime WHERE sID = $id" )or die( mysqli_error( $connection ) );

											mysqli_query( $connection, "UPDATE `salary_m` INNER JOIN `management` ON management.ID = salary_m.management_ID SET `salary_m`.amount = ((((`salary_m`.overtime + `salary_m`.hours) * `management`.hourly_pay) * 52) /12)" );

											echo "<br /><font color='green'>Update has been successfully.</font><br />";
											}
									}
								
									if ( isset( $_POST[ 'delete' ] ) ) {
										$id = $_POST[ 'delete_id' ];

										// sql to delete a record
										mysqli_query( $connection, "DELETE FROM salary_m WHERE sID = $id" )or die( mysqli_error( $connection ) );
										echo "<br /><font color='green'>Record has been deleted</font><br />";
									}

									if ( isset( $_POST[ 'submit' ] ) ) {

										$management = addslashes (strip_tags( $_POST[ 'management' ] ) );
										$hours = addslashes( strip_tags( $_POST[ 'hours' ] ) );
										$date = date( 'Y-m-d h:i:s' );
										$method = addslashes( strip_tags( $_POST[ 'method' ] ) );
										$period = addslashes( strip_tags( $_POST[ 'period' ] ) );
										$overtime = addslashes( strip_tags( $_POST[ 'overtime' ] ) );
										$random = rand( 100000, 999999 );

											if ( empty( $hours ) || empty( $method ) || empty( $period ) || empty( $overtime ) ) {
												echo "<br /><font color='red'>Please complete all fields.</font><br />";
											} elseif ( !preg_match_all( "/[0-9]/m", $hours ) ) {
												echo "<br /><font color='red'>Hours requires numbers only.</font><br />";
											} elseif ( !preg_match_all( "/[0-9]/m", $overtime ) ) {
												echo "<br /><font color='red'>Overtime requires numbers only.</font><br />";
											} elseif ( !preg_match_all( "/[0-9a-zA-Z]/m", $period ) ) {
												echo "<br /><font color='red'>Illegal Charaters found.</font><br />";
											} else {
											
										mysqli_query( $connection, "INSERT INTO `salary_m` ( `sID`, `management_ID`, `hours`, `tdate`, `method`, `period`, `overtime`) VALUES ('$random', '$management', '$hours', '$date', '$method','$period','$overtime')" )or die( mysqli_error( $connection ) );

										mysqli_query( $connection, "UPDATE `salary_m` INNER JOIN `management` ON management.ID = salary_m.management_ID SET `salary_m`.amount = ((((`salary_m`.overtime + `salary_m`.hours) * `management`.hourly_pay) * 52) /12)" );

										echo "<br /><font color='green'>Record has been added</font><br />";
											}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="add_salary" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<div class="modal-content modal-lg">
				<div class="modal-header">
					<h4 class="modal-title">Add Employee Salary</h4>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label>Select Employee</label>
							<select class="select" name="management">
								<?php $result = mysqli_query($connection, "SELECT `ID`, `fname`, `lname` FROM `management`");
											while ( $row = mysqli_fetch_array( $result ) ) {
									?>
								<option value="<?php echo $row[ 'ID' ] ?>">
									<?php echo $row ['fname']," ", $row ['lname'] ?> </option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label> Hours </label>
							<input class="form-control" type="text" name="hours" maxlength="2">
						</div>
						<div class="form-group">
							<label> Method </label>
							<select class="select" name="method">
								<option value="cash">Cash</option>
								<option value="DD">Direct Debit</option>
							</select>
						</div>
						<div class="form-group">
							<label> Period (Month)</label>
							<input class="form-control" type="text" name="period"> </div>
						<div class="form-group">
							<label> Overtime (If applicable)</label>
							<input class="form-control" type="text" name="overtime" maxlength="2"> </div>
						<div class="m-t-20 text-center">
							<button class="btn btn-primary" name="submit" type="submit">Create Salary</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>

	<div id="delete_salary" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-md">
				<div class="modal-header">
					<h4 class="modal-title">Delete Salary</h4>
				</div>
				<div class="modal-body card-box">
					<p>Are you sure want to delete this?</p>
					<div class="m-t-20 text-left">
						<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
						<a href="#" class="btn btn-danger">Delete</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

	<div class="sidebar-overlay" data-reff="#sidebar"></div>
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
