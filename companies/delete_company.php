<?php

session_start();

include('../connexion.php');

if(isset($_GET['company_uniq_id'])){

$results = $mysqli->query("UPDATE companies SET deleted='yes' WHERE company_uniq_id='$_GET[company_uniq_id]'");
if($results){
	$_SESSION['company_message'] = "Company deleted successfully";
}
else{

$_SESSION['company_message'] = "Company not deleted";
}	

header('location:index.php');
}


?>