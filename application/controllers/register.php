<?php

class Register extends CI_Controller {
	public function index()
	{
		//$data['main_content'] = 'register';
		$this->load->view('header');
		$this->load->view('view_register');
		$this->load->view('footer');
	}

	function create_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]|strong_pass[3]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('header');
			$this->load->view('view_register');	
			$this->load->view('footer');	
		}
		else
		{			
			$this->load->model('model_user');
			
			if($query = $this->model_user->create_user())
			{
				//Implement later: Auto logged in after sign up!
				$this->load->view('header');
				echo "<h1>&nbsp &nbsp &nbsp &nbsp &nbsp Sign Up Successfully</h1>";
				$this->load->view('footer');
			}
			else
			{
				$this->load->view('header');
				$this->load->view('view_register');	
				$this->load->view('footer');		
			}
		}
		
	}
}