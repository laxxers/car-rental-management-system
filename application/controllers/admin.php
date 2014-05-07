<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	// function _remap($method)
	// {
		// $session = $this->session->userdata("loggedIn");
		// $user_id = $this->session->userdata("user_id");
		// $sql = mysql_query("SELECT accounttype FROM users WHERE user_id='$user_id'");
		// $row = mysql_fetch_array($sql);
		// $accounttype = $row["accounttype"];
		
		// if($session && $accounttype == 'admin')
		// {
			// switch( $method )
			// {
				// case 'index':
					// $this->index();
					// break;
				// case 'error_pic':
					// $this->error_pic();
					// break;
				// case 'error_pic_edit':
					// $this->error_pic_edit();
					// break;
				// case 'user':	
					// $this->user();
					// break;
				// case 'getAll_vehicle':	
					// $this->getAll_vehicle();
					// break;
				// case 'add_vehicle':	
					// $this->add_vehicle();
					// break;
				// case 'update_vehicle':	
					// $this->update_vehicle();
					// break;
				// case 'delete_vehicle':	
					// $this->delete_vehicle();	
					// break;
				// default:
					// echo "Error";
					// break;
			// }
		// }
		// else if ($session && $accounttype == 'user')
		// {
			// echo 'No direct access allowed (Do not acces in this way)';
		// }
		
	// }
	
	public function _remap($method, $params = array())
	{
		$session = $this->session->userdata("loggedIn");
		$user_id = $this->session->userdata("user_id");
		$sql = mysql_query("SELECT accounttype FROM users WHERE user_id='$user_id'");
		$row = mysql_fetch_array($sql);
		$accounttype = $row["accounttype"];
		
		if($session && $accounttype == 'admin')
		{
			if ($method == 'index')
			{
				$this->$method();
			}
			else if ($method == 'error_pic')
			{
				$this->$method();
			}
			else if ($method == 'error_pic_edit')
			{
				$this->$method();
			}
			
			else if ($method == 'getAll_vehicle')
			{
				$this->$method();
			}
			else if ($method == 'add_vehicle')
			{
				$this->$method();
			}
			else if ($method == 'update_vehicle')
			{
				$this->$method();
			}
			else if ($method == 'delete_vehicle')
			{
				$this->$method();
			}
			else if ($method == 'package')
			{
				$this->$method();
			}
			else if ($method == 'schedule')
			{
				$this->$method();
			}
			else if (method_exists($this, 'schedule'))
			{
				call_user_func_array(array($this, 'user'), $params);
			}
			else
			{
				show_404();
			}
		}
		else if ($session && $accounttype == 'user')
		{
			echo 'No direct access allowed (Do not acces in this way)';
		}
		
	}
	
	public function index() {
		$this->load->view('admin_header');
		$this->load->view('view_admin_dashboard');
		$this->load->view('admin_footer');
	}
	
	function error_pic($msg = NULL) {
		$data['msg'] = $msg;
		$this->load->view('admin_header');
		$this->load->view('view_admin_add_vehicle', $data);
		$this->load->view('footer');
	}
	
	function error_pic_edit($msg = NULL) {
		$data['msg'] = $msg;
		$this->load->view('admin_header');
		$this->load->view('view_admin_update_vehicle', $data);
		$this->load->view('footer');
	}	
	
	function user($sort_by = 'user_id', $sort_order = 'asc', $offset = 0) {
		
		$limit = 10;
		$data['fields'] = array(
			'user_id' => 'ID',
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
	
	function getAll_vehicle()
	{
		$this->load->model('model_admin');
		
		if($query = $this->model_admin->getALL())
		{
			$data['records'] = $query;
		}
		
		if($count = $this->model_admin->count_vehicle())
		{
			$data['vehicle_no'] = $count['num_rows'];
		}
		
		$this->load->view('admin_header');
		$this->load->view('view_admin_vehicle', $data);
		$this->load->view('admin_footer');
	}
	
	function add_vehicle() 
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('type', 'Type', 'trim|required|alpha');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|name_space');
		$this->form_validation->set_rules('transmission', 'Transmission', 'trim|required|alpha');
		$this->form_validation->set_rules('ac', 'AC', 'trim|required|numeric');
		$this->form_validation->set_rules('capacity', 'Capacity', 'trim|required|numeric');
		$this->form_validation->set_rules('luggage', 'Luggage', 'trim|required|numeric');
		$this->form_validation->set_rules('daily', 'Daily', 'trim|required|numeric');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['msg'] = NULL;
			$this->load->view('admin_header');
			$this->load->view('view_admin_add_vehicle',$data);
			$this->load->view('admin_footer');
		}
		else
		{			
			$this->load->model('model_admin');			
			$next = $this->db->query("SHOW TABLE STATUS LIKE 'vehicle'");
			$next = $next->row(0);
			$user_id = $next->Auto_increment;
			$pathToUpload = './public/car/';
			$config['file_name'] = $user_id . '.jpg';
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
	
	function update_vehicle()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('type', 'Type', 'trim|required|alpha');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|name_space');
		$this->form_validation->set_rules('transmission', 'Transmission', 'trim|required|alpha');
		$this->form_validation->set_rules('ac', 'AC', 'trim|required|numeric');
		$this->form_validation->set_rules('capacity', 'Capacity', 'trim|required|numeric');
		$this->form_validation->set_rules('luggage', 'Luggage', 'trim|required|numeric');
		$this->form_validation->set_rules('daily', 'Daily', 'trim|required|numeric');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['msg'] = NULL;
			$this->load->view('admin_header');
			$this->load->view('view_admin_update_vehicle',$data);
			$this->load->view('admin_footer');
		}
		else
		{			
			$this->load->model('model_admin');			
			// $next = $this->db->query("SHOW TABLE STATUS LIKE 'vehicle'");
			// $next = $next->row(0);
			// $id = $next->Auto_increment;
			
			// $q = $this->db->query('SELECT id FROM vehicle');
			// $id = $q->last_row()->id;
			
			$user_id = $this->uri->segment(3);
			
			$pathToUpload = './public/car/';
			$config['file_name'] = $user_id . '.jpg';
			$config['upload_path'] = $pathToUpload;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '5000';
			$config['overwrite'] = True;
			$this->load->library('upload', $config);
			
			if( $this->upload->do_upload() && $this->model_admin->update_vehicle() )
			{
				$data = array('upload_data' => $this->upload->data());
				redirect('admin/getAll_vehicle');
			}
			else if($this->model_admin->update_vehicle())
			{
				redirect('admin/getAll_vehicle');
			}
			else if($this->upload->do_upload())
			{
				$data = array('upload_data' => $this->upload->data());
				redirect('admin/getAll_vehicle');
			}
			else
			{
				$this->error_pic_edit($this->upload->display_errors());
			}			
		}
	}
	
	function delete_vehicle()
	{
		$this->load->model('model_admin');
		$this->model_admin->delete_vehicle();
		$this->index();
	}
	
	function package()
	{
		$this->load->view('admin_header');
		$this->load->view('view_package');
		$this->load->view('admin_footer');
	}
	
	function schedule()
	{
		$this->load->view('admin_header');
		$this->load->view('view_schedule');
		$this->load->view('admin_footer');
	}
	
}
