<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "wmushta3";

$connection = mysqli_connect( $hostname, $username, $password, $dbname );
if ( !$connection ) {
	die( "Database Connection Failed" . mysqli_error( $connection ) );
}
$select_db = mysqli_select_db( $connection, $dbname );
if ( !$select_db ) {
	die( "Database Selection Failed" . mysqli_error( $connection ) );
}
?>