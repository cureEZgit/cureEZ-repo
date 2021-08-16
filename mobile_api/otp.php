<?php 
$resp = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(!empty($_POST['mobile']))
    {
        //send sms -- START --
        $mobile = $_POST['mobile'];
        
        //get user details 
        
        $user_name = 'user';
        $otp = rand(1000,9999);
        $otp = 1234;
        $purpose_type = 'login';
        
        $username = "arun@cureez.com";
        $hash = "f2132e955cc0866ba366679f5dc469df087726ea984ba1caed711c033f711f69";
        // Config variables. Consult http://api.textlocal.in/docs for more info.
        $test = "0";
        // Data for text message. This is the text message data.
        $sender = "ADCURE"; // This is who the message appears to be from.
        $numbers = $mobile; // A single number or a comma-seperated list of numbers
        //$message = 'Dear '.$username.', '.$otp.' is the OTP for your '.$purpose_type.'to the CureEZ Digital HealthCare Platform. Thanks for using CureEZ.';
        
        $message = 'Dear '.$user_name.', '.$otp.' is the OTP for your '.$purpose_type.'to the CureEZ Digital HealthCare Platform. Thanks for using CureEZ.';
        
        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        $message = urlencode($message);
        $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        $ch = curl_init('http://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        curl_close($ch);
        //send sms -- END --
        
        echo $result; exit;
        
        $resp['status'] = "1";
        $resp['otp'] = $otp;
        $resp['message'] = "OTP sent success";
        $resp['data'] = "No data Found";
    }
    else {
        ///if server method is error
        $resp['status'] = "0";
        $resp['message'] = "Invalid Mobile No";
        $resp['data'] = "No data Found";
    }
}else{

    ///if server method is error
    $resp['status'] = "0";
    $resp['message'] = "Server Method Error";
    $resp['data'] = "No data Found";
}

echo json_encode($resp);
?>