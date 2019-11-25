<?php
require './assets/db/dbconnect.php';
$conn = OpenCon();
$emailArray = [];
$sqlcarpoolusers = "SELECT * FROM carpool_users";
$regdetails = $conn->query($sqlcarpoolusers);
while ($rowusers = $regdetails->fetch_assoc()) {
  array_push($emailArray,$rowusers["email"]);
}
CloseCon($conn);
?>

<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v4.10.4, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.10.4, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
  <meta name="description" content="">

  <title>Registration - Car Pool System</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="assets/custom/multistep.css">
</head>
<body>
  <?php include 'layouts/nav.php'; ?>
<section class="header9 cid-ruv4FB75N7 mbr-fullscreen mbr-parallax-background" id="header9-1">
      <div class="mbr-overlay" style="opacity: 0.3; background-color: black;">
    </div>

    <div class="container">
        <div  class="media-container-column mbr-white col-lg-8 col-md-10">
          <div style="margin:5%;width:100%;" class="signup-form">
      <form style=" padding:30px; background-color:rgba(0, 0, 0, 0.5);" action="assets/db/insertuser.php" method="post">
  		<h2 style="color:white;">Register</h2>
  		<p style="color:white;" class="hint-text">Create your account. It's free and only takes a minute.</p>
  			<div class="form-group">
  				<div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
  			</div>
        <div class="form-group">
          <div class="col-xs-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
        </div>
          <div class="form-group">
          	<input type="email" class="form-control" id="emailaddress" name="email" placeholder="Email" required="required">
          </div>
  		<div class="form-group">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
          </div>
  		<div class="form-group">
              <input type="password" class="form-control" id="confirmpassword" name="confirm_password" placeholder="Confirm Password" required="required">
          </div>
  		<div class="form-group">
            <button id="submit" name="submit" type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
      </div>
      	<div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
      </form>
  </div>
    </div>
    </div>
</section>
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/dropdown/js/nav-dropdown.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#submit").on('click', function(e){
        var email = $("#emailaddress").val();
        var pass = $("#password").val();
        var cpass = $("#confirmpassword").val();

        if (email=='<?php foreach($emailArray as $key => $value){echo "$value";}?>') {
        alert('Email has already been Taken!');
        e.preventDefault();
        return false;
        }
        if (pass!=cpass) {
        alert("Passwords Must Match");
        e.preventDefault();
        return false;
        }
      });
    });
  </script>
</body>
</html>
