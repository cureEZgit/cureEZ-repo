<?php
include 'dbCon.php';
$resp = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
$temp_id = $_POST['temp_id'];
$homepage = "SELECT temp_appointment_booking.*,category.name as cname,doctors.cover_pic,doctors.name as name,doctors.experience,doctors.description,doctors.rating,doctors.address,doctors.speciality FROM `temp_appointment_booking`,`doctors`,`category` Where category.id=doctors.speciality AND doctors.id=temp_appointment_booking.doctor_id AND temp_appointment_booking.id='$temp_id'";
//echo $homepage;exit;
$run1 = mysqli_query($con, $homepage);
while($data = mysqli_fetch_assoc($run1))
{
   $doctor_id = $data['doctor_id'];
   $v_type = $data['v_type'];
   $payment['price'] = $data['amount'];
   $payment['discount'] = $data['discount'];
   $payment['tax'] = $data['tax'];
   $payment['internet_charge'] = $data['internet_charge'];
   $payment['sub_total'] = $data['final_price'];
   
   $doctor['name'] = $data['name'];
   $doctor['rating'] = $data['rating'];
   $doctor['address'] = $data['address'];
   $doctor['description'] = $data['description'];
   $doctor['experience'] = $data['experience'];
   $doctor['speciality'] = $data['cname'];
   $doctor['cover_pic'] = $base_url."admin/upload/doctor/".$data['cover_pic'];
   $display1 = $doctor;
   
   $book['slot_time'] = $data['p_time'];
   $book['booking_type'] = $data['v_type'];
   $book['booking_date'] = $data['booking_date'];
   $display2 = $book;
}
    $paymentdata = $payment;
    $resp['status'] = 1;
    $resp['message'] = "Data found successfully";
    $resp['doctor'] = $display1;
    $resp['payment'] = $paymentdata;
    $resp['data'] = $display2;

}else{
    ///if server method is error
    $resp['status'] = "0";
    $resp['message'] = "Server Method Error";
    $resp['data'] = "No data Found";
}
echo json_encode($resp);
?>