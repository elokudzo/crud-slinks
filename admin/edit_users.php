<?php
session_start();
include("../connexion.php");
include("../functions.php");

date_default_timezone_set('Africa/Accra');



if(!isset($_GET['user_uniq_id'])){

header("location:index.php");
}





$results_web = $mysqli->query("SELECT * from web_users where user_uniq_id = '$_GET[user_uniq_id]'");

    $get_total = $results_web->num_rows;

if($get_total !=0){
    $row_users = $results_web->fetch_assoc();
}
else{
    header("location:index.php");
}




if(isset($_POST["update_web_users"])){

$the_date = date("d-m-Y h:i:s");

$username =filter_var($_POST["username"], FILTER_SANITIZE_STRING); 
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

$telephone = filter_var($_POST["telephone"], FILTER_SANITIZE_STRING); 


 $results = $mysqli->query("SELECT * from web_users where username = '$username' and deleted='no'");

    $get_total_rows = $results->num_rows;
    if($get_total_rows == 0){

   $insert_row = $mysqli->query("update web_users set username = '$username', email = '$email', telephone = '$telephone' where user_uniq_id= '$_GET[user_uniq_id]'");

if($insert_row){
    $message ="User updated successfully!";
}else{
    $message ="User not updated , try again.";
}

}
else{

    $message ="That user already exists";
}



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
                        <h1>Update Users</h1><br><br>

                        <?php

if(isset($message)){
  echo "<span style='color:red'>".$message."</span><br><br>";
}
                        ?>
 <form class="form-horizontal" role="form" action="" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="username" id="username" value="<?php  echo $row_users['username'];  ?>" required>
    </div>
  </div>


 <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control"  name="email" id="email" placeholder="Enter category name" value="<?php  echo $row_users['email'];  ?>"  required>
    </div>
  </div>



 <div class="form-group">
    <label class="control-label col-sm-2" for="telephone">Telephone:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="telephone" id="telephone"  value="<?php  echo $row_users['telephone'];  ?>"  placeholder="Enter category name" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="update_web_users" class="btn btn-default">Update</button>
    </div>
  </div>
</form>
     
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
