<?php
include '../dbCon.php';
$resp = array();
$status = "0"; $message = "Server Method Error";
$data = [];
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $appointment_id = $_POST['appointment_id'];
    $prescription = $_POST['prescription'];
    //echo $prescription; exit;
    
    if(!empty($appointment_id) && !empty($prescription))
    {
        //upload prescription 
        define('UPLOAD_DIR', '../upload/prescription/'); 
        
        $prescription ="data:image/jpeg;base64,".$prescription;
    
        list($type, $prescription) = explode(';', $prescription);
        list(, $prescription)      = explode(',', $prescription);
        $prescription = base64_decode($prescription);
        $prescription_file = 'prescription_'.uniqid() . '.png';
        file_put_contents(UPLOAD_DIR . $prescription_file, $prescription);
    
        $update_sql = "UPDATE appointment_booking SET prescription = '$prescription_file' WHERE id='$appointment_id'";
        if(mysqli_query($con, $update_sql))
        {
            $status = "1";
            $message = "Prescription uploaded successfully";
        }
        else {
            $message = "Failed to upload prescription";
        }
    }
    else
    {
        $message = 'Invalid entry';
    }
}
else{
    $message = "Server Method Error";
}
$resp['status'] = $status;
$resp['message'] = $message;
$resp['data'] = $data;
echo json_encode($resp);
?>