<?php

function adminPriv() {

	include_once( 'database/db.php' );
	include( "session.php" );
	$obj = new Databases;

	if ( isset( $_SESSION[ 'login_user' ] ) ) {
		$search = mysqli_query( $obj->con, "SELECT * FROM user WHERE username='$username'" );
		$accesslvl = mysqli_fetch_object( $search );
	}

	if ( isset( $_SESSION[ 'login_user' ] ) ) {
		if ( $_SESSION[ 'login_user' ] && $_SESSION[ 'login_user' ] == true ) {
			echo "<p>You have logged in as $login_session. </p>
			<p>Your UB Number is $login_UB. </p>"
			?>
			<a href = "logout.php" > Log Out </a><br>
			<?php if ($accesslvl->adminPriv != 0){ ?>
			<a href = "panel.php" > Control Panel </a><br>
				<br>
				<?php  
										 }
			}
		} 
		else { ?>
				<a href="loginpage.php" align="left"><h2> Login </h2></a>
				<?php
				}
				}
				?>
