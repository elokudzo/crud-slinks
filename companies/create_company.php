<?php
session_start();
include("../connexion.php");
include("../functions.php");

date_default_timezone_set('Africa/Accra');



 $results_category = $mysqli->query("SELECT id,category_name from categories where deleted='no'");



 $results_subcategory = $mysqli->query("SELECT * from subcategories where deleted='no'");



if(isset($_POST["create_company"])){


$message = "";
$company_name = $_POST["company_name"];

$company_uniq_id = md5(time() + $company_name);
$company_category_id = $_POST["company_category"];

$company_category = get_category_name($company_category_id);
$company_subcategory = $_POST["company_subcategory"];
$company_creation_date = $_POST["company_creation_date"];
$company_owner_name = $_POST["company_owner_name"];

$company_owner_phone = $_POST["company_owner_phone"];
$company_owner_email = $_POST["company_owner_email"];
$company_address = $_POST["company_address"];
$company_website = $_POST["company_website"];
$company_facebook = $_POST["company_facebook"];
$company_contact_name = $_POST["company_contact_name"];
$company_contact_phone = $_POST["company_contact_phone"];
$company_contact_email = $_POST["company_contact_email"];
$company_contact_whatsapp  = $_POST["company_contact_whatsapp"];
$company_contact_skype = $_POST["company_contact_skype"];
$company_dealings = $_POST["company_dealings"];


$company_working_days = $_POST["company_working_days_first"]."-".$_POST["company_working_days_second"];
$company_working_hours= $_POST["company_working_hours_first"] ."-".$_POST["company_working_hours_second"];

$agent_name = $_POST["agent_name"];
$agent_contact_number = $_POST["agent_contact_number"];
$agent_email = $_POST["agent_email"];


// $the_date = date("d-m-Y h:i:s");
// $category_name = $_POST["category_name"];
// $category_description  = $_POST["category_description"];
// 

$target_dir = "../files/";
$target_file = $target_dir . basename($_FILES["image_main"]["name"]);
$target_file_one = $target_dir . basename($_FILES["image_main_one"]["name"]);
$target_file_two = $target_dir . basename($_FILES["image_main_two"]["name"]);
$target_file_three = $target_dir . basename($_FILES["image_main_three"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$imageFileType_one = pathinfo($target_file,PATHINFO_EXTENSION);
$imageFileType_two = pathinfo($target_file,PATHINFO_EXTENSION);
$imageFileType_three = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image


// Check file size
if ($_FILES["image_main"]["size"] > 500000000 || $_FILES["image_main_one"]["size"] > 500000000 ||$_FILES["image_main_two"]["size"] > 500000000 ||$_FILES["image_main_three"]["size"] > 500000000) {
    $message .= "your file is too large.<br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" &&  $imageFileType_one != "jpg" && $imageFileType_one != "png" && $imageFileType_one != "jpeg"
&& $imageFileType_one != "gif"  &&  $imageFileType_two != "jpg" && $imageFileType_two != "png" && $imageFileType_two != "jpeg"
&& $imageFileType_two != "gif"  && $imageFileType_three != "jpg" && $imageFileType_three != "png" && $imageFileType_three != "jpeg"
&& $imageFileType_three != "gif" ) {
   $message .= "Only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}


 $results = $mysqli->query("SELECT * from companies where company_name = '$company_name'");


     $get_total_rows = $results->num_rows;
     $get_total_rows;
     if($get_total_rows == 0 ){

if($uploadOk == 1){

$file_main = "";
$file_main_one = "";
$file_main_two = "";
$file_main_three = "";


if($_FILES["image_main"]["name"] !=""){

     move_uploaded_file($_FILES["image_main"]["tmp_name"], $target_file);
    
    $file_main = "files/".$_FILES["image_main"]["name"];
       }

if($_FILES["image_main_one"]["name"] !="")
{
     move_uploaded_file($_FILES["image_main_one"]["tmp_name"], $target_file_one);
      $file_main_one = "files/".$_FILES["image_main_one"]["name"];
}

if($_FILES["image_main_two"]["name"] !="")
{

     move_uploaded_file($_FILES["image_main_two"]["tmp_name"], $target_file_two);
       $file_main_two = "files/".$_FILES["image_main_two"]["name"];
}
if($_FILES["image_main_three"]["name"] !=""){

     move_uploaded_file($_FILES["image_main_three"]["tmp_name"], $target_file_three);
       $file_main_three = "files/".$_FILES["image_main_three"]["name"];
}





$insert_row = $mysqli->query("INSERT INTO companies (company_name , company_uniq_id,company_category, company_subcategory, image_main,image_main_one,image_main_two,image_main_three, company_creation_date,company_owner_name,company_owner_phone,company_owner_email,company_address,company_website,company_facebook,company_contact_name,company_contact_phone,company_contact_email,company_contact_whatsapp,company_contact_skype,company_dealings,company_working_days,company_working_hours,agent_name,agent_contact,agent_email,deleted) VALUES('$company_name', '$company_uniq_id', '$company_category', '$company_subcategory', '$file_main','$file_main_one','$file_main_two','$file_main_three', '$company_creation_date','$company_owner_name','$company_owner_phone','$company_owner_email','$company_address','$company_website','$company_facebook','$company_contact_name','$company_contact_phone','$company_contact_email','$company_contact_whatsapp','$company_contact_skype','$company_dealings','$company_working_days','$company_working_hours','$agent_name','$agent_contact_number','$agent_email','no')");

 if($insert_row){


     $message .="Company added successfully!<br>";
 }else{
     $message .="Company not created , try again.<br>";
 }
}
else{
  $message .="File upload problem";
}
 }
 else{

     $message .="That company already exists<br>";
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

    <title>S-LINKS Creating companies</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
<link  href="../css/bootstrap-timepicker.css" rel="stylesheet" />
    <link rel="stylesheet" href="../datepicker/css/datepicker.css" />

  <link rel="stylesheet" href="../css/bootstrap-clockpicker.css">
  
<script src="../js/jquery.js"></script> 



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script >
  


function Cat(){

$('#catddl').empty();
$('#catddl').append("<option>Loading...</option>");
$('#subcatddl').append("<option value=''></option>");

$.ajax({
type: "POST",
url : "cat_dropdown.php",
contentType: "application/json; charset=utf-8",
dataType: "json",
success: function(data){

$('#catddl').empty();
$('#catddl').append('<option value=""></option>');

$.each(data,function(i,item){

$('#catddl').append('<option value="'+ data[i].cuid + '">'+ data[i].catname + '</option>');
});

}

});

}

function Subcat(cid){


$('#subcatddl').empty();


$.ajax({
type: "POST",
url : "subcat_dropdown.php?cid="+cid ,
contentType: "application/json; charset=utf-8",
dataType: "json",
success: function(data){
  
$('#subcatddl').empty();
$('#subcatddl').append('<option value=""></option>');

$.each(data,function(i,item){

$('#subcatddl').append('<option value="'+ data[i].subname + '">'+ data[i].subname + '</option>');
});

}

});

}







$(document).ready(function(){

Cat();

$('#catddl').change(function(){

var catid = $('#catddl').val();
Subcat(catid);

});

});


</script>


</head>

<body>

    <div id="wrapper">

       <?php include("../left_menu.php"); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Create merchant</h1><br><br>

                        <?php

if(isset($message)){
  echo "<span style='color:red'>".$message."</span><br><br>";
}
                        ?>
 <form class="form-horizontal" role="form" action="" method="post"  enctype="multipart/form-data">




  <div class="form-group">
    <label class="control-label col-sm-2" for="company_name">Company name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="company_name" id="company_name" required>
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="company_category">Company category:</label>
    <div class="col-sm-10">
      
<select name="company_category" id="catddl" required>
  
</select>
      </div>
  </div>



 <div class="form-group">
    <label class="control-label col-sm-2" for="company_subcategory">Company subcategory:</label>
    <div class="col-sm-10">
      
<select name="company_subcategory" id="subcatddl" required>
  
</select>
      </div>
  </div>





 <div class="form-group">
    <label class="control-label col-sm-2" for="company_name">Images:</label>
    <div class="col-sm-10">

      <input type="file" name="image_main" required/>
      <input type="file" name="image_main_one" />
      <input type="file" name="image_main_two" />
      <input type="file" name="image_main_three" />

   
    </div>
  </div>


















   <div class="form-group">
    <label class="control-label col-sm-2" for="company_name">Company creation date:</label>
   
    <div class="col-sm-10 " >
    <input type="text" class="form-control" id="datepicker" name="company_creation_date" placeholder="Click to select date">
    <span class="add-on"><i class="icon-th"></i></span>

    </div>
  </div>


 <div class="form-group">
    <label class="control-label col-sm-2" for="company_name">Company owner name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="company_owner_name" id="company_owner_name" >
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="company_owner_phone">Company owner phone:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="company_owner_phone" id="company_owner_phone" placeholder="">
    </div>
  </div>


 <div class="form-group">
    <label class="control-label col-sm-2" for="company_owner_email">Company owner email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="company_owner_email" id="company_owner_email">
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="company_address">Company address:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="company_address" id="company_address" >
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="company_website">Company website:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="company_website" id="company_website" >
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="company_facebook">Company facebook:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="company_facebook" id="company_facebook">
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="company_contact_name">Company contact name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="company_contact_name" id="company_contact_name" >
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-2" for="company_contact_phone">Company contact phone number:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="company_contact_phone" id="company_contact_phone" >
    </div>
  </div>


 <div class="form-group">
    <label class="control-label col-sm-2" for="company_contact_email">Company contact email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="company_contact_email" id="company_contact_email" >
    </div>
  </div>


 <div class="form-group">
    <label class="control-label col-sm-2" for="company_contact_whatsapp">Company contact whatsapp:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="company_contact_whatsapp" id="company_contact_whatsapp">
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="company_contact_skype">Company contact skype:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="company_contact_skype" id="company_contact_skype">
    </div>
  </div>





   <div class="form-group">
  <label for="description" class="control-label col-sm-2">Company dealings:</label>
  <div class="col-sm-10">
  <textarea class="form-control" name="company_dealings" rows="5" id="company_dealings" ></textarea>
</div>
</div>
 

 <div class="form-group">
    <label class="control-label col-sm-2" for="company_name">Company working days:</label>
    <div class="col-sm-10">
   <select name="company_working_days_first" id="" class="form-control col-sm-5">
       <option value="monday">Monday</option>
       <option value="tuesday">Tuesday</option>
       <option value="wednesday">Wednesday</option>
       <option value="thursday">Thursday</option>
       <option value="friday">Friday</option>
       <option value="saturday">Saturday</option>
       <option value="sunday">Sunday</option>
   </select>
<br>
<br>

  <select name="company_working_days_second" id="" class="form-control">
       <option value="monday">Monday</option>
       <option value="tuesday">Tuesday</option>
       <option value="wednesday">Wednesday</option>
       <option value="thursday">Thursday</option>
       <option value="friday">Friday</option>
       <option value="saturday">Saturday</option>
       <option value="sunday">Sunday</option>
   </select>




       </div>
  </div>


 <div class="form-group">
    <label class="control-label col-sm-2" for="company_name">Company working hours:</label>
    <div class="col-sm-10">
     <div class="col-sm-5 clockpicker" data-autoclose="true">
          <input type="text" class="form-control" name="company_working_hours_first">
    
     </div>
    

   <div class="col-sm-5 clockpicker" data-autoclose="true">
          <input type="text" class="form-control" name="company_working_hours_second">
    
     </div>

  </div>
</div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="agent_name">Agent name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="agent_name" id="agent_name" placeholder="Enter company name">
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="agent_contact_number">Agent contact number:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="agent_contact_number" id="agent_contact_number" placeholder="Enter company name">
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="agent_email">Agent email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="agent_email" id="agent_email" placeholder="Enter company name">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="create_company" class="btn btn-default">Create</button>
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
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../datepicker/js/bootstrap-datepicker.js"></script>
      <script type="text/javascript" src="../js/bootstrap-clockpicker.js"></script>
   
<script>
    
    $('#datepicker').datepicker({
        format: 'dd/mm/yyyy',
    });
   
   $('.clockpicker').clockpicker();


</script>
    




    <!-- Menu Toggle Script -->
</body>

</html>
