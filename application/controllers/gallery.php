<?php

class Gallery extends CI_Controller {

	public function index() {
		$this->load->view('header');
		$this->load->view('view_gallery');
		$this->load->view('footer');
	}
}