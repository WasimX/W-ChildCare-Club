<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Forgot Password</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div align="center">
  <form method="post" action="">
    <?php $reset='';
			echo"$reset"; ?>
    <table width="30%" border="0" align="center">
      <tbody align="center">
        <tr>
          <td><p>Lost Password</p></td>
        </tr>
        <tr>
          <td><input name="username" type="text" placeholder="Username"></td>
        </tr>
        <tr>
          <td><input name="email" type="email" placeholder="Email"/></td>
        </tr>
        <tr>
          <td><p>
              <input type="submit" value="Recover">
            </p></td>
        </tr>
        <tr>
          <td colspan="2"><p><a href="login.php">Login</a> | <a href="register.php">Register</a> </p></td>
        </tr>
      </tbody>
    </table>
  </form>
</div>
</body>
</html>
<?php //module for password retrieval
include_once 'database/db.php';
if (isset ($_POST['email'])){
$email = strip_tags( $_POST[ 'email' ] );
if (isset ($_POST['username'])){
$user = strip_tags( $_POST[ 'username' ] );
$new_pass = round( rand( 1000, 9999999 ) - rand( 1, 100 ) / 3 + 2 - 100 );
$check = mysqli_query( $connection, "SELECT * FROM user WHERE email='$email'" );
$check2 = mysqli_query( $connection, "SELECT * FROM user WHERE username='$user'" );
$num = mysqli_num_rows( $check );
$num2 = mysqli_num_rows( $check2 );
$fetch = mysqli_fetch_object( $check );

if ( $num == "0" ) {
	$message = "The email entered has not been recognised.";
} else {
	if ( $num2 == "0" ) {
		$message = "The username entered has not been recognised.";
	} else {


		if ( $num == "0" ) {
			echo "No accounts with that email have been recognised.";
		} else {

			mysqli_query( $connection, "UPDATE user SET password='$new_pass' WHERE email='$email' AND username='$username'" );


			// Let's mail the user! 
			$subject = "Lost Password!";
			$message = "Dear $fetch->username, 
    
    You recently requested your password to be sent to you.
	
	Username: $fetch->username
	Password: $fetch->password
	
	If you didn't request your password to be sent to you then someone may be trying to access you account. We reccommend that you change both your password and email.
	
	Regards,
	Wasim.";

			    mail($email, $subject, $message, 
        "From: GEECs Magazine <noreply@idk.co.uk>"); 
    echo $reset; 

$reset = "Your password has been sent to your email. Please check your junk mail!"; 


			
		}
	}
}
}
}
?>