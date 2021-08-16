<?php
include 'dbCon.php';
$resp = array();
date_default_timezone_set('Asia/Kolkata');

function remove_lastIndex($data)
{
    $newArry = array();
    $result=  unserialize($data);
    $index1 =  $result[0];
    $index2=  $result[1];
    array_push($newArry,$index1);
    array_push($newArry,$index2);
    return serialize($newArry);
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $doctor_id = $_POST['doctor_id'];
    $date = date('Y-m-d',strtotime($_POST['date']));
    $date33 = $date;
    $type = $_POST['type'];

    $homepage1 = "SELECT * FROM appointment_booking WHERE doctor_id='$doctor_id' AND status != 'Cancelled' AND booking_date='$date' ";
    $run12 = mysqli_query($con, $homepage1);
    while($carwash1=mysqli_fetch_assoc($run12))
    {
       $resData[]=  $carwash1;
    }
    if(!empty($resData))
    {
        foreach($resData as $rs=>$key){
            $resVal = remove_lastIndex($key['time_slot']);
            $all_resslot[]=  unserialize($resVal);
        }
        $result  = call_user_func_array('array_merge', $all_resslot);
        $pinnedArray = $result;
        foreach($pinnedArray as $kry=>$fg)
        {
            $all_data[] =  date('h:i A',strtotime($fg));
        }
        $myparsedarray = $all_data;
    }
    else
    {
        $myparsedarray =array();
    }
	   
    //print_r($homepage1);exit;
    $homepage = "SELECT * FROM  doctors WHERE id='$doctor_id'";
    $run1 = mysqli_query($con, $homepage);
    $carwash=mysqli_fetch_assoc($run1);
    $opening_time = $carwash['open_time'];
    $closing_time = $carwash['close_time'];
    $lunch_start_time = $carwash['break_from'];
    $lunch_end_time = $carwash['break_to'];
    $period2 = new DatePeriod(
        new DateTime($lunch_start_time),
        new DateInterval('PT30M'),
        new DateTime($lunch_end_time)
    );

    foreach ($period2 as $date) { 
        $lunch_timeslot[] = $date->format("h:i A");
    }
    $sizeof_array = sizeof($lunch_timeslot);
    $last_itme = $sizeof_array-1;
    $slicearray = array_slice($lunch_timeslot,'-'.$last_itme);
    $a = $opening_time;
    $b = $closing_time;

    $period = new DatePeriod(
        new DateTime($a),
        new DateInterval('PT30M'),
        new DateTime($b)
    );

    foreach ($period as $date) {
        $array[] =   $pdate = $date->format("h:i A");
    }
    $x = array_values(array_slice($array, -1))[0];
    $endTime = strtotime("+30 minutes", strtotime($x));
    $addkey[] =  date('h:i A', $endTime);
    $merge = array();
    $merge = array_merge($array,$addkey);
    $i=1;
    foreach($merge as $mg)
    {
        $ndate = date('h:i A',strtotime($mg));
         if(in_array($ndate,$slicearray)){
             
         }else{
        $extime = date('H:i',strtotime($ndate));
        $ndate1=date('H:i');
        $today = date('Y-m-d');
        if($today==$date33)
        {
               if($ndate1>$extime)
        {
             $res['expire_status'] ="1";
        }else
        {
             $res['expire_status'] ="0";
        }
        }else
        {
            $res['expire_status'] ="0";
        }
        if(in_array($ndate,$myparsedarray)) {
               $res['status'] ="1";
        }else
        {
               $res['status'] ="0";
        }
         $res['id'] =$i++; 
    
         $res['slot_time'] = $mg;
         $allslot[] =  $res;
         }
    }
    $resp['status'] = 1;
    $resp['message'] = "Data found successfully";
    $resp['data'] = $allslot;
    
}else{
    ///if server method is error
    $resp['status'] = "0";
    $resp['message'] = "Server Method Error";
    $resp['data'] = "No data Found";
}
echo json_encode($resp);
?>