<?php


include("../connexion.php");

$sql =  $mysqli->query("SELECT * from subcategories where deleted='no' and category_uniq_id = '$_GET[cid]'");

if($sql->num_rows){

	$data = array();

while($row = $sql->fetch_assoc()){

		$data[] = array(
			'subname'=>$row['subcat_name']
			);
	}


	header('Content-type: application/json');
	echo json_encode($data);
}

?>