<?php
include 'dbCon.php';
$resp = array();
if($_SERVER['REQUEST_METHOD']=='POST'){

$doctor_id = $_POST['doctor_id'];
$user_id = $_POST['user_id'];
$p_time = $_POST['slot_time'];
$booking_date = date('Y-m-d',strtotime($_POST['date']));
$v_type = $_POST['type'];

if($doctor_id!='' && $user_id!='' && $p_time!='' && $booking_date!='' && $v_type!=''){
    
     $qry="SELECT time_slot FROM appointment_booking WHERE booking_date='$booking_date' AND doctor_id='$doctor_id' and start_time_slot = '$p_time' and status != 'Cancelled'";
     $run1 = mysqli_query($con, $qry);

 //if(!empty($res))
 if(mysqli_num_rows($run1) > 0)
 {
     $resp['status'] = 2;
     $resp['message'] = "Failed";
 }else{
    //  if($v_type=='audio'){
         
    //  }else if($v_type=='video'){
         
    //  }else if($v_type=='physical')
     $qry="SELECT * FROM doctors WHERE id='$doctor_id' ";
     $run1 = mysqli_query($con, $qry);
     $data1=mysqli_fetch_assoc($run1);
     $duration = $data1['slot_booking'];
     // echo $duration;exit;
     if($v_type == 'audio')
        $price = $data1['audio_price'];
    else if($v_type == 'video')
        $price = $data1['video_price'];
    else if($v_type == 'physical')
        $price = $data1['physical_price'];
     $endTime = strtotime("+$duration minutes", strtotime($p_time));
     //$time = strtotime('10:00 am');
     //echo date("h:i", strtotime("+$duration minutes", $time));exit;

	 $endTime1 =  date('h:i a', $endTime);
	 //echo $endTime1;exit;
	 $a = $p_time;
     $b = $endTime1;

    $period = new DatePeriod(
    new DateTime($a),
    new DateInterval('PT30M'),
    new DateTime($b)
    );

    foreach ($period as $date) { 
            		    
    $array[] =   $pdate = $date->format("h:i a");
    }  
     //print_r($period);exit;
     $x = array_values(array_slice($array, -1))[0];$endTime2 = strtotime("+30 minutes", strtotime($x));$addkey[] =  date('h:i a', $endTime2);

     $merge = array_merge($array,$addkey);
     //print_r($merge);exit;
     $alltimeslot = serialize($merge);
     $sql3 = "SELECT * FROM discount";
     $run33 = mysqli_query($con, $sql3);
     $data33=mysqli_fetch_assoc($run33);
     $discount = $data33['name'];
     
     $sql4 = "SELECT * FROM tax";
     $run34 = mysqli_query($con, $sql4);
     $data34=mysqli_fetch_assoc($run34);
     $tax = $data34['name'];
     
     
     $sql5 = "SELECT * FROM internet_charge";
     $run35 = mysqli_query($con, $sql5);
     $data35=mysqli_fetch_assoc($run35);
     $int_chrge = $data35['price'];
     
     $dismin_price = round($price*($discount/100));
     $discountPrice = round(($price-$dismin_price));
     
     $tax_min_price = round($discountPrice*($tax/100));
     $subprice = round($discountPrice+$tax_min_price);
     
     $finalPrice = round($subprice+$int_chrge);
     
     //upload prescription 
    $prescription_file = '';
    $prescription = $_POST['prescription'];
    if(!empty($prescription))
    {
        $prescription = "data:image/jpeg;base64,".$prescription;
        define('UPLOAD_DIR', 'upload/user_prescription/'); 
        list($type, $prescription) = explode(';', $prescription);
        list(, $prescription)      = explode(',', $prescription);
        $prescription = base64_decode($prescription);
        $prescription_file = 'user_prescription_'.uniqid() . '.png';
        file_put_contents(UPLOAD_DIR . $prescription_file, $prescription);
    }
    //upload prescription -- END --
    
    $order_id = date('mdy').mt_rand('1000','9999');
    
    $discount = (int) $discount; $tax = (int) $tax; $int_chrge = (int) $int_chrge;
     
    $qry="INSERT INTO temp_appointment_booking(doctor_id,user_id,p_time,booking_date,v_type,time_slot,duration,amount,discount,tax,internet_charge,final_price, prescription, order_id) 
    VALUES('$doctor_id','$user_id','$p_time','$booking_date','$v_type','$alltimeslot','$duration','$price','$discount','$tax','$int_chrge','$finalPrice', '$prescription_file' , '$order_id')";
    $run1 = mysqli_query($con, $qry);
    //echo  $qry;exit;
    $insertid =  mysqli_insert_id($con);
    $resp['status'] = 1;
    $resp['message'] = "Inserted Successfully";
    $resp['temp_id'] = "$insertid";
    $resp['order_id'] = "$order_id";

 }
}else{
    $resp['status'] = 0;
    $resp['message'] = "All Field Required";
}
}else{
    ///if server method is error
    $resp['status'] = "0";
    $resp['message'] = "Server Method Error";
    $resp['data'] = "No Data Found";
}
echo json_encode($resp);
?>
