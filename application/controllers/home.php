<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index($msg = NULL) {
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('view_home', $data);
		$this->load->view('footer');
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}

