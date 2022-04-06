<?php

$title = "Welcome";
include('master_page/header.php');

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
                    <?php include('log_in.php'); ?>
               </div>
          </div>
     </div>
</div>

<?php
include('master_page/footer.php');
?>