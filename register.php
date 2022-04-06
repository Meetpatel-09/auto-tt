<?php

$title = "Registration";
ob_start();
require_once "web_config/config.php";
include('master_page/header.php');

$fname = $email = $password = $con_password =  "";
$fname_err = $email_err = $password_err = $con_password_err = "";

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

     // Check if full name is empty
     if (empty(trim($_POST["exampleInputName"]))) {
          $fname_err = "Please enter your name";
          function_alert($fname_err);
     } else {
          $fname = trim($_POST['exampleInputName']);
     }

     // Check if email is empty
     if (empty(trim($_POST["exampleInputEmail"]))) {
          $email_err = "Please enter your email address";
          function_alert($email_err);
     } else {
          $query = "SELECT admin_id FROM admin_tbl WHERE email = ?";
          $stmt = mysqli_prepare($conn, $query);
          if ($stmt) {
               mysqli_stmt_bind_param($stmt, 's', $param_email);

               // Set the variable of param email
               $param_email = trim($_POST['exampleInputEmail']);

               // Try to execute this statement
               if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                         $email_err = "You Already have a account";
                         function_alert($email_err);
                    } else {
                         $email = trim($_POST['exampleInputEmail']);
                    }
               } else {
                    echo "Something went wrong";
                    function_alert("Something went wrong");
               }
          }
          mysqli_stmt_close($stmt);
     }

     // Check for password
     if (empty(trim($_POST['exampleInputPassword1']))) {
          $password_err = "Password cannot be blank";
          function_alert($password_err);
     } elseif (strlen(trim($_POST['exampleInputPassword1'])) < 6) {
          $password_err = "Password cannot be less than 6 character";
          function_alert($password_err);
     } else {
          $password = trim($_POST['exampleInputPassword1']);
     }

     // Check for confirm password
     if (trim($_POST['exampleInputPassword2']) != trim($_POST['exampleInputPassword1'])) {
          $con_password_err = "Password should match";
          function_alert($con_password_err);
     }

     if (empty($fname_err) && empty($email_err) && empty($password_err) && empty($con_password_err)) {

          $query = "INSERT INTO admin_tbl(name,email,password,is_verified) VALUES (?, ?, ?, ?)";
          $stmt = mysqli_prepare($conn, $query);

          if ($stmt) {
               mysqli_stmt_bind_param($stmt, "ssss", $param_fname, $param_email, $param_password, $is_verified);

               // Set this parameters
               $param_fname = $fname;
               $param_email = $email;
               $param_password = password_hash($password, PASSWORD_DEFAULT);
               $is_verified = 0;

               // Try to execute the query
               if (mysqli_stmt_execute($stmt)) {
                    $otp = mt_rand(111111, 999999);
                    $to_email = $email;
                    $subject = "OTP Verification";
                    $body = "Hello, welcome to Automatic Time-Table genetrating system. Your OTP is $otp.";
                    $headers = "From: group7915@gmail.com";

                    $isSent = "non";
                    if (mail($to_email, $subject, $body, $headers)) {
                         $isSent = "true";
                    } else {
                         $isSent = "false";
                    }
                    $_SESSION['otp'] = $otp;
                    $_SESSION['admin_email'] = $email;
                    $_SESSION['is_sent'] = $isSent;
                    $_SESSION['from_login'] = "false";
                    $_SESSION['from_forget_password'] = "false";
                    header("location: otp_verify.php");
               } else {
                    echo "Something went wrong";
               }
          }
          mysqli_stmt_close($stmt);
     }
     mysqli_close($conn);
}

?>

<div style="margin-top: 15px;">
</div>
<div>
     <div style="margin-top: 45px;"></div>
     <div class="container">
          <div class="row">
               <div class="col-md-8" style="padding:25px;">
                    <div>
                         <h2 style="text-align: start">Welcome!</h2>
                    </div>
                    <div style="text-align: start">
                         <label class="lead">
                              With the help of our website you can easily
                              generate the time-table with only few clicks
                              and also very quickly. You need to register first
                              to use our website. If you have already then just
                              login and continue.
                         </label>
                    </div>
               </div>
               <div class="col-md-4">
                    <div class="card" style="padding:25px;">
                         <h3 style="text-align: center">Register</h3>
                         <div style="margin-top:15px;"></div>
                         <form action="" method="post">

                              <div class="form-group">
                                   <label for="exampleInputName">Full name</label>
                                   <div style="margin-top:15px;"></div>
                                   <input type="text" class="form-control" id="exampleInputName" name="exampleInputName" placeholder="First name" aria-label="First name" value="<?php $fname ?>">
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div class="form-group">
                                   <label for="exampleInputEmail">Email address</label>
                                   <div style="margin-top:15px;"></div>
                                   <input type="email" class="form-control" id="exampleInputEmail" name="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter email" value="<?php $email ?>">
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div class="form-group">
                                   <label for="exampleInputPassword1">Password</label>
                                   <div style="margin-top:15px;"></div>
                                   <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" placeholder="Password" value="<?php $password ?>">
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div class="form-group">
                                   <label for="exampleInputPassword2">Confirm Password</label>
                                   <div style="margin-top:15px;"></div>
                                   <input type="password" class="form-control" id="exampleInputPassword2" name="exampleInputPassword2" placeholder="Confirm Password" value="<?php $con_password ?>">
                              </div>
                              <div style="margin-top: 25px;"></div>
                              <div style="text-align:center">
                                   <div style="margin-top:15px;"></div>
                                   <button type="submit" class="btn btn-primary col-6">Register</button>
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div style="text-align:center">
                                   <label>Already having an account </label> <a href="index.php" class="link-primary"> Log In!!</a>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php
include('master_page/footer.php');
?>