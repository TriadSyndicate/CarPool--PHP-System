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
$userstbl = "SELECT * FROM userstbl";
if (isset($_POST['submit'])) {
  $comm = $_POST['community'];
  $dayz = $_POST['days'];
  if ($dayz=='Monday') {
    $sqlcommunity = "SELECT * FROM userstbl WHERE monday='1' AND community='$_POST[community]'";
  }
  elseif ($dayz=='Tuesday') {
    $sqlcommunity = "SELECT * FROM userstbl WHERE tuesday='1' AND community='$_POST[community]'";
  }
  elseif ($dayz=='Wednesday') {
    $sqlcommunity = "SELECT * FROM userstbl WHERE wednesday='1' AND community='$_POST[community]'";
  }
  elseif ($dayz=='Thursday') {
    $sqlcommunity = "SELECT * FROM userstbl WHERE thursday='1' AND community='$_POST[community]'";
  }
  elseif ($dayz=='Friday') {
    $sqlcommunity = "SELECT * FROM userstbl WHERE friday='1' AND community='$_POST[community]'";
  }
  if (date('l',strtotime($date1))==$dayz) {
    $wantedDate = $date1;
  }
  elseif (date('l',strtotime($date2))==$dayz) {
    $wantedDate = $date2;
  }
  elseif (date('l',strtotime($date3))==$dayz) {
    $wantedDate = $date3;
  }
  elseif (date('l',strtotime($date4))==$dayz) {
    $wantedDate = $date4;
  }
  elseif (date('l',strtotime($date5))==$dayz) {
    $wantedDate = $date5;
  }
  elseif (date('l',strtotime($date6))==$dayz) {
    $wantedDate = $date6;
  }
  elseif (date('l',strtotime($date7))==$dayz) {
    $wantedDate = $date7;
  }
  elseif (date('l',strtotime($date8))==$dayz) {
    $wantedDate = $date8;
  }
  $driverdata = $conn->query($sqlcommunity);
  $bookinghistsql = "SELECT * FROM carpool_history";
  $bookdata = $conn->query($bookinghistsql);
  $bookingcount = 0;
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

    <div style="background-color:rgba(0, 0, 0, 0.5); margin-top:4%;" class="container">
        <div  class="media-container-column mbr-white col-lg-8 col-md-10">
          <h4 style="color:white;" class="align-left mbr-bold pt-5 pb-3 mbr-fonts-style display-6">Welcome <?php echo $_SESSION['fname']; ?></h4>
          <div class="container scroll">
            <table class="table isSearch" cellspacing="0">
              <thead>
                <tr class="table-heads">
                  <th class="head-item mbr-fonts-style display-7">First Name</th>
                  <th class="head-item mbr-fonts-style display-7">Address</th>
                  <th class="head-item mbr-fonts-style display-7">Community</th>
                  <th class="head-item mbr-fonts-style display-7">Date</th>
                  <th class="head-item mbr-fonts-style display-7">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($driverdata->num_rows>0) {
                while ($rowdriver = $driverdata->fetch_assoc()) {
                      while ($rowbook = $bookdata->fetch_assoc()) {
                        if ($rowdriver['user_id'] == $rowbook['driver_id'] && $wantedDate == $rowbook['date']) {
                          $bookingcount = $bookingcount + 1;
                        }
                      }

                      if ($bookingcount<$rowdriver['passenger_count']) {
                    ?>
                <tr>
                  <td class="body-item mbr-fonts-style display-7"><?php echo $rowdriver['firstname']; ?></td>
                  <td class="body-item mbr-fonts-style display-7"><?php echo $rowdriver['address']; ?></td>
                  <td class="body-item mbr-fonts-style display-7"><?php echo $rowdriver['community']; ?></td>
                  <td class="body-item mbr-fonts-style display-7"><?php echo $wantedDate; ?></td>
                  <td class="body-item mbr-fonts-style display-7"class="body-item mbr-fonts-style display-7"><a class="btn btn-primary" href="assets/db/historyid.php?id=<?php echo $rowdriver['user_id']; ?>&date=<?php echo $wantedDate; ?>">Book</a></td>
                </tr>
              <?php }}  } else { ?><tr>
                  <td class="body-item mbr-fonts-style display-7">No Results Found</td>
              </tr><?php } ?>
              </tbody>
            </table>
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
</body>
</html>
<?php }else {
header('Location: protectedUser.php');
} }else {
header('Location: login.php');
}?>
