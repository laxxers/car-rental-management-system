<?php

class Admin extends CI_Controller {
	public function index() {
		$this->load->view('admin_header');
		$this->load->view('view_admin_dashboard'); //Create a new view_admin file in views
		$this->load->view('admin_footer');
	}
	
	// function user_info10()
	// {
		// $this->table->set_heading('#', 'First Name', 'Last Name', 'Username','Email Address','Signup Date','Account Type','Verified','IC Number','License Number');
		
	// }
	
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
		$config['base_url'] = site_url("admin/user_info/$sort_by/$sort_order");
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

	function vehicle() {
		$this->load->view('admin_header');
		$this->load->view('view_admin_vehicle');
		$this->load->view('admin_footer');
	}
}
