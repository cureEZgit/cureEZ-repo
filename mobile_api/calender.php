<?php
include 'dbCon.php';
$resp = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
      $year = $_POST['year'];
      $month = $_POST['month'];
      $current_date = date('d');
for($d=1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month)       
    
        $list[]=date('d-D', $time);
     
         
}
foreach($list as $ls){
     $number = $ls;
     $output['date'] = $date = substr( $number, 0, strrpos( $number, '-' ) );
     $output['day']  = substr($number, strrpos($number, '-') + 1);
     if($current_date > $date){
          $output['expire_status'] ="1";
     }else{
         if($current_date+7 > $date){
             $output['expire_status'] ="0";

         }else{
             $output['expire_status'] ="2";
         }
          
     }
     $display[] = $output;
}
if(!empty($display)) {
    $resp['status'] = 1;
    $resp['message'] = "Data found successfully";
    $resp['year']=$year;
    $resp['month']=$month;
    $resp['data'] = $display;
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