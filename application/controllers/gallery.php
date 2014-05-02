<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function index() {
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->search();
		} else {
			$this->load->model('model_gallery');
			$data['rows'] = $this->model_gallery->getAll();
		
		$this->load->view('header');
		$this->load->view('view_gallery', $data);
		$this->load->view('footer');
		}

	}
	
	function search() {
		$this->load->model('model_gallery');
		$data['rows'] = $this->model_gallery->search();

		$this->load->view('header');
		$this->load->view('view_gallery', $data);
		$this->load->view('footer');
	}
}