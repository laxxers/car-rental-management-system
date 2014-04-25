<?php

class Profile extends CI_Controller {
	function index()
	{
		$this->load->view('header');
		$this->load->view('view_profile');
		$this->load->view('footer');
	}
	
	function settings($msg = NULL) {
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('view_settings', $data);
		$this->load->view('footer');
	}

	function do_upload()
	{
		$id = $this->session->userdata('id');
		$pathToUpload = './pic/' . $id;
		
		$config['file_name'] = 'pic1.jpg';
		$config['upload_path'] = $pathToUpload;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['overwrite'] = True;
		
		if ( ! file_exists($pathToUpload) )
		{	
			$create = mkdir($pathToUpload, DIR_WRITE_MODE);
			if ( ! $create )
			return;
		}

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			//$error = array('error' => $this->upload->display_errors());
			
			$this->settings($this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->settings("Successfully uploaded!");
		}
	}
	
	function edit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		
		if($this->form_validation->run() == FALSE)
		{	
			$this->settings(NULL);
		}
		else
		{			
			$this->load->model('model_user');
			
			if($query = $this->model_user->edit_user())
			{
				$this->settings("Successfully updated!");		
			}
			else
			{
				$this->load->view('header');
				$this->load->view('view_settings');
				//$this->load->view('edit_info');
				$this->load->view('footer');
			}
		}
		
	}
	
	function verify()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ic_no', 'Identification Card Number', 'trim|required|ic_no');
		$this->form_validation->set_rules('li_no', 'Driving License Number', 'trim|required|li_no');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->settings(NULL);	
		}
		else
		{			
			$this->load->model('model_user');
			
			if($query = $this->model_user->verify_user())
			{
				$this->settings("Successfully submitted! Please allow some time for the admin to review.");
			}
			else
			{
				$this->load->view('header');
				$this->load->view('add_details');	
				$this->load->view('footer');		
			}
		}
	}
}

