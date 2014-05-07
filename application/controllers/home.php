<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index() {
		$this->load->view('view_home');

	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}

