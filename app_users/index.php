<?php
session_start();
 $mysqli = new mysqli('localhost','slinks','slinks','the_no_fake_db');
if ($mysqli->connect_error) 
{
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

include("../functions.php");


$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) $page = 1;
 
$per_page = 10; // Set how many records do you want to display per page.
 
$startpoint = ($page * $per_page) - $per_page;
 
$statement = "`clients_table` where account_status='pending' order by id desc  "; // Change `records` according to your table name.
  
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

    <title>App Users</title>

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
                        <h1>App Users</h1><br><br>

     <?php
                if(isset($_SESSION['company_message'] ) && $_SESSION['company_message'] !=""){
                    //die( $_SESSION['doc_message']);
                   

echo "<span style='color:red'>".$_SESSION['company_message']."</span><br><br>";
                    $_SESSION['company_message'] = "";
                }

            ?>


<?php 
 if($get_total_rows != 0){
    
?>
						
<form style="width:60%" role="search">
   
        <input type="text" class="form-control" placeholder="Search">
   
    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
 </div>
		</form>
						
						

 <table class="table table-striped">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
         <th>Email</th>
        <th>Telephone</th>
        <th>Account Status</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>


<?php

      while ($row_companies = $results->fetch_assoc()) {


?>

      <tr>
 
        <td><?php echo  substr($row_companies["fname"],0,80); ?></td>
        <td><?php  echo $row_companies["lname"]; ?></td>
		<td><?php  echo $row_companies["email"]; ?></td>
        <td><?php  echo $row_companies["telephone"]; ?></td>
        <td><?php  echo $row_companies["account_status"]; ?></td>
        <td>         
        <a href="edit_company.php?id=<?php echo $row_companies["id"];?>" class="btn btn-success">View Chat</a>
        <a href="delete_company.php?id=<?php echo $row_companies["id"];?>" onclick='return confirmDelete()' class="btn btn-danger">Block</a>
        


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


<p>No registered app user.</p>

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
   return confirm("Are you sure you want to block this user ?");
}
</script>

    <!-- Menu Toggle Script -->
</body>

</html>
