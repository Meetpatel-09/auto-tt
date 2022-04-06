<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

     <title><?php echo $title; ?></title>
</head>

<body style="min-height: 100vh;">
     <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="container-fluid">
               <?php
               if (isset($_SESSION['admin_email'])) { // means user is logged in
               ?>
                    <a class="navbar-brand" href="home.php">Auto Time-Table</a>
               <?php
               } else {
               ?>
                    <a class="navbar-brand" href="index.php">Auto Time-Table</a>
               <?php
               }
               ?>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                         <li class="nav-item">
                              <?php
                              if (isset($_SESSION['admin_email'])) { // means user is logged in
                                   if ($title == "Home" || $title == "Welcome") {
                              ?>
                                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                                   <?php
                                   } else {
                                   ?>
                                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
                                   <?php
                                   }
                              } else if (isset($_SESSION['staff_email'])) { // means user is logged in
                                   if ($title == "Home" || $title == "Welcome") {
                              ?>
                                        <a class="nav-link active" aria-current="page" href="staff_home.php">Home</a>
                                   <?php
                                   } else {
                                   ?>
                                        <a class="nav-link" aria-current="page" href="staff_home.php">Home</a>
                                   <?php
                                   }
                              } else {
                                   if ($title == "Home" || $title == "Welcome") {
                                   ?>
                                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                   <?php
                                   } else {
                                   ?>
                                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                              <?php
                                   }
                              }
                              ?>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="#">FAQ</a>
                         </li>
                         <?php

                         if (isset($_SESSION['logged_in']) && !isset($_SESSION['staff_email'])) {
                              if ($title == "Time Table") {
                         ?>
                                   <li class="nav-item">
                                        <a class="nav-link active" href="view_timetable.php">View Time Table</a>
                                   </li>
                              <?php
                              } else {
                              ?>
                                   <li class="nav-item">
                                        <a class="nav-link" href="view_timetable.php">View Time Table</a>
                                   </li>
                         <?php
                              }
                         }
                         ?>
                         <?php

                         if (isset($_SESSION['admin_id'])  && !isset($_SESSION['staff_email'])) {
                              if ($title == "Add Faculty") {
                         ?>
                                   <li class="nav-item">
                                        <a class="nav-link active" href="add_faculty.php">Add Faculty</a>
                                   </li>
                              <?php
                              } else {
                              ?>
                                   <li class="nav-item">
                                        <a class="nav-link" href="add_faculty.php">Add Faculty</a>
                                   </li>
                         <?php
                              }
                              if ($title == "View Faculty") {
                                   ?>
                                   <li class="nav-item">
                                        <a class="nav-link active" href="view_faculty.php">View Faculty</a>
                                   </li>
                              <?php
                              } else {
                              ?>
                                   <li class="nav-item">
                                        <a class="nav-link" href="view_faculty.php">View Faculty</a>
                                   </li>
                         <?php
                              }
                         }
                         ?>
                    </ul>
                    <?php
                    if (isset($_SESSION['logged_in'])) { // means user is logged in
                    ?>
                         <a href="logout.php" class="btn btn-danger" type="submit">Log Out</a>
                    <?php
                    }
                    ?>
               </div>
          </div>
     </nav>

     <style type="text/css">
          .style1 {
               width: 100%;
          }

          .style2 {
               text-align: center;
               width: 50px;
          }

          .style3 {
               text-align: center;
               width: 183px;
               height: 50px;
          }

          .style4 {
               text-align: center;
          }
     </style>