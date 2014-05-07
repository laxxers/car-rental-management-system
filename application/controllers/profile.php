<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	function _remap($method)
	{
		$session = $this->session->userdata("loggedIn");
		
		if($session )
		{
			switch( $method )
			{
				case 'index':
					$this->index();
					break;
				case 'settings':
					$this->settings();
					break;
				case 'do_upload':
					$this->do_upload();
					break;
				case 'edit':
					$this->edit();
					break;
				case 'verify':
					$this->verify();
					break;
				default:
					show_404();;
					break;
			}
		}
		else
		{
			echo 'No direct access allowed (Do not acces in this way)';
		}
	}
	
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
		$user_id = $this->session->userdata('user_id');
		$pathToUpload = './public/upload/profile/' . $user_id;
		
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
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|name_space');
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
				$this->settings("Verified Successfully");
			}
			else
			{
				$this->load->view('header');
				$this->load->view('view_settings');	
				$this->load->view('footer');		
			}
		}
	}
}

