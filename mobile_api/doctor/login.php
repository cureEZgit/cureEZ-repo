<?php 

header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Asia/Kolkata');
include '../dbCon.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $resp =array();
    //$username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email!='' && $password!=''){
        $sel_qry = "SELECT * FROM doctors WHERE email='$email'";
        $run = mysqli_query($con,$sel_qry); 
        $rows =  mysqli_num_rows($run);
        if($rows>0)
        {
            $rows1 = mysqli_fetch_array($run);
            if($rows1['password'] == $password)
            {
                $regid = $rows1['id'];
                $resp['status'] = 1;
                $resp['message'] = 'Login success';
                $resp['doctor_id'] = $regid;
                $resp['name'] = $rows1['name'];
                $resp['email'] = $rows1['email'];
                $resp['clinic_name'] = $rows1['clinic_name'];
                $resp['profile_pic'] = '';
                if(!empty($rows1['cover_pic']))
                    $resp['profile_pic'] = 'https://wayindia.net/indigo/doctor_app/web/admin/upload/doctor/'.$rows1['cover_pic'];
            }
            else 
            {
                $resp['status'] = 2;
                $resp['message'] = 'Incorrect password';
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