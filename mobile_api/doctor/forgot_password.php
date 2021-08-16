<?php 
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Asia/Kolkata');
include '../dbCon.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $resp =array();
    //$username = $_POST['username'];
    $email = $_POST['email'];
    if($email !='')
    {
        $sel_qry = "SELECT * FROM doctors WHERE email='$email'";
        $run = mysqli_query($con,$sel_qry); 
        $rows =  mysqli_num_rows($run);
        if($rows>0)
        {
            //get forgot_password_code
            $forgot_password_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 7);
            $upd_sql = "UPDATE doctors SET forgot_password_code = '$forgot_password_code' where email='$email'";
            if(mysqli_query($con,$upd_sql))
            {
                //send mail to doctor email 
                $from = 'info@wayindia.com';
                $subject = 'CureEZ: Reset Password- OTP';
                $message = 'Hi,<br> Your Reset password OTP is <strong>'.$forgot_password_code.'</strong>'; 
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: no-reply@wayindia.com';
                // $headers .= 'From: '.$from."\r\n".
                // 'Reply-To: '.$from."\r\n" .
                // 'X-Mailer: PHP/' . phpversion();
    
                if(mail($email, $subject, $message, $headers))
                {
                    $resp['status'] = 1;
                    $resp['password_code'] = $forgot_password_code;
                    $resp['message'] = "Mail sent successfully";
                }
                else
                {
                    $resp['status'] = 2;
                    $resp['message'] = 'Failed to sent mail. Try again later.';
                }
            }
        }
        else
        {
            $resp['status'] = 2;
            $resp['message'] = 'Email not registered';
        }
    }else{
          $resp['status'] = 2;
          $resp['message'] = "All field required";
    }
}else{
    ///if server method is error
    $resp['status'] = 0;
    $resp['message'] = "Server Method Error";
    $resp['data'] = "No data Found";
}
echo json_encode($resp,JSON_UNESCAPED_UNICODE);
mysqli_close($con);
?>