<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Gallery_model extends CI_Model
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
	
	

    ///insert new image to image gallery
    function create_gallery($image){
        
//    echo "new insert";
//        print_r($image);
      
        return  $this->db->insert('gallery_images',$image); 
 
    }
    
    //Retrive an single album
    function get_album($id){
        
        $this->db->where($id);
        return $this->db->get('album')->row();
    }
    
    ///retrive all data of album Table
    
    function get_all_album(){
        
       $this->db->ORDER_BY('order_sort',"ASC");
      return $this->db->get('album')->result();
        
    }
    
    ///create a New Album
    
    function create_album($data){
        return $this->db->insert('album',$data);
    }
    
    ///Update a New Album
    
    function update_album($data,$cond){
        return $this->db->update('album',$data,$cond);
    }
    
    
    ///retrive all galery image for a single album
    function get_gallery($cond){
        
        $this->db->ORDER_BY('id',"ASC");
       return $this->db->get_where('gallery_images',$cond)->result();   
    }
    
    ///update image Gallery
    function update_gallery($gallery,$id){
   
        print("<pre>");
        print_r($gallery);
        
        echo $id;
        
              $this->db->where('id',$id);
       return $this->db->update('gallery_images',array('imgname'=>$gallery['imgname'],'album_id'=>$gallery['event_id']));
        
    }
    function update_gallery_cap($gallery,$id){
   
              $this->db->where('id',$id);
       return $this->db->update('gallery_images',$gallery);
        
    }
	
    //Insert video link to videogallery table
    function insert_video($galleryVideo){
        
        $this->db->insert_batch('video_gallery',$galleryVideo);
        
    }
    
    ///retrive all Video for a single event
    function get_video_gallery(){
        return $this->db->get_where('video_gallery')->result();
    } 
    ///retrive a Video for a single event
    function video_gallery($cond){
        return $this->db->get_where('video_gallery',$cond)->row();
    }
    
    //update video link to video gallery
    function update_video($galleryVideo,$id){
               $this->db->where('id',$id);
        return $this->db->update('video_gallery',$galleryVideo);
        
    }
    
    function getImage($type,$id){
        
        if($type == 'next'){
            $this->db->where('id >',$id);
            $this->db->order_by('id','ASC');
        }else if($type == 'prev'){
            $this->db->where('id <',$id);
            $this->db->order_by('id','desc');
        }
        $this->db->limit(1);
       return $this->db->get('gallery_images')->row_array();
        
    }
    
    function imageRow($id){
        return $this->db->get_where('gallery_images',array('id'=>$id))->row_array();
    }
    
    
    ///insert to gallery Table
    
    function create_audio($data){
        
     return $this->db->insert('gallery',$data);
        
    }
    //geting All Audio File
    function getXtraGallery($type){
        
      return  $this->db->get_where('gallery',array('type'=>$type))->result();
    }
    
    function audio_row($id = ""){
        return  $this->db->get_where('gallery',array('id'=>$id))->row();
    }
    
    function update_audio($data,$id){
     
        return $this->db->update('gallery',$data,array('id'=>$id));
        
    }
    
   
    
}
