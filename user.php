<?php
require './assets/db/dbconnect.php';
$conn = OpenCon();
session_start();
if (isset($_SESSION['fname'])) {

if ($_SESSION['user_group_id']=='2') {
$date1 = date('Y-m-d');
$wantedDate=$comm="";
$date2 = date('Y-m-d', strtotime( ' + 1 days'));
$date3 = date('Y-m-d', strtotime( ' + 2 days'));
$date4 = date('Y-m-d', strtotime( ' + 3 days'));
$date5 = date('Y-m-d', strtotime( ' + 4 days'));
$date6 = date('Y-m-d', strtotime( ' + 5 days'));
$date7 = date('Y-m-d', strtotime( ' + 6 days'));
$date8 = date('Y-m-d', strtotime( ' + 7 days'));
$sqlcommunity = "SELECT * FROM carpool_community";
$communitydata = $conn->query($sqlcommunity);
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

  <title>User Dashboard - Car Pool System</title>
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
  <?php include 'layouts/loggeduserNav.php'; ?>
<section class="header9 cid-ruv4FB75N7 mbr-fullscreen mbr-parallax-background" id="header9-1">
      <div class="mbr-overlay" style="opacity: 0.3; background-color: black;">
    </div>

    <div style="background-color:rgba(0, 0, 0, 0.5); margin-top:4%; width:60%;" class="container">
        <div  class="media-container-column mbr-white col-lg-8 col-md-10">
          <h4 style="color:white;" class="align-left mbr-bold pt-5 pb-3 mbr-fonts-style display-6">Welcome <?php echo $_SESSION['fname']; ?></h4>
              <form class="mbr-form" action="carpool.php" method="post">
                <p style="color:white; font-size:15px;">Booking Area & Day of the Week</p>
                <hr style="color:white;border-top: 1px solid #ccc;">
                <div class="row">
                  <div style="margin-left:2%; width:35%;" class="input-wrap align-left" data-for="community">
                    <label class="form-label-outside mbr-lighter" for="community">Community</label>
                    <select class="form-control" name="community" required id="community">
                      <?php while ($rowz = $communitydata->fetch_assoc()) {?>
                        <?php echo "<option>$rowz[community_name]</option>";} ?>
                    </select>
                  </div>
                  <div style="margin-left:10%;width:35%;" class="input-wrap" data-for="days">
                    <label class="form-label-outside mbr-lighter" for="days">Days</label>
                     <select class="form-control" name="days" required id="days">
                       <option>Monday</option>
                       <option>Tuesday</option>
                       <option>Wednesday</option>
                       <option>Thursday</option>
                       <option>Friday</option>
                     </select>
                  </div>
                </div><br>
                    <div class="row">
                      <input class="mbr-section-btn align-right btn btn-md btn-primary display-4" type="submit" id="submit" name="submit" value="Look Up Car Pool">
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
<?php }else {
header('Location: protectedUser.php');
} }else {
header('Location: login.php');
}?>
