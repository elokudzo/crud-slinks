<?php
session_start();
include("../connexion.php");
include("../functions.php");


$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) $page = 1;
 
$per_page = 10; // Set how many records do you want to display per page.
 
$startpoint = ($page * $per_page) - $per_page;
 
$statement = "`subcategories` where deleted='no' order by category_uniq_id  "; // Change `records` according to your table name.
  
$results = $mysqli->query("SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");
 


// $results = $mysqli->query("SELECT * from posts where deleted = 'no' order by id desc");

    $get_total_rows = $results->num_rows;


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>S-LINKS Subcategories</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

 <?php include("../left_menu.php"); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Subcategories</h1><br><br>
                    <a href="create_subcat.php" class="btn btn-info btn-lg">Create a new subcategory</a><br><br>
  



     <?php
                if(isset($_SESSION['subcategory_message'] ) && $_SESSION['subcategory_message'] !=""){
                    //die( $_SESSION['doc_message']);
                   

echo "<span style='color:red'>".$_SESSION['subcategory_message']."</span><br><br>";
                    $_SESSION['subcategory_message'] = "";
                }

            ?>


<?php 
 if($get_total_rows != 0){
    
?>

 <table class="table table-striped">
    <thead>
      <tr>
        <th>Subcategory name</th>
        <th>Category </th>
        <th>Description</th>
        <th>Date of creation</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>


<?php

      while ($row_subcat = $results->fetch_assoc()) {


?>

      <tr>
        <td>  <a href="view_subcat.php?subcat_uniq_id=<?php echo $row_subcat["subcat_uniq_id"];  ?>"><?php echo $row_subcat["subcat_name"]; ?> </a></td>

        <td><?php echo  get_category_name($row_subcat["category_uniq_id"]); ?></td>
        <td><?php echo  substr($row_subcat["description"],0,80); ?></td>
        <td><?php  echo $row_subcat["added_date"]; ?></td>

        <td>         
        
        <a href="edit_subcat.php?subcat_uniq_id=<?php echo $row_subcat["subcat_uniq_id"];?>" class="btn btn-info">Edit</a>
        <a href="delete_subcat.php?subcat_uniq_id=<?php echo $row_subcat["subcat_uniq_id"];?>" onclick='return confirmDelete()' class="btn btn-success">Delete</a>
        


         </td>
      </tr>

<?php

}


?>
    </tbody>
  </table>


<?php
}
else{
?>


<p>No subcategories yet.</p>

<?php
}
   
$mysqli->close();
echo pagination($statement,$per_page,$page,$url='?');

?>


                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type='text/javascript'>
function confirmDelete()
{
   return confirm("Are you sure you want to delete ?");
}
</script>

    <!-- Menu Toggle Script -->
</body>

</html>
