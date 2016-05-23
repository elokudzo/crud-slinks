<?php
session_start();


include("connexion.php");


if(isset($_POST["resetsubmit"])){

$email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);


	
 $results = $mysqli->query("SELECT * from web_users where email='$email'");

    $get_total_rows = $results->num_rows;
     	$row = $results->fetch_assoc();

if($get_total_rows == 1)
   {

$to = $email;
$subject = "S-LINKS new password";

$rand = substr(md5(microtime()),rand(0,26),5);
$rand2  = rand(0,3000);
$pass = $rand.$rand2;

// More headers
$headers = 'From: <slinks@slinks.com>' . "\r\n";


if(mail($to,$subject,$pass,$headers)){
$passmd = md5($pass);

$result_reset = $mysqli->query("update  web_users set password = '$passmd' where email='$email'");

$message = "Password reset successful,check your mail";
}

else{

	$message = "Sorry,try again";
}

  }
  else{

  	$message = "Sorry, your email is not in our database,Try again";
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
		<center><label>Reset password</label></center>
	  <label>Email</label>
	  <input type="text" tabindex="1" name="email" placeholder="" required>
	   <label><a href="login.php" class="rLink" tabindex="5">Back to Login</a></label>
	</fieldset>
	<footer>
	  <center><input type="submit" class="btnLogin" name="resetsubmit" value="Reset Password" tabindex="4"></center>
	</footer>
</form>
<footer id="main">
  <a href="#">S-LINKS</a>
</footer>
</body>
</html>
