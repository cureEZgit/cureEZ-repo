<?php
include 'dbCon.php';
$resp = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
$homepage = "SELECT * FROM category where status = 1 ORDER BY id DESC";
$run1 = mysqli_query($con, $homepage);
    while($data1=mysqli_fetch_assoc($run1)){
     
    $display1[]= $data1;
}
if(!empty($display1)) {
    $resp['status'] = 1;
    $resp['message'] = "Data found successfully";
    $resp['img_path'] = $base_url."admin/upload/category/";
    $resp['data'] = $display1;
}else
{
    $resp['status'] = 2;
    $resp['message'] = "No Data Found";
}

}else{

    ///if server method is error
    $resp['status'] = "0";
    $resp['message'] = "Server Method Error";
    $resp['data'] = "No data Found";
}

echo json_encode($resp);

?>

