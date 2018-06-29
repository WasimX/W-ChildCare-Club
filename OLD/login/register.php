<head>
<title>Register</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="login">
  <form method="post" style="text-align: center">
    <table align="center">
     <tbody align="center"></tbody>
      <tr>
        <td><p>Register</p></td>
      </tr>
      <tr>
        <td><input name="username" type="text" required="required" class="form-control" placeholder="Username" pattern="{4,25}"></td>
      </tr>
      <tr>
        <td><input name="password" type="password" required="required" class="form-control" placeholder="Password" pattern="{4,25}"></td>
      </tr>
      <tr>
        <td><input name="email" type="text" required="required" class="form-control" placeholder="Email" pattern="{4,50}"></td>
      </tr>
    <button class="btn btn-primary" type="submit" name="submit" value="Submit">Register</button>
    <tr>
      <td colspan="2"><p><a href="login.php">Login</a> | <a href="forgot.php">Forgot Password</a> </p></td>
    </tr>
	  </tbody>
	</table>
  </form>
</div>
</body>
</html>


<?php
    include "database/db.php"; //database 

        if (isset($_POST['username'])) 
        { 
            $connection = MYSQLI_Connect($hostname, $username, $password,$dbname) or die (); 
            MYSQLI_Select_Db($connection, $dbname) or die ("Database ".$dbname." does not exists."); //Connect to the database, or "die" and give the error message 
            
            $Login = $_POST['username']; 
            $Pass = $_POST['password']; 
            $Email = $_POST['email']; 
             
            $Login = StrToLower(Trim($Login)); 
            $Pass = StrToLower(Trim($Pass)); 
            $Email = Trim($Email); //All of the above processes the form data, then strips it down. 
     
        if (empty($Login) || empty($Pass) || empty($Email) ) //Checks if any of the fields were left empty 
            { 
                echo "<p><br/><font color='red'>Please complete all fields.</font><br/></p>"; 
            } 
                  
        elseif (preg_match("[^0-9a-zA-Z_-]", $Login, $Txt)) //Checks to see if any of the characters entered in the login field were "illegal" which could cause sql injection. 
            { 
                echo "<br/><font color='red'>Username contains illegal characters.</font><br />"; 
            }             
        elseif (preg_match("[^0-9a-zA-Z_-]", $Pass, $Txt)) //Checks to see if any of the characters entered in the password field were "illegal" which could cause sql injection. 
            { 
                echo "<br /><font color='red'>Password contains illegal characters.</font><br />";     
            } 
                
        elseif (StrPos('\'', $Email)) //Checks to see if any of the characters entered in the email field were "illegal" which could cause sql injection. 
            { 
                echo "<br /><font color='red'>Email contains illegal characters.</font><br />";     
            }     
        else 
            { 
                $Result = MySQLi_Query($connection, "SELECT * FROM user WHERE username='$Login'") or ("Can't execute username check."); //Checks if the username was already registered. 
                 
        if (MySQLi_Num_Rows($Result)) 
            { 
                echo "<br /><font color='red'>Username <b>".$Login."</b> has already been registered.</font><br />"; 
            } 
        elseif ((StrLen($Login) < 4) or (StrLen($Login) > 10)) //Limits the amount of characters in the username field. 
         
            { 
                echo "<br /><font color='red'>Username is too short. Must be between 4 and 25 characters.</font><br />"; 
            } 
        elseif ((StrLen($Pass) < 4) or (StrLen($Pass) > 10)) //Limits the amount of characters in the password field. 
         
            { 
                echo "<br /><font color='red'>Password is too short. Must be between 4 and 25 characters.</font><br />"; 
            } 
             
        elseif ((StrLen($Email) < 4) or (StrLen($Email) > 50)) //Limits the amount of characters in the email field. 
            { 
                echo "<br /><font color='red'>Email is too short. Must be between 4 and 50 characters.</font><br />"; 
            } 
				$Result1 = MySQLi_Query($connection, "SELECT * FROM user WHERE email='$Email'") or ("Can't execute username check."); //Checks if the email was already registered. 
                 
        if (MySQLi_Num_Rows($Result1)) 
            { 
                echo "<br /><font color='red'>Username <b>".$Email."</b> has already been registered.</font><br />"; 
            }
				
else 
            { 

                MYSQLI_Query($connection, "INSERT INTO user (username, password, email) VALUES ('$Login', '$Pass', '$Email')"
) or die ("Can't execute query."); //Enters the information into the database 
                echo "<br /><font color='Green'>Username <b>".$Login."</b> created successfully!</font><br />"; 
            }         
        }     
    } 


?>