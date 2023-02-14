<?php 
$con = mysqli_connect("localhost","u675218633_hiconnectdemo","Kdc5ea4k$","u675218633_hiconnectdemo");
// Check connection
$base_url = 'https://hiconnect.co.in/hiconnect/';
$backend_url = 'https://hiconnect.co.in/hiconnect/';
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>