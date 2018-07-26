<!doctype html>
<html>

<head>
	<?php
	include( "database/db.php" );
	include( "navigation.php" );
	?>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<title>Mailer</title>
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
					<div class="col-xs-4">
						<h4 class="page-title"> Mass Mailer </h4>
					</div>
				</div>

				<div class="col-md-7">
					<ul class="personal-info">
						<li>
							<span class="title">Mailing List</span>
							<span class="text">
							<a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#mail_list">Form</a></span>
						
						</li>
						<li>
							<span class="title">Send Message</span>
							<span class="text">
							<a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#message">Form</a></span>
						
						</li>
						<li>
							<span class="title">Mass Message</span>
							<span class="text">
							<a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#mass_message">Form</a></span>
						
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="mail_list" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-content modal-lg">
					<div class="modal-header">
						<h4 class="modal-title"> Mailing List</h4>
					</div>
					<div class="modal-body">
						<form method="post">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Name</label>
										<input class="form-control" type="text" name="name">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Email Address</label>
										<input class="form-control" type="text" name="address">
									</div>
								</div>
							</div>
							<div class="m-t-20 text-center">
								<button class="btn btn-primary" name="submit_mail">Add to List</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php if ( isset( $_POST[ 'submit_mail' ] ) ) {

		$name = addslashes( strip_tags( $_POST[ 'name' ] ) );
		$address = addslashes( strip_tags( $_POST[ 'address' ] ) );

		$query = mysqli_query( $connection, "INSERT INTO `mail_list`(`name`, `email`) VALUES ('$name','$address')" )or die( mysqli_error( $connection ) );
}
	?>
		<div id="message" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-content modal-lg">
					<div class="modal-header">
						<h4 class="modal-title">Custom Mailer</h4>
					</div>
					<div class="modal-body">
						<form method="post">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Email Address</label>
										<input class="form-control" type="text" name="email">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Subject</label>
										<input class="form-control" type="text" name="subject">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Message</label>
										<textarea class="form-control" rows="6" name="message"></textarea>
									</div>
								</div>
							</div>
							<div class="m-t-20 text-center">
								<button class="btn btn-primary" type="submit" name="submit_dir">Send</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
		if ( isset( $_POST[ 'submit_dir' ] ) ) {

			$email = $_POST[ 'email' ];
			$subject = $_POST[ 'subject' ];
			$date = date( 'Y-m-d H:i:s' );
			$message = $_POST[ 'message' ];
			
			mysqli_query ($connection , "INSERT INTO `email_log`(`email`, `subject`, `message`, `date_sent`) VALUES ('$email','$subject','$message','$date')");

			mail( $email, $subject, $message, 'From: No Reply <NoReply@WChildCare.co.uk>' );

			echo "Message Sent!";
		}
		?>

		<div id="mass_message" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-content modal-lg">
					<div class="modal-header">
						<h4 class="modal-title">Mass Mailer</h4>
					</div>
					<div class="modal-body">
						<form method="post">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Subject</label>
										<input class="form-control" type="text" name="subject">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Message</label>
										<textarea class="form-control" name="message"></textarea>
									</div>
								</div>
							</div>
							<div class="m-t-20 text-center">
								<button class="btn btn-primary" name="submit_mass">Send</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php

		if ( isset( $_POST[ 'submit_mass' ] ) ) {

			$sql = "SELECT email FROM mail_list";
			$dbemail = mysqli_query( $connection, $sql );

			while ( $row = mysqli_fetch_array( $dbemail ) ) {

				$email_array[] = $row[ 'email' ];

			}

			$email = implode( ", ", $email_array );
			echo $email;

			$subject = $_POST[ 'subject' ];
			$message = $_POST[ 'message' ];
			$date = date( 'Y-m-d H:i:s' );

			$message_body = "<p>$message</p>"; //create HTML Email

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: No Reply <NoReply@WChildCare.co.uk>' . "\r\n";

			
				mysqli_query ($connection , "INSERT INTO `email_log`(`email`, `subject`, `message`, `date_sent`) VALUES ('$email','$subject','$message','$date')");

			
			mail( $email, $subject, $message_body, $headers );

			echo "Mail Sent!";
		}
		?>

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