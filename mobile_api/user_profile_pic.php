<?php 
include('dbCon.php'); ?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
date_default_timezone_set("Asia/Kolkata"); 
$resp= array();
$user_id = $_POST['user_id'];
$imag2 ="data:image/jpeg;base64,".$_POST['profile_pic'];
$data = $imag2;

list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);
$data = base64_decode($data);
$img = time().".png";
//echo $img;exit;
file_put_contents('upload/'.$img, $data);
$update_qry="UPDATE user_register SET profile_pic='$img' WHERE id='$user_id'";
         $update_run = mysqli_query($con,$update_qry); 
         if($update_run)
         {
              $resp['status'] = 1;
              $resp['message'] = "Updated Successfully";
         }else
         {
              $resp['status'] = 0;
              $resp['message'] = "Failed";
         }
}else{
            $resp['status'] = 0;
            $resp['message'] = "Server method error";
}
echo json_encode($resp);
?>