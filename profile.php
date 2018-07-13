<!DOCTYPE html>
<html>
    <head>
       <?php
       session_start();
       include( "session.php" );
       include( "navigation.php" );
       $result = mysqli_query( $connection, "SELECT * FROM management WHERE username = '" . $_SESSION[ 'login_user' ] . "'" )
       or die( mysqli_error() );
       ?>
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <title>Profile</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
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
						<div class="col-sm-8">
							<h4 class="page-title">My Profile</h4>
						</div>
						
						<div class="col-sm-4 text-right m-b-30">
							<a href="edit-profile.php" class="btn btn-primary rounded"><i class="fa fa-plus"></i> Edit file</a>
						</div>
					</div>
					<div class="card-box">
						<div class="row">
							<div class="col-md-12">
								<div class="profile-view">
								
								<?php 		
									while ( $row = mysqli_fetch_array( $result ) ) {?>
								
									<div class="profile-img-wrap">
										<div class="profile-img">
											<a href="#"><img src="<?php echo $row['photo']; ?>" alt=""></a>
										</div>
									</div>
									<div class="profile-basic">
										<div class="row">
											<div class="col-md-5">
												<div class="profile-info-left">
													<h3 class="user-name m-t-0 m-b-0"><?php echo $row['fname'],' ', $row['lname']; ?> </h3>
													<small class="text-muted"><?php echo $row['job_role']; ?></small>
													
													<ul class="personal-info">
													<li>
														<span class="title">Employee ID:</span>
														<span class="text"><?php  echo $row['ID']; ?></span>
													</li>
													<li>
														<span class="title">Username:</span>
														<span class="text"><a href=""><?php  echo $row['username']; ?></a></span>
													</li>
													<li>
														<span class="title">Date Joined:</span>
														<span class="text"><?php  echo $row['date_join']; ?></span>
													</li>
													<li>
														<span class="title">Last Login</span>
														<span class="text"><?php  echo $row['last_login']; ?></span>
													</li>
													<li>
														<span class="title"></span>
														<span class="text"></span>
													</li>
												</ul>
												</div>
											</div>
											<div class="col-md-7">
												<ul class="personal-info">
													<li>
														<span class="title">Phone:</span>
														<span class="text"><a href=""><?php  echo $row['phone']; ?></a></span>
													</li>
													<li>
														<span class="title">Mobile:</span>
														<span class="text"><a href=""><?php  echo $row['mobile']; ?></a></span>
													</li>
													<li>
														<span class="title">Emergency Number:</span>
														<span class="text"><a href=""><?php  echo $row['Em_number']; ?></a></span>
													</li>
													<li>
														<span class="title">Email:</span>
														<span class="text"><a href=""><?php  echo $row['email']; ?></a></span>
													</li>
													<li>
														<span class="title">Birthday:</span>
														<span class="text"><?php  echo $row['dob']; ?></span>
													</li>
													<li>
														<span class="title">Address:</span>
														<span class="text"><?php  echo $row['address']; ?></span>
													</li>
													<li>
														<span class="title">Gender:</span>
														<span class="text"><?php  echo $row['gender']; ?></span>
													</li>

												</ul>
											</div>
											<?php }?>
										</div>
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
</html>