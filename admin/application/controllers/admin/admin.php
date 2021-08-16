<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');

		$this->load->model('admin_model');
				
		// Load MongoDB library instead of native db driver if required
		$this->config->item('ion_auth') ?
		$this->load->library('mongo_db') :
		$this->load->database();

		$this->lang->load('auth');
		$this->load->helper('language');
	}

	//redirect if needed, otherwise display the user list
	function index()
	{
		redirect('admin/dashboard', 'refresh');
	}





// create a new group
	function create_category()
	{

	
	//	echo "i am here";exit;
		$this->data['title'] = "Create Category";

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('admin/auth', 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('category_name', "Category Name", 'required|xss_clean|is_unique[category.name]');
		$this->form_validation->set_rules('description', "Description", 'xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			$new_category_id =  $this->admin_model->create_category($this->input->post('category_name'),$this->input->post('odia_name'), $this->input->post('description'));
			//echo $new_category_id;exit;
			if($new_category_id)
			{
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("admin/admin/view_category");
			}
		}
		else
		{
			//display the create group form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['category_name'] = array(
				'name'  => 'category_name',
				'id'    => 'category_name',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('category_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('description'),
			);
			
		$this->load->view("common/header",$this->header);
		$this->load->view("common/menu");
		$this->load->view("admin/create_category",$this->data);
//		$this->load->view("common/right_sidde");
		$this->load->view("common/footer");	


		}
	}

	//edit a group
	function edit_category($id)
	{

	
		// bail if no group id given
		if(!$id || empty($id))
		{
			redirect('admin/auth', 'refresh');
		}

		$this->data['title'] = 'Edit Category';

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('admin/auth', 'refresh');
		}

		$category = $this->admin_model->category($id);
		
		//validate form input
		$this->form_validation->set_rules('category_name', 'Category Name', 'required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'xss_clean');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$category_update = $this->admin_model->update_category($id, $_POST['category_name'],$_POST['odia_name'], $_POST['description']);

				if($category_update)
				{
					$this->session->set_flashdata('message', "Category Updated!");
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("admin/admin/view_category");
			}
		}

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['category'] = $category;

		$this->data['category_name'] = array(
			'name'  => 'category_name',
			'id'    => 'category_name',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('category_name', $category->name),
		);
		$this->data['description'] = array(
			'name'  => 'description',
			'id'    => 'description',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('description', $category->description),
		);

			$this->load->view("common/header",$this->header);
			$this->load->view("common/menu");
			$this->load->view("admin/edit_category",$this->data);
			$this->load->view("common/footer");	
	}


function view_category($msg=NULL){
		$this->data['online_counter'] = $this->admin_model->get_newcomplain();
	$this->data['grievance_counter'] = $this->admin_model->get_grievance();
	
			if($msg == '1'){
				$this->data['msg'] = "<p style='color:red'>Category Deleted Successfully!</p>";
			}else if($msg == '2'){
					$this->data['msg'] = "<p style='color:red'>Unable To Delete The Category!<br>It is Being used by the Grievance </p>";
			}else if($msg == '3'){
					$this->data['msg'] = "<p style='color:red'>You Dont have Access to delete!</p>";
			}else{
				$this->data['msg'] = "<p style='color:green'>Listing of Categories!</p>";
			}
		
			$this->data['categories'] = $this->admin_model->categories()->result();
			$this->load->view("common/header",$this->header);
			$this->load->view("common/menu");
			$this->load->view("admin/view_category",$this->data);
			$this->load->view("common/footer");	

}


