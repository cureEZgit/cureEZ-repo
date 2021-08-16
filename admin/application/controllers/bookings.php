<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('doctor_model');
		$this->load->database();

		$this->lang->load('auth');
		$this->load->helper('language');
        $this->header['webdata'] = $this->db->get_where('my_website',array('id'=>'1'))->row();
    	if(!$this->ion_auth->logged_in())
        {
          redirect('admin/auth/login', 'refresh');
        }
        $this->header['menu']='doctor';
	}
	
	//redirect if needed, otherwise display the user list
	function list($user_id=NULL, $doctor_id=NULL)
	{
        $this->header['menu']='bookings';
        $where = [];
        if(!empty($user_id))
        {
            $where[] = 'a.user_id ='.$user_id;
        }
        if(!empty($doctor_id))
        {
            $where[] = 'a.doctor_id = '.$doctor_id;
        }
        $where_cond = '';
        if(!empty($where))
        {
            $where_cond = ' where '.implode(' and ',$where);
        }
        $sql = "SELECT a.*, b.name as patient_name, c.name as doctor_name, d.name as speciality FROM appointment_booking as a inner join user_register as b on a.user_id = b.id inner join doctors as c on a.doctor_id = c.id 
	        inner join category as d on c.speciality=d.id ".$where_cond." order by a.booking_date desc";
	    //echo $sql; exit;   
	    $this->data['datas'] = $bookings = $this->db->query($sql)->result_array();
	    $doctor_name = '';
        if(!empty($doctor_id))
        {
            if(!empty($bookings))
            {
                $doctor_name = $bookings[0]['doctor_name'];
            }
        }
        $this->data['doctor_name'] = $doctor_name;
        $patient_name = '';
        if(!empty($user_id))
        {
            if(!empty($bookings))
            {
                $patient_name = $bookings[0]['patient_name'];
            }
        }
        $this->data['patient_name'] = $patient_name;
		$this->load->view("common_admin/header",$this->header);
		$this->load->view("admin/bookings",$this->data);
		$this->load->view("common_admin/footer");	

	}
}