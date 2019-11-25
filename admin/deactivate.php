<?php
include '../assets/db/dbconnect.php';
$conn = OpenCon();
session_start();
if (isset($_GET['id'])) {
  $idx = $_GET['id'];

  $sqlUp = "UPDATE carpool_users set active = 'FALSE' WHERE user_id='$idx'";
  if ($conn->query($sqlUp)===TRUE) {
    $_SESSION['SuccessDeactivate'] = "Successfully Deactivated Account with ID: $idx";
    header('Location: index.php');
  }
}else {
  header('Location: index.php');
}
 ?>
