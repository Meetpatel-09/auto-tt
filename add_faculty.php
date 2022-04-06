<?php

$title = "Add Faculty";
include('master_page/header.php');
require_once "web_config/config.php";

$admin_id = $_SESSION['admin_id'];

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

error_reporting(E_ALL ^ E_WARNING);
error_reporting(E_ERROR);

if (isset($_POST['submit'])) {


     $file = $_FILES['doc']['tmp_name'];

     $ext = pathinfo($_FILES['doc']['name'], PATHINFO_EXTENSION);
     if ($ext == 'xlsx') {
          require('PHPExcel/PHPExcel.php');
          require('PHPExcel/PHPExcel/IOFactory.php');


          $obj = PHPExcel_IOFactory::load($file);
          foreach ($obj->getWorksheetIterator() as $sheet) {
               $getHighestRow = $sheet->getHighestRow();
               for ($i = 2; $i <= $getHighestRow; $i++) {
                    $name = $sheet->getCellByColumnAndRow(0, $i)->getValue();
                    $email = $sheet->getCellByColumnAndRow(1, $i)->getValue();
                    $phone = $sheet->getCellByColumnAndRow(2, $i)->getValue();
                    $address = $sheet->getCellByColumnAndRow(3, $i)->getValue();
                    $branch = $sheet->getCellByColumnAndRow(4, $i)->getValue();
                    $pwd = $sheet->getCellByColumnAndRow(5, $i)->getValue();
                    $password = password_hash($pwd, PASSWORD_DEFAULT);
                    if ($name != '') {
                         $done = mysqli_query($conn, "insert into faculty(name, email, phone, address, branch, password, admin_id) values('$name','$email', '$phone', '$address', '$branch', '$password', '$admin_id')");
                         if ($done) {
                              $_SESSION['added'] = "yes";
                              header("location: view_faculty.php");
                         } else {
                              function_alert("Something went wrong");
                         }
                    }
               }
          }
     } else {
          function_alert("Invalid file format");
     }
}
?>

<div class="form-design">
     <div class="container" style="margin-top: 25px;">
          <div class="row">
               <div class="col-md-4">
               </div>
               <div class="col-md-4">
                    <div class="card" style="padding:25px;">
                         <h3 style="text-align: center">Add Faculty</h3>
                         <form method="post" enctype="multipart/form-data">
                              <div style="margin-top:15px;"></div>
                              <div class="form-group">
                                   <label for="staffExcelFile">Select Excel Sheet</label>
                                   <div style="margin-top:15px;"></div>
                                   <input type="file" name="doc" class="form-control">
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div style="text-align:center">
                                   <div style="margin-top:15px;"></div>
                                   <input type="submit" name="submit" class="btn btn-primary col-6"></input>
                              </div>
                         </form>
                    </div>
               </div>
               <div class="col-md-4">
               </div>
          </div>
          <div style="text-align:center; visibility: hidden;" id="loadingSpinner">
               <div class="spinner-border" style="text-align: center;" role="status"><span class="visually-hidden">Loading...</span></div>
          </div>
     </div>
</div>



<script type="text/javascript">
     function spinner() {
          document.getElementById("loadingSpinner").style.visibility = "visible"
     }
</script>

<?php
include('master_page/footer.php');
?>