<?php

class Home extends CI_Controller {
	public function index($msg = NULL) {
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('view_home', $data);
		$this->load->view('footer');
	}
	
		
	function signup()
	{
		$data['main_content'] = 'signup_form';
		$this->load->view('signup_form', $data);
	}
	
	function create_member()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha_dash');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha_dash');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]|strong_pass[3]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('signup_form');
		}
		else
		{			
			$this->load->model('model_user');
			
			if($query = $this->model_user->create_member())
			{
				echo "Signup Successfully";
				echo anchor('home/login', 'Login');
			}
			else
			{
				$this->load->view('signup_form');			
			}
		}
		
	}
	
	function profile()
	{
		$this->load->view('view_profile');
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}

