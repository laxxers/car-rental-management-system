<?php

class Profile extends CI_Controller {
	function view_profile()
	{
		$this->load->view('header');
		$this->load->view('view_profile');
		$this->load->view('footer');
	}
	
	function do_upload()
	{
		$id = $this->session->userdata('id');
		$pathToUpload = './pic/' . $id;
		
		$config['file_name'] = 'pic1.jpg';
		$config['upload_path'] = $pathToUpload;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
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
			$error = array('error' => $this->upload->display_errors());
			
			$this->load->view('header');
			$this->load->view('edit_pic', $error);
			$this->load->view('footer');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('header');
			echo "<h1>&nbsp &nbsp &nbsp &nbsp &nbsp Upload Successfully</h1>";
			$this->load->view('footer');
		}
	}
	
	function edit_info()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		
		if($this->form_validation->run() == FALSE)
		{	
			$this->load->view('header');
			$this->load->view('edit_info');
			$this->load->view('footer');
		}
		else
		{			
			$this->load->model('model_user');
			
			if($query = $this->model_user->edit_info())
			{
				$this->load->view('header');
				echo "<h1>&nbsp &nbsp &nbsp &nbsp &nbsp Edit Successfully</h1>";
				$this->load->view('footer');		
			}
			else
			{
				$this->load->view('header');
				$this->load->view('edit_info');
				$this->load->view('footer');
			}
		}
		
	}
	
	function add_details()
	{
		$this->load->view('header');
		$this->load->view('add_details');
		$this->load->view('footer');
	}
}

