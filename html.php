<?php

  $to      = $driveremail; // Send email to our user
  $subject = 'Passenger Booking Data';

  $message = '<html><body>';
  $message .= '<img src="https://cdn.pixabay.com/photo/2017/09/11/15/34/animals-2739386_1280.jpg" style="width:50%;" alt="Website Change Request" />';
  $message .= "<h1>Passenger Booking Details</h1>";
  $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
  $message .= "<tr style='background: #eee;'><td><strong>Passenger Name:</strong> </td><td>" . $userfirstname . "</td></tr>";
  $message .= "<tr><td><strong>Email:</strong> </td><td>" . $useremail . "</td></tr>";
  $message .= "<tr><td><strong>Phone Number:</strong> </td><td>" . $userphone . "</td></tr>";
  $message .= "<tr><td><strong>Booking ID:</strong> </td><td>" . $last_id . "</td></tr>";
  $message .= "<tr><td><strong>Date:</strong> </td><td>" . $datebooked . "</td></tr>";
  $message .= "<tr><td><strong>Community</strong> </td><td>" . $usercommunity . "</td></tr>";
  $message .= "<tr><td><strong>Address</strong> </td><td>" . $useraddress . "</td></tr>";
  $message .= "</table>";
  $message .= "</body></html>";

  $headers = 'From:politelaravel@gmail.com' . "\r\n"; // Set from headers
  mail($to, $subject, $message, $headers); // Send our email



  $to      = $useremail; // Send email to our user
  $subject = 'Passenger Booking Data';

  $message = '<html><body>';
  $message .= '<img src="https://cdn.pixabay.com/photo/2017/09/11/15/34/animals-2739386_1280.jpg" style="width:50%;" alt="Website Change Request" />';
  $message .= "<h1>Driver Booking Details</h1>";
  $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
  $message .= "<tr style='background: #eee;'><td><strong>Passenger Name:</strong> </td><td>" . $driverfirstname . "</td></tr>";
  $message .= "<tr><td><strong>Email:</strong> </td><td>" . $driveremail . "</td></tr>";
  $message .= "<tr><td><strong>Phone Number:</strong> </td><td>" . $driverphone . "</td></tr>";
  $message .= "<tr><td><strong>Booking ID:</strong> </td><td>" . $last_id . "</td></tr>";
  $message .= "<tr><td><strong>Date:</strong> </td><td>" . $datebooked . "</td></tr>";
  $message .= "<tr><td><strong>Community</strong> </td><td>" . $drivercommunity . "</td></tr>";
  $message .= "<tr><td><strong>Address</strong> </td><td>" . $driveremail . "</td></tr>";
  $message .= "</table>";
  $message .= "</body></html>";

  $headers = 'From:politelaravel@gmail.com' . "\r\n"; // Set from headers
  $headers .= "Reply-To: politelaravel@gmail.com". "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  mail($to, $subject, $message, $headers); // Send our email

    header('Location: ../../success.php');
 ?>
