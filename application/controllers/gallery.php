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
		$this->load->view('view_search_gallery', $data);
		$this->load->view('footer');
	}
	
	function booking() {
		$this->load->model('model_gallery');
		$data['rows'] = $this->model_gallery->booking();
		
		$this->load->view('header');
		$this->load->view('view_booking', $data);
		$this->load->view('footer');
	}
	
	function reserve()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|numeric');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->booking();
		}
		else
		{			
			$this->load->model('model_gallery');
			
			if($query = $this->model_gallery->reserve_vehicle())
			{
				$this->load->view('header');
				echo "success";
				$this->load->view('footer');
				
			}
			else
			{
				$this->load->view('header');
				$this->load->view('view_booking');	
				$this->load->view('footer');		
			}
		}
	}
}