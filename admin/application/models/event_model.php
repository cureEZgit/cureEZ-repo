<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @name          Query for event ,service and testimonial
* @author        Milan Krushna and Subhashree Jena
* @revised       null
* @Description   all the insert,retrive, delete and update operation in events and testimonial table
* @copyright     Copyright (C) 2017 powered by Wayindia
*/


class Event_model extends CI_Model
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
	
	
	public function get_events($ctgy){
		
        //$ignore = array('testimonial', 'service');
        
        //$this->db->where_not_in('category', $ignore);
        $this->db->where($ctgy);
		$this->db->ORDER_BY('order_short','asc');
		$query = $this->db->get('events');
		return $query;
	}

    
	public function get_ser_events(){
		
        $this->db->where('category', 'service');
		$this->db->ORDER_BY('order_short','asc');
		$query = $this->db->get('events');
		return $query;
	}
    
    
    public function get_room_event(){
		
        $this->db->where('category', 'rooms');
		$this->db->ORDER_BY('order_short','asc');
		$query = $this->db->get('events');
		return $query;
	}
	
	public function income_testimonials(){
       
        $this->db->where('status',0);
        $this->db->where_in('category','testimonial');
        $this->db->ORDER_BY('order_short','asc');
        $test = $this->db->get('events')->result_array();
          return $test;
  
      }
   	
	
	public function approve_testimonials(){
       
        $this->db->where('status',1);
         $this->db->where_in('category','testimonial');
        $this->db->ORDER_BY('DATE','desc');
        $test = $this->db->get('events')->result_array();
           return $test;
  
}


	
	public function create_event($data)
	{
			$this->db->insert('events', $data);
			$event_id = $this->db->insert_id();
			$this->set_message('Events Created!');
			return $event_id;
	}
	
	function update_event($data,$id){

		$res = $this->db->update('events', $data, array('id' => $id));
		return $res;
	}
	
	public function edit_event($id = NULL)
	{
		$query  = $this->db->get_where('events',array('id =' => $id))->row();		  
		return $query;		
	}
	

	 		
	public function delete_event($id){
				$delete  = $this->db->delete('events', array('id' => $id)); 
				return $delete;
	}


//event and activity section
	public function create_event_activity($data)
	{
			return $this->db->insert('events_activities', $data);
		
	}
	public function edit_event_activity($id = NULL)
	{
		$query  = $this->db->get_where('events_activities',array('id =' => $id))->row();		  
		return $query;		
	}
	function update_event_activity($data,$id){

		$res = $this->db->update('events_activities', $data, array('id' => $id));
		return $res;
	}

	public function delete_event_activity($id){
				$delete  = $this->db->delete('events_activities', array('id' => $id)); 
				return $delete;
	}
	public function get_all_event_activity(){
		
        $this->db->order_by('id','desc');
		return $query = $this->db->get('events_activities')->result_array();
		

					}




		public function edit_testimonial($id = NULL){
		
		$query = $this->db->get_where('testimonial',array('id' => $id))->row();
		return $query;
	}
	
	function get_income_testimonial(){
    	$this->db->where('status','0');
    	$this->db->order_by('order_short','asc');
		$cond = $this->db->get('testimonial')->result_array();
		return $cond;
	}
		function update_testimonial($data,$id){

		$res = $this->db->update('testimonial', $data, array('id' => $id));
		return $res;
	}
	

  
    function get_approve_testimonial(){
    	$this->db->where('status','1');
    	$this->db->order_by('order_short','asc');
		$cond = $this->db->get('testimonial')->result_array();
		return $cond;
	}

 		
	public function delete_service($id){
			return	$this->db->delete('events', array('id' => $id)); 
				
	}

    public function delete_testimonial($id){
			return	$this->db->delete('testimonial', array('id' => $id)); 
				
	}

function edit_client($id){
  return  $this->db->get_where('client',array('id'=>$id))->row();
}

	
    function get_date_events($nwdate){
      
        return $this->db->get_where('events',array('date'=>$nwdate,'category'=>'events'))->result_array();
        
    }
    
    
}