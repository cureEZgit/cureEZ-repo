<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @name          Query for event ,service and testimonial
* @author        Milan Krushna and Subhashree Jena
* @revised       null
* @Description   all the insert,retrive, delete and update operation in events and testimonial table
* @copyright     Copyright (C) 2017 powered by Wayindia
*/


class customer_model extends CI_Model
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
	

	
	
	public function get_new_customer(){
		
        $this->db->select('*');
        $this->db->from('customer');
         $this->db->where('approve_status','0');
        $this->db->order_by('id','desc');
        return $this->db->get()->result_array();

	}
	function get_userlist()
	{
	    $this->db->select('*');
        $this->db->from('tejash_user');
        $this->db->order_by('id','desc');
        return $this->db->get()->result_array();
	}
	function get_booking_list()
	{
	    $this->db->select('tejash_refund.*,carwash_booking.final_price,transaction.transaction_id,carwash.name as cname,tejash_user.name as uname');
        $this->db->from('tejash_refund');
        $this->db->join('carwash_booking','carwash_booking.id=tejash_refund.booking_id');
          $this->db->join('carwash','carwash.id=carwash_booking.carwash_id');
        $this->db->join('transaction','transaction.booking_id=tejash_refund.booking_id');
         $this->db->join('tejash_user',' tejash_user.id=carwash_booking.user_id');
        $this->db->order_by('tejash_refund.id','desc');
        return $this->db->get()->result_array();
	}
		public function get_approved_customer(){
		
        $this->db->select('*');
        $this->db->from('customer');
         $this->db->where('approve_status','1');
        $this->db->order_by('id','desc');
        return $this->db->get()->result_array();

	}
		public function get_reject_customer(){
		
        $this->db->select('*');
        $this->db->from('customer');
         $this->db->where('approve_status','2');
        $this->db->order_by('id','desc');
        return $this->db->get()->result_array();

	}
	function edit_new_customer($id)
	{
	    $this->db->select('*');
        $this->db->from('customer');
         $this->db->where('id',$id);
        $this->db->order_by('id','desc');
        return $this->db->get()->row_array();
	}
  

	
    
}