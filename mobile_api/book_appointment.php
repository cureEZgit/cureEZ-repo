<?php 
include('dbCon.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
date_default_timezone_set("Asia/Kolkata"); 
$resp= array();
$temp_id = $_POST['temp_id'];
$order_id = "N/A";//$_POST['order_id'];
$transaction_id = "N/A";//$_POST['transaction_id'];
$payment_status = "N/A"; //$_POST['payment_status'];
$response = "N/A";//$_POST['response'];
$code = "N/A";//$_POST['code'];

if($temp_id!='' && $order_id!='')
{
    $qry="SELECT * FROM temp_appointment_booking WHERE id='$temp_id'";
    $result1 = mysqli_query($con,$qry);
    $res  = mysqli_fetch_assoc($result1);
    //echo '<pre>'; print_r($res); exit;
    $doctor_id = $res['doctor_id'];
    $user_id = $res['user_id'];
    $start_time = $res['p_time'];
    $booking_date = $res['booking_date'];
    $v_type = $res['v_type'];

    $time_slot1 = unserialize($res['time_slot']);
    $time_slot = unserialize($res['time_slot']);
    $end_time = array_values(array_slice($time_slot1, -1))[0];

    unset($time_slot[count($time_slot)-1]);
    $duration = $res['duration'];
    $amount = $res['amount'];
    $discount = $res['discount'];
    $tax = $res['tax'];
    $internet_charge = $res['internet_charge'];
    $final_price = $res['final_price'];
    
    $time_slotdata =  serialize($time_slot);
    $entrydate = date('Y-m-d');
    $entrym = date('M');
    $entryt = date('h:i a');
   $code =  mt_rand('10000','99999');
   
   $prescription = $res['prescription'];
   
   $order_id = $res['order_id'];
   
   $payment_id = $res['razorpay_payment_id'];
   
   $discount = (int) $discount; $tax = (int) $tax; $int_chrge = (int) $int_chrge;
   $code = (int) $code;

    $insert_recipe = "INSERT INTO appointment_booking(doctor_id,booking_date,type_id,amount,time_slot,start_time_slot,end_time_slot,duration,user_id,discount,tax,internet_charge,final_price,close_code, user_prescription, order_id, payment_id) 
    VALUES('$doctor_id','$booking_date','$v_type','$amount','$time_slotdata','$start_time','$end_time','$duration','$user_id','$discount','$tax','$internet_charge','$final_price','$code', '$prescription', '$order_id', '$payment_id')";
    //echo $insert_recipe; exit;
    $result = mysqli_query($con,$insert_recipe);
    $last_id = mysqli_insert_id($con);
    if($last_id)
    {
        $resp['status'] = 1;
        $resp['message'] = "Booked Successfully";
        $resp['insert_id'] = $last_id;
    }
    else {
        $resp['status'] = 0;
        $resp['message'] = "Technical problem. Try again.";
    }

}else{
            $resp['status'] = 0;
            $resp['message'] = "All the field required";
}
}else{
            $resp['status'] = 0;
            $resp['message'] = "Server method error";
}
echo json_encode($resp);
?>
