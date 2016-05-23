<?php

session_start();


include("connexion.php");


if(isset($_POST["submit"])){

	$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
	$password = md5($password);
	
 $results = $mysqli->query("SELECT * from web_users where username='$username' and password ='$password'");

    $get_total_rows = $results->num_rows;
     	$row = $results->fetch_assoc();

    if($get_total_rows > 0)
   {


 $_SESSION["username"] = $username;

if($row["superadmin"] == "yes")
{

	$_SESSION["superadmin"] = "yes";
}

   	header("location:index.php");

	}else{
		$message = "Sorry,login incorrect,try again";
	}
}


?>







<!DOCTYPE HTML>
<html>
<head>
<title>S-LINKS Login Form</title>
<meta charset="UTF-8" />
<meta name="Designer" content="PremiumPixels.com">
<meta name="Author" content="$hekh@r d-Ziner, CSSJUNTION.com">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">
</head>

<body>

<form class="box login" action="" method="post">


	<fieldset class="boxBody">
		<center><h1>S-LINKS</h1></center>

		<?php
		if(isset($message)){
			echo "<center style='color:red'>".$message."</center>";
		}

		?>
	  <label>Username</label>
	  <input type="text" tabindex="1" name="username" placeholder="" required>
	  <label><a href="reset_password.php" class="rLink" tabindex="5">Forget your password?</a>Password</label>
	  <input type="password" tabindex="2" name="password" required>
	</fieldset>
	<footer>
	  <center><input type="submit" class="btnLogin" name="submit" value="Login" tabindex="4"></center>
	</footer>
</form>
<footer id="main">
  <a href="#">S-LINKS</a>
</footer>
</body>
</html>
