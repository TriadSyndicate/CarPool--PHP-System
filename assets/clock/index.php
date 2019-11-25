<?php
require 'src/Clockwork.php';
require 'src/ClockworkException.php';


   function sendSMS($msg1,$msg2){
     $API_KEY = 'beab34dc96955996f4f29a524d682e7357cfec06';
     try
     {
      // Create a Clockwork object using your API key
         $clockwork = new mediaburst\ClockworkSMS\Clockwork( $API_KEY );

         // Setup and send a message
      $result = $clockwork->send( $msg1 );
      if($result['success']) {
        $resultx = $clockwork->send( $msg2 );
        if ($resultx['success']) {
          header('Location: ../../success.php');
        }else {
          echo 'Message failed 1- Error: ' . $resultx['error_message'];
        }
      }else {
        echo 'Message failed 2 - Error: ' . $result['error_message'];
      }
    }
    catch (mediaburst\ClockworkSMS\ClockworkException $e)
    {
        echo 'Exception sending SMS: ' . $e->getMessage();
    }
}


?>
