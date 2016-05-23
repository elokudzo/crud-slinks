<?php
session_start();
include("connexion.php");

if(!isset( $_SESSION["username"])){
    header("location:login.php");
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

    <title>S-LINKS ADMINISTRATION DASHBOARD</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

<?php include("left_menu.php"); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <center><h1>DASHBOARD</h1><br><br>
					<a href="http://www.generalinvasion.com/slinks/app_users/" class="btn btn-warning btn-lg" style="font-size:35px">App Users</a>
                    <a href="categories/index.php" class="btn btn-info btn-lg" style="font-size:35px">Categories</a>
                     <a href="companies/index.php" class="btn btn-success btn-lg"  style="font-size:35px">Merchants</a>
				<?php 	
                if(isset($_SESSION["superadmin"])){

                    ?>

                    <a href="#" class="btn btn-danger btn-lg"  style="font-size:35px">Web Users</a>
                 <?php

                }
?>
                 </center>
                        
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

    <!-- Menu Toggle Script -->
</body>

</html>
