<?php 
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Asia/Kolkata');
include '../dbCon.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $resp =array();
    //$username = $_POST['username'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    if(!empty($type))
    {
        if($type == 'verify_code')
        {
            $forgot_password_code = $_POST['password_code'];
            if(!empty($forgot_password_code))
            {
                $sel_qry = "SELECT * FROM doctors WHERE email='$email'";
                $run = mysqli_query($con,$sel_qry); 
                $rows =  mysqli_num_rows($run);
                if($rows>0)
                {
                    $rows1 = mysqli_fetch_array($run);
                    if($rows1['forgot_password_code'] == $forgot_password_code)
                    {
                        $resp['status'] = 1;
                        $resp['message'] = 'Password code validated.';
                    }
                    else {
                        $resp['status'] = 2;
                        $resp['message'] = 'Invalid password code.';
                    }
                }
                else
                {
                    $resp['status'] = 2;
                    $resp['message'] = 'Email not registered';
                }
            }
            else{
                $resp['status'] = 2;
                $resp['message'] = "Password code required";
            }
        }
        else if($type == 'reset_password')
        {
            $password = $_POST['password'];
            $email = $_POST['email'];
            if(!empty($password) && !empty($email))
            {
                //update password
                $psw_upd_sql = "UPDATE doctors SET password = '$password', forgot_password_code='' where email='$email'";
                if(mysqli_query($con,$psw_upd_sql))
                {
                    //echo $upd_sql; exit;
                    $resp['status'] = 1;
                    $resp['message'] = 'Password reset successfully.';
                }
                else {
                    $resp['status'] = 2;
                    $resp['message'] = 'Failed to reset password. Try again later.';
                }
            }
            else{
                $resp['status'] = 2;
                $resp['message'] = "All field  required";
            }
        }
    }
    else {
        $resp['status'] = 2;
        $resp['message'] = "Type required";
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