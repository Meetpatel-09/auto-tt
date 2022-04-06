<?php

$title = "Forgot Password";
require_once "web_config/config.php";
include('master_page/header.php');

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

$email = "";
$email_err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {

     // Check if email is empty
     if (empty(trim($_POST['exampleInputEmail1']))) {
          $email_err = "Please enter email";
          function_alert($email_err);
     } else {
          $email = trim($_POST['exampleInputEmail1']);
     }

     if (empty($email_err)) {
          $sql = "SELECT admin_id, email FROM admin_tbl WHERE email = ?";
          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, "s", $param_email);
          $param_email = $email;

          // Try to execute this statement
          if (mysqli_stmt_execute($stmt)) {
               mysqli_stmt_store_result($stmt);
               if (mysqli_stmt_num_rows($stmt) == 1) {

                    mysqli_stmt_bind_result($stmt, $id, $email);
                    if (mysqli_stmt_fetch($stmt)) {

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
                         $_SESSION['from_forget_password'] = "true";
                         header("location: otp_verify.php");
                    } else {
                         function_alert("Internal server error");
                    }
               } else {
                    function_alert("Email not registred");
               }
          } else {
               function_alert("Internal server error");
          }
     }
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
                         <h3 style="text-align: center">Forger Password</h3>
                         <div style="margin-top:15px;"></div>
                         <form action="" method="post">
                              <div style="text-align:center">
                                   <label>Enter your registered Email address</label>
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div class="form-group">
                                   <label for="exampleInputEmail1">Email address</label>
                                   <div style="margin-top:15px;"></div>
                                   <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div style="text-align:center">
                                   <div style="margin-top:15px;"></div>
                                   <button type="submit" class="btn btn-primary col-6">Continue</button>
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div style="text-align:center">
                                   <label>To go to Register Page </label> <a href="register.php" class="link-primary"> Click here!!</a>
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