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
	<title>Assets</title>
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
								<input name="fname" type="text" class="form-control floating"/>
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
								<select name="role" class="select floating">
									<option value=""> -- Select -- </option>
									<?php
									$query = mysqli_query( $connection, "SELECT DISTINCT job_role FROM management" );

									while ( $row = mysqli_fetch_array( $query ) ) {
										$job = addslashes( $row[ 'job_role' ] );
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
										<th>Warranty</th>
										<th>Warranty End</th>
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

										$id = $row[ 'ID' ];
										$itemname = $row[ 'item_name' ];
										$manufacturer = $row[ 'manufacture' ];
										$t_date = $row[ 'date' ]; //purchase date
										$tdate = date( 'd-m-Y', strtotime( $t_date ) );
										$warranty = $row[ 'warranty' ];
										$warend = $row[ 'warranty_end' ];
										$warend = date( 'd-m-Y', strtotime( $warend ) );
										$method = $row[ 'method' ];
										$worth = $row[ 'worth' ];
										$status = $row[ 'status' ];
										$mID = $row[ 'management_ID' ];
										$purchase_from = $row[ 'purchase_from' ];
										$model = $row[ 'model' ];
										$sn = $row[ 's/n' ];
										$condition = $row[ 'condition' ];
										$desc = $row[ 'description' ];
										?>
									<tr>
										<td>
											<?php echo $id; ?>
										</td>
										<td>
											<strong>
												<?php echo $itemname; ?>
											</strong>
										</td>
										<td>
											<?php echo $manufacturer; ?> </td>
										<td>
											<?php echo $tdate; ?>
										</td>
										<td>
											<?php echo $warranty; ?>
										</td>
										<td>
											<?php echo $warend; ?>
										</td>
										<td>
											<?php echo $method; ?>
										</td>
										<td>
											<?php echo $worth; ?>
										</td>
										<td class="text-center">
											<div class="dropdown action-label">
												<?php echo $status; ?>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<ul class="dropdown-menu pull-right">
													<li><a href="javascript:void(0)" data-toggle="modal" data-target="#edit_asset<?php echo $id ?>" data-title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													</li>
													<li><a href="javascript:void(0)" data-toggle="modal" data-target="#delete_asset<?php echo $id ?>" data-title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete </a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									<div id="edit_asset<?php echo $id ?>" class="modal custom-modal fade" role="dialog">
										<div class="modal-dialog">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<div class="modal-content modal-md">
												<div class="modal-header">
													<h4 class="modal-title">Edit Asset</h4>
												</div>
												<div class="modal-body">
													<form method="POST" action="assets.php">
														<input type="hidden" name="edit_id" value="<?php echo $id; ?>">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Asset Name</label>
																	<input class="form-control" name="aname" type="text" value="<?php echo $itemname ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Purchase Date</label>
																	<div class="cal-icon"><input class="form-control datetimepicker" name="pdate" type="text" value="<?php echo $tdate ; ?>">
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Purchase From</label>
																	<input class="form-control" name="pfrom" type="text" value="<?php echo $purchase_from; ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Manufacturer</label>
																	<input class="form-control" name="manufacturer" type="text" value="<?php echo $manufacturer; ?>">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Model</label>
																	<input class="form-control" name="model" type="text" value="<?php echo $model; ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Serial Number</label>
																	<input class="form-control" name="sn" type="text" value="<?php echo $sn; ?>">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Condition</label>
																	<input class="form-control" name="condition" type="text" value="<?php echo $condition; ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Warranty</label>
																	<input class="form-control" name="warranty" type="text" placeholder="In Months" value="<?php echo $warranty; ?>">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Warranty End</label>
																	<div class="cal-icon"><input class="form-control datetimepicker" name="warend" type="text" value="<?php echo $warend; ?>">
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Value</label>
																	<input class="form-control" name="amount" type="text" value="<?php echo $worth; ?>">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Payment Method - <?php echo $method; ?> </label>
																	<select class="select floating" name="method" required="required">
																		<option value=""> -- Select -- </option>
																		<option value="Cash">Cash</option>
																		<option value="Direct Debit">Direct Debit</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label>Description</label>
																	<textarea class="form-control" name="desc">
																		<?php echo $desc; ?>
																	</textarea>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Status - <?php echo $status; ?></label>
																	<select class="select" name="status" required="required">
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
															<button class="btn btn-primary" name="update" type="submit">Edit Asset</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<div id="delete_asset<?php echo $id ?>" class="modal custom-modal fade" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content modal-md">
												<div class="modal-header">
													<h4 class="modal-title">Delete Assets</h4>
												</div>
												<div class="modal-body card-box">
													<form method="post" action="assets.php">
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

									if ( isset( $_POST[ 'update' ] ) ) {

										$id = addslashes( $_POST[ 'edit_id' ] );
										$aname = addslashes( $_POST[ 'aname' ] );
										$pdate = addslashes( $_POST[ 'pdate' ] );
										$pdate = date( "Y-m-d", strtotime( $pdate ) );
										$pfrom = addslashes( $_POST[ 'pfrom' ] );
										$manufacturer = addslashes( $_POST[ 'manufacturer' ] );
										$model = addslashes( $_POST[ 'model' ] );
										$sn = addslashes( $_POST[ 'sn' ] );
										$condition = addslashes( $_POST[ 'condition' ] );
										$warranty = addslashes( $_POST[ 'warranty' ] );
										$warend = addslashes( $_POST[ 'warend' ] );
										$warend = date( "Y-m-d", strtotime( $warend ) );
										$amount = addslashes( $_POST[ 'amount' ] );
										$method = addslashes( $_POST[ 'method' ] );
										$desc = addslashes( $_POST[ 'desc' ] );
										$status = addslashes( $_POST[ 'status' ] );

										if ( empty( $aname ) || empty( $pdate ) || empty( $pfrom ) || empty( $manufacturer ) || empty( $model ) || empty( $sn ) || empty( $condition ) || empty( $warend ) || empty( $warranty ) || empty( $amount ) || empty( $method ) || empty( $desc ) || empty( $status ) ) {

											echo "<br /><font color='red'>Please complete all fields.</font><br />";
										} elseif ( !preg_match_all( "/[a-zA-Z0-9]/m", $aname ) ) {
											echo "<br /><font color='red'>Illegal characters found in Asset name text field.</font><br />";
										} elseif ( !preg_match_all( "/[a-zA-Z0-9]/m", $pfrom ) ) {
											echo "<br /><font color='red'>Illegal characters found in purchase from text field.</font><br />";
										} elseif ( !preg_match_all( "/[a-zA-Z0-9]/m", $manufacturer ) ) {
											echo "<br /><font color='red'>Illegal characters found in manufacture text field.</font><br />";
										} elseif ( !preg_match_all( "/[a-zA-Z0-9]/m", $model ) ) {
											echo "<br /><font color='red'>Illegal characters found in model text field.</font><br />";
										} elseif ( !preg_match_all( "/[a-zA-Z0-9]/m", $sn ) ) {
											echo "<br /><font color='red'>Illegal characters found in serial number text field.</font><br />";
										} elseif ( !preg_match_all( "/[a-zA-Z]/m", $condition ) ) {
											echo "<br /><font color='red'>Illegal characters found in condition text field.</font><br />";
										} elseif ( !preg_match_all( "/[0-9]/m", $amount ) ) {
											echo "<br /><font color='red'>Illegal characters found in value text field.</font><br />";
										} elseif ( !preg_match_all( "/[0-9]/m", $warranty ) ) {
											echo "<br /><font color='red'>Illegal characters found in warranty text field.</font><br />";
										} else {
											$sql = "UPDATE `assets` SET `item_name`= '$aname', `date`= '$pdate', `purchase_from`= '$pfrom', `model`= '$model', `manufacture`= '$manufacturer', `s/n`= '$sn', `condition`= '$condition', `warranty`= '$warranty', `method`= '$method', `warranty_end`= '$warend', `worth`= $amount, `description`= '$desc', `status`= '$status' WHERE ID = $id";

											mysqli_query( $connection, $sql );

											echo "<br /><font color='green'>Edit has been successful!</font><br />";
										}
									}

									if ( isset( $_GET[ 'id' ] ) ) {
										$delete_id = $_GET[ 'delete_id' ];
										// sql to delete a record
										mysqli_query( $connection, "DELETE FROM assets WHERE ID = $delete_id" )or die( mysqli_error( $connection ) );
										echo "Update has been added to the news page successfully.";
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
	<?php 
		if ( isset( $_POST[ 'add' ] ) ) {

			$aname = $_POST[ 'aname' ];
			$pdate = $_POST[ 'pdate' ];
			$pdate = date( "Y-m-d", strtotime( $pdate ) );
			$staff = $_POST[ 'teachers' ];
			$pfrom = $_POST[ 'pfrom' ];
			$manufacturer = $_POST[ 'manufacturer' ];
			$model = $_POST[ 'model' ];
			$sn = $_POST[ 'sn' ];
			$condition = $_POST[ 'condition' ];
			$warranty = $_POST[ 'warranty' ];
			$warend = $_POST[ 'warend' ];
			$warend = date( "Y-m-d", strtotime( $warend ) );
			$amount = $_POST[ 'amount' ];
			$method = $_POST[ 'method' ];
			$desc = $_POST[ 'desc' ];
			$status = $_POST[ 'status' ];

			if ( empty( $aname ) || empty( $pdate ) || empty( $pfrom ) || empty( $manufacturer ) || empty( $model ) || empty( $sn ) || empty( $condition ) || empty( $warend ) || empty( $warranty ) || empty( $amount ) || empty( $method ) || empty( $desc ) || empty( $status ) ) {

				echo "<br /><font color='red'>Please complete all fields.</font><br />";
			} elseif ( !preg_match_all( "/[a-zA-Z0-9]/m", $aname ) ) {
				echo "<br /><font color='red'>Illegal characters found in Asset name text field.</font><br />";
			} elseif ( !preg_match_all( "/[a-zA-Z0-9]/m", $pfrom ) ) {
				echo "<br /><font color='red'>Illegal characters found in purchase from text field.</font><br />";
			} elseif ( !preg_match_all( "/[a-zA-Z0-9]/m", $manufacturer ) ) {
				echo "<br /><font color='red'>Illegal characters found in manufacture text field.</font><br />";
			} elseif ( !preg_match_all( "/[a-zA-Z0-9]/m", $model ) ) {
				echo "<br /><font color='red'>Illegal characters found in model text field.</font><br />";
			} elseif ( !preg_match_all( "/[a-zA-Z0-9]/m", $sn ) ) {
				echo "<br /><font color='red'>Illegal characters found in serial number text field.</font><br />";
			} elseif ( !preg_match_all( "/[a-zA-Z]/m", $condition ) ) {
				echo "<br /><font color='red'>Illegal characters found in condition text field.</font><br />";
			} elseif ( !preg_match_all( "/[0-9]/m", $amount ) ) {
				echo "<br /><font color='red'>Illegal characters found in value text field.</font><br />";
			} elseif ( !preg_match_all( "/[0-9]/m", $warranty ) ) {
				echo "<br /><font color='red'>Illegal characters found in warranty text field.</font><br />";
			} else {

				mysqli_query( $connection, "INSERT INTO `assets`(`ID`, `item_name`, `date`, `management_ID`, `purchase_from`, `model`, `manufacture`, `s/n`, `condition`, `warranty`, `method`, `warranty_end`, `worth`, `description`, `status`) 	VALUES('','$aname','$pdate',$staff,'$pfrom','$manufacturer','$model','$sn','$condition','$warranty','$method','$warend',$amount,'$desc','$status')" );

				echo "<br /><font color='green'>Assets has been added.</font><br />";
			}
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
									<select class="select floating" name="method" required="required">
										<option value=""> -- Select -- </option>
										<option value="Cash">Cash</option>
										<option value="Direct Debit">Direct Debit</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-groups">
									<label>Teachers</label>
									<select name="teachers" required="required" class="select floating">
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
									<select class="select" name="status" required="required">
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
