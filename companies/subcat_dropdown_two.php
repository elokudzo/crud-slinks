<?php


include("../connexion.php");
include("../functions.php");


$cat_uniq_id = get_category_uniq_id($_GET['cid']);

$sql =  $mysqli->query("SELECT * from subcategories where deleted='no' and category_uniq_id = '$cat_uniq_id'");

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