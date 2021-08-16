<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

     	   
/**
* @name          page model
* @author        Milan Krushna and Subhashree Jena
* @revised       null
* @Description   All the insert, retrive, update, orderby and delete operation of page management is done here.
* @Param String  null
* @copyright     Copyright (C) 2017 powered by Wayindia
*/


class Page_model extends CI_Model
{
	/**
	 * Holds an array of tables used
	 *
	 * @var array
	 **/
	public $tables = array();

	/**
	 * activation code
	 *
	 * @var string
	 **/
	public $activation_code;

	/**
	 * forgotten password key
	 *
	 * @var string
	 **/
	public $forgotten_password_code;

	/**
	 * new password
	 *
	 * @var string
	 **/
	public $new_password;

	/**
	 * Identity
	 *
	 * @var string
	 **/
	public $identity;

	/**
	 * Where
	 *
	 * @var array
	 **/
	public $_ion_where = array();

	/**
	 * Select
	 *
	 * @var array
	 **/
	public $_ion_select = array();

	/**
	 * Like
	 *
	 * @var array
	 **/
	public $_ion_like = array();

	/**
	 * Limit
	 *
	 * @var string
	 **/
	public $_ion_limit = NULL;

	/**
	 * Offset
	 *
	 * @var string
	 **/
	public $_ion_offset = NULL;

	/**
	 * Order By
	 *
	 * @var string
	 **/
	public $_ion_order_by = NULL;

	/**
	 * Order
	 *
	 * @var string
	 **/
	public $_ion_order = NULL;

	/**
	 * Hooks
	 *
	 * @var object
	 **/
	protected $_ion_hooks;

	/**
	 * Response
	 *
	 * @var string
	 **/
	protected $response = NULL;

	/**
	 * message (uses lang file)
	 *
	 * @var string
	 **/
	protected $messages;

	/**
	 * error message (uses lang file)
	 *
	 * @var string
	 **/
	protected $errors;

	/**
	 * error start delimiter
	 *
	 * @var string
	 **/
	protected $error_start_delimiter;

	/**
	 * error end delimiter
	 *
	 * @var string
	 **/
	protected $error_end_delimiter;

	/**
	 * caching of users and their groups
	 *
	 * @var array
	 **/
	public $_cache_user_in_group = array();

	/**
	 * caching of groups
	 *
	 * @var array
	 **/
	protected $_cache_groups = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->config('ion_auth', TRUE);
		$this->load->helper('cookie');
		$this->load->helper('date');
		$this->lang->load('ion_auth');
	}
	

	public function set_message_delimiters($start_delimiter, $end_delimiter)
	{
		$this->message_start_delimiter = $start_delimiter;
		$this->message_end_delimiter   = $end_delimiter;
		return TRUE;
	}
	public function set_error($error)
	{
		$this->errors[] = $error;

		return $error;
	}
	public function set_message($message)
	{
		$this->messages[] = $message;

		return $message;
	}
	
	
	public function get_pages(){
		$query = $this->db->get('pages');
		return $query;
	}
	
	public function create_page($data)
	{
			$this->db->insert('pages', $data);
			$page_id = $this->db->insert_id();
			$this->set_message('page Created!');
			return $page_id;
	}
	
	function update_page($data,$id){

		$res = $this->db->update('pages', $data, array('id' => $id));
		return $res;
	}
	
	public function edit_page($id = NULL)
	{
		$query  = $this->db->get_where('pages',array('id =' => $id))->row();		  
		return $query;		
	}
	
	/*public function get_order($id = NULL)
	{
		$query  = $this->db->get_where('pages',array('id =' => $id))->row_array();		  
		return $query;		
	}*/
	
	 		
	public function delete_pg($id){
			return	$this->db->delete('pages', array('id' => $id)); 
				
	}



	public function get_sections(){
		$query = $this->db->get('section');
		return $query;
	}
	
	function get_ordersections(){
		$query  = $this->db->get_where('section',array('page_id !=' => ''));		  
		
		return $query;
	}
	
	public function create_section($data)
	{
			$this->db->insert('section', $data);
			$section_id = $this->db->insert_id();
			$this->set_message('Section Created!');
			return $section_id;
	}
	
	function update_section($data,$id){

		$res = $this->db->update('section', $data, array('id' => $id));
		return $res;
	}
	
	public function edit_section($id = NULL)
	{
		$query  = $this->db->get_where('section',array('id =' => $id))->row();		  
		return $query;		
	}
	
	public function order_section($id = NULL)
	{
		$query  = $this->db->get_where('section',array('id =' => $id))->row_array();		  
		return $query;		
	}


	public function delete_section($id){
				$delete  = $this->db->delete('section', array('id' => $id)); 
				return $delete;
	}
	
	public function get_images($id){
				$query  = $this->db->get_where('page_images',array('page_id =' => $id));		  
				return $query;	

	} 
	
	public function insert_image($data){
			$this->db->insert('page_images', $data);
			$gallery_id = $this->db->insert_id();
			$this->set_message('Slide Inserted!');
			return $gallery_id;
	}
	
	public function edit_image($id = NULL){
		$query  = $this->db->get_where('page_images',array('id =' => $id))->row();		  
		return $query;
	}
	 
	public function update_image($data, $id){
		$res = $this->db->update('page_images', $data, array('id' => $id));
		return $res;
	} 

	
		public function delete_image($id){
				$delete  = $this->db->delete('page_images', array('id' => $id)); 
				return $delete;
	}

	
	public function get_innerimages($id){
		
		$query  = $this->db->get_where('inner_images',array('image_id =' => $id));		  
		return $query;	
	
	}


	public function insert_innerimage($data){
			$this->db->insert('inner_images', $data);
			$gallery_id = $this->db->insert_id();
			$this->set_message('Slide Inserted!');
			return $gallery_id;
	}

	public function edit_innerimage($id = NULL){
		$query  = $this->db->get_where('inner_images',array('id =' => $id))->row();		  
		return $query;
	}
	
	public function delete_innerimage($id){
				$delete  = $this->db->delete('inner_images', array('id' => $id)); 
				return $delete;
	}


	public function update_innerimage($data, $id){
		$res = $this->db->update('inner_images', $data, array('id' => $id));
		return $res;
	}

    function url_management($data){
        
        
        $page_id = $data['pageid'];
        $pg_url = $data['newurl'];
        
        $exits_row = $this->db->get_where('pages',array('url'=>$pg_url))->num_rows();
        
    
        
        if($exits_row > 0){
            
            $rtn = "Please Create a Unique URL";
            
        }else{
            
            $this->db->update('pages',array('url'=>$pg_url),array('id'=>$page_id));
            if($this->db->get_where('menu',array('page_id'=>$page_id))->num_rows() > 0){
            $this->db->update('menu',array('link'=>$pg_url),array('page_id'=>$page_id));   
            }
            
            $rtn = 1;
            
        }
        
        
        return $rtn;
        
        
    }
    
    
    
    function slider_listing(){
        
        return $this->db->get_where('slider',array('parent_id'=>0))->result_array();
        
    }
     
    
    

}