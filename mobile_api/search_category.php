<?php
include 'dbCon.php';
$resp = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
$search_key = $_POST['keyword'];
$select_cat = "SELECT id,name FROM category WHERE name LIKE '%$search_key%' ORDER BY id ASC";
$run = mysqli_query($con, $select_cat);
if(mysqli_num_rows($run)<1)
{
    $resp['status'] = 0;
    $resp['message'] = "no data found";
}else{
    while($data=mysqli_fetch_assoc($run)){
     $display[]= $data;
}
    $resp['status'] = 1;
    $resp['message'] = "Data found successfully";
    $resp['data'] = $display;
}
}else{
    ///if server method is error
    $resp['status'] = "0";
    $resp['message'] = "Server Method Error";
    $resp['data'] = "No data Found";
}
echo json_encode($resp);
?>