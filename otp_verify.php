<?php

$title = "OTP Verification";
require_once "web_config/config.php";
include('master_page/header.php');

$otp = $_SESSION['otp'];
$email = $_SESSION['admin_email'];
$isSent = $_SESSION['is_sent'];
$fromLogin = $_SESSION['from_login'];
$fromFP = $_SESSION['from_forget_password'];

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

     // Check if full name is empty
     if (empty(trim($_POST["exampleInputOTP"]))) {
          $otp_err = "Please enter OTP";
          function_alert($otp_err);
     } else {
          $entered_otp = trim($_POST['exampleInputOTP']);
          if ($entered_otp == $otp) {
               $v = 1;
               $sql = "UPDATE admin_tbl SET is_verified = {$v} WHERE email = '{$email}'";
               $result = mysqli_query($conn, $sql);
               function_alert("OTP Verified");

               if ($fromFP == "true") {
                    header("location: change_password.php");
               } else {
                    header("location: index.php");
               }
          } else {
               function_alert("Invalid OTP");
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
                         <h3 style="text-align: center">OTP Verification</h3>
                         <div style="margin-top:15px;"></div>
                         <form action="" method="post">
                              <div style="text-align:center">
                                   <label>
                                        <?php
                                        if ($isSent == "true") {
                                             if ($fromLogin == "true") {
                                                  echo "Your account was not verified so,";
                                             }
                                             echo "OTP has been sent to $email";
                                        } else {
                                             echo "Something went wrong while sending mail to $email";
                                        }
                                        ?>
                                   </label>
                              </div>
                              <div style="margin-top:25px;"></div>
                              <div class="form-group">
                                   <label for="exampleInputOTP">OTP</label>
                                   <div style="margin-top:15px;"></div>
                                   <input type="number" class="form-control" id="exampleInputOTP" name="exampleInputOTP" aria-describedby="OTPHelp" placeholder="Enter OTP">
                              </div>
                              <div style="text-align:center">
                                   <div style="margin-top:15px;"></div>
                                   <button type="submit" class="btn btn-primary col-6">Verify</button>
                              </div>
                              <div style="margin-top:15px;"></div>
                              <div style="text-align:center">
                                   <label>Don't recieved the OTP</label> <a href="#" class="link-primary"> Resend!!</a>
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