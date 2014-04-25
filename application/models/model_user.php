<?php

class Model_user extends CI_Model {
	public function validate() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$query = $this->db->get_where('users', array('username' => $username, 'password' => $password));

		if($query->num_rows() > 0) {
			$row = $query->row();
			$data = array(
					'id' => $row->id,
					'username' => $row->username,
					'admin' => $row->admin,
					'password' => $row->password,
					'loggedIn' => true
					);
			$this->session->set_userdata($data);
			return true;
		}
		return false;
	}
	
	function create_user()
	{
		$username = $this->input->post('username');
		$sql_username_check = mysql_query("SELECT id FROM users WHERE username= '$username' LIMIT 1");
		$username_check = mysql_num_rows($sql_username_check);
		
		if ($username_check > 0 ){ 
			echo "
				<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
					User Name Existed In System (Please try another)</strong>
				</div>";
		}
		else 
		{
			$new_member_insert_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'gender' => $this->input->post('gender'),
				'email_address' => $this->input->post('email_address'),			
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),						
				'password2' => md5($this->input->post('password2')),						
				'accounttype' => $this->input->post('accounttype'),	
				'verified' => $this->input->post('verified'),						
				'signupdate' => date("Y-m-d H:i:s")					
			);
			
			$insert = $this->db->insert('users', $new_member_insert_data);
			return $insert;
		}
	}
	
	function edit_user()
	{
		$id = $this->session->userdata('id');
	
		$new_first_name = $this->input->post('first_name');
		$new_last_name = $this->input->post('last_name');
		$new_email_address = $this->input->post('email_address');
		
		$sql_update =  $this->db->query("UPDATE users 
										SET first_name = '$new_first_name',
										last_name = '$new_last_name' ,
										email_address = '$new_email_address'
										WHERE id = $id ");
		return $sql_update;
	}
	
	function verify_user()
	{
		$id = $this->session->userdata('id');
		
		$ic_no = $this->input->post('ic_no');
		$li_no = $this->input->post('li_no');
		
		$sql_add =  $this->db->query("UPDATE users 
									  SET ic_no = '$ic_no',
									      li_no = '$li_no',
										  verified = '1'
									  WHERE id = $id ");
		
		
		return $sql_add;
		
	}
}