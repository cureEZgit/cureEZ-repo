<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @name          Query for event ,service and testimonial
* @author        Milan Krushna and Subhashree Jena
* @revised       null
* @Description   all the insert,retrive, delete and update operation in events and testimonial table
* @copyright     Copyright (C) 2017 powered by Wayindia
*/


class carwash_model extends CI_Model
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
	

	
	
	public function get_wash_type(){
		
        $this->db->select('*');
        $this->db->from('wash_type');
        $this->db->order_by('id','desc');
        return $this->db->get()->result_array();

	}
	function get_carwash_booklist()
	{
	     $this->db->select('carwash_booking.*,tejash_user.name as tname,tejash_user.mobile as tmobile,wash_position.name as pname,wash_type.name as typename');
        $this->db->from('carwash_booking');
        $this->db->join('tejash_user','tejash_user.id=carwash_booking.user_id');
        $this->db->join('wash_position','wash_position.id=carwash_booking.position_id');
        $this->db->join('wash_type','wash_type.id=carwash_booking.type_id');
        $this->db->order_by('carwash_booking.id','desc');
        return $this->db->get()->result_array();
	}
	function get_bikewash_booklist()
	{
	    $this->db->select('bikewash_booking.*,tejash_user.name as tname,tejash_user.mobile as tmobile');
        $this->db->from('bikewash_booking');
        $this->db->join('tejash_user','tejash_user.id=bikewash_booking.user_id');
      
        $this->db->order_by('bikewash_booking.id','desc');
        return $this->db->get()->result_array();
	}
	function get_all_carwash()
	{
	    $this->db->select('*');
        $this->db->from('carwash');
        $this->db->order_by('id','desc');
        return $this->db->get()->result_array();

	}
	public function get_aminity(){
		
        $this->db->select('*');
        $this->db->from('amenity');
        $this->db->order_by('id','desc');
        return $this->db->get()->result_array();

	}
		public function get_wash_positiondata($id){
        $this->db->select('*');
        $this->db->from('wash_position');
        $this->db->where('type_id',$id);
        $this->db->order_by('id','desc');
        return $this->db->get()->result_array();
	}
			public function get_wash_positiondata1($wash_id,$id){
		
        $this->db->select('carwash_price.*,wash_position.name as name,wash_position.id as pid');
        $this->db->from('carwash_price');
        $this->db->join('wash_position','wash_position.id=carwash_price.position_id');
        $this->db->where('carwash_price.carwash_id',$wash_id);
        $this->db->where('carwash_price.type_id',$id);
        $this->db->order_by('carwash_price.id','desc');
        return $this->db->get()->result_array();

	}
  function get_wash_position()
  {
        $this->db->select('wash_position.*,wash_type.name wname');
        $this->db->from('wash_position');
        $this->db->join('wash_type','wash_type.id=wash_position.type_id');
        $this->db->order_by('wash_position.id','desc');
        return $this->db->get()->result_array();
  }

	
	public function create_admission($data)
	{
			return $this->db->insert('admission', $data);
			
	}
	function create_carwash($data)
	{
	    	 $this->db->insert('carwash', $data);
	    	 return $this->db->insert_id();
	}
	
	function update_washtype($data,$id){

		$res = $this->db->update('wash_type', $data, array('id' => $id));
		return $res;
	}
	function update_washposition($data,$id)
	{
	    	$res = $this->db->update('wash_position', $data, array('id' => $id));
		return $res;
	}
		function update_carwash($data,$id)
	{
	    	$res = $this->db->update('carwash', $data, array('id' => $id));
		return $res;
	}

	
	public function edit_admission($id = NULL)
	{
		$query  = $this->db->get_where('admission',array('id =' => $id))->row();		  
		return $query;		
	}
		public function edit_carwash($id = NULL)
	{
		$query  = $this->db->get_where('carwash',array('id =' => $id))->row_array();		  
		return $query;		
	}
	public function delete_washtype($id){
				$delete  = $this->db->delete('wash_type', array('id' => $id)); 
				return $delete;
	}
	function delete_carwash($id)
	{
	    $this->db->delete('carwash', array('id' => $id)); 
	   $delete =   $this->db->delete('carwash_price', array('carwash_id' => $id));
				return $delete;
	}
		public function delete_wash_position($id){
				$delete  = $this->db->delete('wash_position', array('id' => $id)); 
				return $delete;
	}
	
	
    
}