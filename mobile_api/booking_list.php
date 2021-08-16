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
$homepage = "SELECT appointment_booking.*,category.name as cname,doctors.cover_pic,doctors.name as name,doctors.experience,doctors.description,doctors.rating,doctors.address,doctors.speciality FROM `appointment_booking`,`doctors`,`category` 
Where category.id=doctors.speciality AND doctors.id=appointment_booking.doctor_id AND appointment_booking.user_id='$user_id' AND(appointment_booking.status = 'Pending' || appointment_booking.status = 'Accepted') 
ORDER BY appointment_booking.id DESC LIMIT $limit,$offset";
//echo $homepage;exit;
$run1 = mysqli_query($con, $homepage);
    while($data1=mysqli_fetch_assoc($run1)){
          $data1['booking_id'] = "Appt-".$data1['id'];
        if(!empty($data1['cancel_time'])){
            $data1['cancel_time'] =$data1['cancel_time'];
        }else{
            $data1['cancel_time'] = "";
        }
    $data1['booking_date'] = date('d-m-Y',strtotime($data1['booking_date']));
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


if(!empty($display1))
{
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