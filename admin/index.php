<?php
require '../assets/db/dbconnect.php';
$conn = OpenCon();
session_start();
if (isset($_SESSION['fname'])) {

if ($_SESSION['user_group_id']=='3') {

$getSql = "SELECT * FROM carpool_users";
$driverdata = $conn->query($getSql);
$_SESSION['SuccessDeactivate']="";
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
          <h5 style="color:white;"><?php echo $_SESSION['SuccessDeactivate']; ?></h5>
          <div class="container scroll">
            <table class="table isSearch" cellspacing="0">
              <thead>
                <tr class="table-heads">
                  <th class="head-item mbr-fonts-style display-7">First Name</th>
                  <th class="head-item mbr-fonts-style display-7">Last Name</th>
                  <th class="head-item mbr-fonts-style display-7">Community</th>
                  <th class="head-item mbr-fonts-style display-7">Email</th>
                  <th class="head-item mbr-fonts-style display-7">PhoneNumber</th>
                  <th class="head-item mbr-fonts-style display-7">Gender</th>
                  <th class="head-item mbr-fonts-style display-7">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($rowdriver = $driverdata->fetch_assoc()) {
                    ?>
                <tr>
                  <td class="body-item mbr-fonts-style display-7"><?php echo $rowdriver['firstname']; ?></td>
                  <td class="body-item mbr-fonts-style display-7"><?php echo $rowdriver['lastname']; ?></td>
                  <td class="body-item mbr-fonts-style display-7"><?php echo $rowdriver['community']; ?></td>
                  <td class="body-item mbr-fonts-style display-7"><?php echo $rowdriver['email']; ?></td>
                  <td class="body-item mbr-fonts-style display-7"><?php echo $rowdriver['phonenumber']; ?></td>
                  <td class="body-item mbr-fonts-style display-7"><?php echo $rowdriver['gender']; ?></td>
                  <td class="body-item mbr-fonts-style display-7"class="body-item mbr-fonts-style display-7"><a class="btn btn-primary" href="deactivate.php?id=<?php echo $rowdriver['user_id']; ?>">Deactivate</a></td>
                </tr>
              <?php }?>
              </tbody>
            </table>
          </div>
    </div>
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
