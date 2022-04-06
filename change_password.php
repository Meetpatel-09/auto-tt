<?php

$title = "Change Password";
ob_start();
require_once "web_config/config.php";
include('master_page/header.php');

$email = $_SESSION['admin_email'];

$password = $con_password =  "";
$password_err = $con_password_err = "";

function function_alert($message)
{
     // Display the alert box 
     echo "<script>alert('$message');</script>";
}
// Function call
// function_alert("Welcome to Geeks for Geeks");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

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

     if (empty($password_err) && empty($con_password_err)) {
          $pwd = password_hash($password, PASSWORD_DEFAULT);
          $sql = "UPDATE admin_tbl SET password = '{$pwd}' WHERE email = '{$email}'";

          if ($result = mysqli_query($conn, $sql)) {
               $_SESSION['pwdChanged'] = "true";
               header("location: login.php");
          } else {
               function_alert("Password Not Changed");
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
                         <h3 style="text-align: center">Change Password</h3>
                         <div style="margin-top:15px;"></div>
                         <form action="" method="post">
                              <div class="form-group">
                                   <label for="exampleInputPassword1">New Password</label>
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
                                   <button type="submit" class="btn btn-primary col-6">Save</button>
                              </div>
                              <div style="margin-top:15px;"></div>
                              <!-- <div style="text-align:center">
                                        <label>Already having an account </label> <a href="index.php" class="link-primary"> Log In!!</a>
                                   </div> -->
                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php
include('master_page/footer.php');
?>