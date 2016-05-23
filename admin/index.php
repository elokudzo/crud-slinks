<?php
session_start();
include("../connexion.php");
include("../functions.php");

if(!isset( $_SESSION["username"])){
    header("location:login.php");
}


$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) $page = 1;
 
$per_page = 10; // Set how many records do you want to display per page.
 
$startpoint = ($page * $per_page) - $per_page;
 
$statement = "`web_users` where deleted='no' order by id desc  "; // Change `records` according to your table name.
  
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

    <title>S-LINKS Users</title>

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
                        <h1>USERS</h1><br><br>
                    <a href="create_users.php" class="btn btn-info btn-lg">Create a new user</a><br><br>
  



     <?php
                if(isset($_SESSION['web_users_message'] ) && $_SESSION['web_users_message'] !=""){
                    //die( $_SESSION['doc_message']);
                   

echo "<span style='color:red'>".$_SESSION['web_users_message']."</span><br><br>";
                    $_SESSION['web_users_message'] = "";
                }

            ?>


<?php 
 if($get_total_rows != 0){
    
?>

 <table class="table table-striped">
    <thead>
      <tr>
        <th>Username</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>


<?php

      while ($row_web_users = $results->fetch_assoc()) {


?>

      <tr>
        <td>  <a href="view_users.php?user_uniq_id=<?php echo $row_web_users["user_uniq_id"];  ?>"><?php echo $row_web_users["username"]; ?> </a></td>
    
        <td><?php  echo $row_web_users["telephone"]; ?></td>
        <td><?php  echo $row_web_users["email"]; ?></td>

        <td>         
             <a href="change_pass_users.php?user_uniq_id=<?php echo $row_web_users["user_uniq_id"];?>"  class="btn btn-success">Update Password</a>

        
          <a href="edit_users.php?user_uniq_id=<?php echo $row_web_users["user_uniq_id"];?>" class="btn btn-info">Edit</a>
        <a href="delete_users.php?user_uniq_id=<?php echo $row_web_users["user_uniq_id"];?>" onclick='return confirmDelete()' class="btn btn-danger">Delete</a>

        


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


<p>No users yet.</p>

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
