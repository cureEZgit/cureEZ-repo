<?php 
include('dbCon.php'); ?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
date_default_timezone_set("Asia/Kolkata"); 
$resp= array();
$user_id = $_POST['user_id'];
$type = $_POST['type'];

if($type=='out'){

  $check_mobile = "SELECT * FROM user_register WHERE id='$user_id'";
  
 $run = mysqli_query($con,$check_mobile);
 $mob_result = mysqli_num_rows($run);
while($data = mysqli_fetch_assoc($run))
{
    if(!empty($data['profile_pic']))
    {
        $data['profile_pic']=$base_url."mobile_api/upload/".$data['profile_pic'];
    }else
    {
        $data['profile_pic']="";
    }
    
    $display = $data;
}
if($display){

            $resp['status'] = 1;
            $resp['message'] = "Data found Successfully";
            $resp['image_path'] =  $base_url."mobile_api/upload/";
            $resp['reg_id'] = $display;
}
}else if($type=='in'){
           $name = $_POST['name'];
           $email = $_POST['email'];
           $mobile = $_POST['mobile'];
           if(!empty($mobile)){
           $update_qry="UPDATE user_register SET name='$name',email='$email',mobile='$mobile' WHERE id='$user_id'";
           }else
           {
                 $update_qry="UPDATE user_register SET name='$name',email='$email' WHERE id='$user_id'";
           }
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
}

}else{
            $resp['status'] = 0;
            $resp['message'] = "Server method error";
}
echo json_encode($resp);
?>

