<?php
include '../dbCon.php';

$resp = array();
$status = "0"; $message = "Server Method Error";
$data = "No data Found"; $data = [];
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $appointment_id = $_POST['appointment_id'];
    $appointment_status = $_POST['appointment_status'];
    
    $ctime = date('Y-m-d H:i:s');
    if($appointment_status == 'Cancelled')
    {
        $cancel_reason = $_POST['cancel_reason'];
        $update_sql = "UPDATE appointment_booking SET status = 'Cancelled', cancelled_by = 'Doctor', cancel_reason = '$cancel_reason', cancel_time = '$ctime' WHERE id='$appointment_id'";
        if(mysqli_query($con, $update_sql))
        {
            $status = "1";
            $message = "Appointment cancelled successfully";
        }
        else {
            $message = "Failed to cancel Appointment";
        }
    }
    else if($appointment_status == 'Accepted')
    {
        $cancel_reason = $_POST['cancel_reason'];
        $update_sql = "UPDATE appointment_booking SET status = 'Accepted' WHERE id='$appointment_id'";
        if(mysqli_query($con, $update_sql))
        {
            $status = "1";
            $message = "Appointment Accepted Successfully";
        }
        else {
            $message = "Failed to Accept Appointment";
        }
    }
    else
    {
        $close_code = $_POST['close_code'];
        //check close_code
        $appointment_sql = "SELECT close_code FROM appointment_booking WHERE id = '$appointment_id' and status = 'Accepted'";
        $appointment_query = mysqli_query($con, $appointment_sql);
        $appointment_data = mysqli_fetch_assoc($appointment_query);
        //echo '<pre>'; print_r($appointment_data); exit;
        if(!empty($close_code))
        {
            if($close_code == $appointment_data['close_code'])    
            {
                //upload prescription
                $prescription = $_POST['prescription'];
                $prescription_file = '';
                if(!empty($prescription))
                {
                    //upload prescription 
                    define('UPLOAD_DIR', '../upload/prescription/'); 
                    
                    $prescription ="data:image/jpeg;base64,".$prescription;
                
                    list($type, $prescription) = explode(';', $prescription);
                    list(, $prescription)      = explode(',', $prescription);
                    $prescription = base64_decode($prescription);
                    $prescription_file = 'prescription_'.uniqid() . '.png';
                    file_put_contents(UPLOAD_DIR . $prescription_file, $prescription);
                }
                $update_sql = "UPDATE appointment_booking SET status = 'Completed', closing_time = '$ctime', prescription = '$prescription_file' WHERE id='$appointment_id'";
                if(mysqli_query($con, $update_sql))
                {
                    $status = "1";
                    $message = "Appointment closed successfully";
                }
                else {
                    $message = "Failed to close Appointment";
                }
            }
            else {
                $message = 'Invalid Close code';
            }
        }
        else {
            $message = 'Invalid Appointment Id';
        }
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