<?php
include 'dbCon.php';
$resp = array();
$status = "0"; $message = "Server Method Error";
$data = "No data Found"; $data = [];

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $appointment_id = $_POST['appointment_id'];
    $cancel_reason = $_POST['cancel_reason'];
    $ctime = date('Y-m-d H:i:s');
    //Cancel appointment
    $cancel_reason = $_POST['cancel_reason'];
    $update_sql = "UPDATE appointment_booking SET status = 'Cancelled', cancelled_by = 'User', cancel_reason = '$cancel_reason', cancel_time = '$ctime' WHERE id='$appointment_id'";
    if(mysqli_query($con, $update_sql))
    {
        $status = "1";
        $message = "Appointment cancelled successfully";
    }
    else {
        $message = "Failed to cancel Appointment";
    }
    
}
else{
    ///if server method is error
    $message = "Server Method Error";
}
$resp['status'] = $status;
$resp['message'] = $message;
$resp['data'] = $data;
echo json_encode($resp);
?>