<?php
session_start();
include("../connexion.php");
include("../functions.php");

date_default_timezone_set('Africa/Accra');


 $results_cat = $mysqli->query("SELECT * from categories where deleted='no'");

if(isset($_POST['create_subcat'])){


$message = "";
$the_date = date("d-m-Y h:i:s");

$subcat_name =   filter_var($_POST["subcat_name"], FILTER_SANITIZE_STRING);  

$subcat_uniq_id = md5(time() +  $subcat_name);

$the_cat_id  =    filter_var( $_POST["category_id"], FILTER_SANITIZE_STRING);   

$description =   filter_var( $_POST["description"], FILTER_SANITIZE_STRING);  

$uploadOk = 1;

$res = $mysqli->query("SELECT * from subcategories where subcat_name = '$subcat_name' and deleted='no'");

    $get_total_rows = $res->num_rows;
    if($get_total_rows == 0){



$target_dir = "../files/subcategories/";
$target_file = $target_dir . basename($_FILES["subcat_image"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if ($_FILES["subcat_image"]["size"] > 500000000 ) {
    $message .= "your file is too large.<br>";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
   $message .= "Only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}





if(($uploadOk == 1) && ($_FILES["subcat_image"]["name"] !="")){



     move_uploaded_file($_FILES["subcat_image"]["tmp_name"], $target_file);
    
    $subcat_image_path = "files/subcategories/".$_FILES["subcat_image"]["name"];


   $insert_row = $mysqli->query("INSERT INTO subcategories(
subcat_uniq_id,
category_uniq_id,
subcat_name,
subcat_image_path,
description,
added_date,
deleted
) VALUES

('$subcat_uniq_id','$the_cat_id','$subcat_name','$subcat_image_path','$description','$the_date','no')");


if($insert_row){
    $message .="Subcategory added successfully!";

}else{
    $message .="Subcategory not created , try again.";
}

}
else{

  $message .="Subcategory not created , check  uploaded image.";
}

    }
      else{

        $message .="That subcategory already exists";
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
                        <h1>Create a Subcategory</h1><br><br>

                        <?php

if(isset($message)){
  echo "<span style='color:red'>".$message."</span><br><br>";
}
                        ?>
 <form class="form-horizontal" role="form" action="" method="post"  enctype="multipart/form-data">
  
<div class="form-group">
    <label class="control-label col-sm-2" for="subcat_name">Select a Category:</label>
    <div class="col-sm-10">
    <select name="category_id" required>
        <option value=""></option>
     <?php


 while ($row_categories = $results_cat->fetch_assoc()) {


     ?>
      <option value="<?php echo $row_categories['category_uniq_id'] ?>">
        
          <?php  echo $row_categories['category_name'] ;?>
      </option>

<?php
}
?>
    </select>

    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="subcat_name">Subcategory name:</label>
    <div class="col-sm-10">
     <input type="text" name="subcat_name" required />
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="subcat_image">Image:</label>
    <div class="col-sm-10">

      <input type="file" name="subcat_image" required/>

   
    </div>
  </div>

   <div class="form-group">
  <label for="description" class="control-label col-sm-2">Description:</label>
  <div class="col-sm-10">
  <textarea class="form-control" name="description" rows="5" id="description" ></textarea>
</div>
</div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="create_subcat" class="btn btn-default">Create</button>
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
