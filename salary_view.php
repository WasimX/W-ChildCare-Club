<!DOCTYPE html>
<html>

<head>

	<?php
	include( 'database/db.php' );
	include( "navigation.php" );
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

if ( isset( $_GET[ 'id' ] ) ) {
	$ID = $_GET[ 'id' ];

	$raw_results = mysqli_query( $connection, "SELECT salary_m.sID AS s_id, salary_m.management_ID AS sm_id, salary_m.amount, management.ID, management.fname, management.lname, management.email, management.photo, management.date_join, management.job_role, salary_m.tdate , salary_m.month, salary_m.year, management.NI, salary_m.period, management.hourly_pay, salary_m.overtime, salary_m.hours 
	FROM management INNER JOIN salary_m ON management.ID = salary_m.management_ID WHERE sID = $ID" );

}

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
						<button class="btn btn-default" href="#null" onclick="printContent('printthis')"><i class="fa fa-print fa-lg"></i> Print</button>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">

					<?php
					while ( $row = mysqli_fetch_array( $raw_results ) ) {
						$id = $row[ 's_id' ];
						?>
						<div id=printthis>
					<div class="card-box">
						<h4 class="payslip-title">Payslip for the week of <?php echo $row['period']?></h4>
						<div class="row">
							<div class="col-md-6 m-b-20">
								<img src="assets/img/152.png" class="m-b-20" alt="" style="width: 100px;">
								<ul class="list-unstyled m-b-0" style="list-style-type: none;">
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
									<ul class="list-unstyled" style="list-style-type: none;">
										<li>Salary Week:
											<?php echo $row['period'] ?>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 m-b-20">
								<ul class="list-unstyled" style="list-style-type: none;">
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
									<li>National Insurance Number:
										<?php echo $row['NI'] ?>
									</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<h4 class="m-b-10" align="center"><strong>Earnings</strong></h4>
								<table class="table">
									<tbody>
										<tr>
											<td><strong>Basic Salary</strong></td> <td> </td>
										</tr>
										<tr>
											<td><strong>Hourly pay</strong> </td> <td> <span class="pull-right"><?php echo $row['hourly_pay'] ?></span>
											</td>
										</tr>
										<tr>
											<td><strong>Hours</strong> </td> <td> <span class="pull-right"><?php echo $row['hours'] ?></span>
											</td>
										</tr>
										<tr>
											<td><strong>Overtime</strong> </td> <td> <span class="pull-right"><?php echo $row['overtime'] ?></span>
											</td>
										</tr>
										<tr>
											<td><strong>Total Earnings</strong> </td> <td> <span class="pull-right"><strong><?php echo $row['amount']?></strong></span>
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
</div>

	<script type="text/javascript">
		<!--
		function printContent( id ) {
			str = document.getElementById( id ).innerHTML
			newwin = window.open( '', 'printwin', 'left=100,top=100,width=800,height=800' )
			newwin.document.write( '<HTML><HEAD> <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/style.css\"/>' )
			newwin.document.write( '<TITLE>Print Page</TITLE>\n' )
			newwin.document.write( '<script>\n' )
			newwin.document.write( 'function chkstate(){\n' )
			newwin.document.write( 'if(document.readyState=="complete"){\n' )
			newwin.document.write( 'window.close()\n' )
			newwin.document.write( '}\n' )
			newwin.document.write( 'else{\n' )
			newwin.document.write( 'setTimeout("chkstate()",2000)\n' )
			newwin.document.write( '}\n' )
			newwin.document.write( '}\n' )
			newwin.document.write( 'function print_win(){\n' )
			newwin.document.write( 'window.print();\n' )
			newwin.document.write( 'chkstate();\n' )
			newwin.document.write( '}\n' )
			newwin.document.write( '<\/script>\n' )
			newwin.document.write( '</HEAD>\n' )
			newwin.document.write( '<BODY onload="print_win()">\n' )
			newwin.document.write( str )
			newwin.document.write( '</BODY>\n' )
			newwin.document.write( '</HTML>\n' )
			newwin.document.close()
		}
		//-->
	</script>


</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
</body>