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
	<title>Assets</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
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
					<div class="col-xs-8">
						<h4 class="page-title">Assets</h4>
					</div>
					<div class="col-xs-4 text-right m-b-30">
						<a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_asset"><i class="fa fa-plus"></i> Add Asset</a>
					</div>
				</div>
				<form action="" method="POST">
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
									<?php
									$query = mysqli_query( $connection, "SELECT DISTINCT job_role FROM management" );

									while ( $row = mysqli_fetch_array( $query ) ) {
										$job = $row[ 'job_role' ];
										?>

									<option value="<?php echo $job ?>">
										<?php echo $job ?>
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
							<table class="table table-striped custom-table m-b-0 datatable">

								<thead>
									<tr>
										<th>Asset ID</th>
										<th>Asset Name</th>
										<th>Manufacture</th>
										<th>Purchase Date</th>
										<th>Warrenty</th>
										<th>Warrenty End</th>
										<th>Payment Method</th>
										<th>Amount</th>
										<th class="text-center">Status</th>
										<th class="text-right">Actions</th>
									</tr>
								</thead>
								<tbody>

									<?php

									$raw_results = mysqli_query( $connection, "SELECT * FROM `assets`" );

									while ( $row = mysqli_fetch_array( $raw_results ) ) {

										?>


									<tr>
										<td>
											<?php echo $row['ID']; ?>
										</td>
										<td>
											<strong>
												<?php echo $row['item_name']; ?>
											</strong>
										</td>
										<td>
											<?php echo $row['manufacture']; ?>
										</td>
										<td>
											<?php echo $row['date']; ?>
										</td>
										<td>
											<?php echo $row['warrenty']; ?>
										</td>
										<td>
											<?php echo $row['warrenty_end']; ?>
										</td>
										<td>
											<?php echo $row['method']; ?>
										</td>
										<td>
											<?php echo $row['worth']; ?>
										</td>
										<td class="text-center">
											<div class="dropdown action-label">
												<?php echo $row['status']; ?>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<ul class="dropdown-menu pull-right">
													<li><a href="#edit=<?php echo $row['ID'] ?>" title="Edit" data-toggle="modal" data-target="#edit_asset"><i class="fa fa-pencil m-r-5"></i> Edit </a>
													</li>
													<li><a href="#" data-href="#id=<?php echo $row['ID']; ;?>" data-toggle="modal" data-target="#delete_asset" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
			</div>
		</div>

		<!--delete asset-->


		<?php


		if ( isset( $_GET[ 'id' ] ) ) {
			$delete_id = $_GET[ 'delete_id' ];
			// sql to delete a record
			mysqli_query( $connection, "DELETE FROM assets WHERE ID = $delete_id" )or die( mysqli_error( $connection ) );
			echo "Update has been added to the news page successfully.";
		}

		?>


		<div id="delete_asset" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content modal-md">
					<input type="hidden" name="delete_id">
					<div class="modal-header">
						<h4 class="modal-title">Delete Asset</h4>
					</div>
					<form>
						<div class="modal-body card-box">
							<p>Are you sure want to delete this asset?</p>
							<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>


		<!--ADD ASSET-->

		<?php 
		
		if ( isset( $_POST[ 'add' ] ) ) {
			
			$aname = $_POST['aname'];
			$pdate = $_POST['pdate'];
			$pdate = date("Y-m-d",strtotime($pdate));
			$staff = $_POST['teachers'];
			$pfrom = $_POST['pfrom'];
			$manufacturer = $_POST['manufacturer'];
			$model = $_POST['model'];
			$sn = $_POST['sn'];
			$condition = $_POST['condition'];
			$warranty = $_POST['warranty'];
			$warend = $_POST['warend'];
			$warend = date("Y-m-d",strtotime($warend));
			$amount = $_POST['amount'];
			$method = $_POST['method'];
			$desc = $_POST['desc'];
			$status = $_POST['status'];
		
		mysqli_query($connection, "INSERT INTO `assets`(`ID`, `item_name`, `date`, `management_ID`, `purchase_from`, `model`, `manufacture`, `s/n`, `condition`, `warrenty`, `method`, `warrenty_end`, `worth`, `description`, `status`) 	VALUES('','$aname','$pdate',$staff,'$pfrom','$manufacturer','$model','$sn','$condition','$warranty','$method','$warend',$amount,'$desc','$status')");
			
			echo "Success!";
			
		}					
		?>

		<div id="add_asset" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-content modal-md">
					<div class="modal-header">
						<h4 class="modal-title">Add Asset</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Asset Name</label>
										<input class="form-control" name="aname" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Purchase Date</label>
										<div class="cal-icon"><input class="form-control datetimepicker" name="pdate" type="text">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Purchase From</label>
										<input class="form-control" name="pfrom" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Manufacturer</label>
										<input class="form-control" name="manufacturer" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Model</label>
										<input class="form-control" name="model" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Serial Number</label>
										<input class="form-control" name="sn" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Condition</label>
										<input class="form-control" name="condition" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Warranty</label>
										<input class="form-control" name="warranty" type="text" placeholder="In Months">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Warranty End</label>
										<div class="cal-icon"><input class="form-control datetimepicker" name="warend" type="text">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Value</label>
										<input class="form-control" name="amount" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Payment Method</label>
										<select class="select floating" name="method">
											<option value=""> -- Select -- </option>
											<option value="Cash">Cash</option>
											<option value="Direct Debit">Direct Debit</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-groups">
										<label>Teachers</label>
										<select name="teachers" required class="select floating">
											<option value=""> -- Select -- </option>
											<?php
											$query1 = mysqli_query( $connection, "SELECT ID, fname, lname  FROM management" );

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
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Description</label>
										<textarea class="form-control" name="desc"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Status</label>
										<select class="select" name="status">
											<option value=""> -- Select -- </option>
											<option value="Pending">Pending</option>
											<option value="Approved">Approved</option>
											<option value="Deployed">Deployed</option>
											<option value="Damaged">Damaged</option>
										</select>
									</div>
								</div>
							</div>
							<div class="m-t-20 text-center">
								<button class="btn btn-primary" name="add">Add Asset</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>



		<!--edit assets-->
		<?php
		
			if ( isset( $_POST[ 'edit' ] ) ) {
			
			$id = $_POST[ 'edit_id' ];
			$aname = $_POST['aname'];
			$pdate = $_POST['pdate'];
			$pdate = date("Y-m-d",strtotime($pdate));
			$staff = $_POST['teachers'];
			$pfrom = $_POST['pfrom'];
			$manufacturer = $_POST['manufacturer'];
			$model = $_POST['model'];
			$sn = $_POST['sn'];
			$condition = $_POST['condition'];
			$warranty = $_POST['warranty'];
			$warend = $_POST['warend'];
			$warend = date("Y-m-d",strtotime($warend));
			$amount = $_POST['amount'];
			$method = $_POST['method'];
			$desc = $_POST['desc'];
			$status = $_POST['status'];
			
		
			mysqli_query($connection, "UPDATE `assets` SET `item_name`= '$aname', `date`= '$pdate', `management _ ID`= $staff, `purchase_from`= '$pfrom', `model`= '$model', `manufacture`= '$manufacturer', `s/n`= '$sn', `condition`= '$condition', `warrenty`= '$warranty', `method`= '$method', `warrenty_end`= '$warend', `worth`= $amount, `description`= '$desc', `status`= '$status' WHERE ID = $id");
				
				
		/*		UPDATE `assets` SET 
`item_name`= 'aname', 
`date`= 'pdate',
`management_ID`=2 ,
`purchase_from`= 'pfrom',
`model`= 'model', 
`manufacture`= 'manufacturer',
`s/n`= 'sn',
`condition`= 'condition',
`warrenty`= 2, 
`method`= 'method',
`warrenty_end`= 'warend',
`worth`= 5,
`description`= '$desc',
`status`= '$status' 
WHERE ID = 7*/
			
			
			echo "Success!";
		}
		?>
		

		<div id="edit_asset" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-content modal-md">
					<div class="modal-header">
						<h4 class="modal-title">Edit Asset</h4>
					</div>
					<div class="modal-body">
					<input type="hidden" name="edit_id" value="<?php echo $id; ?>">
						<form method="post" action="">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Asset Name <?php echo $id; ?> </label>
										<input class="form-control" name="aname" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Purchase Date</label>
										<div class="cal-icon"><input class="form-control datetimepicker" name="pdate" type="text">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Purchase From</label>
										<input class="form-control" name="pfrom" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Manufacturer</label>
										<input class="form-control" name="manufacturer" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Model</label>
										<input class="form-control" name="model" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Serial Number</label>
										<input class="form-control" name="sn" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Condition</label>
										<input class="form-control" name="condition" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Warranty</label>
										<input class="form-control" name="warranty" type="text" placeholder="In Months">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Warranty End</label>
										<div class="cal-icon"><input class="form-control datetimepicker" name="warend" type="text">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Value</label>
										<input class="form-control" name="amount" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Payment Method</label>
										<select class="select floating" name="method">
											<option value=""> -- Select -- </option>
											<option value="Cash">Cash</option>
											<option value="Direct Debit">Direct Debit</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-groups">
										<label>Teachers</label>
										<select name="teachers" required class="select floating">
											<option value=""> -- Select -- </option>
											<?php
											$query1 = mysqli_query( $connection, "SELECT ID, fname, lname  FROM management" );

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
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Description</label>
										<textarea class="form-control" name="desc"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Status</label>
										<select class="select" name="status">
											<option value=""> -- Select -- </option>
											<option value="Pending">Pending</option>
											<option value="Approved">Approved</option>
											<option value="Deployed">Deployed</option>
											<option value="Damaged">Damaged</option>
										</select>
									</div>
								</div>
							</div>
							<div class="m-t-20 text-center">
								<button class="btn btn-primary" name="update">Update and Save Asset</button>
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