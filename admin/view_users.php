<?php
session_start();
include("../connexion.php");
include("../functions.php");

date_default_timezone_set('Africa/Accra');

if(!isset($_GET["user_uniq_id"])){
    header("location:index.php");
}


$results = $mysqli->query("SELECT * from web_users where user_uniq_id = '$_GET[user_uniq_id]'");

    $get_total_rows = $results->num_rows;

if($get_total_rows !=0){
    $row_web_users = $results->fetch_assoc();
}
else{
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>S-LINKS Categories</title>

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
                        <h1>Username : <?php echo $row_web_users["username"] ?></h1><br><br>

                     
<div class="col-sm-12">
    
 <div class="col-sm-2">
   <b>  Email: </b>
</div>
<div class="col-sm-8">
    <?php echo $row_web_users["email"]; ?>
    <br><br>
</div>   
</div>



<div class="col-sm-12">
    
 <div class="col-sm-2">
  <b>  Telephone:</b> 
</div>
<div class="col-sm-8">
    <?php echo $row_web_users["telephone"]; ?>
    <br><br>
</div>   
</div>


  
        <a href="edit_users.php?user_uniq_id=<?php echo $row_web_users["user_uniq_id"];?>" class="btn btn-info">Edit</a>
        <a href="delete_users.php?user_uniq_id=<?php echo $row_web_users["user_uniq_id"];?>" onclick='return confirmDelete()' class="btn btn-success">Delete</a>

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
