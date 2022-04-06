<?php
require_once "web_config/config.php";
     $subjectsList = array();
     $sIndex = 0;

     $sql = mysqli_query($conn, "SELECT s_name FROM subject_tbl WHERE b_name = 'Computer' AND semester = '6'"); 

     while($row = mysqli_fetch_array($sql)) {
          $subjectsList[$sIndex] = $row['s_name'];
          $sIndex++;
     //    echo $row['s_name'];
     } 



     for ($i = 0; $i < 5; $i++) {
          echo "<br>";
          echo  $subjectsList[$i];
     }
?>