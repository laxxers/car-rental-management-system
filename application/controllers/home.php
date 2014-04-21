<?php

class Home extends CI_Controller {
	public function index($msg = NULL) {
		$data['msg'] = $msg;
		$this->load->view('view_home', $data);
	}
	
	public function login() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');

        if($this->form_validation->run() == FALSE) {
        	$msg = validation_errors();
        	$this->index($msg);
        } else {
        	$this->load->model('model_user');
        	$query = $this->model_user->validate();

        	if($query) {
        		redirect(base_url());
        	} else {
        		$msg = "Username/Password combination is invalid. <br>";
        		$this->index($msg);
        	}
        }
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}

