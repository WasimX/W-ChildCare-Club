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
	<title>Subjects</title>
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
						<h4 class="page-title">Subjects</h4>
					</div>
				</div>
				<form method="post">
					<div class="row filter-row" align="center">
						<div class="col-sm-3 col-xs-6">
							<div class="form-group form-focus">

								<label class="control-label">Subject</label>
								<input name="subject" type="text" required="required" class="form-control floating">
							</div>
						</div>
						<div class="col-sm-2 col-xs-6" align="right">
							<input type="submit" value="Add Subject" name="add" class="btn btn-success btn-block"/>
						</div>
					</div>
				</form>
				<?php

				if ( isset( $_POST[ 'add' ] ) ) {
					$sub = $_POST[ 'subject' ];

					$dupcheck = mysqli_query( $connection, "SELECT `ID`, `subject_name` FROM `subjects` WHERE `subject_name` = '$sub'" );
					if ( mysqli_num_rows( $dupcheck ) > 0 ) {
						echo "Subject already Exists!";
					} else {
						if ( empty( $sub ) ) {
							echo "ERROR! - Please provide a subject to add ";
						} else
							$query = mysqli_query( $connection, "INSERT INTO `subjects` ( `ID`, `subject_name`) VALUES ('', '$sub')" );
					}
				}
				?>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table m-b-0">
								<thead>
									<tr>
										<th>ID</th>
										<th>Subject</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php

									$results = mysqli_query( $connection, "SELECT ID, subject_name FROM subjects" );

									while ( $row = mysqli_fetch_array( $results ) ) {

										$id = $row[ 'ID' ];
										$subject = $row[ 'subject_name' ];

										?>
									<tr>
										<td>
											<?php echo $id?>
										</td>
										<td>
											<?php echo $subject ?>
										</td>
										<td class="text-right">
											<div class="dropdown">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<ul class="dropdown-menu pull-right">
													<li><a href="#" data-toggle="modal" data-target="#edit_subject" data- title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													</li>
													<li><a href="#" data-toggle="modal" data-target="#delete_subject" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<!-- EDIT MODAL -->

				<div id="edit_subject" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="modal-content modal-lg">
							<div class="modal-header">
								<h4 class="modal-title">Update Subject Name</h4>
							</div>
							<div class="modal-body">
								<form action="" method="post">
									<input type="hidden" name="edit_id" value="">

									<div class="form-group">
										<label> Subject Name </label>
										<input class="form-control" type="text" name="sub_name">
									</div>
									<div class="m-t-20 text-center">
										<button class="btn btn-primary" name="edit">Save & Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>


				<!-- DELETE MODAL -->
				


				<div id="delete_subject" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content modal-md">
							<div class="modal-header">
								<h4 class="modal-title">Delete Salary</h4>
							</div>
	
							
							<form action="" method="post">
								<div class="modal-body card-box">
									<input type="hidden" name="delete_id" value="">
									<p>Are you sure want to delete this salary ID
										<?php echo $id?>?</p>
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