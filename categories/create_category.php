<?php
session_start();
include("../connexion.php");
include("../functions.php");

date_default_timezone_set('Africa/Accra');




if(isset($_POST["create_category"])){


$message = "";
$the_date = date("d-m-Y h:i:s");
$category_name = $_POST["category_name"];

$category_uniq_id = md5(time()+$category_name);

$uploadOk = 1;
$category_description  = $_POST["category_description"];

 $results = $mysqli->query("SELECT * from categories where category_name = '$category_name' and deleted='no'");

    $get_total_rows = $results->num_rows;
    if($get_total_rows == 0){


$target_dir = "../files/categories/";
$target_file = $target_dir . basename($_FILES["image_main"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if ($_FILES["image_main"]["size"] > 500000000 ) {
    $message .= "your file is too large.<br>";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
   $message .= "Only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}

if(($uploadOk == 1) && ($_FILES["image_main"]["name"] !="")){



     move_uploaded_file($_FILES["image_main"]["tmp_name"], $target_file);
    
    $file_main = "files/categories/".$_FILES["image_main"]["name"];


   $insert_row = $mysqli->query("INSERT INTO categories (category_name,category_uniq_id, image_main,category_description , added_date,deleted) VALUES('$category_name', '$category_uniq_id', '$file_main', '$category_description',  '$the_date','no')");


if($insert_row){
    $message .="Category added successfully!";

}else{
    $message .="Category not created , try again.";
}

}
else{

  $message .="Category not created , check  uploaded image.";
}


}
else{

    $message .="That category already exists";
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
                        <h1>Create category</h1><br><br>

                        <?php

if(isset($message)){
  echo "<span style='color:red'>".$message."</span><br><br>";
}
                        ?>
 <form class="form-horizontal" role="form" action="" method="post"  enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2" for="category_name">Category name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="category_name" id="category_name" placeholder="Enter category name" required>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="category_image">Image:</label>
    <div class="col-sm-10">

      <input type="file" name="image_main" required/>

   
    </div>
  </div>

   <div class="form-group">
  <label for="description" class="control-label col-sm-2">Description:</label>
  <div class="col-sm-10">
  <textarea class="form-control" name="category_description" rows="5" id="description" ></textarea>
</div>
</div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="create_category" class="btn btn-default">Create</button>
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
