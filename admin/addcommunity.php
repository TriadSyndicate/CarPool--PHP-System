<?php
require '../assets/db/dbconnect.php';
$conn = OpenCon();
session_start();
if (isset($_SESSION['fname'])) {

if ($_SESSION['user_group_id']=='3') {
$driverupdatealert = "";

if (isset($_POST['submit'])) {
  $insertComm = "INSERT INTO carpool_community(community_name, community_price) VALUES('$_POST[name]', '$_POST[price]')";
  $conn->query($insertComm);
  $driverupdatealert = "Successfully Entered the $_POST[name] Community";
}
?>

<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.10.4, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
  <meta name="description" content="">

  <title>Admin View - Car Pool System</title>
  <link rel="stylesheet" href="../assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="../assets/tether/tether.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="../assets/dropdown/css/style.css">
  <link rel="stylesheet" href="../assets/theme/css/style.css">
  <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="../assets/custom/multistep.css">
</head>
<body>
  <?php include '../layouts/adminNav.php'; ?>
<section class="header9 cid-ruv4FB75N7 mbr-fullscreen mbr-parallax-background" id="header9-1">
      <div class="mbr-overlay" style="opacity: 0.3; background-color: black;">
    </div>

    <div style="background-color:rgba(0, 0, 0, 0.5); margin-top:4%; width:60%;" class="container">
        <div  class="media-container-column mbr-white col-lg-8 col-md-10">
          <h4 style="color:white;" class="align-left mbr-bold pt-5 pb-3 mbr-fonts-style display-6">Welcome <?php echo $_SESSION['fname']; ?></h4>
          <form class="mbr-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <p style="color:white; font-size:15px;">Community Setup</p>
            <hr style="color:white;border-top: 1px solid #ccc;">
            <div class="row">
              <div class="input-wrap align-left" data-for="days">
                <label class="form-label-outside mbr-lighter" for="name">Add Community Name</label><br>
                <input type="text" placeholder="Community Name" name="name">
                  </div>
            </div><br>
            <div class="row">
              <div class="input-wrap align-left" data-for="days">
                <label class="form-label-outside mbr-lighter" for="name">Community Price</label><br>
                <input type="number" placeholder="Community Price" name="price">
                  </div>
            </div><br>
            <div class="row">
              <p style="font-size:30px;" class="text-success"><?php echo $driverupdatealert; ?></p>
            </div><br>

                <div class="row">
                  <input class="mbr-section-btn align-right btn btn-md btn-primary display-4" type="submit" id="submit" name="submit" value="Add Community">
                </div>
          </form>
    </div>
</section>
  <script src="../assets/web/assets/jquery/jquery.min.js"></script>
  <script src="../assets/popper/popper.min.js"></script>
  <script src="../assets/tether/tether.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/smoothscroll/smooth-scroll.js"></script>
  <script src="../assets/parallax/jarallax.min.js"></script>
  <script src="../assets/dropdown/js/nav-dropdown.js"></script>
  <script src="../assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="../assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="../assets/theme/js/script.js"></script>
</body>
</html>
<?php }else {
header('Location: ../login.php');
} }else {
header('Location: ../login.php');
}?>
