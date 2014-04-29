<?php
class Model_gallery extends CI_Model {
	
	function getAll(){
		$q = $this->db->query("SELECT * FROM vehicle");
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}	
	}
}
