<?php
session_start();
include("../connexion.php");
include("../functions.php");

date_default_timezone_set('Africa/Accra');




if(isset($_POST["create_web_users"])){

$the_date = date("d-m-Y h:i:s");

$username =filter_var($_POST["username"], FILTER_SANITIZE_STRING); 

$user_uniq_id = md5(time() + $username);

$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 

$pass = md5($password);
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

$telephone = filter_var($_POST["telephone"], FILTER_SANITIZE_STRING); 


 $results = $mysqli->query("SELECT * from web_users where username = '$username' and deleted='no'");

    $get_total_rows = $results->num_rows;
    if($get_total_rows == 0){

   $insert_row = $mysqli->query("INSERT INTO web_users (username, user_uniq_id, password,email,telephone,deleted) VALUES('$username', '$user_uniq_id', '$pass','$email' , '$telephone','no')");

if($insert_row){
    $message ="User created successfully!";
}else{
    $message ="User not created , try again.";
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
                        <h1>Create Users</h1><br><br>

                        <?php

if(isset($message)){
  echo "<span style='color:red'>".$message."</span><br><br>";
}
                        ?>
 <form class="form-horizontal" role="form" action="" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="username" id="username"  required>
    </div>
  </div>


 <div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  name="password" id="password" required>
    </div>
  </div>




 <div class="form-group">
    <label class="control-label col-sm-2" for="email">EMAIL:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control"  name="email" id="email"  required>
    </div>
  </div>



 <div class="form-group">
    <label class="control-label col-sm-2" for="telephone">Telephone:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="telephone" id="telephone" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="create_web_users" class="btn btn-default">Create</button>
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
