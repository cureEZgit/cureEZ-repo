<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

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
    $this->header['menu']='slider';
	}


// create a new banner
	function create_banner()
	{
	
        
            $this->header['menu']='new_slider';
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
              $slider_id =  $this->slider_model->update_slider($data,$id);
              redirect("banners"); 
          }else{
              
             //print_r($data);exit;
			$slider_id =  $this->slider_model->create_slider($data);
			//echo $slider_id;exit;  $this->header['menu']='new_slider';
			if($slider_id)
			{
				//$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("banners"); 
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


public function upload_slide($field){
    
    
    
    $new_img =  now().'.'.explode('/',$_FILES[$field]['type'])[1];
   
    
        $config['upload_path'] = './upload/gallery/slider/';
        $config['allowed_types'] = '*';
        $config['max_size']	= '2000000000';
        $config['max_width'] = '102400000';
        $config['max_height'] = '700000000';
        $config['file_name'] = $new_img;

$this->load->library('upload', $config);
$this->upload->initialize($config);
 if($this->upload->do_upload($field)){
     
  $this->resize_image($new_img);
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
       
          
            $src_path = './upload/gallery/slider/'.$new_img;
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

    
    function save_order(){
        $slider = $_POST['slider'];

	for ($i = 0; $i < count($slider); $i++) {

		$sql = "UPDATE `slider` SET `slider_order`=" . $i . " WHERE `id`='" . $slider[$i] . "'";

		$this->db->query($sql);

	}

        
    }


function get_banner()
{
    $id = $this->input->post('id');
    $slide=  $this->slider_model->edit_slide($id);
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

    		   
/**
* @name          banner
* @author        Milan Krushna
* @revised       null
* @Description   display banner list
* @Param String  null
* @copyright     Copyright (C) 2017 powered by Wayindia
*/
    
    function banner(){
      $this->header['menu']='banner';
        $this->data['slider'] = $this->slider_model->slider_listing();
        
        $this->form_validation->set_rules('slider_id', "Slider", 'required');
        $this->form_validation->set_rules('position', "Position", 'required');
        
       /* if (!empty($_GET))
		{
          */
        $cond['parent_id'] = $this->data['sl_id'] =  1;//$_GET['slider_id'];
        $cond['type'] = $this->data['position'] = 'top';//$_GET['position'];
        
        $this->data['banner'] = $this->slider_model->get_banner($cond);
            
        $this->load->view("common_admin/header",$this->header);
		$this->load->view("slider/banner",$this->data);
		$this->load->view("common_admin/footer"); 
            
       /*     
        }else{
            
        $this->load->view("common_admin/header",$this->header);
		$this->load->view("slider/banner",$this->data);
		$this->load->view("common_admin/footer");	 
            
        }*/
        
        
            
    }

    
    
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

function delete_slider($id){
	$slide_delete = $this->slider_model->delete_slider($id);
	redirect("admin/slider/banner");
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
      
        if($this->db->update('slider',array('status'=>$upsts),array('id'=>$id))){
          echo $upsts;  
        }
        
        
    }
    
    
}