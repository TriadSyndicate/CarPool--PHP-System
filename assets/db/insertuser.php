<?php
require 'dbconnect.php';
$conn = OpenCon();
$hashedPass = password_hash($_POST['password'],PASSWORD_DEFAULT);
$insertsql = "INSERT INTO carpool_users(firstname,lastname,email,password) VALUES('$_POST[first_name]','$_POST[last_name]','$_POST[email]','$hashedPass')";
if ($conn->query($insertsql)===TRUE) {
  header("Location: ../../activate.php");
}
else {
  echo $conn->error;
}
?>
