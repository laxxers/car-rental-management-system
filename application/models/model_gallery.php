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
		$query = $this->db->get_where('vehicle', array('vehicle_id' => $vehicle_id));	
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function reserve_vehicle()
	{	
		$vehicle_id =  $this->uri->segment(3);
		
		$insert_reservation_data = array(
			'vehicle_id' => $vehicle_id,
			'phone' => $this->input->post('phone'),
			'user_id' => $this->input->post('user_id'),
			'location' => $this->input->post('location'),
			'pickup' => date('Y-m-d', strtotime($this->input->post('pickup'))),
			'pickuptime' => $this->input->post('pickuptime'),
			'dropoff' => date('Y-m-d', strtotime($this->input->post('dropoff'))),
			'dropofftime' => $this->input->post('dropofftime')
			
		);
		

		$insert = $this->db->insert('reservation', $insert_reservation_data);
		return $insert;
	}
}
