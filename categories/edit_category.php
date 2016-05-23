<?php
session_start();
include("../connexion.php");
include("../functions.php");

date_default_timezone_set('Africa/Accra');

if(!isset($_GET["category_uniq_id"])){
    header("location:index.php");
}


$results = $mysqli->query("SELECT * from categories where category_uniq_id = '$_GET[category_uniq_id]'");

    $get_total_rows = $results->num_rows;

if($get_total_rows !=0){
    $row_categories = $results->fetch_assoc();
}
else{
    header("location:index.php");
}


if(isset($_POST["edit_category"])){

$category_name = $_POST["category_name"];
$category_description  = $_POST["category_description"];
$uploadOk = 1;
$message = "";
$target_dir = "../files/categories/";
$target_file = $target_dir . basename($_FILES["image_main"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if ($_FILES["image_main"]["size"] > 500000000 ) {
    $message .= "your file is too large.<br>";
    $uploadOk = 0;
}

if( ($_FILES["image_main"]["name"] !="") && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {

   $message .= "Only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}


if(($uploadOk == 1) && ($_FILES["image_main"]["name"] !="")){

     move_uploaded_file($_FILES["image_main"]["tmp_name"], $target_file);
    
    $file_main = "files/categories/".$_FILES["image_main"]["name"];



$insert_row = $mysqli->query("UPDATE categories set category_name ='$category_name',category_description = '$category_description',image_main = '$file_main' where category_uniq_id= '$_GET[category_uniq_id]'");


if($insert_row){
    $message ="Category updated successfully!";
}else{
    $message ="Category not updated , try again.";
}
}
else if ($_FILES["image_main"]["name"] ==""){

$insert_row = $mysqli->query("UPDATE categories set category_name ='$category_name',category_description = '$category_description' where category_uniq_id= '$_GET[category_uniq_id]'");
$message ="Category updated successfully!";

} else{

  $message = "Category not created,try again please";
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
                        <h1>Edit category</h1><br><br>

                        <?php

if(isset($message)){
    echo "<span style='color:red'>".$message."</span><br><br>";
}
                        ?>
 <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2" for="category_name">Category name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="category_name" id="category_name" value="<?php echo $row_categories['category_name']; ?>">
    </div>
  </div>

    <div class="form-group">
    <label class="control-label col-sm-2" for="category_image">Image:</label>
    <div class="col-sm-10">

      <input type="file" name="image_main"/>

   
    </div>
  </div>



   <div class="form-group">
  <label for="description" class="control-label col-sm-2">Description:</label>
  <div class="col-sm-10">
  <textarea class="form-control" name="category_description" rows="5" id="description">
      
<?php echo $row_categories['category_description']; ?>

  </textarea>
</div>
</div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="edit_category" class="btn btn-default">Update</button>
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
