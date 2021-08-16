<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Userdetails_model extends CI_Model



{
	
		function get_alluser($id){
		
					if($id<=1 && $id==""){
						$ids=0;
					}else{
					$ids = $id-1;
					}
					//$this->db->select('user_detail.*,approve.approved-by as approved_by,approve.type as type');
					//$this->db->from('user_detail');
					//$this->db->join('approve', 'user_detail.id = approve.approved-id');
					$this->db->limit(15,$ids*15);
					return  $this->db->get('user_detail')->result_array();
					
					}

		function get_user($id){
			return  $this->db->get_where('user_detail',array('id'=>$id))->row_array();
		}
// Question & Answer start here  

		function get_question($id){


					if($id<=1 && $id==""){
					$ids=0;
					}else{
					$ids = $id-1;
					}		

					$this->db->select('question.*,user_detail.first_name as first_name,user_detail.last_name as last_name');
					$this->db->from('question');
					$this->db->join('user_detail', 'question.user_id = user_detail.id');
					$this->db->limit(15,$ids*15);
					return $this->db->get()->result_array();
					
					}


					function get_answer($id){
					$this->db->select('answer.*,user_detail.first_name as first_name,user_detail.last_name as last_name');
					$this->db->from('answer');
					$this->db->join('user_detail', 'answer.user_id = user_detail.id');
					
					
					return $this->db->get()->result_array();
				
					}

					function get_question2($id){
						return $this->db->get_where('question',array('id'=>$id))->row_array();
					}
					function approve_question($id){
						return $this->db->update('question',array('status'=>1),array('id'=>$id));
					}
					function approve_answer($id){
						return $this->db->update('answer',array('status'=>1),array('id'=>$id));
					}
					function approve_user($id){
						$data = $this->session->userdata;
						$this->db->update('user_detail',array('user_status'=>1),array('id'=>$id));

						return $this->db->insert('approve',array('approved-id'=>$id,'approved-by'=>$data['user_id'],'type'=>'admin'));

					}

					function approve_data($id){

						 				$app = $this->db->get_where('approve',array('approved-id'=>$id))->row_array();
                                       
                                         switch ($app['type']) {
									    case "admin":
									        return $this->db->get_where('users',array('id'=>$app['approved-by']))->row_array();
									        break;
									    case "user":
									       return $this->db->get_where('user_detail',array('id'=>$app['approved-by']))->row_array();
									        break;
									    }
					}
	
}