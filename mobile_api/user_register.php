
<?php 
$key='qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
function encryptthis($data, $key) { 
    $encryption_key = base64_decode($key); 
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')); 
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv); 
}
function decryptthis($data, $key) {
    $encryption_key = base64_decode($key); 
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv); 
}
    //$encrypted=encryptthis($data, $key); 
    //$decrypted=decryptthis($encrypted, $key);
    include('dbCon.php');
?>
<?php if($_SERVER['REQUEST_METHOD']=='POST'){
date_default_timezone_set("Asia/Kolkata"); 
$resp= array();
// $name = encryptthis($_POST['name'],$key);
// $email = encryptthis($_POST['email'],$key);
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
if($name!='' && $mobile!=''){
 $check_mobile = "SELECT mobile FROM user_register WHERE mobile='$mobile'";
 $run = mysqli_query($con,$check_mobile);
 $mob_result = mysqli_num_rows($run);
 if($mob_result>0)
 {
            $resp['status'] = 0;
            $resp['message'] = "Mobile number already exist";
 }else{
            $entrydate = date('Y-m-d');
            $entrym = date('M');
            $entryt = date('h:i a');
            $insert_recipe = "INSERT INTO user_register(name,email,mobile,entry_date,entry_time,entry_month) VALUES('$name','$email','$mobile','$entrydate','$entrym','$entryt')";
            $result = mysqli_query($con,$insert_recipe);
            $last_id = mysqli_insert_id($con);
if($result){
    
//      $check_mobile = "SELECT * FROM doctor_register WHERE id='$last_id'";
//  $run = mysqli_query($con,$check_mobile);
//  $rows = mysqli_fetch_assoc($run);
//  $rows['name'] = decryptthis($rows['name'],$key);
//  $rows['email'] = decryptthis($rows['email'],$key);
            $resp['status'] = 1;
            $resp['message'] = "Data inserted Successfully";
            $resp['reg_id'] = $last_id;
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