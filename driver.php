<?php
require './assets/db/dbconnect.php';
$conn = OpenCon();
session_start();
if (isset($_SESSION['fname'])) {

if ($_SESSION['user_group_id']=='1') {
$monday=$tuesday=$wednesday=$thursday=$friday=$driverupdatealert=$passenger="";
if (isset($_POST['submit'])) {
  if (isset($_POST['monday'])) {
    $monday = 1;
  }else {
    $monday = 0;
  }
  if (isset($_POST['tuesday'])) {
    $tuesday = 1;
  }else {
    $tuesday = 0;
  }
  if (isset($_POST['wednesday'])) {
    $wednesday = 1;
  }else {
    $wednesday = 0;
  }
  if (isset($_POST['thursday'])) {
    $thursday = 1;
  }else {
    $thursday = 0;
  }
  if (isset($_POST['friday'])) {
    $friday = 1;
  }else {
    $friday = 0;
  }
  if (isset($_POST['passenger'])) {
    $passenger = $_POST['passenger'];
  }
  $updatedriversql = "UPDATE carpool_drivers SET monday='$monday',tuesday='$tuesday',wednesday='$wednesday',thursday='$thursday',friday='$friday' WHERE driver_id='$_SESSION[user_id]'";
  if ($conn->query($updatedriversql)===TRUE) {
    $driverupdatealert = "Successfully Updated the Carpool schedule";
  }
}
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

  <title>Driver Update - Car Pool System</title>
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
  <?php include 'layouts/loggedDriverNav.php'; ?>
<section class="header9 cid-ruv4FB75N7 mbr-fullscreen mbr-parallax-background" id="header9-1">
      <div class="mbr-overlay" style="opacity: 0.3; background-color: black;">
    </div>

    <div style="background-color:rgba(0, 0, 0, 0.5); margin-top:4%; width:60%;" class="container">
        <div  class="media-container-column mbr-white col-lg-8 col-md-10">
          <h4 style="color:white;" class="align-left mbr-bold pt-5 pb-3 mbr-fonts-style display-6">Welcome <?php echo $_SESSION['fname']; ?></h4>
              <form class="mbr-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <p style="color:white; font-size:15px;">Driver Setup</p>
                <hr style="color:white;border-top: 1px solid #ccc;">
                <div class="row">
                  <div class="input-wrap align-left" data-for="days">
                    <label class="form-label-outside mbr-lighter" for="days">Days of The Week</label><br>
                    <input type="checkbox"  name="monday" id="monday" value="Monday">Monday<br>
                    <input type="checkbox"  name="tuesday" id="tuesday"value="Tuesday">Tuesday<br>
                    <input type="checkbox"  name="wednesday"id="wednesday" value="Wednesday">Wednesday<br>
                    <input type="checkbox"  name="thursday"id="thursday" value="Thursday">Thursday<br>
                    <input type="checkbox"  name="friday"id="friday" value="Friday">Friday<br>
                  </div>
                  <div style="margin-left:10%;width:35%;" class="input-wrap" data-for="passenger">
                    <label class="form-label-outside mbr-lighter" for="passenger">Number of Passengers for the Car</label>
                    <input type="number" class="form-control" name="passenger" placeholder="Number of Passengers" required id="passenger">
                  </div>
                </div><br>
                <div class="row">
                  <p style="font-size:30px;" class="text-success"><?php echo $driverupdatealert; ?></p>
                </div><br>

                    <div class="row">
                      <input class="mbr-section-btn align-right btn btn-md btn-primary display-4" type="submit" id="submit" name="submit" value="Update Driver">
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
  <script type="text/javascript">
    $(document).ready(function(){
      $("#submit").on('click', function(e){
      var monday = document.getElementById("monday");
      var tuesday = document.getElementById("tuesday");
      var wednesday = document.getElementById("wednesday");
      var thursday = document.getElementById("thursday");
      var friday = document.getElementById("friday");
      var passenger = $("#passenger").val();

      if (friday.checked==false && thursday.checked==false && wednesday.checked==false && tuesday.checked==false && monday.checked==false) {
        alert('You need to pick at least one day');
        e.preventDefault();
        return false;
      }

      if (passenger<=0 || passenger>7) {
        alert('You need to pick passengers between 1-7');
        e.preventDefault();
        return false;
      }
      });
    });
  </script>
</body>
</html>
<?php }else {
header('Location: protectedDriver.php');
} }else {
header('Location: login.php');
}?>