// create a new group
	function create_district()
	{
	//	echo "i am here";exit;
		$this->data['title'] = "Create District";

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('admin/auth', 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('district_name', "District Name", 'required|xss_clean|is_unique[district.name]');
		$this->form_validation->set_rules('district_name', "District Name", 'required|xss_clean|is_unique[district.odia_name]');
		$this->form_validation->set_rules('description', "Description", 'xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			$new_district_id =  $this->admin_model->create_district($this->input->post('district_name'), $this->input->post('odia_name'), $this->input->post('description'));
			//echo $new_category_id;exit;
			if($new_district_id)
			{
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("admin/admin/view_district");
			}
		}
		else
		{
			//display the create group form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['district_name'] = array(
				'name'  => 'district_name',
				'id'    => 'district_name',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('district_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('description'),
			);
			
		$this->load->view("common/header",$this->header);
		$this->load->view("common/menu");
		$this->load->view("admin/create_district",$this->data);
//		$this->load->view("common/right_sidde");
		$this->load->view("common/footer");	


		}
	}

	//edit a group
	function edit_district($id)
	{

	
		// bail if no group id given
		if(!$id || empty($id))
		{
			redirect('auth', 'refresh');
		}

		$this->data['title'] = 'Edit District';

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$district = $this->admin_model->district($id);
		
		//validate form input
		$this->form_validation->set_rules('district_name', 'District Name', 'required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'xss_clean');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$district_update = $this->admin_model->update_district($id, $_POST['district_name'],$_POST['odia_name'], $_POST['description']);

				if($district_update)
				{
					$this->session->set_flashdata('message', "District Updated!");
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("admin/admin/view_district");
			}
		}

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['district'] = $district;

		$this->data['district_name'] = array(
			'name'  => 'district_name',
			'id'    => 'district_name',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('district_name', $district->name),
		);
		$this->data['description'] = array(
			'name'  => 'description',
			'id'    => 'description',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('description', $district->description),
		);

			$this->load->view("common/header",$this->header);
			$this->load->view("common/menu");
			$this->load->view("admin/edit_district",$this->data);
			$this->load->view("common/footer");	
	}


function view_district($msg=NULL){
	
			if($msg == '1'){
				$this->data['msg'] = "<p style='color:red'>District Deleted Successfully!</p>";
			}else if($msg == '2'){
					$this->data['msg'] = "<p style='color:red'>Unable To Delete The District!<br>It is Being used by the Grievance </p>";
			}else if($msg == '3'){
					$this->data['msg'] = "<p style='color:red'>You Dont have Access to delete!</p>";
			}else{
				$this->data['msg'] = "<p style='color:green'>Listing of Districts!</p>";
			}
		
			$this->data['districts'] = $this->admin_model->districts()->result();
			$this->load->view("common/header",$this->header);
			$this->load->view("common/menu");
			$this->load->view("admin/view_district",$this->data);
			$this->load->view("common/footer");	

}

function delete_category($id){
	
	if ($this->ion_auth->is_admin()){
		$category_delete = $this->admin_model->delete_category($id);
	}else{
		$category_delete =  3;
		}
	//echo $grievance_delete;exit;		
	redirect("admin/admin/view_category/$category_delete");
	

}

function delete_district($id){

if ($this->ion_auth->is_admin()){
		$district_delete = $this->admin_model->delete_district($id);
	}else{
		$district_delete =  3;
		}
	//echo $grievance_delete;exit;		
	redirect("admin/admin/view_district/$district_delete");


}

function manage_pages($msg=NULL){
		$this->data['online_counter'] = $this->admin_model->get_newcomplain();
	$this->data['grievance_counter'] = $this->admin_model->get_grievance();
	
			if($msg == '1'){
				$this->data['msg'] = "<p style='color:red'>page Deleted Successfully!</p>";
			}else if($msg == '2'){
					$this->data['msg'] = "<p style='color:red'>Unable To Delete The Page!<br>It is Being used by the Grievance </p>";
			}else if($msg == '3'){
					$this->data['msg'] = "<p style='color:red'>You Dont have Access to delete!</p>";
			}else{
				$this->data['msg'] = "<p style='color:green'>Listing of Pages!</p>";
			}
		
			$this->data['pages'] = $this->admin_model->pages()->result();
			$this->load->view("common/header",$this->header);
			$this->load->view("common/menu");
			$this->load->view("admin/view_pages",$this->data);
			$this->load->view("common/footer");	

}



function create_page()
	{

	
	//	echo "i am here";exit;
		$this->data['title'] = "Create page";

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('admin/auth', 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('page_name', "page Name", 'required|xss_clean|is_unique[category.name]');
		$this->form_validation->set_rules('description', "Description", 'xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			
			//echo $this->input->post('page_name');
			//echo $this->input->post('description');
		
			
			$new_category_id =  $this->admin_model->create_page($this->input->post('page_name'), $this->input->post('description'));
			//echo $new_category_id;exit;
			if($new_category_id)
			{
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("admin/admin/manage_pages");
			}
		}
		else
		{
			//display the create group form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['page_name'] = array(
				'name'  => 'page_name',
				'id'    => 'page_name',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('page_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('description'),
			);
			
		$this->load->view("common/header",$this->header);
		$this->load->view("common/menu");
		$this->load->view("pages/create_page",$this->data);
//		$this->load->view("common/right_sidde");
		$this->load->view("common/footer");	


		}
	}


function edit_page($id)
	{

	
		// bail if no group id given
		if(!$id || empty($id))
		{
			redirect('admin/auth', 'refresh');
		}

		$this->data['title'] = 'Edit Page';

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('admin/auth', 'refresh');
		}

		$page = $this->admin_model->page($id);
		
		//validate form input
		$this->form_validation->set_rules('page_name', 'Category Name', 'required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'xss_clean');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$category_update = $this->admin_model->update_page($id, $_POST['page_name'], $_POST['description']);


		
				if($category_update)
				{
					$this->session->set_flashdata('message', "page Updated!");
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("admin/admin/manage_pages");
			}
		}

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['page'] = $page;

		$this->data['page_name'] = array(
			'name'  => 'page_name',
			'id'    => 'page_name',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('category_name', $page->name),
		);
		$this->data['description'] = array(
			'name'  => 'description',
			'id'    => 'description',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('description', $page->description),
		);

			$this->load->view("common/header",$this->header);
			$this->load->view("common/menu");
			$this->load->view("pages/edit_page",$this->data);
			$this->load->view("common/footer");	
	}


function delete_page($id){

		$page_delete = $this->admin_model->delete_page($id);
		redirect("admin/admin/manage_pages");


}

}