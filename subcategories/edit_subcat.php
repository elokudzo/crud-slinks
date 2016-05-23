<?php
session_start();
include("../connexion.php");
include("../functions.php");

date_default_timezone_set('Africa/Accra');

if(!isset($_GET["subcat_uniq_id"])){
    header("location:index.php");
}


 $results_cat = $mysqli->query("SELECT * from categories where deleted='no'");

$results = $mysqli->query("SELECT * from subcategories where subcat_uniq_id = '$_GET[subcat_uniq_id]'");

    $get_total_rows = $results->num_rows;

if($get_total_rows !=0){
    $row_subcat = $results->fetch_assoc();
}
else{
    header("location:index.php");
}


if(isset($_POST["edit_subcat"])){

$subcat_name = $_POST["subcat_name"];
$description  = $_POST["description"];
$category_uniq_id = $_POST["category_id"];
$uploadOk = 1;
$message = "";
$target_dir = "../files/subcategories/";
$target_file = $target_dir . basename($_FILES["subcat_image"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if ($_FILES["subcat_image"]["size"] > 500000000 ) {
    $message .= "your file is too large.<br>";
    $uploadOk = 0;
}

if( ($_FILES["subcat_image"]["name"] !="") && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {

   $message .= "Only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}


if(($uploadOk == 1) && ($_FILES["subcat_image"]["name"] !="")){

     move_uploaded_file($_FILES["subcat_image"]["tmp_name"], $target_file);
    
    $file_main = "files/subcategories/".$_FILES["subcat_image"]["name"];



$insert_row = $mysqli->query("UPDATE subcategories set subcat_name = '$subcat_name', description='$description', category_uniq_id = '$category_uniq_id', subcat_image_path='$file_main'  where subcat_uniq_id= '$_GET[subcat_uniq_id]'");


if($insert_row){
    $message ="Subcategory updated successfully!";
}else{
    $message ="Subcategory not updated , try again.";
}
}
else if ($_FILES["subcat_image"]["name"] ==""){

$insert_row = $mysqli->query("UPDATE subcategories set subcat_name = '$subcat_name', description='$description', category_uniq_id = '$category_uniq_id'   where subcat_uniq_id= '$_GET[subcat_uniq_id]'");
$message ="Subcategory updated successfully!";

} else{

  $message = "Subcategory not created,try again please";
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
                        <h1>Edit subccategory</h1><br><br>

                        <?php

if(isset($message)){
    echo "<span style='color:red'>".$message."</span><br><br>";
}
                        ?>
 <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
  


<div class="form-group">
    <label class="control-label col-sm-2" for="subcat_name">Select a Category:</label>
    <div class="col-sm-10">
    <select name="category_id" required>
        <option value="<?php echo $row_subcat['category_uniq_id']; ?>"> <?php echo get_category_name($row_subcat["category_uniq_id"]); ?></option>
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
     <input type="text" name="subcat_name" value="<?php echo $row_subcat['subcat_name']; ?>" required />
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="subcat_image">Image:</label>
    <div class="col-sm-10">

      <input type="file" name="subcat_image" />

   
    </div>
  </div>

   <div class="form-group">
  <label for="description" class="control-label col-sm-2">Description:</label>
  <div class="col-sm-10">
  <textarea class="form-control" name="description" rows="5" id="description" ><?php echo $row_subcat['description'] ?></textarea>
</div>
</div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="edit_subcat" class="btn btn-default">Edit</button>
    </div>
  </div>




</form>
     
       
<a href="index.php" class="btn btn-info">Back to list</a>  

<a href="delete_category.php?category_uniq_id=<?php echo $row_categories["category_uniq_id"];?>" onclick='return confirmDelete()' class="btn btn-success">Delete</a>      
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
