<?php 
include('dbCon.php'); ?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
date_default_timezone_set("Asia/Kolkata"); 
$resp= array();
$user_id = $_POST['user_id'];
$feedback = $_POST['feedback'];
if($user_id!='' && $feedback!=''){


    $entrydate = date('Y-m-d');
    $insert_recipe = "INSERT INTO feedback(user_id,feedback,entry_time) VALUES('$user_id','$feedback','$entrydate')";
    
$result = mysqli_query($con,$insert_recipe);
$last_id = mysqli_insert_id($con);
if($result){

            $resp['status'] = 1;
            $resp['message'] = "Data inserted Successfully";
            $resp['reg_id'] = $last_id;
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

