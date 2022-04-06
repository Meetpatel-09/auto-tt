<?php 
     require_once "web_config/config.php";
    
     $id = $_GET['faculty_id'];

     $sql = "DELETE FROM faculty WHERE faculty_id = '$id'";

     $result = mysqli_query($conn, $sql);

     header("location: view_faculty.php");
?>