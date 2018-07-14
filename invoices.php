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
	<title>Invoice</title>
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
						<h4 class="page-title">Invoices</h4>
					</div>
					<div class="col-sm-4 text-right m-b-30">
						<a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#create_invoice"><em class="fa fa-plus"></em>Create New Invoice</a>
					</div>
				</div>
				<div class="row filter-row">
					<div class="col-sm-3 col-xs-6">
						<div class="form-group form-focus">
							<label class="control-label">From</label>
							<div class="cal-icon"><input class="form-control floating datetimepicker" type="text">
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-6">
						<div class="form-group form-focus">
							<label class="control-label">To</label>
							<div class="cal-icon"><input class="form-control floating datetimepicker" type="text">
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-6">
						<div class="form-group form-focus select-focus">
							<label class="control-label">Status</label>
							<select class="select floating">
								<option value="">Select Status</option>
								<option value="">Pending</option>
								<option value="1">Paid</option>
								<option value="1">Partially Paid</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3 col-xs-6">
						<a href="#" class="btn btn-success btn-block"> Search </a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table m-b-0">
								<thead>
									<tr>
										<th>#</th>
										<th>Invoice Number</th>
										<th>Client</th>
										<th>Created Date</th>
										<th>Due Date</th>
										<th>Amount</th>
										<th>Status</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td><a href="invoice-view.html">#INV-0001</a>
										</td>
										<td>Global Technologies</td>
										<td>1 Sep 2017</td>
										<td>7 Sep 2017</td>
										<td>$2099</td>
										<td><span class="label label-success-border">Paid</span>
										</td>
										<td class="text-right">
											<div class="dropdown">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<ul class="dropdown-menu pull-right">
													<li><a href="#" data-toggle="modal" data-target="#edit_invoice" data- title="Edit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													</li>
													<li><a href="invoice_view.php"><i class="fa fa-eye m-r-5"></i> View</a>
													</li>
													<li><a href="#" data-href="#" data-toggle="modal" data-target="#delete_invoice" title="Delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</li>
												</ul>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		
		
		
			<!--                add-->

			<div id="create_invoice" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Add Invoice</h4>
						</div>

						<div class="row">
							<div class="col-md-12">
								<form>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label>Client <span class="text-danger">*</span></label>
												<select class="select">
													<option>Please Select</option>
													<option selected>Barry Cuda</option>
													<option>Tressa Wexler</option>
												</select>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Project <span class="text-danger">*</span></label>
												<select class="select">
													<option>Select Project</option>
													<option selected>Food and Drinks</option>
													<option>School Guru</option>
												</select>
											</div>
										</div>

										<div class="col-sm-3">
											<div class="form-group">
												<label>Email</label>
												<input class="form-control" type="email">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Tax</label>
												<select class="select">
													<option>Select Tax</option>
													<option>VAT</option>
													<option>GST</option>
													<option>No Tax</option>
												</select>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Client Address</label>
												<textarea class="form-control" rows="3"></textarea>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Billing Address</label>
												<textarea class="form-control" rows="3"></textarea>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Invoice date <span class="text-danger">*</span></label>
												<div class="cal-icon"><input class="form-control datetimepicker" type="text">
												</div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Due Date <span class="text-danger">*</span></label>
												<div class="cal-icon"><input class="form-control datetimepicker" type="text">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="table-responsive">
												<table class="table table-hover table-white">
													<thead>
														<tr>
															<th style="width: 20px">#</th>
															<th class="col-sm-2">Item</th>
															<th class="col-md-6">Description</th>
															<th style="width:100px;">Unit Cost</th>
															<th style="width:80px;">Qty</th>
															<th>Amount</th>
															<th> </th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>
																<input class="form-control" type="text" style="min-width:150px">
															</td>
															<td>
																<input class="form-control" type="text" style="min-width:150px">
															</td>
															<td>
																<input class="form-control" style="width:100px" type="text">
															</td>
															<td>
																<input class="form-control" style="width:80px" type="text">
															</td>
															<td>
																<input class="form-control" readonly style="width:120px" type="text">
															</td>
															<td><a href="javascript:void(0)" class="text-success font-18" title="Add"><i class="fa fa-plus"></i></a>
															</td>
														</tr>
														<tr>
															<td>2</td>
															<td>
																<input class="form-control" type="text" style="min-width:150px">
															</td>
															<td>
																<input class="form-control" type="text" style="min-width:150px">
															</td>
															<td>
																<input class="form-control" style="width:100px" type="text">
															</td>
															<td>
																<input class="form-control" style="width:80px" type="text">
															</td>
															<td>
																<input class="form-control" readonly style="width:120px" type="text">
															</td>
															<td><a href="javascript:void(0)" class="text-danger font-18" title="Remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="table-responsive">
												<table class="table table-hover table-white">
													<tbody>
														<tr>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td class="text-right">Total</td>
															<td style="text-align: right; padding-right: 30px;width: 230px">0</td>
														</tr>
														<tr>
															<td colspan="5" class="text-right">Tax</td>
															<td style="text-align: right; padding-right: 30px;width: 230px">
																<input class="form-control text-right" value="0" readonly type="text">
															</td>
														</tr>
														<tr>
															<td colspan="5" class="text-right">
																Discount %
															</td>
															<td style="text-align: right; padding-right: 30px;width: 230px">
																<input class="form-control text-right" type="text">
															</td>
														</tr>
														<tr>
															<td colspan="5" style="text-align: right; font-weight: bold">
																Grand Total
															</td>
															<td style="text-align: right; padding-right: 30px; font-weight: bold; font-size: 16px;width: 230px">
																$ 0.00
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label>Other Information</label>
														<textarea class="form-control"></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
									<button class="btn btn-primary">Save & Send</button> <button class="btn btn-primary">Save</button>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>




			<!--                edit-->

			<div id="edit_invoice" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Update Invoice</h4>
						</div>
						<div class="modal-body">


							<div class="col-md-12">
								<form>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label>Client <span class="text-danger">*</span></label>
												<select class="select">
													<option>Please Select</option>
													<option selected>Barry Cuda</option>
													<option>Tressa Wexler</option>
												</select>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Project <span class="text-danger">*</span></label>
												<select class="select">
													<option>Select Project</option>
													<option selected>Food and Drinks</option>
													<option>School Guru</option>
												</select>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Email</label>
												<input class="form-control" type="email" value="barrycuda@example.com">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Tax</label>
												<select class="select">
													<option>Select Tax</option>
													<option>VAT</option>
													<option selected>GST</option>
													<option>No Tax</option>
												</select>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Client Address</label>
												<textarea class="form-control" rows="3">5754 Airport Rd, Coosada, AL, 36020</textarea>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Billing Address</label>
												<textarea class="form-control" rows="3">5754 Airport Rd, Coosada, AL, 36020</textarea>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Invoice date <span class="text-danger">*</span></label>
												<div class="cal-icon"><input class="form-control datetimepicker" type="text" value="2017/09/20">
												</div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Due Date <span class="text-danger">*</span></label>
												<div class="cal-icon"><input class="form-control datetimepicker" type="text" value="2017/09/27">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="table-responsive">
												<table class="table table-hover table-white">
													<thead>
														<tr>
															<th style="width: 20px">#</th>
															<th class="col-sm-2">Item</th>
															<th class="col-md-6">Description</th>
															<th style="width:100px;">Unit Cost</th>
															<th style="width:80px;">Qty</th>
															<th>Amount</th>
															<th></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>
																<input class="form-control" type="text" value="Vehicle Module" style="min-width:150px">
															</td>
															<td>
																<input class="form-control" type="text" value="Create, edit delete functionlity" style="min-width:150px">
															</td>
															<td>
																<input class="form-control" style="width:100px" type="text" value="112">
															</td>
															<td>
																<input class="form-control" style="width:80px" type="text" value="1">
															</td>
															<td>
																<input class="form-control" readonly style="width:120px" type="text" value="112">
															</td>
															<td><a href="javascript:void(0)" class="text-success font-18" title="Add"><i class="fa fa-plus"></i></a>
															</td>
														</tr>
														<tr>
															<td>2</td>
															<td>
																<input class="form-control" type="text" value="Vehicle Module" style="min-width:150px">
															</td>
															<td>
																<input class="form-control" type="text" value="Create, edit delete functionlity" style="min-width:150px">
															</td>
															<td>
																<input class="form-control" style="width:100px" type="text" value="112">
															</td>
															<td>
																<input class="form-control" style="width:80px" type="text" value="1">
															</td>
															<td>
																<input class="form-control" readonly style="width:120px" type="text" value="112">
															</td>
															<td><a href="javascript:void(0)" class="text-danger font-18" title="Remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="table-responsive">
												<table class="table table-hover table-white">
													<tbody>
														<tr>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td class="text-right">Total</td>
															<td style="text-align: right; width: 230px">112</td>
														</tr>
														<tr>
															<td colspan="5" style="text-align: right">Tax</td>
															<td style="text-align: right;width: 230px">
																<input class="form-control text-right" value="0" readonly type="text">
															</td>
														</tr>
														<tr>
															<td colspan="5" style="text-align: right">
																Discount %
															</td>
															<td style="text-align: right; width: 230px">
																<input class="form-control text-right" value="0" type="text">
															</td>
														</tr>
														<tr>
															<td colspan="5" style="text-align: right; font-weight: bold">
																Grand Total
															</td>
															<td style="text-align: right; font-weight: bold; font-size: 16px;width: 230px">
																$ 112
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label>Other Information</label>
														<textarea class="form-control" rows="4"></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
									<button class="btn btn-primary">Save Invoice</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>



			<!--delete-->

			<div id="delete_invoice" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Delete Invoice</h4>
						</div>
						<form method="post">
							<div class="modal-body card-box">

								<p>Are you sure want to delete this?</p>
								<div class="m-t-20 text-left">
									<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
									<button type="submit" class="btn btn-danger btn-ok">Delete</button>
								</div>
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