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
	
	
}
