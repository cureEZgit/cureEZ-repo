<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->config('ion_auth', TRUE);
		$this->load->helper('cookie');
		$this->load->helper('date');
		$this->lang->load('ion_auth');
	}

function get_vender()
{
return $this->db->get('vender')->result();
}
	

function get_news(){

     $this->db->select('*');
      $this->db->from('news');
       $this->db->order_by('id','desc');
       return $this->db->get()->result_array();

    
}

    
    
function create_news($data){
     return $this->db->insert('news',$data);
   
}

    function edit_news($id){
        
        return $this->db->get_where('news',array('id'=>$id))->row();
    }


    function update_news($data,$id){
       return $this->db->update('news',$data,array('id'=>$id));
    }
    public function delete_news($id){
                $delete  = $this->db->delete('news', array('id' => $id)); 
                return $delete;
    }
    function insert_category($data){
        return $this->db->insert('category',$data);
        
    }
    
    function get_all_category(){
        
        
        return $this->db->get_where('category')->result_array();
    }
    
    function edit_category($id){
        
        return $this->db->get_where('category',array('id' => $id))->row_array();
        
    }
    
    function update_category($data,$id){
        
        return $this->db->update('category',$data,array('id'=>$id));
    }
    
    function get_latest_news(){
         $this->db->select('news.*,category.name as catgyname');
		$this->db->from('news');
		$this->db->join('category','category.id = news.cat_id');
        $this->db->order_by('news.id','DESC');
        $this->db->limit(10);
    
   return $this->db->get()->result_array();
        
    }
    
    
    function update_checkbox($data,$id){
         
      
          $this->db->update('news',array('excep_news' =>0),array('excep_news' =>1));
          $check = $this->db->update('news',$data,$id);  
        
		return $check;
       
	}
    
    function get_notification_news($news_id=''){
        
        $this->db->select('heading,cover_pic');
        return $this->db->get_where('news',array('id'=>$news_id))->row_array();
        
    }
    
    
    
   function device_data($s='',$limit=''){
    /// echo "SELECT device_token FROM `device_data` ORDER BY id ASC LIMIT $s,$limit";
       
     return  $query = $this->db->query("SELECT device_token FROM `device_data` ORDER BY id ASC LIMIT $s,$limit")->result_array();
       
     /*  $this->db->select('device_token');
       ////$this->db->where('id','7');
       $this->db->limit($s,$i);
       $this->db->order_by('id','ASC');
        $this->db->get('device_data')->result_array(); */
       
   }
   
   function num_devicedata(){
       return $this->db->get('device_data')->num_rows();
   }
    
}