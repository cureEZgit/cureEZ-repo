<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

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
	function index($msg=NULL)
	{
        $this->header['menu']='doctor';
        $this->data['category'] =  $this->doctor_model->get_category();
        $this->data['clinic'] =  $this->doctor_model->get_clinic()->result();
	    $this->data['doctor'] = $this->doctor_model->get_all_doctors();
		$this->load->view("common_admin/header",$this->header);
		$this->load->view("doctor/view_doctor",$this->data);
		$this->load->view("common_admin/footer");	

	}
	function list()
	{
        $this->header['menu']='doctor';
	    $this->data['doctor'] = $this->doctor_model->get_all_doctors();
		$this->load->view("common_admin/header",$this->header);
		$this->load->view("doctor/list",$this->data);
		$this->load->view("common_admin/footer");	

	}
	function form($id = '')
	{
	    $this->header['menu']='doctor';
	    $this->header['title']=' Add Doctor';
	    $this->header['button_title']=' Add';
	    $this->data['category'] =  $this->doctor_model->get_category();
	    if(!empty($id))
	    {
	        $this->header['title']=' Edit Doctor';
	        $this->header['button_title']='Update';
	        $this->data['edit_data'] =  $this->doctor_model->edit_doctor($id);
	    }
	    $this->load->view("common_admin/header",$this->header);
		$this->load->view("doctor/add_doctor",$this->data);
		$this->load->view("common_admin/footer");	
	}
	function add($id = '')
	{
	    $this->header['menu']='doctor';
	    $this->data['category'] =  $this->doctor_model->get_category();
	    $this->load->view("common_admin/header",$this->header);
		$this->load->view("doctor/form",$this->data);
		$this->load->view("common_admin/footer");	
	}

    function getDoctorId($speciality=1)
    {
	    //get doctor uniq id 
        $sql = "select uniq_id from doctors where speciality = ".$speciality." order by id desc limit 1";
        $prevDr = $this->db->query($sql)->row();
        if(!empty($prevDr))
        {
            $prevDrIdCode = substr($prevDr->uniq_id, 0, 3);
            $prevDrId = str_replace($prevDrIdCode,'',$prevDr->uniq_id);
            $doctorId = $prevDrIdCode.sprintf("%03d", $prevDrId+1);
        }
        else {
            $speciality_code = '';
            $sql = "select name from category where id = ".$speciality;
            $specialityData = $this->db->query($sql)->row();
            $speciality_code = strtoupper(substr($specialityData->name, 0, 2));
            $doctorId = 'D'.$speciality_code.'001';
        }
        return $doctorId;
    }

// create a new group
	function create_doctor()
	{
	    
	
        
            $this->header['menu']='doctor';
		$this->data['title'] = "Add Banner";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('admin/auth', 'refresh');
		}

        
     
        
		$this->form_validation->set_rules('name', "Title", 'xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			$data = $this->input->post('slider');
			$data['rating']=3;
			$id = $this->input->post('id');
			   $file_name =  $_FILES['file']['name'];
  
            if($file_name !=''){
			$image=$this->upload_slide('file');
            }
		  if($image!=false){
            $data['cover_pic'] = $image;
          }else{
              
             
              //redirect('admin/slider/add_slide');
          }
          $data['practice_starts'] = date('Y-m-d', strtotime($data['practice_starts']));
          if(!empty($id))
          {
              
         
              $slider_id =  $this->doctor_model->update_doctor($data,$id);
    //         	$speciality = serialize($this->input->post('language'));
		  //    $ndata['language'] =$speciality; 
		  //     $this->db->where('id',$id);
			 //   $this->db->update('doctors',$ndata);
			 $this->session->set_flashdata('message', "Doctor updated successfully");
             redirect("admin/doctor"); 
          }else{
              
              //get doctor uniq id 
              $data['uniq_id'] = $this->getDoctorId($data['speciality']);
              
               $data['entry_time'] = date('Y-m-d h:i a');
             //print_r($data);exit;
			$slider_id =  $this->doctor_model->create_doctor($data);
			
// 			$speciality = serialize($this->input->post('language'));
// 		      $ndata['language'] =$speciality; 
// 		       $this->db->where('id',$slider_id);
// 			    $this->db->update('doctors',$ndata);
			
			//echo $slider_id;exit;  $this->header['menu']='new_slider';
			if($slider_id)
			{
				$this->session->set_flashdata('message', "Doctor added successfully");
				redirect("admin/doctor"); 
                //echo 1;exit;
                
			}
          }
		}
		else
		{
			//display the create group form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->load->view("common_admin/header",$this->header);
		$this->load->view("doctor/add_doctor",$this->data);
		$this->load->view("common_admin/footer");	


		}
	}
	
		   


public function upload_slide($field){
    
    
    
    $new_img =  now().'.'.explode('/',$_FILES[$field]['type'])[1];
   
    
        $config['upload_path'] = './upload/doctor/';
        $config['allowed_types'] = '*';
        $config['max_size']	= '2000000000';
        $config['max_width'] = '102400000';
        $config['max_height'] = '700000000';
        $config['file_name'] = $new_img;

$this->load->library('upload', $config);
$this->upload->initialize($config);
 if($this->upload->do_upload($field)){
     
  //$this->resize_image($new_img);
   $data = array('upload_data' => $this->upload->data());
     
    return  $data['upload_data']['file_name'];
  
 }else{
  
  $this->session->set_flashdata('message',$this->upload->display_errors());
     return false; 
     
 }

    
  
}
    

    function save_order(){
        $slider = $_POST['slider'];

	for ($i = 0; $i < count($slider); $i++) {

		$sql = "UPDATE `clinic` SET `slider_order`=" . $i . " WHERE `id`='" . $slider[$i] . "'";

		$this->db->query($sql);

	}

        
    }


function get_doctor()
{
    $id = $this->input->post('id');
    $slide=  $this->doctor_model->edit_doctor($id);
    echo json_encode($slide);
}
function get_doctor_speciality()
{
    $id = $this->input->post('id');
    // $this->data['category'] =  $this->clinic_model->get_category();
    $this->data['doc_lang']=  $this->doctor_model->edit_doctor_speciality($id);
   	$this->load->view("doctor/doctor_lang",$this->data);
}
// function get_clinic_speciality()
// {
//     $id = $this->input->post('id');
//     $this->data['category'] =  $this->clinic_model->get_category();
//     $this->data['clinic_spec']=  $this->clinic_model->edit_clinic_speciality($id);
//   	$this->load->view("clinic/clinic_specility",$this->data);
// }




function delete_doctor($id){
	$slide_delete = $this->doctor_model->delete_doctor($id);
	redirect("admin/doctor");
	//echo 1;
}

    
  		   
/**
* @name          check status
* @author        Milan Krushna
* @revised       null
* @Description   check ststus is active or deactive
* @Param String  $id is id of slider table
* @copyright     Copyright (C) 2017 powered by Wayindia
*/
  
    function actdeact($id=""){
        
        $sts = $this->input->post('sts');
        
        if($sts == 0){
            $upsts = 1; 
        }else{
            $upsts = 0;
        }
      
        if($this->db->update('doctors',array('status'=>$upsts),array('id'=>$id))){
          echo $upsts;  
        }
        
        
    }
    
    
}