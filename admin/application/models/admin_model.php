<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_model extends CI_Model
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
	
	
	public function category($id = NULL)
	{
		
		
	$query  = $this->db->get_where('category',array('id =' => $id))->row();		  
	return $query;
	
	}
	 
	 
	 
	 function  categories(){
		$query = $this->db->get('category');
		return $query;
	 
	 }
	
	
	public function create_category($category_name, $odia_name, $description = '')
	{
	
			$data = array('name'=>$category_name,'description'=>$description, 'odia_name'=>$odia_name);
			$this->db->insert('category', $data);
			$category_id = $this->db->insert_id();

		$this->set_message('Category Created!');
		// return the brand new group id
		return $category_id;
	}
	


	function update_category($id,$category_name,$odia_name, $description){
		$data = array('name'=>$category_name,'description'=>$description,'odia_name'=>$odia_name);
		$res = $this->db->update('category', $data, array('id' => $id));
		return $res;

	}
	
	
	
	public function district($id = NULL)
	{
		
		
	$query  = $this->db->get_where('district',array('id =' => $id))->row();		  
	return $query;
	
	}
	 
	 
	 
	 function  districts(){
		$query = $this->db->get('district');
		return $query;
	 
	 }
	
	
	public function create_district($district_name,$odia_name, $description = '')
	{
			$data = array('name'=>$district_name,'description'=>$description,'odia_name'=>$odia_name);
			$this->db->insert('district', $data);
			$district_id = $this->db->insert_id();

		$this->set_message('District Created!');
		// return the brand new group id
		return $district_id;
	}
	


	function update_district($id,$district_name,$odia_name, $description){
		$data = array('name'=>$district_name,'description'=>$description,'odia_name'=>$odia_name);
		$res = $this->db->update('district', $data, array('id' => $id));
		return $res;

	}
	 
	 
	public function delete_district($id){
			$query_st  = $this->db->get_where('grievance',array('district_id =' => $id));		 
			$data_st  =  $query_st->row();
			$len_st =  count($data_st);
			if($len_st == 0){
						$delete  = $this->db->delete('district', array('id' => $id)); 
					return 1;
				}else{
					return 2;				
					
				}
		}
		
		
		public function delete_category($id){
			$query_st  = $this->db->get_where('grievance',array('category_id =' => $id));		 
			$data_st  =  $query_st->row();
			$len_st =  count($data_st);
			if($len_st == 0){
						$delete  = $this->db->delete('category', array('id' => $id)); 
					return 1;
				}else{
					return 2;				
					
				}
		}
 function insert_footer($data){
			 $res = $this->db->update('configuration', $data, array('name' => 'footer_menu'));
				return $res;
		 }
	 

function get_footer(){
		$query  = $this->db->get_where('configuration',array('name' => 'footer_menu'))->row_array();		  
		return $query;
	}
	
	
function insert_configuration($con_data, $email_data, $counter_data,$redress_data){
	
			 $res1 = $this->db->update('configuration', $con_data, array('name' => 'contact_no'));
			  $res2 = $this->db->update('configuration', $email_data, array('name' => 'email_id'));
			  $res3 = $this->db->update('configuration', $counter_data, array('name' => 'counter_data'));
			  $res4 = $this->db->update('configuration', $redress_data, array('name' => 'redress_data'));
			return 1;
		 }
	 

function get_configuration(){
		$query  = $this->db->get_where('configuration',array('name' => 'contact_no'))->row_array();	
		$query2  = $this->db->get_where('configuration',array('name' => 'email_id'))->row_array();	
		$query3  = $this->db->get_where('configuration',array('name' => 'griev_counter'))->row_array();	
		$query4  = $this->db->get_where('configuration',array('name' => 'griev_resolved'))->row_array();		  

			$data['contact_no'] = $query['value'];
			$data['email_id'] = $query2['value'];
			$data['griev_counter'] = $query3['value'];
			$data['griev_resolved'] = $query4['value'];	

		return $data;
	}
	
	
function insert_niyamabali($data){
		
	
		
		$res = $this->db->update('configuration', $data, array('name' => 'niyamabali'));
				return $res;
		 }
	 

function get_niyamabali(){
		$query  = $this->db->get_where('configuration',array('name' => 'niyamabali'))->row_array();		  
		return $query;
			
}

function get_newcomplain(){
		$query  = $this->db->get_where('online_complain',array('view_status' => '0'))->result_array();		  
		return count($query);
		
			
}

function get_grievance(){
		$query  = $this->db->get_where('grievance',array('view_status' => '0'))->result_array();		  
		return count($query);
}


function get_allnewcomplain(){
		$query  = $this->db->get('online_complain')->result_array();		  
		return count($query);
		
			
}

function get_allgrievance(){
		$query  = $this->db->get('grievance')->result_array();		  
		return count($query);
}
function get_allredress(){
		$query  = $this->db->get('grievance_status')->result_array();		  
		return count($query);
}

function insert_impcontacts($data){
		
	
		
		$res = $this->db->update('configuration', $data, array('name' => 'imp_contacts'));
				return $res;
		 }
	 

function get_impcontacts(){
		$query  = $this->db->get_where('configuration',array('name' => 'imp_contacts'))->row_array();			
		return $query;
			
}




function  pages(){
		$query = $this->db->get('pages');
		return $query;
	 
	 }
	
	
	public function create_page($page_name, $description = '')
	{
	
			$data = array('name'=>$page_name,'description'=>$description);
			$this->db->insert('pages', $data);
			$page_id = $this->db->insert_id();
			
			$data['url'] = "user/page/".$page_id;
			$res2 = $this->db->update('pages', $data, array('id' => $page_id));
			
		$this->set_message('Page Created!');
		// return the brand new group id
		return $page_id;
	}
	


	function update_page($id,$page_name, $description){
		$data = array('name'=>$page_name,'description'=>$description);
		$res = $this->db->update('pages', $data, array('id' => $id));
		return $res;

	}
		public function page($id){
			$query  = $this->db->get_where('pages',array('id =' => $id))->row();		  
			return $query;
	
		}

	public function delete_page($id){
			$delete  = $this->db->delete('pages', array('id' => $id)); 
	}
}