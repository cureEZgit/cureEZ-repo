<?php
include 'dbCon.php';
$resp = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['page_num'])){
$id = $_POST['page_num'];
}
$offset = 10;
if($id<=1 && $id==""){
            $ids=0;
            
        }else{
            
            $ids = $id-1;
        }

$limit = $ids*$offset;
$lat = $_POST['lat'];
$long = $_POST['long'];
$city = $_POST['city'];
$speciality = $_POST['cat_id'];
$homepage = "SELECT doctors.*,category.name as category_name,
( '6371' * acos( cos( radians('$lat') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('$long') ) + sin( radians('$lat') ) * sin( radians( latitude ) ) ) ) AS distance 
FROM `doctors`,`category` WHERE  category.id=doctors.speciality AND  doctors.speciality='$speciality'  HAVING distance <= 300 ORDER BY distance ASC LIMIT $limit,$offset";
$run1 = mysqli_query($con, $homepage);
    while($data1=mysqli_fetch_assoc($run1)){
      $number =  $data1['distance'];
      $language = unserialize($data1['language']);
      $data1['language'] = implode(',',$language);
      $data1['distance'] = round($number, 1)." km";
      $display1[]= $data1;
}
if(!empty($display1)){
    //$path ="http://wayindia.net/indigo/smart_labour/assets/user/images/categories/";
    $resp['status'] = 1;
    $resp['message'] = "Data found successfully";
    $resp['img_path'] = $base_url."admin/upload/doctor/";
    $resp['data'] = $display1;
  
}else
{
    $resp['status'] =2;
    $resp['message'] = "No data found";
}
}else{
    ///if server method is error
    $resp['status'] = "0";
    $resp['message'] = "Server Method Error";
    $resp['data'] = "No data Found";
}
echo json_encode($resp);
?>