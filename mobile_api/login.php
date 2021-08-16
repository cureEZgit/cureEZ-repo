<?php
/*
@@ * @name Check Existance
@@ * @author:Prasenjit Behera
@@ * @mail us at:prasenjit.wayindia@gmail.com
@@ * @copyright:Copyright 2019 Wayindia Software Solution Pvt. Ltd.
*/
//=============================//
//             //
//=============================//
// include header('Content-type: text/html; charset=UTF-8' . "\r\n");
$key='qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
function decryptthis($data, $key) {
    $encryption_key = base64_decode($key); 
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv); 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  include 'dbCon.php';
  date_default_timezone_set("Asia/Kolkata"); 
  $mobile = $_POST['mobile'];
  $check_mobile = "SELECT * FROM user_register WHERE mobile='$mobile'";
  
 $run = mysqli_query($con,$check_mobile);
 $mob_result = mysqli_num_rows($run);
 $all_data = mysqli_fetch_assoc($run);
 if(!empty($all_data['profile_pic']))
 {
     $all_data['profile_pic']=$all_data['profile_pic'];
 }else
 {
     $all_data['profile_pic']="";
 }
 
//   $all_data['name'] = decryptthis($all_data['name'],$key);
//  $all_data['email'] = decryptthis($all_data['email'],$key);
 
   $all_data['name'] = $all_data['name'];
 $all_data['email'] = $all_data['email'];
 if($mob_result>0)
{
    $ress['status'] = 1;
    $ress['message'] = "Data found successfully";
    $ress['img_path'] = $base_url."mobile_api/upload/";
    $ress['mobile'] = "$mobile";
    //send OTP to user
    
    //send otp to user
    $user_name_array = explode(' ',$all_data['name']);
    $user_name = ucfirst(substr($user_name_array[0],0,10));
    $otp = rand(1000,9999);
    $purpose_type = 'login';
    
    $username = "arun@cureez.com";
    $hash = "af5edbd968f65b8a08adb568f67c32915604140f18e2495c7e4300a00dbfe2ef";
    // Config variables. Consult http://api.textlocal.in/docs for more info.
    $test = "0";
    // Data for text message. This is the text message data.
    $sender = "ADCURE"; // This is who the message appears to be from.
    $numbers = $mobile; // A single number or a comma-seperated list of numbers
    
    $message = 'Dear '.$user_name.', '.$otp.' is the OTP for your '.$purpose_type.'to the CureEZ Digital HealthCare Platform. Thanks for using CureEZ.';
    
    // 612 chars or less
    // A single number or a comma-seperated list of numbers
    //$message = urlencode($message);
    //$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
    //$ch = curl_init('http://api.textlocal.in/send/?');
    //curl_setopt($ch, CURLOPT_POST, true);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //$result = curl_exec($ch); // This is the result from the API
    //curl_close($ch);
    
    $apiKey = urlencode('NDI2YjM2NGU2YjMwMzY3NjQ2NDE1NjRhNzI1YTQ2NmY=');
// Message details
$sender = urlencode('ADCURE');
$message = rawurlencode($message);
 
$numbers = $mobile;
 
// Prepare data for POST request
$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
// Send the POST request with cURL
$ch = curl_init('https://api.textlocal.in/send/');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
    
    
    //echo $response; exit;
    //send sms -- END --
    
    $ress['otp'] = $otp;
    $ress['data'] = $all_data;
}else{
    $ress['status'] = 2;
    $ress['message'] = "Not Exist";
    
 }
}else{
    $ress['status'] = 0;
    $ress['message'] = "Sending method Error";
}
echo  json_encode($ress);
?>
