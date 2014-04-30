<?php
class Model_admin extends CI_Model {
	
	function selected($limit, $offset, $sort_by, $sort_order) {
		
		$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
		$sort_columns = array('id','first_name','last_name','gender','username','email_address','signupdate','accounttype','verified','ic_no','li_no');
		
		$sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'id';
		
		// results query
		$q = $this->db->select('id,first_name,last_name,gender,username,email_address,signupdate,accounttype,verified,ic_no,li_no')
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
	
	function update_record($data) 
	{
		// coming soon
		// $this->db->where('', );
		// $this->db->update('', $data);
	}
	
	function delete_row()
	{
		$this->db->where('id', $this->uri->segment(3));
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
