<?php
include 'dbCon.php';
$resp = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(!empty($_POST['page_num'])){
        $id = $_POST['page_num'];
    }
    $offset = 5;
    if($id<=1 && $id==""){
        $ids=0;
    }else{
        $ids = $id-1;
    }
    $limit = $ids*$offset;

    $user_id = $_POST['user_id'];
    $homepage = "SELECT a.*, b.name as doctor_name, b.cover_pic as doctor_img, c.name as speciality FROM appointment_booking as a inner join doctors as b on a.doctor_id = b.id inner join category as c on b.speciality = c.id
    WHERE a.user_id='$user_id' and (a.status = 'Completed' || a.status = 'Cancelled' ) ORDER BY a.id DESC LIMIT $limit,$offset";
    //echo $homepage;exit;
    $run1 = mysqli_query($con, $homepage);
        while($data1=mysqli_fetch_assoc($run1)){
    
        $data1['booking_date'] = date('d-m-Y',strtotime($data1['booking_date']));
        if(!empty($data1['user_prescription']))
            $data1['user_prescription'] = $base_url."mobile_api/upload/user_prescription/".$data1['user_prescription'];
        else 
        $data1['user_prescription'] = '';
            
        if(!empty($data1['prescription']) && $data1['prescription'] != null)
            $data1['prescription'] = $base_url."mobile_api/upload/prescription/".$data1['prescription'];
        else 
        	$data1['prescription'] = '';
            
        if(!empty($data1['doctor_img']))
            $data1['doctor_img'] = $base_url."admin/upload/doctor/".$data1['doctor_img'];
            
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
        
        if(empty($data1['cancel_reason']))
        {
        	$data1['cancel_reason'] = '';
        }
        $display1[]= $data1;
    }

    if(!empty($display1)) {
        $resp['status'] = 1;
        $resp['message'] = "Data found successfully";
        $resp['data'] = $display1;
    }else
    {
        $resp['status'] = 2;
        $resp['message'] = "No Data Found";
    }
}else{
    ///if server method is error
    $resp['status'] = "0";
    $resp['message'] = "Server Method Error";
    $resp['data'] = "No data Found";
}
echo json_encode($resp);
?>
