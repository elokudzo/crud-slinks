<?php
session_start();
include("../connexion.php");
include("../functions.php");

date_default_timezone_set('Africa/Accra');

if(!isset($_GET["company_uniq_id"])){
    header("location:index.php");
}


$results = $mysqli->query("SELECT * from companies where company_uniq_id = '$_GET[company_uniq_id]'");

    $get_total_rows = $results->num_rows;

if($get_total_rows !=0){
    $row_companies = $results->fetch_assoc();
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

    <title>S-LINKS Companies</title>

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
                        <h1>Company : <?php echo $row_companies["company_name"] ?></h1><br><br>


<?php

if($row_companies["image_main"] !==""){

    ?>

<img src="../<?php echo $row_companies['image_main']; ?>" alt="First Image" width="100px" height="100px">

<?php
}


if($row_companies["image_main_one"] !==""){


?>
<img src="../<?php echo $row_companies['image_main_one']; ?>" alt="Second image" width="100px" height="100px">


<?php
}

if($row_companies["image_main_two"] !==""){

 ?>
<img src="../<?php echo $row_companies['image_main_two']; ?>"  width="100px" height="100px">

<?php
}

if($row_companies["image_main_three"] !==""){
?>
<img src="../<?php echo $row_companies['image_main_three']; ?>"  width="100px" height="100px">

<?php
}
?>
<br><br>
<div class="col-sm-12">
    
 <div class="col-sm-2">
    Company Name: 
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_name"]; ?>
    <br><br>
</div>   
</div>




<div class="col-sm-12">
    
 <div class="col-sm-2">
    Category: 
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_category"]; ?><br><br>
</div>   
</div>

<div class="col-sm-12">
    
 <div class="col-sm-2">
    Subcategory: 
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_subcategory"]; ?><br><br>
</div>   
</div>





<div class="col-sm-12">
    
 <div class="col-sm-2">
    Creation Date: 
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_creation_date"]; ?><br><br>
</div>   
</div>


<div class="col-sm-12">
    
 <div class="col-sm-2">
 Owner name: 
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_owner_name"]; ?><br><br>
</div>   
</div>


<div class="col-sm-12">
    
 <div class="col-sm-2">
 Owner Phone number: 
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_owner_phone"]; ?><br><br>
    <br><br>
</div>   
</div>



<div class="col-sm-12">
    
 <div class="col-sm-2">
 Owner Email: 
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_owner_email"]; ?><br><br>
</div>   
</div>


<div class="col-sm-12">
    
 <div class="col-sm-2">
 Address:
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_address"]; ?><br><br>
</div>   
</div>

<div class="col-sm-12">
    
 <div class="col-sm-2">
 Website:
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_website"]; ?><br><br>
</div>   
</div>

<div class="col-sm-12">
    
 <div class="col-sm-2">
 Facebook account:
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_facebook"]; ?><br><br>
</div>   
</div>

<div class="col-sm-12">
    
 <div class="col-sm-2">
 Contact Name:
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_contact_name"]; ?><br><br>
</div>   
</div>



<div class="col-sm-12">
    
 <div class="col-sm-2">
 Contact Name:
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_contact_phone"]; ?><br><br>
</div>   
</div>

<div class="col-sm-12">
    
 <div class="col-sm-2">
 Contact Email:
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_contact_email"]; ?><br><br>
</div>   
</div>


<div class="col-sm-12">
    
 <div class="col-sm-2">
 Contact Whatsapp:
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_contact_whatsapp"]; ?><br><br>
</div>   
</div>

<div class="col-sm-12">
    
 <div class="col-sm-2">
 Contact Skype:
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_contact_skype"]; ?><br><br>
</div>   
</div>




<div class="col-sm-12">
    
 <div class="col-sm-2">
 Dealings:
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_dealings"]; ?><br><br>
</div>   
</div>

<div class="col-sm-12">
    
 <div class="col-sm-2">
 Working days:
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_working_days"]; ?><br><br>
</div>   
</div>


<div class="col-sm-12">
    
 <div class="col-sm-2">
 Working hours:
</div>
<div class="col-sm-8">
    <?php echo $row_companies["company_working_hours"]; ?><br><br>
</div>   
</div>


<div class="col-sm-12">
    
 <div class="col-sm-2">
 Agent Name:
</div>
<div class="col-sm-8">
    <?php echo $row_companies["agent_name"]; ?><br><br>
</div>   
</div>
<div class="col-sm-12">
    
 <div class="col-sm-2">
 Agent Contact number:
</div>
<div class="col-sm-8">
    <?php echo $row_companies["agent_contact"]; ?><br><br>
</div>   
</div>


 <div class="col-sm-2">
 Agent Contact email:
</div>
<div class="col-sm-8">
    <?php echo $row_companies["agent_email"]; ?><br><br>
</div>   
</div>

  
        <a href="edit_company.php?company_uniq_id=<?php echo $row_companies["company_uniq_id"];?>" class="btn btn-info">Edit</a>
        <a href="delete_company.php?company_uniq_id=<?php echo $row_companies["company_uniq_id"];?>" onclick='return confirmDelete()' class="btn btn-success">Delete</a>

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
