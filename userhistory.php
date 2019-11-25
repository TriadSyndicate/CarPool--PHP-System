<?php
require './assets/db/dbconnect.php';
$conn = OpenCon();
session_start();
if (isset($_SESSION['fname'])) {

if ($_SESSION['user_group_id']=='2') {
  $bookinghistory = "SELECT * FROM carpool_history WHERE user_id='$_SESSION[user_id]'";
  $userdetails = "SELECT * FROM carpool_users";
  $communitysql = "SELECT * FROM carpool_community";
  $bookingresult = $conn->query($bookinghistory);


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

  <title>User Booking History - Car Pool System</title>
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
          <div style="width:100%;" class="">
            <table  class="table isSearch" cellspacing="0">
              <thead>
                <tr class="table-heads">
                  <th class="head-item mbr-fonts-style display-7">Booking ID</th>
                  <th class="head-item mbr-fonts-style display-7">Driver's Name</th>
                  <th class="head-item mbr-fonts-style display-7">Community</th>
                  <th class="head-item mbr-fonts-style display-7">Car Pool Date</th>
                  <th class="head-item mbr-fonts-style display-7">Price</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($rowhistory = $bookingresult->fetch_assoc()) {?>
                <tr>
                  <td class="body-item mbr-fonts-style display-7"><?php echo $rowhistory['id']; ?></td>
                  <td class="body-item mbr-fonts-style display-7"><?php $userresult = $conn->query($userdetails); while($rowuser=$userresult->fetch_assoc()){ if($rowhistory['driver_id']==$rowuser['user_id']){echo $rowuser['firstname'].' '.$rowuser['lastname'];}} ?></td>
                  <td class="body-item mbr-fonts-style display-7"><?php $userresulta = $conn->query($userdetails); while($rowuser=$userresulta->fetch_assoc()){if($rowhistory['driver_id']==$rowuser['user_id']){echo $rowuser['community'];} }?></td>
                  <td class="body-item mbr-fonts-style display-7"><?php echo $rowhistory['date']; ?></td>
                  <td class="body-item mbr-fonts-style display-7"><?php $userresultb = $conn->query($userdetails); while($rowuser=$userresultb->fetch_assoc()){ if($rowhistory['driver_id']==$rowuser['user_id']){ $communityresult = $conn->query($communitysql); while($rowcomm = $communityresult->fetch_assoc()){if($rowcomm['community_name']==$rowuser['community']){echo $rowcomm['community_price'];}}}} ?></td>
                </tr>
              <?php } ?>
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
