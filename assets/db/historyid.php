<?php
require 'dbconnect.php';
$conn = OpenCon();
session_start();
$driverid = $_GET['id'];
$driverphone=$userphone=$driveraddress=$useraddress=$recordalreadyexists=$drivermessage=$usermessage=$drivermsg=$usermsg=$driveremail=$useremail="";
$datebooked = $_GET['date'];
$userid = $_SESSION['user_id'];
$sqluserx = "SELECT * FROM carpool_users";
$sqlhistory = "SELECT * FROM carpool_history";
$historyxdata = $conn->query($sqlhistory);
$userxdata = $conn->query($sqluserx);
while ($rowhistoryx = $historyxdata->fetch_assoc()) {
  if ($rowhistoryx['date']==$datebooked && $rowhistoryx['user_id']==$userid) {
    $recordalreadyexists = 'TRUE';
  }
}
if ($recordalreadyexists!='TRUE') {
  while ($rowuserxdata=$userxdata->fetch_assoc()) {
    if ($rowuserxdata['user_id'] == $driverid) {
      $driverphone = $rowuserxdata['phonenumber'];
      $driveraddress = $rowuserxdata['address'];
      $driveridnumber = $rowuserxdata['idnumber'];
      $drivercommunity = $rowuserxdata['community'];
      $driverfirstname = $rowuserxdata['firstname'];
      $driveremail = $rowuserxdata['email'];
    }
    if ($rowuserxdata['user_id'] == $userid) {
      $userphone = $rowuserxdata['phonenumber'];
      $useraddress = $rowuserxdata['address'];
      $useridnumber = $rowuserxdata['idnumber'];
      $usercommunity = $rowuserxdata['community'];
      $userfirstname = $rowuserxdata['firstname'];
      $useremail = $rowuserxdata['email'];
    }
  }
  $insertHistorySQL = "INSERT INTO carpool_history(user_id,driver_id,`date`) VALUES('$userid','$driverid','$datebooked')";
  if ($conn->query($insertHistorySQL)===TRUE) {
    $last_id = $conn->insert_id;
    $drivermessage ="USER BOOKING DATE: $datebooked Name: $userfirstname  Phone: +254$userphone. Community: $usercommunity Address: $useraddress Booking ID: $last_id";
    $usermessage = "You just booked a carpool on: $datebooked. Driver Name: $driverfirstname
     and Phone: +254$driverphone. Community: $drivercommunity Address: $driveraddress with a Booking ID: $last_id";
     $_SESSION['booking_id'] =  $last_id;
     $_SESSION['drivername'] = $driverfirstname;
     $_SESSION['driveraddress'] = $driveraddress;
     $_SESSION['drivercomm'] = $drivercommunity;
     $_SESSION['datebooked'] = $datebooked;
    $drivermsg = array('to'=>'254'.$driverphone, 'message'=>$drivermessage);
     $usermsg = array('to'=>'254'.$userphone, 'message'=>$usermessage);
    include '../clock/index.php';
    sendSMS($drivermsg,$usermsg);
    //include '../../html.php';
  }
}else {
  header('Location: ../../failed.php');
}

 ?>
