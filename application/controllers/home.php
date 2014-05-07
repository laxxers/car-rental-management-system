<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function _remap($method)
	{
		switch( $method )
		{
			case 'index':
				$this->index();
				break;
			case 'logout':
				$this->logout();
				break;
			default:
				show_404();;
				break;
		}
	}
	
	public function index() {
		// $this->load->view('header');
		$session = $this->session->userdata("loggedIn");
		if($session) {
			$this->load->view('header');
			$this->load->view('view_profile');
			$this->load->view('footer');
		} else {
			$this->load->view('view_home');
		}	
		
		// $this->load->view('footer');
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}

