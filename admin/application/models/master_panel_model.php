<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @name          Query for event ,service and testimonial
* @author        Milan Krushna and Subhashree Jena
* @revised       null
* @Description   all the insert,retrive, delete and update operation in events and testimonial table
* @copyright     Copyright (C) 2017 powered by Wayindia
*/


class master_panel_model extends CI_Model
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
	function get_amenity()
	{
	    $this->db->select('*');
        $this->db->from('amenity');
        $this->db->order_by('id','desc');
        return $this->db->get()->result_array();
	}
		function get_discount()
	{
	    $this->db->select('*');
        $this->db->from('discount');
        $this->db->order_by('id','desc');
        return $this->db->get()->result_array();
	}
			function get_tax()
	{
	    $this->db->select('*');
        $this->db->from('tax');
        $this->db->order_by('id','desc');
        return $this->db->get()->result_array();
	}
	
	function get_internet_charge()
	{
	    $this->db->select('*');
        $this->db->from('internet_charge');
        $this->db->order_by('id','desc');
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
	
	function update_washtype($data,$id){

		$res = $this->db->update('wash_type', $data, array('id' => $id));
		return $res;
	}
	function update_discount($data,$id)
	{
	    	$res = $this->db->update('discount', $data, array('id' => $id));
		return $res;
	}
		function update_tax($data,$id)
	{
	    	$res = $this->db->update('tax', $data, array('id' => $id));
		return $res;
	}
	
		function update_internet_charge($data,$id)
	{
	    	$res = $this->db->update('internet_charge', $data, array('id' => $id));
		return $res;
	}
	function update_washposition($data,$id)
	{
	    	$res = $this->db->update('wash_position', $data, array('id' => $id));
		return $res;
	}
	
function update_amenity($data,$id)

{
    	$res = $this->db->update('amenity', $data, array('id' => $id));
		return $res;
}
	
	public function edit_admission($id = NULL)
	{
		$query  = $this->db->get_where('admission',array('id =' => $id))->row();		  
		return $query;		
	}
	
		
	public function delete_washtype($id){
				$delete  = $this->db->delete('wash_type', array('id' => $id)); 
				return $delete;
	}
		public function delete_wash_position($id){
				$delete  = $this->db->delete('wash_position', array('id' => $id)); 
				return $delete;
	}
	function delete_amenity($id)
	{
	    	$delete  = $this->db->delete('amenity', array('id' => $id)); 
				return $delete;
	}
	
    
}