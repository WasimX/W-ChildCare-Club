<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include( 'database/db.php' );

// Selecting Database
$db = mysqli_select_db($connection, "wmushta3");

// Storing Session
if(isset($_SESSION['login_user'])){
$username=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection, "SELECT * FROM user WHERE username='$username'" );
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];}
if(!isset($login_session)){
	
// Closing Connection
mysqli_close($connection); 
}
?>
