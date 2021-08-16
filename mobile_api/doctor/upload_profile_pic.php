<?php
include '../dbCon.php';
$resp = array();
$status = "0"; $message = "Server Method Error";
$data = [];
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $doctor_id = $_POST['doctor_id'];
    $profile_pic = $_POST['profile_pic'];
    //echo $profile_pic; exit;
    
    if(!empty($doctor_id) && !empty($profile_pic))
    {
        //upload profile_pic 
        define('UPLOAD_DIR', '../../admin/upload/doctor/'); 
        
        $profile_pic ="data:image/jpeg;base64,".$profile_pic;
    
        list($type, $profile_pic) = explode(';', $profile_pic);
        list(, $profile_pic)      = explode(',', $profile_pic);
        $profile_pic = base64_decode($profile_pic);
        $profile_pic_file = 'profile_pic_'.uniqid() . '.png';
        file_put_contents(UPLOAD_DIR . $profile_pic_file, $profile_pic);
    
        $update_sql = "UPDATE doctors SET cover_pic = '$profile_pic_file' WHERE id='$doctor_id'";
        if(mysqli_query($con, $update_sql))
        {
            $status = "1";
            $message = "Profile pic uploaded successfully";
        }
        else {
            $message = "Failed to upload profile_pic";
        }
    }
    else
    {
        $message = 'Invalid entry';
    }
}
else{
    $message = "Server Method Error";
}
$resp['status'] = $status;
$resp['message'] = $message;
$resp['data'] = $data;
echo json_encode($resp);
?>