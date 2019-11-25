<?php
session_start();
require 'assets/db/dbConnect.php';
$conn = OpenCon();
$getUserSQL = "SELECT * FROM carpool_users";
$getUserData = $conn->query($getUserSQL);
$loginErr="";
if(isset($_POST['submit'])){
  $inputEmail = $_POST['email'];
  $inputPass = $_POST['password'];
  while ($rowUsers=$getUserData->fetch_assoc()) {
if ($rowUsers['email']==$inputEmail) {
  if (password_verify($inputPass,$rowUsers['password'])) {
    $_SESSION['user_id'] = $rowUsers['user_id'];
    $_SESSION['fname'] = $rowUsers['firstname'];
    $_SESSION['email'] = $rowUsers['email'];
    $newacc = $rowUsers['new_account'];
    $usergroupid = $rowUsers['user_group_id'];
    if ($newacc=='TRUE') {
      header("Location: setup.php");
      die();
    }else {
      $_SESSION['user_group_id'] = $usergroupid;
      if ($usergroupid=='1') {
        header("Location: driver.php");
        die();
      }
      elseif ($usergroupid=='2') {
        header("Location: user.php");
        die();
      }
      elseif ($usergroupid=='3') {
        header("Location: admin/index.php");
        die();
      }
    }
  }else {
  $loginErr = "Sorry but your credentials do not match our records";
}
}
  }}
?>


<!DOCTYPE html>
<html>
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



</head>
<body>
  <?php include 'layouts/nav.php'; ?>
<section class="header9 cid-ruv4FB75N7 mbr-fullscreen mbr-parallax-background" id="header9-1">
      <div class="mbr-overlay" style="opacity: 0.3; background-color: black;">
    </div>

    <div style="background-color:rgba(0, 0, 0, 0.5); width:35%;" class="container">
        <div class="media-container-column mbr-white col-lg-8 col-md-10">
            <h4 style="color:white;" class="align-left mbr-bold pt-2 pb-3 mbr-fonts-style display-2">Login Form</h4>
                <form class="mbr-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <div class="input-wrap" data-for="email">
                    <label class="form-label-outside mbr-lighter" for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required id="email">
                    <span style="color:red;font-size:13px;"><?php echo $loginErr; ?></span>
                  </div><br>
                    <div class="input-wrap" data-for="password">
                      <label class="form-label-outside mbr-lighter" for="email">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password" required id="password">
                    </div><br>
                      <div class="row">
                        <input class="mbr-section-btn align-left btn btn-md btn-secondary display-4" type="submit" name="submit" value="Login">
                      </div>
                </form>
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


</body>
</html>
