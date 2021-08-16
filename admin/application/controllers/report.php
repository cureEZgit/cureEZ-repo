<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
	function index()
	{
        $this->header['menu']='report';
        $where = [];
        $from_date = ''; $to_date = ''; $export = '';
        if($this->input->post())
        {
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
            $export = $this->input->post('export_type');
        }
        if(!empty($from_date))
        {
            $where[] = "a.booking_date >='".$from_date."'";
        }
        if(!empty($to_date))
        {
            $where[] = "a.booking_date <='".$to_date."'";
        }
        $where_cond = '';
        if(!empty($where))
        {
            $where_cond = ' where '.implode(' and ',$where);
        }
        // $sql = "SELECT a.*, b.name as patient_name, c.name as doctor_name, c.uniq_id, c.city as dr_city, c.address as dr_address, d.name as speciality FROM appointment_booking as a inner join user_register as b 
        // on a.user_id = b.id inner join doctors as c on a.doctor_id = c.id inner join category as d on c.speciality=d.id ".$where_cond." 
        // order by a.booking_date desc";
        $sql = "SELECT a.*, b.name as patient_name, c.name as doctor_name, c.uniq_id, c.city as dr_city, c.address as dr_address, d.name as speciality 
        FROM doctors as c left join appointment_booking as a on a.doctor_id = c.id left join category as d on c.speciality=d.id left join user_register as b 
        on a.user_id = b.id ".$where_cond." order by a.booking_date desc";
	    //echo $sql; exit;   
	    $this->data['datas'] = $datas = $bookings = $this->db->query($sql)->result_array();
	    
	    if(!empty($export))
        {
            // Excel file name for download 
            $fileName = "Cureez_Report_" . date('dmY') . ".xls"; 
            
            // Column names 
            $fields = array("Doctor ID", "Doctor Name", "City", "Address", "Patient Name","Booked Date","Amount Received","Status"); 
            
            // Display column names as first row 
            $excelData = implode("\t", array_values($fields)) . "\n"; 
             
            foreach($datas as $row) 
            { 
                $booked_date = $patient_name = $amount = $status = '-'; 
                if(!empty($row['booking_date']))
                    $booked_date = date('d-m-Y', strtotime($row['booking_date']));
                if(!empty($row['patient_name']))
                    $patient_name = $row['patient_name'];
                if(!empty($row['amount']))
                    $amount = $row['amount'];
                if(!empty($row['status']))
                    $status = $row['status'];
                $rowData = array($row['uniq_id'], $row['doctor_name'], $row['dr_city'], $row['dr_address'], $patient_name, $booked_date, 
                $amount, $status); 
                array_walk($rowData, 'filterData'); 
                $excelData .= implode("\t", array_values($rowData)) . "\n"; 
            } 
            // Headers for download 
            header("Content-Disposition: attachment; filename=\"$fileName\""); 
            header("Content-Type: application/vnd.ms-excel"); 
            echo $excelData; 
            exit;
        }
        else {
            $this->data['from_date'] = $from_date;
            $this->data['to_date'] = $to_date;
    		$this->load->view("common_admin/header",$this->header);
    		$this->load->view("admin/report",$this->data);
    		$this->load->view("common_admin/footer");	
        }
	}
}
function filterData(&$str)
{ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
}