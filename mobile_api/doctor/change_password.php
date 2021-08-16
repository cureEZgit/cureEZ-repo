<?php 
/**
* Module : Register Journalist
* Author: Prasenjit Behera
* prasenjit.wayindia@gmail.com
*
* Created On : 2020-03-13
*
**/
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Asia/Kolkata');
include '../dbCon.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $resp =array();
    $doctor_id = $_POST['doctor_id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    if($doctor_id !='' && $old_password!='' && $new_password!='')
    {
        if($old_password == $new_password)
        {
            $resp['status'] = 2;
            $resp['message'] = 'New password could not be your old password.';
        }
        else {
            $sel_qry = "SELECT * FROM doctors WHERE id='$doctor_id'";
            $run = mysqli_query($con,$sel_qry); 
            $rows =  mysqli_num_rows($run);
            if($rows>0)
            {
                $rows1 = mysqli_fetch_array($run);
                if($rows1['password'] == $old_password)
                {
                    $upd_sql = "UPDATE doctors SET password = '$new_password' WHERE id=".$doctor_id;
                    $upd_status = mysqli_query($con, $upd_sql);
                    if($upd_status)
                    {
                        $resp['status'] = 1;
                        $resp['message'] = 'Password changed successfully.';
                    }
                    else 
                    {
                        $resp['status'] = 2;
                        $resp['message'] = 'Failed to change password.';
                    }
                }
                else {
                    $resp['status'] = 2;
                    $resp['message'] = 'Incorrect old password.';
                }
            }
            else
            {
                $resp['status'] = 2;
                $resp['message'] = 'Invalid doctor id.';
            }
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