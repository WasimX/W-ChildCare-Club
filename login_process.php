<?php
session_start(); // Starting Session

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include( 'database/db.php' );

$error = ''; // Variable To Store Error Message

if ( isset( $_POST[ 'submit' ] ) ) {
	if ( empty( $_POST[ 'username' ] ) || empty( $_POST[ 'password' ] ) ) {
		$error = "Username or Password is invalid";
	} else {
		// Define $username and $password
		$username = $_POST[ 'username' ];
		$password = $_POST[ 'password' ];
		
		// To protect MySQL injection for Security purpose
		$username = stripslashes( $username );
		$password = stripslashes( $password );
		$username = mysqli_real_escape_string( $connection, $username );
		$password = mysqli_real_escape_string( $connection, $password );
		
		// Selecting Database
		$select_db = mysqli_select_db( $connection, $dbname );
		
		// SQL query to fetch information of registerd users and finds user match.
		$query = mysqli_query( $connection, "select * from management where password='$password' AND username='$username'" );
		$rows = mysqli_num_rows( $query );
		if ( $rows == 1 ) {
			$_SESSION[ 'login_user' ] = $username; // Initializing Session
			header( "location: Dashboard.php" ); // Redirecting To Other Page --- MODIFY!!!
		} else {
			$error = "Username or Password is invalid";
		}
		mysqli_close( $connection ); // Closing Connection
	}
}
?>