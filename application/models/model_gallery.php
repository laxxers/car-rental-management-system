<?php
class Model_gallery extends CI_Model {
	
	function getAll(){
		$query = $this->db->query("SELECT * FROM vehicle");
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}	
	}

	function search() {
		$size = $this->input->post('size');
		$query = $this->db->get_where('vehicle', array('type' => $size));	
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function booking() {
		$vehicle_id =  $this->uri->segment(3);
		$query = $this->db->get_where('vehicle', array('id' => $vehicle_id));	
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
}
