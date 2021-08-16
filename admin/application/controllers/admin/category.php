<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('slider_model');
		$this->load->database();

		$this->lang->load('auth');
		$this->load->helper('language');
        $this->header['webdata'] = $this->db->get_where('my_website',array('id'=>'1'))->row();
	if(!$this->ion_auth->logged_in())
    {
      redirect('admin/auth/login', 'refresh');
    }
    $this->header['menu']='category';
	}
	
	
		   
/**
* @name          index
* @author        Milan Krushna
* @revised       null
* @Description   display user list
* @Param String  $msg is which condition satisfy that messge will display
* @copyright     Copyright (C) 2017 powered by Wayindia
*/
	
	

	//redirect if needed, otherwise display the user list
	function index($msg=NULL)
	{
      $this->header['menu']='category';
		$this->data['banner'] = $this->slider_model->get_category()->result();
		$this->load->view("common_admin/header",$this->header);
		$this->load->view("category/view_category",$this->data);
		$this->load->view("common_admin/footer");	

	}




		   
/**
* @name          create banner
* @author        Milan Krushna
* @revised       null
* @Description   create new banner
* @Param String  null
* @copyright     Copyright (C) 2017 powered by Wayindia
*/
	



// create a new group
	function create_category()
	{
	
        
            $this->header['menu']='category';
		$this->data['title'] = "Add Banner";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('admin/auth', 'refresh');
		}

        
        $this->data['slider'] = $this->slider_model->slider_listing();
        
        
		$this->form_validation->set_rules('title', "Title", 'xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			$data = $this->input->post('slider');
			$id = $this->input->post('id');
			   $file_name =  $_FILES['file']['name'];
  
            if($file_name !=''){
			$image=$this->upload_slide('file');
            }
		  if($image!=false){
            $data['image'] = $image;
          }else{
              
             
              //redirect('admin/slider/add_slide');
          }
          if(!empty($id))
          {
              $slider_id =  $this->slider_model->update_category($data,$id);
              redirect("admin/category"); 
          }else{
              
             //print_r($data);exit;
			$slider_id =  $this->slider_model->create_category($data);
			//echo $slider_id;exit;  $this->header['menu']='new_slider';
			if($slider_id)
			{
				//$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("admin/category"); 
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
		$this->load->view("slider/add_banner",$this->data);
		$this->load->view("common_admin/footer");	


		}
	}
		   
/**
* @name          edit slider
* @author        Milan Krushna
* @revised       null
* @Description   retrive slider and update slider
* @Param String  $id is id of slider table
* @copyright     Copyright (C) 2017 powered by Wayindia
*/
	

function edit_slider($id)
	{
       // $this->data['slider'] = $this->slider_model->slider_listing();
		$this->data['slide'] =  $this->slider_model->edit_slide($id);
		$this->data['title'] = "Edit Slide";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('admin/auth', 'refresh');
		}
		//validate form input
		$this->form_validation->set_rules('title', "Title",'xss_clean');
		if ($this->form_validation->run() == TRUE)
		{
		   $data['title']=$this->input->post('title');
            
            
            $file_name =  $_FILES['uploadimage']['name'];
  
            if($file_name !=''){
                $data['image']=$this->upload_slide('uploadimage');
            }else{
               $this->session->set_flashdata('message', 'Slider Update Failed!');
				redirect('admin/slider/edit_slider/'.$id);
            }
		 
			
			$slider_id =  $this->slider_model->update_slider($data,$id);
			//echo $new_category_id;exit;
			if($slider_id)
			{
				
                //echo 1;exit;
                $this->session->set_flashdata('message', 'Slider Updated');
				redirect('admin/slider/edit_slider/'.$id);
			}
		}
		else
		{
			//display the create group form
			//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		$this->load->view("common_admin/header",$this->header);
		$this->load->view("slider/edit_slide",$this->data);
		$this->load->view("common_admin/footer");	
		}
	}

		   
/**
* @name          upload slide
* @author        Milan Krushna
* @revised       null
* @Description   upload and resize image
* @Param String  $field is filename 
* @copyright     Copyright (C) 2017 powered by Wayindia
*/

