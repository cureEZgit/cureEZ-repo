<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {



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


/**
* @name          index
* @author        Milan Krushna
* @revised       null
* @Description   display dashboard
* @Param String  null
* @copyright     Copyright (C) 2017 powered by Wayindia
*/




    function index()
    {


                $this->data['website_data'] = $this->web_data();
           $this->form_validation->set_rules('name', 'Name', 'required');
                if ($this->form_validation->run() == TRUE)
                    {

                    $data['title'] = $this->input->post('title');
                    $data['name'] = $this->input->post('name');
                    $data['meta_title'] = $this->input->post('meta_title');
                    $data['robots'] = $this->input->post('robots');
                    $data['meta_author'] = $this->input->post('meta_author');
                    $data['meta_keyword'] = $this->input->post('meta_keyword');
                    $data['meta_description'] = $this->input->post('meta_description');
                    
                    $data['mssmarttagspreventparsing'] = $this->input->post('mssmarttagspreventparsing');
                    $data['msthemecompatible'] = $this->input->post('msthemecompatible');
                    $data['creation_date'] = $this->input->post('creation_date');
                    $data['identifier'] = $this->input->post('identifier');
                    $data['generator'] = $this->input->post('generator');
                    $data['googlebot'] = $this->input->post('googlebot');
                    $data['revisit_after'] = $this->input->post('revisit_after');
                   
                    $data['content_type'] = $this->input->post('content_type');
                    $data['copyright'] = $this->input->post('copyright');
                   
                    $data['admin_panel_name'] = $this->input->post('admin_panel_name');

                    $data['description'] =  $this->input->post('description');
                    $data['address'] =  $this->input->post('address');
                    $data['email'] =  $this->input->post('email');
                    $data['phone'] =  $this->input->post('phone');
                    $data['facebook'] =  $this->input->post('facebook');
                    $data['google'] =  $this->input->post('google');
                    $data['twitter'] =  $this->input->post('twitter');
                    $data['linkdin'] =  $this->input->post('linkdin');
                    $data['youtube'] =  $this->input->post('youtube');
                    $data['insta'] =  $this->input->post('insta');
                    $data['skype'] =  $this->input->post('skype');
                    $data['update_date'] =  date('Y-m-d');

                 
                     if($_FILES["logo"]["name"] !=""){
                       $logo  = $this->upload_image('logo');
                     if($logo != false){
                        $data['logo'] = $logo;
                     }
                    }




                if($this->create_website($data)){
               $this->session->set_flashdata('msg','Your Website Data Successfully Updated');
               redirect('admin/dashboard');
                }

    }
        else
        {
        
            //get doctor count 
            $this->data['doctor_cnt'] = $this->db->get('doctors')->num_rows();
            //get patient count 
            $this->data['patient_cnt'] = $this->db->get('user_register')->num_rows();
            //get appointment count 
            $this->data['appointment_cnt'] = $this->db->get('appointment_booking')->num_rows();
            //get latest appointments
            $cdate = date('Y-m-d');
            $sql = "SELECT a.*, b.name as patient_name, c.name as doctor_name, d.name as speciality FROM appointment_booking as a inner join user_register as b on a.user_id = b.id inner join doctors as c on a.doctor_id = c.id 
            inner join category as d on c.speciality=d.id WHERE date(a.booking_date) = '$cdate' ORDER BY a.id DESC";
            $this->data['appointments'] = $this->db->query($sql)->result_array();
            
            $adv_sql = "SELECT a.*, b.name as patient_name, c.name as doctor_name, d.name as speciality FROM appointment_booking as a inner join user_register as b on a.user_id = b.id inner join doctors as c on a.doctor_id = c.id 
            inner join category as d on c.speciality=d.id WHERE date(a.booking_date) > '$cdate' ORDER BY a.id DESC";
            $this->data['adv_appointments'] = $this->db->query($adv_sql)->result_array();
            
            //echo '<pre>'; print_r($this->data['patient_cnt']); exit;
        
            $this->load->view('common_admin/header',$this->header);
            $this->load->view('admin/about',$this->data);
            $this->load->view('common_admin/footer');
        }
        
    }




/**
* @name          web data
* @author        Milan Krushna
* @revised       null
* @Description   get website data
* @Param String  null
* @copyright     Copyright (C) 2017 powered by Wayindia
*/




    function web_data(){

        return $this->db->get('my_website')->row();

    }



/**
* @name          create website
* @author        Milan Krushna
* @revised       null
* @Description   create website data in dashboard
* @Param String  $data is data are in array format
* @copyright     Copyright (C) 2017 powered by Wayindia
*/


    function create_website($data){

       return $this->db->update('my_website',$data,array('id'=>'1'));



    }


/**
* @name          upload image
* @author        Milan Krushna
* @revised       null
* @Description   image uploading and resize 
* @Param String  $field is input type field name
* @copyright     Copyright (C) 2017 powered by Wayindia
*/





        public function upload_image($field){

$new_img =  'logo.png';
$config['upload_path'] = './assets/user/images/';
$config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|JPG';
$config['overwrite']	= TRUE;
$config['max_size']	= '1024';
$config['max_width'] = '1024';
$config['max_height'] = '720';
$config['file_name'] = $new_img;

$this->load->library('upload', $config);
$this->upload->initialize($config);

 if($this->upload->do_upload($field)){

  /// $this->resize_image($new_img);
   $data = array('upload_data' => $this->upload->data());

     return $data['upload_data']['file_name'];

 }else{


  $this->session->set_flashdata('message',$this->upload->display_errors());
     return false;

 }


}

    function resize_image($new_img){


      $this->load->library('image_lib');


            $src_path = 'assets/user/images/' . $new_img;
            $des_path =  'assets/user/images/ico/favicon.ico';

            $config['image_library']    = 'gd2';
            $config['source_image']     = $src_path;
            $config['new_image']        = $des_path;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 64;
            $config['height']           = 64;

            $this->image_lib->initialize($config);
            $this->image_lib->resize();


    }





}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
