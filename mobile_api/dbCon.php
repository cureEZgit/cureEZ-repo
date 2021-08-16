<?php
header("Access-Control-Allow-Origin:*");
$con = mysqli_connect('localhost','root','Welcome#123','cureez');
mysqli_set_charset($con,"utf8");
if(mysqli_errno($con))
{
echo "faild to connect";
}

$base_url = 'http://cureez.in/';
$user_api_url = 'http://cureez.in/mobile_api/';
$doctor_api_url = 'http://cureez.in/mobile_api/doctor/';
?>
