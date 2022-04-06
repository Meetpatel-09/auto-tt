<?php

$title = "Home";
include('master_page/header.php');
require_once "web_config/config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
     ob_start();

     $admin_id = $_SESSION['admin_id'];

     $b_name = $_POST['inputBranch'];
     $semester = $_POST['inputSemester'];
     $division = $_POST['inputDivision'];
     $noOfBatch = $_POST['inputNumberofBatch'];

     $_SESSION["branch"] = $b_name;
     $_SESSION["semester"] = $semester;
     $_SESSION["division"] = $division;
     $_SESSION['noOfBatch'] = $noOfBatch;


     $subjectsList = array();
     $sIndex = 0;

     $sql3 = "DELETE FROM timetable WHERE admin_id = '$admin_id'";

     $result3 = mysqli_query($conn, $sql3);


     // $sql = mysqli_query($conn, "SELECT s_name FROM subject_tbl WHERE b_name = '$b_name' AND semester = '$semester'"); 

     // while($row = mysqli_fetch_array($sql)) {
     //      $subjectsList[$sIndex] = $row['s_name'];
     //    echo $row['s_name'];
     // } 



     // for ($i = 0; $i < 4; $i++) {
     //      echo  $subjectsList[$i];
     // }


     $s1 = "Advance Java Programming";
     $s2 = "Mobile Computing And Application Developmen";
     $s3 = "Networking Management & Administration";
     $s4 = "Professional Practices Using Database";
     $s5 = "Project I I";


     $days = array();
     $days = ['Monday', 'Tuesday', 'Wednesday', 'Thrusday', 'Friday'];

     // for($day = 0; $day < 5; $day++) {

     //      for ($slot = 0; $slot < 4; $slot++) {


     //           if($day = 0) {

     //                if ($slot = 0) {
     $query = "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,no_in_slot, no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Th', 1, '$s1'  , 'null', 1, 3, '$admin_id');";
     //      $query = "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,no_in_slot, no_of_batch) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Th', 1, '$s1'  , 'null', 1, 3)";
     //      // // mysqli_query($conn, $query);

     //      if (mysqli_query($conn, $query)) {
     //           // echo "New record created successfully";
     //      } else {
     //      echo "Error: " . $query . "<br>" . mysqli_error($conn);
     //      }

     //      // mysqli_close($conn);
     // // } 

     // // if ($slot = 1) {

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Pr', 1, '$s1', 'null', 1, 2, 3, '$admin_id');";
     //      $query = "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Pr', 1, '$s1', 'null', 1, 2, 3)";


     //      if (mysqli_query($conn, $query)) {
     //           // echo "New record created successfully";
     //      } else {
     //      echo "Error: " . $query . "<br>" . mysqli_error($conn);
     //      }

     //      // mysqli_close($conn);

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Pr', 1, '$s2', 'null', 2, 2, 3, '$admin_id');";
     //      $query = "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Pr', 1, '$s2', 'null', 2, 2, 3)";


     //      // mysqli_close($conn);
     //      if (mysqli_query($conn, $query)) {
     //           // echo "New record created successfully";
     //      } else {
     //      echo "Error: " . $query . "<br>" . mysqli_error($conn);
     //      }

     //      // mysqli_close($conn);

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Pr', 1, '$s3', 'null', 3, 2, 3, '$admin_id');";
     //      $query = "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Pr', 1, '$s3', 'null', 3, 2, 3)";

     //       // mysqli_close($conn);
     //      if (mysqli_query($conn, $query)) {
     //           // echo "New record created successfully";
     //      } else {
     //      echo "Error: " . $query . "<br>" . mysqli_error($conn);
     //      }

     //      // mysqli_close($conn);
     // // }

     // // if ($slot = 2) {
     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,no_in_slot, no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Th', 2, '$s2', 'null', 1, 3, '$admin_id');";
     //      $query = "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,no_in_slot, no_of_batch) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Th', 2, '$s2', 'null', 1, 3)";
     //        // mysqli_close($conn);
     //        if (mysqli_query($conn, $query)) {
     //           // echo "New record created successfully";
     //      } else {
     //      echo "Error: " . $query . "<br>" . mysqli_error($conn);
     //      }

     //      // mysqli_close($conn);

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,no_in_slot, no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Th', 2, '$s3', 'null', 2, 3, '$admin_id');";
     //      $query = "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,no_in_slot, no_of_batch) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Th', 2, '$s3', 'null', 2, 3)";

     //        // mysqli_close($conn);
     //        if (mysqli_query($conn, $query)) {
     //           // echo "New record created successfully";
     //      } else {
     //      echo "Error: " . $query . "<br>" . mysqli_error($conn);
     //      }

     //      // mysqli_close($conn);
     // // }

     // // if ($slot = 3) {

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Pr', 3, '$s5', 'null', 1, 1, 3, '$admin_id');";
     //      $query = "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Pr', 3, '$s5', 'null', 1, 1, 3)";
     //      // mysqli_close($conn);
     //      if (mysqli_query($conn, $query)) {
     //           // echo "New record created successfully";
     //      } else {
     //      echo "Error: " . $query . "<br>" . mysqli_error($conn);
     //      }

     //      // mysqli_close($conn);

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Pr', 3, '$s5', 'null', 2, 1, 3, '$admin_id');";
     //      $query = "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Pr', 3, '$s5', 'null', 2, 1, 3)";

     //      // mysqli_close($conn);
     //      if (mysqli_query($conn, $query)) {
     //           // echo "New record created successfully";
     //      } else {
     //      echo "Error: " . $query . "<br>" . mysqli_error($conn);
     //      }

     //      // mysqli_close($conn);

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Pr', 3, '$s5', 'null', 3, 1, 3, '$admin_id');";
     //      $query = "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch) VALUES ('$b_name', '$semester', '$division', '$days[0]', 'Pr', 3, '$s5', 'null', 3, 1, 3)";
     //     // mysqli_close($conn);
     //      if (mysqli_query($conn, $query)) {
     //           // echo "New record created successfully";
     //      } else {
     //      echo "Error: " . $query . "<br>" . mysqli_error($conn);
     //      }

     // mysqli_close($conn);
     // }
     // }


     // if($day = 1) {

     //      if ($slot = 0) {
     // $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,no_in_slot, no_of_batch) VALUES ('$b_name', '$semester', '$division', '$days[1]', 'Th', 1, '$s1', 'null', 1, 3);";
     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,no_in_slot, no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[1]', 'Th', 1, '$s1', 'null', 1, 3, '$admin_id');";


     //                     // } 

     //                     // if ($slot = 1) {

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[1]', 'Pr', 1, '$s4', 'null', 1, 2, 3, '$admin_id');";


     // // 
     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[1]', 'Pr', 1, '$s1', 'null', 2, 2, 3, '$admin_id');";




     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[1]', 'Pr', 1, '$s2', 'null', 3, 2, 3, '$admin_id');";


     //                     // }

     //                     // if ($slot = 2) {


     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[1]', 'Pr', 2, '$s3', 'null', 1, 1, 3, '$admin_id');";



     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[1]', 'Pr', 2, '$s4', 'null', 2, 1, 3, '$admin_id');";



     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[1]', 'Pr', 2, '$s1', 'null', 3, 1, 3, '$admin_id');";

     //                     // }

     //                     // if ($slot = 3) {

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[1]', 'Pr', 3, '$s2', 'null', 1, 1, 3, '$admin_id');";


     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[1]', 'Pr', 3, '$s3', 'null', 2, 1, 3, '$admin_id');";



     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[1]', 'Pr', 3, '$s4', 'null', 3, 1, 3, '$admin_id');";


     //                //      }
     //                // }

     //                // if($day = 2) {

     //                     // if ($slot = 0) {
     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,no_in_slot, no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[2]', 'Th', 1, '$s2', 'null', 1, 3, '$admin_id');";

     //                     // } 

     //                     // if ($slot = 1) {
     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[2]', 'Pr', 1, '$s1', 'null', 1, 2, 3, '$admin_id');";


     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[2]', 'Pr', 1, '$s2', 'null', 2, 2, 3, '$admin_id');";

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[2]', 'Pr', 1, '$s3', 'null', 3, 2, 3, '$admin_id');";

     //                     // }

     //                     // if ($slot = 2) {

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[2]', 'Pr', 2, '$s4', 'null', 1, 1, 3, '$admin_id');";


     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[2]', 'Pr', 2, '$s1', 'null', 2, 1, 3, '$admin_id');";


     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[2]', 'Pr', 2, '$s2', 'null', 3, 1, 3, '$admin_id');";


     //                     // }

     //                     // if ($slot = 3) {
     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[2]', 'Pr', 3, '$s5', 'null', 1, 1, 3, '$admin_id');";

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[2]', 'Pr', 3, '$s5', 'null', 2, 1, 3, '$admin_id');";



     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[2]', 'Pr', 3, '$s5', 'null', 3, 1, 3, '$admin_id');";

     //                //      }
     //                // }

     //                // if($day = 3) {

     //                //      if ($slot = 0) {
     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,no_in_slot, no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[3]', 'Th', 1, '$s3', 'null', 1, 3, '$admin_id');";


     //                     // } 

     //                     // if ($slot = 1) {

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[3]', 'Pr', 1, '$s2', 'null', 1, 2, 3, '$admin_id');";


     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[3]', 'Pr', 1, '$s3', 'null', 2, 2, 3, '$admin_id');";



     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[3]', 'Pr', 1, '$s4', 'null', 3, 2, 3, '$admin_id');";


     //                     // }

     //                     // if ($slot = 2) {
     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,no_in_slot, no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[3]', 'Th', 2, '$s1', 'null', 1, 3, '$admin_id');";


     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,no_in_slot, no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[3]', 'Th', 2, '$s2', 'null', 2, 3, '$admin_id');";

     //                     // }

     //                     // if ($slot = 3) {
     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[3]', 'Pr', 3, '$s5', 'null', 1, 1, 3, '$admin_id');";

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[3]', 'Pr', 3, '$s5', 'null', 2, 1, 3, '$admin_id');";



     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[3]', 'Pr', 3, '$s5', 'null', 3, 1, 3, '$admin_id');";


     //                //      }
     //                // }

     //                // if($day = 4) {

     //                //      if ($slot = 0) {
     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,no_in_slot, no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[4]', 'Th', 1, '$s3', 'null', 1, 3, '$admin_id');";

     //                     // } 

     //                     // if ($slot = 1) {

     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[4]', 'Pr', 1, '$s3', 'null', 1, 2, 3, '$admin_id');";


     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[4]', 'Pr', 1, '$s4', 'null', 2, 2, 3, '$admin_id');";


     $query .= "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch, admin_id) VALUES ('$b_name', '$semester', '$division', '$days[4]', 'Pr', 1, '$s1', 'null', 3, 2, 3, '$admin_id')";


     $result =  mysqli_multi_query($conn, $query);

     if ($result) {
          $_SESSION['added'] = "yes";
          header("location: view_timetable.php");
     }
     //                }
     //           }

     //      }
     // }

     // if (mysqli_multi_query($conn, $query)) {
     //      echo "New records created successfully";
     //    } else {
     //      echo "Error: " . $query . "<br>" . mysqli_error($conn);
     //    }

     //    mysqli_close($conn);

     // header("location: time_table.php");

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
                         <div class="form-group">
                              <label for="inputNumberofBatch">Number of Batches</label>
                              <div style="margin-top:10px;"></div>
                              <select id="inputNumberofBatch" name="inputNumberofBatch" class="form-select">
                                   <option selected>Choose</option>
                                   <option>1</option>
                                   <option>2</option>
                                   <option>3</option>
                                   <option>4</option>
                              </select>
                         </div>
                         <div style="margin-top:15px;"></div>
                         <div class="row g-3">
                              <div class="col">
                                   <button type="submit" class="btn btn-primary" style="text-align:left">Next</button>
                              </div>
                              <div class="col">
                                   <a href="adminHome.php" class="btn btn-primary" style="margin-left: 185px;">Back</a>
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