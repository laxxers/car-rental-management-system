<?php

class Admin extends CI_Controller {
	public function index() {
		$this->load->view('admin_header');
		$this->load->view('view_admin_dashboard'); //Create a new view_admin file in views
		$this->load->view('admin_footer');
	}
	
	function error_pic($msg = NULL) {
		$data['msg'] = $msg;
		$this->load->view('admin_header');
		$this->load->view('view_add_vehicle', $data);
		$this->load->view('footer');
	}
	
	function user($sort_by = 'id', $sort_order = 'asc', $offset = 0) {
		
		$limit = 10;
		$data['fields'] = array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'gender' => 'Gender',
			'username' => 'Username',
			'email_address' => 'Email Address',
			'signupdate' => 'Signup Date',
			'accounttype' => 'Account Type',
			'verified' => 'Verified',
			'ic_no' => 'IC Number',
			'li_no' => 'License Number'
		);
		
		$this->load->model('model_admin');
		
		$results = $this->model_admin->selected($limit, $offset, $sort_by, $sort_order);
		
		$data['users'] = $results['rows'];
		$data['num_results'] = $results['num_rows'];
		
		// pagination
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = site_url("admin/user/$sort_by/$sort_order");
		$config['total_rows'] = $data['num_results'];
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;

		$this->load->view('admin_header');
		$this->load->view('view_admin_user', $data);
		$this->load->view('admin_footer');
	}
	
	function vehicle()
	{
		$this->load->model('model_admin');
		
		if($query = $this->model_admin->getALL())
		{
			$data['records'] = $query;
		}
		
		$this->load->view('admin_header');
		$this->load->view('view_admin_vehicle', $data);
		$this->load->view('admin_footer');
	}
	
	function delete()
	{
		$this->load->model('model_admin');
		$this->model_admin->delete_row();
		$this->index();
	}
	
	function add_vehicle() 
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('type', 'Type', 'trim|required|alpha');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|alpha');
		$this->form_validation->set_rules('transmission', 'Transmission', 'trim|required|alpha');
		$this->form_validation->set_rules('ac', 'AC', 'trim|required|numeric');
		$this->form_validation->set_rules('capacity', 'Capacity', 'trim|required|numeric');
		$this->form_validation->set_rules('luggage', 'Luggage', 'trim|required|numeric');
		$this->form_validation->set_rules('daily', 'Daily', 'trim|required|numeric');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['msg'] = NULL;
			$this->load->view('admin_header');
			$this->load->view('view_add_vehicle',$data);
			$this->load->view('admin_footer');
		}
		else
		{			
			$this->load->model('model_admin');
			
			$q = $this->db->query('SELECT id FROM vehicle');
			$id = $q->last_row()->id;
			$pathToUpload = './public/car/';
			$config['file_name'] = $id + 1 . '.jpg';
			$config['upload_path'] = $pathToUpload;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '5000';
			$config['overwrite'] = True;
			$this->load->library('upload', $config);
	
			if($this->model_admin->add_vehicle() && $this->upload->do_upload())
			{
				$data = array('upload_data' => $this->upload->data());
				$this->load->view('admin_header');
				$this->load->view('view_success');
				$this->load->view('admin_footer');
			}
			else
			{
				$this->error_pic($this->upload->display_errors());
			}			
		}
	}
}
