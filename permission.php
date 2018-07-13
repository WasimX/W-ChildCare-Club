<!DOCTYPE html>
<html>

<?php
include( "navigation.php" );
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<title>Permissions</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/summernote/dist/summernote.css">
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
					<div class="col-xs-4">
						<h4 class="page-title">Register</h4>
					</div>
				</div>

				<form action="" method="POST" name="form1">
					<?php if( "staffpos"){ ?>
					<table class="table1px" width="80%" align="center" cellpadding="0" cellspacing="0">
						<tbody align="center">
							<tr>
								<th height="30" colspan="2" class="gradient">Give Staff Positions</th>
							</tr>
							<tr>
								<td width="65%" align="center" class="tableborder"> Here you can grant addition permission to an individual.<br/>
								</td>
							</tr>
							<tr>
								<td><input name="staffusername" type="text" class="textbox" placeholder="Enter Name Here"/>
								</td>
							</tr>
							<tr>
								<td>
									<select name="staffposition" class="textbox">
										<option value="Normal User">Normal User</option>
										<option value="Staff">Staff User</option>
										<option value="Admin">Administrator</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><input type="submit" name="makestaff" value="Submit Action" class="custombutton"/>
								</td>
							</tr>
						</tbody>
					</table>

					<!-- display staff -->
					<table class="table1px" width="80%" border="0" cellpadding="0" cellspacing="0" align="center">
						<tr>
							<th height="30" align="center" colspan="4" class="gradient">Administrators</th>
						</tr>
						<tr>
							<td class="tableborder" width="25%" align="center"><u>Username</u>
							</td>
							<td class="tableborder" width="25%" align="center"><u>Status</u>
							</td>
						</tr>
						<?php
						$tsel = mysqli_query( $obj->con, "SELECT * FROM `user` WHERE `adminPriv`!='0' ORDER BY `userID` DESC" );
						while ( $top = mysqli_fetch_array( $tsel ) ) {
							print "
		<tr>
		<td class=\"tableborder\" width=\"50%\" align=\"center\">$top[username]</a></td>
		<td class=\"tableborder\" width=\"50%\" align=\"center\">$top[adminPriv]</td>";
						}
						}
						?>
					</table>
				</form>






			</div>
		</div>
	</div>

	<div class="sidebar-overlay" data-reff="#sidebar"></div>
	<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
	<script type="text/javascript" src="assets/js/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript" src="assets/plugins/summernote/dist/summernote.min.js"></script>
</body>

</html>