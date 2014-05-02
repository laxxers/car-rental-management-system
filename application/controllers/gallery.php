<?php

class Gallery extends CI_Controller {

	public function index() {
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			echo "hello";
		} else {
					$this->load->model('model_gallery');
		$data['rows'] = $this->model_gallery->getAll();
		
		$this->load->view('header');
		$this->load->view('view_gallery', $data);
		$this->load->view('footer');
		}

	}
	
}