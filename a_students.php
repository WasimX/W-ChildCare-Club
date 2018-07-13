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
	<title>Students</title>
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
					<div class="col-sm-8">
						<h4 class="page-title">Assign Student to Classes</h4>
					</div>
				</div>

				<?php

				if ( isset( $_POST[ 'insert' ] ) ) {
					$id = strip_tags( $_POST[ 'student' ] );
					$sid = strip_tags( $_POST[ 'subject' ] );

					$query = mysqli_query( $connection, "INSERT INTO `attend`(`Child_ID`, `subjects_ID`) VALUES ( $id, $sid )" );

					if ( !$query ) {
						echo "Student already attends that class";
					} else {
						echo "Save successful.";
					}
				}
				?>
				<form method="POST">
					<div class="row filter-row">
						<div class="col-sm-3 col-md-2 col-xs-6">
							<div class="form-group form-focus select-focus">
								<label class="control-label">Students</label>
								<select name="student" required class="select floating">
									<option value=""> -- Select -- </option>
									<?php
									$query1 = mysqli_query( $connection, "SELECT ID, fname, lname  FROM child" );

									while ( $row = mysqli_fetch_array( $query1 ) ) {
										$id = $row[ 'ID' ];
										$fn = $row[ 'fname' ];
										$ln = $row[ 'lname' ];
										?>
									<option value="<?php echo $id ?>">
										<?php echo $fn , " ", $ln ?>
									</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-md-2 col-xs-6">
							<div class="form-group form-focus select-focus">
								<label class="control-label">Subject</label>
								<select name="subject" required class="select floating">
									<option value=""> -- Select -- </option>
									<?php
									$query2 = mysqli_query( $connection, "SELECT ID, subject_name  FROM subjects" );

									while ( $row = mysqli_fetch_array( $query2 ) ) {
										$sid = $row[ 'ID' ];
										$subject = $row[ 'subject_name' ];
										?>
									<option value="<?php echo $sid ?>">
										<?php echo $subject ?>
									</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-md-2 col-xs-6">
							<input type="submit" value="Insert" name="insert" class="btn btn-success btn-block"/>
						</div>
					</div>
				</form>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<?php
							// should have name dispaying instead of ids
							$raw_results = mysqli_query( $connection, "SELECT child.ID AS child_ID, child.fname, child.lname, subjects.ID AS subjects_ID, subjects.subject_name, attend.Child_ID, attend.subjects_ID
FROM subjects INNER JOIN (child INNER JOIN attend ON child.ID = attend.Child_ID) ON subjects.ID = attend.subjects_ID;

" );
							?>
							<table class="table table-striped custom-table datatable">
								<thead>
									<tr>
										<th class="sorting" >Student</th>
										<th class="sorting">Subject</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									while ( $row = mysqli_fetch_array( $raw_results ) ) {
										$childfname = $row[ 'fname' ];
										$childlname = $row[ 'lname' ];
										$subject = $row[ 'subject_name' ];
										?>
									<tr>
										<td>
											<?php echo $childfname," ", $childlname?>
										</td>
										<td>
											<?php echo $subject ?>
										</td>
										<td class="text-right">
											<div class="dropdown"><a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><em class="fa fa-ellipsis-v"></em></a>
												<ul class="dropdown-menu pull-right">
													<li><a href="#" data-toggle="modal" data-target="#edit_salary" data- title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													</li>
													<li><a href="#" data-toggle="modal" data-target="#delete_salary" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									<?php
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