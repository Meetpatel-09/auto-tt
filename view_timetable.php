<?php

$title = "Time Table";
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

if (isset($_SESSION['added'])) {
     function_alert("Time table added added successfuly.");
     unset($_SESSION['added']);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

     $branch = $_POST['inputBranch'];
     $semester = $_POST['inputSemester'];
     $division = $_POST['inputDivision'];

     session_start();
     $_SESSION["branch"] = $branch;
     $_SESSION["semester"] = $semester;
     $_SESSION["division"] = $division;

     header("location: time_table.php");
}

?>


<div style="margin-top: 15px;">
     <h3 style="text-align: center"></h3>
</div>
<div class="form-design">
     <div class="container">
          <div class="row">
               <div class="col-sm-4">
               </div>
               <div class="col-sm-4">
                    <form action="" method="post" enctype="multipart/form-data">
                         <div class="form-group">
                              <div style="margin-top:15px;"></div>
                              <label for="inputBranch">Select Branch</label>
                              <div style="margin-top:10px;"></div>
                              <select id="inputBranch" name="inputBranch" class="form-select">
                                   <option selected>Choose</option>
                                   <option>Civil</option>
                                   <option>Computer</option>
                                   <option>Electrical</option>
                                   <option>Mechinical</option>
                              </select>
                         </div>
                         <div style="margin-top:15px;"></div>
                         <div class="form-group">
                              <label for="inputSemester">Select Semester</label>
                              <div style="margin-top:10px;"></div>
                              <select id="inputSemester" name="inputSemester" class="form-select">
                                   <option selected>Choose</option>
                                   <option>1</option>
                                   <option>2</option>
                                   <option>3</option>
                                   <option>4</option>
                                   <option>5</option>
                                   <option>6</option>
                              </select>
                         </div>
                         <div style="margin-top:15px;"></div>
                         <div class="form-group">
                              <label for="inputDivision">Select Division</label>
                              <div style="margin-top:10px;"></div>
                              <select id="inputDivision" name="inputDivision" class="form-select">
                                   <option selected>Choose</option>
                                   <option>A</option>
                                   <option>B</option>
                              </select>
                         </div>
                         <div style="margin-top:15px;"></div>
                         <div class="row g-3">
                              <div class="col">
                                   <button type="submit" class="btn btn-primary" style="text-align:left">Next</button>
                              </div>
                              <div class="col">
                                   <?php
                                   if (isset($_SESSION['admin_email'])) {
                                   ?>
                                        <a href="home.php" class="btn btn-primary" style="margin-left: 185px;">Back</a>
                                   <?php
                                   } else {
                                   ?>
                                        <a href="staff_home.php" class="btn btn-primary" style="margin-left: 185px;">Back</a>
                                   <?php
                                   }
                                   ?>
                              </div>
                         </div>
                    </form>
               </div>
               <div class="col-sm-4">
               </div>
          </div>
     </div>
</div>

<?php
include('master_page/footer.php');
?>