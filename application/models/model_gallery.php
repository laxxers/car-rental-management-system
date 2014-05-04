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
	
	function reserve_vehicle()
	{
		$insert_reservation_data = array(
			'phone' => $this->input->post('phone'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email_address' => $this->input->post('email_address'),
			'location' => $this->input->post('location')
			
		);
		

		$insert = $this->db->insert('book', $insert_reservation_data);
		return $insert;
	}
}
