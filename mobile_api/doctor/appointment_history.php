<?php
include '../dbCon.php';
$resp = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(!empty($_POST['page_num'])){
        $id = $_POST['page_num'];
    }
    $offset = 10;
    if($id<=1 && $id==""){
        $ids=0;
    }else{
        $ids = $id-1;
    }
    $limit = $ids*$offset;

    $doctor_id = $_POST['doctor_id'];
    
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    
    $sql = "SELECT a.*, b.name as patient_name, b.profile_pic as patient_image, d.name as speciality FROM appointment_booking as a inner join user_register as b on a.user_id = b.id inner join doctors as c on a.doctor_id = c.id inner join category as d on c.speciality=d.id
    WHERE a.doctor_id='$doctor_id' and (a.status = 'Completed' || a.status = 'Cancelled')";
    if(!empty($from_date))
    {
        $from_date = date('Y-m-d', strtotime($from_date));
        $sql .= " and DATE(a.booking_date) >= '$from_date'";
    }
    if(!empty($to_date))
    {
        $to_date = date('Y-m-d', strtotime($to_date));
        $sql .= " and DATE(a.booking_date) <= '$to_date'";
    }
    $sql .= " ORDER BY a.id DESC LIMIT $limit,$offset";
    
    //$sql = "SELECT * FROM appointment_booking WHERE doctor_id='$doctor_id' and (status = 'Completed' || status = 'Cancelled') ORDER BY id DESC LIMIT $limit,$offset";
    $run1 = mysqli_query($con, $sql);
    while($data1=mysqli_fetch_assoc($run1))
    {

        $data1['booking_date'] = date('d-m-Y',strtotime($data1['booking_date']));
        
        if(!empty($data1['user_prescription']))
            $data1['user_prescription'] = $base_url."mobile_api/upload/user_prescription/".$data1['user_prescription'];
            
        if(!empty($data1['patient_image']))
            $data1['patient_image'] = $base_url."mobile_api/upload/".$data1['patient_image'];
         
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