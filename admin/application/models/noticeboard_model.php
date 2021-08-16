<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @name          Query for event ,service and testimonial
* @author        Milan Krushna and Subhashree Jena
* @revised       null
* @Description   all the insert,retrive, delete and update operation in events and testimonial table
* @copyright     Copyright (C) 2017 powered by Wayindia
*/


class Noticeboard_model extends CI_Model
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
	

	
	
	public function get_notice(){
		
        $this->db->select('*');
        $this->db->from('noticeboard');
        $this->db->order_by('id','desc');
        return $this->db->get()->result_array();

	}
  

	
	public function create_notice($data)
	{
			return $this->db->insert('noticeboard', $data);
			
	}
	
	function update_notice($data,$id){

		$res = $this->db->update('noticeboard', $data, array('id' => $id));
		return $res;
	}
	

	
	public function edit_notice($id = NULL)
	{
		$query  = $this->db->get_where('noticeboard',array('id =' => $id))->row();		  
		return $query;		
	}
	
		
	public function delete_notice($id){
				$delete  = $this->db->delete('noticeboard', array('id' => $id)); 
				return $delete;
	}
	
	
    
}