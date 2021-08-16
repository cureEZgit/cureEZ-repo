<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patients extends CI_Controller {



    function __construct()
    {
        parent::__construct();
        //header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        
        $this->load->library('ion_auth');
        
        $this->load->library('form_validation');
        $this->load->helper('url');
        //$this->load->model('admin/page_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        date_default_timezone_set("Asia/Kolkata");
        
        //$this->load->library('pagination');
        if (!$this->ion_auth->logged_in())
        {
            redirect('admin/auth', 'refresh');
        }
        
        
        $this->header['menu']="dashboard";
        $this->header['webdata'] = $this->db->get_where('my_website',array('id'=>'1'))->row();
    }
    
    function index($doctor_id='')
    {
        $this->header['menu'] = 'patients';
        $sql = "SELECT * from user_register";
        if(!empty($doctor_id))
        {
            $sql = "select b.* from appointment_booking as a inner join user_register as b on a.user_id = b.id where a.doctor_id=".$doctor_id;
        }
        $this->data['datas'] = $this->db->query($sql)->result_array();
        $this->data['doctor_id'] = $doctor_id;
    
        $this->load->view('common_admin/header',$this->header);
        $this->load->view('admin/patients',$this->data);
        $this->load->view('common_admin/footer');
    }
    function list($doctor_id='')
    {
        $this->header['menu'] = 'patients';
        $sql = "SELECT * from user_register";
        if(!empty($doctor_id))
        {
            $sql = "select b.* from appointment_booking as a inner join user_register as b on a.user_id = b.id where a.doctor_id=".$doctor_id." group by b.id";
        }
        $this->data['datas'] = $this->db->query($sql)->result_array();
        $this->data['doctor_id'] = $doctor_id;
        $doctor_name = '';
        if(!empty($doctor_id))
        {
            $doctor_detail = $this->db->get_where('doctors',array('id'=>$doctor_id))->row();
            if(!empty($doctor_detail))
            {
                $doctor_name = $doctor_detail->name;
            }
        }
        $this->data['doctor_name'] = $doctor_name;
        $this->load->view('common_admin/header',$this->header);
        $this->load->view('admin/patients',$this->data);
        $this->load->view('common_admin/footer');
    }
}