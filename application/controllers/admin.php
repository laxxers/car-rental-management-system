<?php

class Admin extends CI_Controller {
	// public function index() {
		// $this->load->view('header');
		// $this->load->view('view_admin'); //Create a new view_admin file in views
		// $this->load->view('footer');
	// }
	
	public function summary() {
		$this->load->view('header');
		$this->load->view('view_summary'); //Create a new view_admin file in views
		$this->load->view('footer');
	}
	
	public function vehicle() {
		$this->load->view('header');
		$this->load->view('view_vehicle'); //Create a new view_admin file in views
		$this->load->view('footer');
	}
	
	public function package() {
		$this->load->view('header');
		$this->load->view('view_package'); //Create a new view_admin file in views
		$this->load->view('footer');
	}
}
