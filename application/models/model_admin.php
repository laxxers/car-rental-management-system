<?php
class Model_admin extends CI_Model {
	
	function selected($limit, $offset, $sort_by, $sort_order) {
		
		$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
		$sort_columns = array('user_id','first_name','last_name','gender','username','email_address','signupdate','accounttype','verified','ic_no','li_no');
		
		$sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'user_id';
		
		// results query
		$q = $this->db->select('user_id,first_name,last_name,gender,username,email_address,signupdate,accounttype,verified,ic_no,li_no')
			->from('users')
			->limit($limit, $offset)
			->order_by($sort_by, $sort_order);
		
		$ret['rows'] = $q->get()->result();
		
		// count query
		$q = $this->db->select('COUNT(*) as count', FALSE)
			->from('users');
		
		$tmp = $q->get()->result();
		
		$ret['num_rows'] = $tmp[0]->count;
		
		return $ret;
	}
	
	function getALL()
	{
		$query = $this->db->get('vehicle');
		return $query->result();
	}
	
	function update_vehicle() 
	{
		$id_update = $this->uri->segment(3);
		
		$type = $this->input->post('type');
		$name = $this->input->post('name');
		$transmission = $this->input->post('transmission');
		$ac = $this->input->post('ac');
		$capacity = $this->input->post('capacity');
		$luggage = $this->input->post('luggage');
		$daily = $this->input->post('daily');
		
		$sql_update =  $this->db->query("UPDATE vehicle 
										SET type = '$type',
										name = '$name',
										transmission = '$transmission',
										ac = '$ac',
										capacity = '$capacity',
										luggage = '$luggage',
										daily = '$daily'
										WHERE vehicle_id = $id_update ");
		return $sql_update;
	}
	
	function delete_vehicle()
	{
		$this->db->where('vehicle_id', $this->uri->segment(3));
		$this->db->delete('vehicle');
		redirect('admin/getAll_vehicle');
	}
	
	function count_vehicle()
	{
		$q = $this->db->select('COUNT(*) as count', FALSE)
			->from('vehicle');
		
		$tmp = $q->get()->result();
		
		$ret['num_rows'] = $tmp[0]->count;
		
		return $ret;
	}
	
	function add_vehicle()
	{	
		$new_vehicle = array(
			'type' => $this->input->post('type'),
			'name' => $this->input->post('name'),
			'transmission' => $this->input->post('transmission'),
			'ac' => $this->input->post('ac'),			
			'capacity' => $this->input->post('capacity'),			
			'luggage' => $this->input->post('luggage'),		
			'daily' => $this->input->post('daily')			
		);
		

		$add = $this->db->insert('vehicle', $new_vehicle);
		return $add ;
	}
	
	
}
