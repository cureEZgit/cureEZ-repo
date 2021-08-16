<?php include('dbCon.php');?>
<?php if($_SERVER['REQUEST_METHOD']=='POST'){
date_default_timezone_set("Asia/Kolkata"); 
$resp= array();
$user_id = $_POST['user_id'];
$doctor_id = $_POST['doctor_id'];
if($user_id!='' && $doctor_id!=''){
 $check_mobile = "SELECT * FROM favourite WHERE user_id='$user_id' AND doctor_id='$doctor_id'";
 $run = mysqli_query($con,$check_mobile);
 $mob_result = mysqli_num_rows($run);
 if($mob_result>0)
 {
            $resp['status'] = 0;
            $resp['message'] = "Already exist";
 }else{
            $entrydate = date('Y-m-d');
            $entrym = date('M');
            $entryt = date('h:i a');
            $insert_recipe = "INSERT INTO favourite(user_id,doctor_id,entry_date) VALUES('$user_id','$doctor_id','$entrydate')";
            $result = mysqli_query($con,$insert_recipe);
            $last_id = mysqli_insert_id($con);
    if($result){
            $resp['status'] = 1;
            $resp['message'] = "Data inserted Successfully";
            $resp['reg_id'] = $last_id;
    }else{
            $resp['status'] = 2;
            $resp['message'] = "Failed";
    }
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