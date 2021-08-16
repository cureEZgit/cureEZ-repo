<?php
include 'dbCon.php';
$resp = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $user_id = $_POST['user_id'];
$search_key = $_POST['keyword'];
// $select_cat = "SELECT id,name FROM category WHERE name LIKE '%$search_key%' ORDER BY id ASC";
// $select_cat = "SELECT doctors.id, doctors.cover_pic, doctors.name, category.name as category_name FROM `doctors`,`category` WHERE  category.id=doctors.speciality and 
// (doctors.name LIKE '%$search_key%' or doctors.regd_no LIKE '%$search_key%' or category.name LIKE '%$search_key%')";
$select_cat = "SELECT doctors.*, DATEDIFF(NOW(), doctors.practice_starts) as total_experience, category.name as category_name FROM `doctors`,`category` WHERE  category.id=doctors.speciality and 
doctors.name LIKE '%$search_key%' ";
$run = mysqli_query($con, $select_cat);
if(mysqli_num_rows($run)<1)
{
    $resp['status'] = 0;
    $resp['message'] = "no data found";
}else{
    while($data=mysqli_fetch_assoc($run))
    {
        $total_experience = $data['total_experience'];
        $total_experience = ceil($total_experience/365);
        if($total_experience > 1)
         $data['experience'] = $total_experience.' years';
        else
         $data['experience'] = $total_experience.' year';
         
        $data['img_path'] = $base_url."admin/upload/doctor/";
        
        //check if favourite
        $fav_sql = "select id from favourite where user_id = ".$user_id." and doctor_id=".$data['id'];
        $fav_query = mysqli_query($con, $fav_sql);
        if(mysqli_num_rows($fav_query) > 0)
        {
            $data['favourite'] = 1;
        }
        else {
            $data['favourite'] = 0;
        }
        
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