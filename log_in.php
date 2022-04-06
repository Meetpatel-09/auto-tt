<?php
require_once "web_config/config.php";

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

if (isset($_SESSION['pwdChanged'])) {
     function_alert('Password Changed successfully');
}

$email = $password = "";
$email_err = $password_err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {

     // Check if email is empty
     if (empty(trim($_POST['exampleInputEmail1']))) {
          $email_err = "Please enter email";
          function_alert($email_err);
     } else {
          $email = trim($_POST['exampleInputEmail1']);
     }

     // Check if password is empty
     if (empty(trim($_POST['exampleInputPassword1']))) {
          $password_err = "Please enter password";
          function_alert($password_err);
     } else {
          $password = trim($_POST['exampleInputPassword1']);
     }

     if (empty($email_err) && empty($password_err)) {
          $sql = "SELECT admin_id, email, is_verified, password FROM admin_tbl WHERE email = ?";
          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, "s", $param_email);
          $param_email = $email;

          // Try to execute this statement
          if (mysqli_stmt_execute($stmt)) {
               mysqli_stmt_store_result($stmt);
               if (mysqli_stmt_num_rows($stmt) == 1) {

                    mysqli_stmt_bind_result($stmt, $id, $email, $is_verified, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {

                         if ($is_verified) {

                              if (password_verify($password, $hashed_password)) {

                                   // this means the password is corrct. Allow user to login
                                   $_SESSION["admin_email"] = $email;
                                   $_SESSION["admin_id"] = $id;
                                   $_SESSION["logged_in"] = true;

                                   //Redirect user to welcome page
                                   header("location: home.php");
                              } else {
                                   function_alert("Invalid Password");
                              }
                         } else {
                              function_alert("Account not verified");
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
                              $_SESSION['from_login'] = "true";
                              $_SESSION['from_forget_password'] = "false";
                              header("location: otp_verify.php");
                         }
                    } else {
                         function_alert("Internal server error");
                    }
               } else {
                    $sql = "SELECT faculty_id, email, password, admin_id FROM faculty WHERE email = ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $param_email);
                    $param_email = $email;

                    // Try to execute this statement
                    if (mysqli_stmt_execute($stmt)) {
                         mysqli_stmt_store_result($stmt);
                         if (mysqli_stmt_num_rows($stmt) == 1) {

                              mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password, $admin_id);
                              if (mysqli_stmt_fetch($stmt)) {

                                   if (password_verify($password, $hashed_password)) {
                                        $_SESSION["staff_email"] = $email;
                                        $_SESSION["staff_id"] = $id;
                                        $_SESSION["admin_id"] = $admin_id;
                                        $_SESSION["logged_in"] = true;

                                        //Redirect user to welcome page
                                        header("location: staff_home.php");
                                   }
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
          } else {
               function_alert("Internal server error");
          }
     }
}

?>

<div class="card" style="padding:25px;">
     <h3 style="text-align: center">Log In</h3>
     <div style="margin-top:15px;"></div>
     <form action="" method="post">
          <div class="form-group">
               <label for="exampleInputEmail1">Email address</label>
               <div style="margin-top:15px;"></div>
               <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div style="margin-top:15px;"></div>
          <div class="form-group">
               <label for="exampleInputPassword1">Password</label>
               <div style="margin-top:15px;"></div>
               <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" placeholder="Password">
          </div>
          <div style="margin-top:15px;"></div>
          <div style="text-align:end">
               <a href="forget_password.php" class="link-primary">Forgot Password?</a>
          </div>
          <div style="text-align:center">
               <div style="margin-top:15px;"></div>
               <button type="submit" class="btn btn-primary col-6">Log In</button>
          </div>
          <div style="margin-top:15px;"></div>
          <div style="text-align:center">
               <label>Don't have an account </label> <a href="register.php" class="link-primary"> Register Now!!</a>
          </div>
     </form>
</div>