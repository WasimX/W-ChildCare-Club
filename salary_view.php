<!DOCTYPE html>
<html>

<head>

	<?php
	include( 'database/db.php' );
	include("navigation.php");
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<title>Payslip</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<?php

$raw_results = mysqli_query( $connection, "SELECT salary_m.sID AS s_id, salary_m.management_ID AS sm_id, salary_m.amount, management.ID, management.fname, management.lname, management.email, management.photo, management.date_join, management.job_role, salary_m.tdate , salary_m.month, salary_m.year, management.NI FROM management INNER JOIN salary_m ON management.ID = salary_m.management_ID" );

?>

<div class="main-wrapper">
	<div class="page-wrapper">
		<div class="content container-fluid">
			<div class="row">
				<div class="col-xs-8">
					<h4 class="page-title">Payslip</h4>
				</div>
				<div class="col-sm-4 text-right m-b-30">
					<div class="btn-group btn-group-sm">
						<button class="btn btn-default">CSV</button>
						<button class="btn btn-default">PDF</button>
						<button class="btn btn-default"><i class="fa fa-print fa-lg"></i> Print</button>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-md-12">

					<?php

					while ( $row = mysqli_fetch_array( $raw_results ) ) {
						$id = $row[ 's_id' ];
						?>
					<div class="card-box">
						<h4 class="payslip-title">Payslip for the month of <?php echo $row['month'], " " , $row['year'] ?></h4>
						<div class="row">
							<div class="col-md-6 m-b-20">
								<img src="assets/img/152.png" class="m-b-20" alt="" style="width: 100px;">
								<ul class="list-unstyled m-b-0">
									<li>W Childcare Club</li>
									<li>51 Jervaulx Crescent</li>
									<li>Bradford BD8 8JD</li>
									<li>BD8 8JD</li>
									<li>01274 739205</li>
								</ul>
							</div>
							<div class="col-md-6 m-b-20">
								<div class="invoice-details">
									<h3 class="text-uppercase">Payslip #<?php echo $row['s_id'] ?></h3>
									<ul class="list-unstyled">
										<li>Salary Month:
											<?php echo $row['month'], " " , $row['year'] ?>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 m-b-20">
								<ul class="list-unstyled">
									<li>
										<h5 class="m-b-0"><strong><?php  echo $row['fname'], " " , $row['lname'] ?></strong></h5>
									</li>
									<li>
										<?php $row['job_role'] ?>
									</li>
									<li>Employee ID:
										<?php echo $row['ID'] ?>
									</li>
									<li>Joining Date:
										<?php echo $row['date_join'] ?>
									</li>
									<li>National Insureance Number:
										<?php echo $row['NI'] ?>
									</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12" align="center">
								<h4 class="m-b-10"><strong>Earnings</strong></h4>
								<table class="table table-bordered" align="center">
									<tbody>
										<tr>
											<td><strong>Basic Salary</strong> </td>
										</tr>
										<tr>
											<td><strong>Hourly pay</strong> <span class="pull-right">7.38</span>
											</td>
										</tr>
										<tr>
											<td><strong>Hours</strong> <span class="pull-right">5</span>
											</td>
										</tr>
										<tr>
											<td><strong>Overtime</strong> <span class="pull-right">5</span>
											</td>
										</tr>
										<tr>
											<td><strong>Total Earnings</strong> <span class="pull-right"><strong><?php echo $row['amount']?></strong></span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<br>
						</div>
					</div>
					<?php
					}
					?>
				</div>

			</div>
		</div>



	</div>
</div>

<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
</body>