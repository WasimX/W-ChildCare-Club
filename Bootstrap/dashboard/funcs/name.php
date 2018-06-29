<?php

function name() {

	include_once( '../database/db.php' );
	include( "../session.php" );


	if ( isset( $_SESSION[ 'login_user' ] ) ) {
		$search = mysqli_query( $connection, "SELECT * FROM user WHERE username='$username'" );
		$accesslvl = mysqli_fetch_object( $search );
	}

	if ( isset( $_SESSION[ 'login_user' ] ) ) {
		if ( $_SESSION[ 'login_user' ] && $_SESSION[ 'login_user' ] == true ) {
			echo $login_session;
		}
	}
}
?>
