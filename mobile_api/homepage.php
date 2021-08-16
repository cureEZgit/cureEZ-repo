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
$user_id = $_POST['user_id'];
//$homepage = "SELECT doctors.*,category.name as category_name,( '6371' * acos( cos( radians('$lat') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('$long') ) + sin( radians('$lat') ) * sin( radians( latitude ) ) ) ) AS distance FROM `doctors`,`category` WHERE  category.id=doctors.speciality HAVING distance <= 300 ORDER BY distance ASC LIMIT $limit,$offset";
$homepage = "SELECT doctors.*, DATEDIFF(NOW(), doctors.practice_starts) as total_experience, category.name as category_name FROM `doctors`,`category` WHERE  category.id=doctors.speciality ORDER BY name ASC LIMIT $limit,$offset";
$run1 = mysqli_query($con, $homepage);
    while($data1=mysqli_fetch_assoc($run1))
    {
        $total_experience = $data1['total_experience'];
        $total_experience = ceil($total_experience/365);
        if($total_experience > 1)
         $data1['experience'] = $total_experience.' years';
        else
         $data1['experience'] = $total_experience.' year';
      //$number =  $data1['distance'];
      $number =  0;
      $language = unserialize($data1['language']);
      $data1['language'] = implode(',',$language);
    $data1['distance'] = round($number, 1)." km";
    // if(empty($data1['experience']))
    //     $data1['experience'] = '';
    
    //check if favourite
    $fav_sql = "select id from favourite where user_id = ".$user_id." and doctor_id=".$data1['id'];
    $fav_query = mysqli_query($con, $fav_sql);
    if(mysqli_num_rows($fav_query) > 0)
    {
        $data1['favourite'] = 1;
    }
    else {
        $data1['favourite'] = 0;
    }
    
    $display1[]= $data1;
}
$fav_doctors = [];
if(isset($_POST['user_id']))
{
    $user_id = $_POST['user_id'];
    $fav_doctor_sql = "SELECT doctors.*, DATEDIFF(NOW(), doctors.practice_starts) as total_experience, category.name as category_name FROM `favourite`, `doctors`,`category` WHERE  category.id=doctors.speciality and favourite.doctor_id=doctors.id and favourite.user_id=$user_id
    ORDER BY doctors.name ASC LIMIT $limit,$offset";
    //echo $fav_doctor_sql; exit;
    $fav_doctor_query = mysqli_query($con, $fav_doctor_sql);
    while($fav_doctor_data = mysqli_fetch_assoc($fav_doctor_query))
    {
        $total_experience2 = $fav_doctor_data['total_experience'];
        $total_experience2 = ceil($total_experience2/365);
        if($total_experience > 1)
         $fav_doctor_data['experience'] = $total_experience2.' years';
        else
         $fav_doctor_data['experience'] = $total_experience2.' year';
        //$number =  $data1['distance'];
        $number =  0;
        $language = unserialize($fav_doctor_data['language']);
        $fav_doctor_data['language'] = implode(',',$language);
        $fav_doctor_data['distance'] = round($number, 1)." km";
        // if(empty($fav_doctor_data['experience']))
        //     $fav_doctor_data['experience'] = '';
        
        //check if favourite
    $fav_sql = "select id from favourite where user_id = ".$user_id." and doctor_id=".$fav_doctor_data['id'];
    $fav_query = mysqli_query($con, $fav_sql);
    if(mysqli_num_rows($fav_query) > 0)
    {
        $fav_doctor_data['favourite'] = 1;
    }
    else {
        $fav_doctor_data['favourite'] = 0;
    }
    
        $fav_doctors[]= $fav_doctor_data;
    }
}

if(!empty($display1)){
    //$path ="http://wayindia.net/indigo/smart_labour/assets/user/images/categories/";
    $resp['status'] = 1;
    $resp['message'] = "Data found successfully";
    $resp['img_path'] = $base_url."admin/upload/doctor/";
    $resp['top_doctor'] = $display1;
    $resp['near_doctor'] = $display1;
    $resp['fav_doctor'] = $fav_doctors;
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

