<?php
session_start();
require_once('assets/db/dbconnect.php');
$conn = OpenCon();
$sqlcommunity = "SELECT * FROM carpool_community";
$communitydata = $conn->query($sqlcommunity);
if (isset($_SESSION['fname'])) {
  if (isset($_POST['submit'])) {
    if ($_POST['usergroup']=='PASSENGER') {
      $usergroupid = 2;
      $_SESSION['user_group_id'] = $usergroupid;
    }
    elseif ($_POST['usergroup']=='DRIVER') {
      $usergroupid = 1;
      $_SESSION['user_group_id'] = $usergroupid;
    }
    $uniqueEmail = $_SESSION['email'];
    $updateusersql = "UPDATE carpool_users SET new_account='FALSE',active='TRUE',phonenumber='$_POST[phonenumber]',idnumber='$_POST[idnumber]',gender='$_POST[gender]',dateofbirth='$_POST[dob]',community='$_POST[community]',address='$_POST[address]',user_group_id='$usergroupid' WHERE email='$uniqueEmail'";
    if ($conn->query($updateusersql)===TRUE) {
      if ($usergroupid==1) {
        $insertdriver = "INSERT INTO carpool_drivers(driver_id)VALUES('$_SESSION[user_id]')";
        $conn->query($insertdriver);
        header("Location: driver.php");
      }
      elseif ($usergroupid==2) {
        header("Location: user.php");
      }
    }
  }
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

  <title>Account Setup - Car Pool System</title>
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
  <?php include 'layouts/loggedNav.php'; ?>
<section class="header9 cid-ruv4FB75N7 mbr-fullscreen mbr-parallax-background" id="header9-1">
      <div class="mbr-overlay" style="opacity: 0.3; background-color: black;">
    </div>

    <div style="background-color:rgba(0, 0, 0, 0.5); margin-top:4%; width:60%;" class="container">
        <div class="media-container-column mbr-white col-lg-8 col-md-10">
            <h4 style="color:white;" class="align-left mbr-bold pt-5 pb-3 mbr-fonts-style display-6">Initial Account Setup</h4>
                <form class="mbr-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <p style="color:white; font-size:15px;">Personal Data</p>
                  <hr style="color:white;border-top: 1px solid #ccc;">
                  <div class="row">
                    <div style="margin-left:2%; width:35%;" class="input-wrap align-left" data-for="idnumber">
                      <label class="form-label-outside mbr-lighter" for="idnumber">ID Number</label>
                      <input type="number" class="form-control" name="idnumber" placeholder="ID Number" required id="idnumber">
                    </div>
                      <div style="margin-left:10%;width:35%;" class="input-wrap" data-for="phonenumber">
                        <label class="form-label-outside mbr-lighter" for="phonenumber">Phone Number</label>
                          <span class="input-wrap-prepend">(+254)</span>
                        <input type="number" class="form-control" name="phonenumber" placeholder="734042442" min="9" maxlength="10" required id="phonenumber">
                      </div>
                  </div><br>
                  <div class="row">
                    <div style="margin-left:2%;width:35%;" class="input-wrap" data-for="dob">
                      <label class="form-label-outside mbr-lighter" for="dob">Date Of Birth</label>
                      <input type="date" class="form-control" name="dob" required id="dob">
                    </div>
                    <div style="margin-left:10%; margin-top:5%;" class="" data-for="gender">
                      <label for="gender">Gender</label><br>
                      <input type="radio"  name="gender" checked required value="Female">Female &nbsp;&nbsp;&nbsp;
                      <input type="radio"  name="gender" required value="Male">Male
                    </div>
                  </div>
                  <br>
                  <p style="color:white; font-size:15px;">Address Information</p>
                  <hr style="color:white;border-top: 1px solid #ccc;">
                  <div class="row">
                    <div style="margin-left:2%; width:35%;" class="input-wrap align-left" data-for="community">
                      <label class="form-label-outside mbr-lighter" for="community">Community</label>
                      <select class="form-control" name="community" required id="community">
                        <?php while ($rowz = $communitydata->fetch_assoc()) {?>
                          <?php echo "<option>$rowz[community_name]</option>";} ?>
                      </select>
                    </div>
                      <div style="margin-left:10%;width:50%;" class="input-wrap" data-for="address">
                        <label class="form-label-outside mbr-lighter" for="address">Address</label>
                        <input type="textarea" class="form-control" name="address" placeholder="Address" required id="address">
                      </div>
                  </div><br>
                  <p style="color:white; font-size:18px;">Carpool Distinction</p>
                  <hr style="color:white;border-top: 1px solid #ccc;">
                  <div class="row">
                    <div style="margin-left:2%;width:50%;" class="input-wrap" data-for="address">
                      <label class="form-label-outside mbr-lighter" for="usergroup">Will you be a Driver or Passenger?</label>
                      <select class="form-control" name="usergroup" required id="usergroup">
                        <option>DRIVER</option>
                        <option>PASSENGER</option>
                      </select>
                    </div>
                  </div>
                  <br>
                      <div class="row">
                        <input class="mbr-section-btn align-right btn btn-md btn-primary display-4" type="submit" name="submit" value="Setup Account">
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
<?php } else {
  header("Location: login.php");
} ?>
