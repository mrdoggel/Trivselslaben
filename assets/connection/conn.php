<?php

$servername = "itfag.usn.no";
$dBusername = "v22u25";
$dBpassword = "passPasso22";
$dBname ="v22db25";

$conn = mysqli_connect($servername, $dBusername, $dBpassword, $dBname);

if (!$conn) {
  die("connection failed: ".mysqli_connect_error());
}
