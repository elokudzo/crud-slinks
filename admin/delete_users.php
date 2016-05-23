<?php

session_start();

include('../connexion.php');

if(isset($_GET['user_uniq_id'])){

$results = $mysqli->query("UPDATE web_users SET deleted='yes' WHERE id='$_GET[user_uniq_id]'");
if($results){
	$_SESSION['web_users_message'] = "User deleted successfully";
}
else{

$_SESSION['web_users_message'] = "User not deleted";
}	

header('location:index.php');
}


?>