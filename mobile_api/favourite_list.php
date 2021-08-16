<?php
include 'dbCon.php';
$resp = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $user_id = $_POST['user_id'];
    $homepage = "SELECT favourite.*,doctors.*, DATEDIFF(NOW(), doctors.practice_starts) as total_experience, category.name as category_name FROM `favourite`,`doctors`,`category` WHERE  doctors.id=favourite.doctor_id AND category.id=doctors.speciality AND favourite.user_id='$user_id' ORDER BY favourite.id DESC";
    //echo $homepage;exit;
    $run1 = mysqli_query($con, $homepage);
    while($data1=mysqli_fetch_assoc($run1))
    {
        $total_experience = $data1['total_experience'];
        $total_experience = ceil($total_experience/365);
        if($total_experience > 1)
            $data1['experience'] = $total_experience.' years';
        else
            $data1['experience'] = $total_experience.' year';
              
        $language = unserialize($data1['language']);
        $data1['language'] = implode(',',$language);
        $data1['cover_pic'] = $base_url."admin/upload/doctor/".$data1['cover_pic'];
        
        //check if favourite
        $fav_sql = "select id from favourite where user_id = ".$user_id." and doctor_id=".$data1['doctor_id'];
        $fav_query = mysqli_query($con, $fav_sql);
        if(mysqli_num_rows($fav_query) > 0)
        {
            $data1['favourite'] = 1;
        }
        else {
            $data1['favourite'] = 0;
        }
        
        $display1[]= $data1;
    }
    if(!empty($display1)){
        $resp['status'] = 1;
        $resp['message'] = "Data found successfully";
        $resp['data'] = $display1;
    }else
    {
        $resp['status'] =2;
        $resp['message'] = "No data found";
    }
}else{
    ///if server method is error
    $resp['status'] = "0";
    $resp['message'] = "Server Method Error";
    $resp['data'] = "No Data Found";
}
echo json_encode($resp);
?>