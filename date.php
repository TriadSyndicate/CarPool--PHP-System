<?php
echo date('l');
echo "<br>";
echo date('Y-m-d', strtotime( ' + 1 days'));
echo "<br>";
echo date('Y-m-d', strtotime( ' + 30 days'));
echo "<br>";echo "<br>";

$date1 = date('Y-m-d');
$date2 = date('Y-m-d', strtotime( ' + 1 days'));
$date3 = date('Y-m-d', strtotime( ' + 2 days'));
$date4 = date('Y-m-d', strtotime( ' + 3 days'));
$date5 = date('Y-m-d', strtotime( ' + 4 days'));
$date6 = date('Y-m-d', strtotime( ' + 5 days'));
$date7 = date('Y-m-d', strtotime( ' + 6 days'));
$date8 = date('Y-m-d', strtotime( ' + 3 months'));

echo "<br>";
echo date('l',strtotime($date1));
echo "<br>";
echo $date1;
echo "<br>";
echo date('l',strtotime($date8));
echo "<br>";
echo $date8;

if (date('l',strtotime($date1))=='Thursday') {
  echo 'its thursday';
}
 ?>
