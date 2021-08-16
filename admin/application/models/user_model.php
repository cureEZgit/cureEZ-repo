<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User_model extends CI_Model
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
		$this->load->helper('url');
	
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
	
	
	 
	public function slider($type)
	{
		
		$this->db->select('*');
		$this->db->from('slider');
        $this->db->where('type',$type);
        $this->db->where('status',1);
		$query = $this->db->get();
		$slider =  $query->result_array();
		return $slider;
	
	}
	
	public function common()
	{
		
		$this->db->select('*');
		$this->db->from('common');		 
		$query = $this->db->get();
		$slider =  $query->result_array();
		return $slider;
	
	}
	
    
	
	public function get_page($name){
		$query  = $this->db->get_where('pages',array('url' => $name))->row_array();		  
		//echo $this->db->last_query();exit;
		return $query;
	}
	
	
	public function order_section($id = NULL)
	{
		$query  = $this->db->get_where('section',array('id =' => $id))->row_array();		  
		return $query;		
	}
	
	public function get_footer(){
		$query  = $this->db->get_where('section',array('name' => 'footer'))->row_array();		  
		return $query;
	}


	public function social(){
		
		$query = $this->db->get('social')->result_array();
		return $query;
	}
	
	public function products(){
		$query  = $this->db->get_where('section',array('name' => 'products'))->row_array();		  
		return $query;
	}


	public function  menu(){
	
			$all_menu =  array();
		
		/*	$parent  = $this->db->get_where('menu',array('parent_menu' => 0))->result_array();*/		 
			
			$this->db->from('menu');
			$this->db->where('parent_menu =', 0);
			$this->db->order_by("sort", "asc");
			$parent = $this->db->get()->result_array(); 
			
			 
			foreach($parent as $pr){
				//$child  = $this->db->get_where('menu',array('parent_menu' => $pr['id']))->result_array();
				
			$this->db->from('menu');
			$this->db->where('parent_menu =', $pr['id']);
			$this->db->order_by("sort", "asc");
			$child = $this->db->get()->result_array(); 
				
				
						  
				if(count($child)!=0 ){
					$pr['child'] =  $child;
					$all_ch = array();
				foreach($child as $ch){
					
			$this->db->from('menu');
			$this->db->where('parent_menu =', $ch['id']);
			$this->db->order_by("sort", "asc");
			$fst_child = $this->db->get()->result_array();
									
					//$fst_child  = $this->db->get_where('menu',array('parent_menu' => $ch['id']))->result_array();
				$all_fst = array();
				foreach($fst_child as $fc){
			
			$this->db->from('menu');
			$this->db->where('parent_menu =', $fc['id']);
			$this->db->order_by("sort", "asc");
			$sec_child = $this->db->get()->result_array();
					
				//	$sec_child  = $this->db->get_where('menu',array('parent_menu' => $fc['id']))->result_array();
					$fc['sec_child'] = $sec_child;
					$all_fst[] = $fc;
				}
					
					$ch['fst_child'] = $all_fst;
					$all_ch[] = $ch;
				
				
				}
	
				$pr['child'] = $all_ch;
				}else{
					$pr['child'] = 0;
				
					
				}				
			 $all_menu[]  =  $pr;
			
			
			}
		
			/*print("<pre>");
			print_r($all_menu);
			exit;*/
			
			return $all_menu;	
	
	}	
	
	
	
	public function gallery(){
		
		$query = $this->db->get('album')->result_array();
		return $query;
	}
	
	public function album_image($id){
		
		$query  = $this->db->get_where('gallery_images',array('id =' => $id))->result_array();			return $query;	
		
	}


 function get_inn_image($id){
		$query  = $this->db->get_where('inner_images',array('image_id =' => $id))->row_array();			
		return $query;	

}

