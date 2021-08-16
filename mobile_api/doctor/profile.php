<?php
include '../dbCon.php';
$resp = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $doctor_id = $_POST['doctor_id'];
    if(!empty($doctor_id))
    {
        $sql = "SELECT a.*, DATEDIFF(NOW(), a.practice_starts) as total_experience, b.name as speciality FROM doctors as a inner join category as b on a.speciality=b.id WHERE a.id='$doctor_id'";
        
        //$sql = "SELECT * FROM appointment_booking WHERE doctor_id='$doctor_id' and (status = 'Completed' || status = 'Cancelled') ORDER BY id DESC LIMIT $limit,$offset";
        $run1 = mysqli_query($con, $sql);
        $data1=mysqli_fetch_assoc($run1);
        //echo '<pre>'; print_r($data1); exit;
        
        $total_experience = $data1['total_experience'];
        $total_experience = ceil($total_experience/365);
        if($total_experience > 1)
         $data1['experience'] = $total_experience.' years';
        else
         $data1['experience'] = $total_experience.' year';
        
        $data1['cover_pic'] = $base_url."admin/upload/doctor/".$data1['cover_pic'];
        $resp['status'] = "1";
        $resp['message'] = "Profile details";
        $resp['data'] = $data1;
    }
    else {
        $resp['status'] = "0";
        $resp['message'] = "Server Method Error";
        $resp['data'] = "No data Found";
    }
}
else{
    ///if server method is error
    $resp['status'] = "0";
    $resp['message'] = "Server Method Error";
    $resp['data'] = "No data Found";
}
echo json_encode($resp);