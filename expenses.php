<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <title>Expense</title>
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
						<div class="col-sm-8 col-xs-6">
							<h4 class="page-title">Expenses</h4>
						</div>
						<div class="col-sm-4 col-xs-6 text-right m-b-30">
							<a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_expense"><i class="fa fa-plus"></i> Add Expense</a>
						</div>
					</div>
					<div class="row filter-row">
						<div class="col-sm-3 col-md-2 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Item Name</label>
								<input type="text" class="form-control floating" />
							</div>
						</div>
						<div class="col-sm-3 col-md-2 col-xs-6">  
							<div class="form-group form-focus select-focus">
								<label class="control-label">Purchased By</label>
								<select class="select floating"> 
									<option value=""> -- Select -- </option>
									<option value="">Loren Gatlin</option>
									<option value="1">Tarah Shropshire</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-md-2 col-xs-6"> 
							<div class="form-group form-focus select-focus">
								<label class="control-label">Paid By</label>
								<select class="select floating"> 
									<option value=""> -- Select -- </option>
									<option value="0"> Cash </option>
									<option value="1"> Cheque </option>
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-md-2 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">From</label>
								<div class="cal-icon"><input class="form-control floating datetimepicker" type="text"></div>
							</div>
						</div>
						<div class="col-sm-3 col-md-2 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">To</label>
								<div class="cal-icon"><input class="form-control floating datetimepicker" type="text"></div>
							</div>
						</div>
						<div class="col-sm-3 col-md-2 col-xs-6">  
							<a href="#" class="btn btn-success btn-block"> Search </a>  
						</div>     
                    </div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table m-b-0 datatable">
									<thead>
										<tr>
											<th>Item</th>
											<th>Purchase From</th>
											<th>Purchase Date</th>
											<th>Purchased By</th>
											<th>Amount</th>
											<th>Paid By</th>
											<th class="text-center">Status</th>
											<th class="text-right">Actions</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<strong><?php echo $asset_name ?></strong>
											</td>
											<td><?php echo $bought_from ?></td>
											<td><?php date ?></td>
											<td><?php who bought it ?></td>
											<td><?php amount ?></td>
											<td><?php how was it paid? ?></td>
											<td class="text-center">
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-danger"></i> Pending <i class="caret"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#"><i class="fa fa-dot-circle-o text-danger"></i> Pending</a></li>
														<li><a href="#"><i class="fa fa-dot-circle-o text-success"></i> Approved</a></li>
													</ul>
												</div>
											</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_expense"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
														<li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_expense"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
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
				
							
							
				
				
			<div id="delete_expense" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Delete Expense</h4>
						</div>
						<div class="modal-body card-box">
							<p>Are you sure want to delete this expense?</p>
							<div class="m-t-20 text-left">
								<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="add_expense" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Add Expense</h4>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Item Name</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Purchase From</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Purchase Date</label>
											<div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Purchased By </label>
											<select class="select">
												<option><?php $teacher_id ?></option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Amount</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Paid By</label>
											<select class="select">
												<option>Cash</option>
												<option>DD</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Status</label>
											<select class="select">
												<option>Pending</option>
												<option>Approved</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Attachments</label>
											<input class="form-control" type="file">
										</div>
									</div>
								</div>
								<div class="attach-files">
									<ul>
										<li>
											<img src="assets/img/user.jpg" alt="">
											<a href="#" class="fa fa-close file-remove"></a>
										</li>
										<li>
											<img src="assets/img/user.jpg" alt="">
											<a href="#" class="fa fa-close file-remove"></a>
										</li>
									</ul>
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Create Expense</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			
			
			<div id="edit_expense" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Edit Expense</h4>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Item Name</label>
											<input class="form-control" value="Dell Laptop" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Purchase From</label>
											<input class="form-control" value="Amazon" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Purchase Date</label>
											<div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Purchased By </label>
											<select class="select">
												<option>Daniel Porter</option>
												<option>Roger Dixon</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Amount</label>
											<input placeholder="$50" class="form-control" value="$10000" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Paid By</label>
											<select class="select">
												<option>Cash</option>
												<option>Cheque</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Status</label>
											<select class="select">
												<option>Pending</option>
												<option>Approved</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Attachments</label>
											<input class="form-control" type="file">
										</div>
									</div>
								</div>
								<div class="attach-files">
									<ul>
										<li>
											<img src="assets/img/user.jpg" alt="">
											<a href="#" class="fa fa-close file-remove"></a>
										</li>
										<li>
											<img src="assets/img/user.jpg" alt="">
											<a href="#" class="fa fa-close file-remove"></a>
										</li>
									</ul>
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Save Changes</button>
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