function get_other_image($image_id, $id){


		
		$this->db->select('*');
		$this->db->from('inner_images');		 
		$this->db->Where('id !=',$id);
		$this->db->Where('image_id',$image_id);
		$this->db->limit(6);		 
		$query = $this->db->get();
		$slider =  $query->result_array();
		return $slider;
		

} 
	
	
	public function gallery_images($id = NULL)
	{
		//echo $id;exit;
		$query  = $this->db->get_where('gallery_images',array('gallery_id =' => $id))->result_array();			return $query;		
	}


	public function get_page_image($page_id){
			


		$this->db->select('*');
		$this->db->from('page_images');		 
		$this->db->where('page_id =', $page_id);
		//$this->db->limit(15);
		$query = $this->db->get();
		return $query->result_array();						
	}



public function get_pg_image($id){


			$this->db->select('page_images.*, pages.name as page_name, menu.link as menu_link');
			$this->db->from('page_images');
			$this->db->join('pages', 'page_images.page_id = pages.id');
			$this->db->join('menu', 'page_images.page_id = menu.page_id');
			$this->db->where('page_images.id ='.$id);
			$query = $this->db->get();
			return $query->row_array();
}	
	


	public function get_inner_image($page_id){
			




		$this->db->select('*');
		$this->db->from('inner_images');		 
		$this->db->where('image_id =', $page_id);
		$this->db->limit(15);
		$query = $this->db->get();
		return $query->result_array();						
	}	
	
	
	
	
	
	public function bottom_slider(){
		$query = $this->db->get('product')->result_array();
		return $query;	
	}
	

	public function get_events(){
		$query = $this->db->get('events');
		return $query->result_array();
	}
	
    
    function getEventsByCtgy($ctgy){
        $this->db->limit(10);
        $this->db->where('category',$ctgy);
        $this->db->order_by('id','DESC');
       return $this->db->get('events')->result();
    }
    
    function getEventsRow($url){
        
        $this->db->where('alias',$url);
       return $this->db->get('events')->row();
    }

    
    function getCommonRow($link){
        
        $this->db->where('url',$link);
        return $this->db->get('common')->row();
    }
    
    function get_album($id){
        
        if($id<=1 && $id==""){
				$ids=0;
			}else{
			$ids = $id-1;
			}
        
        $this->db->limit(15,$ids*15);
        $this->db->order_by('id','DESC');
        return $this->db->get('album')->result();
        
    }
    
    
    function get_images($album){
     
        $this->db->select('gallery_images.*');
        $this->db->from('gallery_images');
        $this->db->join('album','album.id = gallery_images.album_id');
        $this->db->where('album.alias',$album);
        return  $this->db->get()->result();
      
    }
    
    function get_video($id){
        
        if($id<=1 && $id==""){
				$ids=0;
			}else{
			$ids = $id-1;
			}
        
        $this->db->limit(9,$ids*9);
        $this->db->order_by('id','DESC');
        return $this->db->get('video_gallery')->result();
        
    }
    
    
    function get_event($type){
        
        $this->db->limit(5);
        $this->db->where('category',$type);
        $this->db->order_by('id','DESC');
        return $this->db->get('events')->result();
    }
    
    function all_event($id,$type){
        
            if($id<=1 && $id==""){
			$ids=0;
			}else{
			$ids = $id-1;
			}
        
                $this->db->limit(15,$ids*15);
                $this->db->order_by('id','DESC');
        return  $this->db->get_where('events',array('category'=>$type))->result();
        
    }
    
    function getBlogPost($alias = ""){
        
         return  $this->db->get_where('events',array('alias'=>$alias))->row();
        
    }
    
    ///
    function get_xtra_book($type = ""){
        
        
//         if($id<=1 && $id==""){
//			$ids=0;
//			}else{
//			$ids = $id-1;
//			}
//        
//        
        /// $this->db->limit(12,$ids*12);
        $this->db->order_by('id','DESC');
        $this->db->where('type',$type);
        return $this->db->get('gallery')->result();
        
    }
    
    
    function getGalleryByType($type = ""){
        $this->db->limit(10);
        $this->db->order_by('id','DESC');
        $this->db->where('type',$type);
        return $this->db->get('gallery')->result();
    }
    
}


