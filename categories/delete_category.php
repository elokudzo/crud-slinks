<?php

session_start();

include('../connexion.php');

if(isset($_GET['category_uniq_id'])){

$results = $mysqli->query("UPDATE categories SET deleted='yes' WHERE category_uniq_id='$_GET[category_uniq_id]'");
if($results){
	$_SESSION['category_message'] = "Category deleted successfully";
}
else{

$_SESSION['category_message'] = "Category not deleted";
}	

header('location:index.php');
}


?>