public function upload_slide($field){
    
    
    
    $new_img =  now().'.'.explode('/',$_FILES[$field]['type'])[1];
   
    
        $config['upload_path'] = './upload/category/';
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
    
    
    
    
    
        ////resize Image using CI Library.
   protected function resize_image($new_img){


            $this->load->library('image_lib');
       
          
            $src_path = './upload/category/'.$new_img;
            $des_path =  './upload/gallery/slider/min_slider/'.$new_img;

            $config['image_library']    = 'gd2';
            $config['source_image']     = $src_path;
            $config['new_image']        = $des_path;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 200;
            $config['height']            = 200;
         

            $this->image_lib->initialize($config);
            $this->image_lib->resize();
      

    }
    
    		   
/**
* @name          
* @author        Milan Krushna
* @revised       null
* @Description   retrive slider and update slider
* @Param String  $id is id of slider table
* @copyright     Copyright (C) 2017 powered by Wayindia
*/
    
    function save_order(){
        $slider = $_POST['slider'];

	for ($i = 0; $i < count($slider); $i++) {

		$sql = "UPDATE `slider` SET `slider_order`=" . $i . " WHERE `id`='" . $slider[$i] . "'";

		$this->db->query($sql);

	}

        
    }
    		   
/**
* @name          edit banner
* @author        Milan Krushna
* @revised       null
* @Description   retrive banner and update
* @Param String  $id is id of slider table
* @copyright     Copyright (C) 2017 powered by Wayindia
*/


function get_category()
{
    $id = $this->input->post('id');
    $slide=  $this->slider_model->edit_catgory($id);
    echo json_encode($slide);
}
	//edit a group
	function edit_banner($id)
	{
        $this->data['slider'] = $this->slider_model->slider_listing();
		$this->data['slide'] =  $this->slider_model->edit_slide($id);
		$this->data['title'] = "Edit Slide";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('admin/auth', 'refresh');
		}
		//validate form input
		$this->form_validation->set_rules('title', "Title", 'xss_clean');
		if ($this->form_validation->run() == TRUE)
		{
		
		$file_name =  $_FILES['file']['name'];

		if($file_name !=''){
			
			$data = $this->input->post('slider');
			$image=$this->upload_slide('file');
		  if($image!=false){
            $data['image'] = $image;
          }else{
             // redirect('admin/slider/edit_banner/'.$id);
              
              //echo 2;exit;
          }
			
		}else{
			$data = $this->input->post('slider');
		}
		
			
			$slider_id =  $this->slider_model->update_slider($data,$id);
			//echo $new_category_id;exit;
			if($slider_id)
			{
				$this->session->set_flashdata('message', "update");
				redirect('admin/slider/edit_banner/'.$id);
                
              //  echo 1;exit;
                
			}
		} 
		else
		{
			//display the create group form
			//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		$this->load->view("common_admin/header",$this->header);
		$this->load->view("slider/edit_banner",$this->data);
		$this->load->view("common_admin/footer");	
		}
	}

  

    /*
    *Author: Milan Krushna
    *Slider Displaying
    */
 
      		   
/**
* @name          view slider
* @author        Milan Krushna
* @revised       null
* @Description   display slider list
* @Param String  null
* @copyright     Copyright (C) 2017 powered by Wayindia
*/
  
   
  function view_slide(){
  	
  	$pdata=$this->slider_model->get_sldr(); 
  	
     
  	$this->data['galleries'] = $pdata;
	  	
	  	///$dtl=$this-load-view('common_admin/header');
	  	
	  	$this->load->view('common_admin/header',$this->header);
		$this->load->view('slider/view_slide',$this->data);
		$this->load->view('common_admin/footer');
	  	
  	
  	
  }
      
		   
/**
* @name          edit slider
* @author        Milan Krushna
* @revised       null
* @Description   retrive slider and update slider
* @Param String  $id is id of slider table
* @copyright     Copyright (C) 2017 powered by Wayindia
*/
    
    
    function catch_banner(){
        
        
        
        $cond['parent_id'] = $this->input->post('slider_id');
        $cond['type'] = $this->input->post('position');
        
        $this->data['banner'] = $this->slider_model->get_banner($cond);
        
        
        
        
    } 
 
		   
/**
* @name          delete slider
* @author        Subhashree Jena
* @revised       null
* @Description   delete slider 
* @Param String  $id is id of slider table
* @copyright     Copyright (C) 2017 powered by Wayindia
*/

function delete_category($id){
	$slide_delete = $this->slider_model->delete_category($id);
	redirect("admin/category");
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
      
        if($this->db->update('category',array('status'=>$upsts),array('id'=>$id))){
          echo $upsts;  
        }
        
        
    }
    
    
}