<?php

session_start();

include('../connexion.php');

if(isset($_GET['subcat_uniq_id'])){

$results = $mysqli->query("UPDATE subcategories SET deleted='yes' WHERE subcat_uniq_id='$_GET[subcat_uniq_id]'");
if($results){
	$_SESSION['subcategory_message'] = "Subcategory deleted successfully";
}
else{

$_SESSION['subcategory_message'] = "Subcategory not deleted";
}	

header('location:index.php');
}


?>