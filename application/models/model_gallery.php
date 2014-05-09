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
		
		$pickup = date('Y-m-d', strtotime($this->input->post('pickup')));
		$dropoff = date('Y-m-d', strtotime($this->input->post('dropoff')));
		$vehicle_id =  $this->uri->segment(3);
		
		$sql_check_availability = mysql_query(
			"SELECT * 
			FROM reservation 
			WHERE (pickup <= '$pickup' AND dropoff >= '$dropoff')
			AND (vehicle_id = '$vehicle_id')
			LIMIT 1"
		);
		$res_check = mysql_num_rows($sql_check_availability);
		
		$sql_check_availability2 = mysql_query(
			"SELECT * 
			FROM reservation 
			WHERE (pickup <= '$pickup' AND dropoff >= '$pickup'  AND dropoff <= '$dropoff')
			AND (vehicle_id = '$vehicle_id')
			LIMIT 1"
		);
		$res_check2 = mysql_num_rows($sql_check_availability2);
		
		
		if ($res_check > 0 || $res_check2>0){ 
			return false;
		}
		else 
		{
			$insert_reservation_data = array(
				'vehicle_id' => $vehicle_id,
				'status' => $this->input->post('status'),
				'phone' => $this->input->post('phone'),
				'user_id' => $this->input->post('user_id'),
				'location' => $this->input->post('location'),
				'pickup' => $pickup,
				'pickuptime' => $this->input->post('pickuptime'),
				'dropoff' => $dropoff,
				'dropofftime' => $this->input->post('dropofftime')
				
			);
			$insert = $this->db->insert('reservation', $insert_reservation_data);
			return $insert;
		}
	}
}
