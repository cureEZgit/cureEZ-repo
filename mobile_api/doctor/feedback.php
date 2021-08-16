<?php 
include('../dbCon.php'); ?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    date_default_timezone_set("Asia/Kolkata"); 
    $resp= array();
    $doctor_id = $_POST['doctor_id'];
    $feedback = $_POST['feedback'];
    if($doctor_id!='' && $feedback!='')
    {
        $entrydate = date('Y-m-d');
        $insert_recipe = "INSERT INTO doctor_feedback(doctor_id,feedback,entry_time) VALUES('$doctor_id','$feedback','$entrydate')";
        
        $result = mysqli_query($con,$insert_recipe);
        if($result){
            $resp['status'] = 1;
            $resp['message'] = "Data inserted Successfully";
        }
        }else{
            $resp['status'] = 0;
            $resp['message'] = "All the field required";
        }
}
else{
    $resp['status'] = 0;
    $resp['message'] = "Server method error";
}
echo json_encode($resp);
?>

