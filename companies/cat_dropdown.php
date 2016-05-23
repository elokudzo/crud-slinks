<?php

include('../connexion.php');

$sql =  $mysqli->query("SELECT * from categories where deleted='no'");

if($sql->num_rows){

	$data = array();

	while($row = $sql->fetch_assoc()){

		$data[] = array(
			'cuid' =>$row['category_uniq_id'],
			'catname'=>$row['category_name']
			);
	}

	header("Content-type: application/json");
	echo json_encode($data);
}

?>