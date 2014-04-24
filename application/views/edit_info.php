<?php 
	$status = $this->session->userdata('loggedIn');
	$id = $this->session->userdata('id');
	$username = $this->session->userdata('username');
		
	if($status) {
		$sql = mysql_query("SELECT * FROM users WHERE id='$id' LIMIT 1");
		$count = mysql_num_rows($sql);
		if ($count > 1) {
			echo "There is no user with that id here.";
			exit();	
		}
		while($row = mysql_fetch_array($sql))
		{
			$first_name = $row["first_name"];
			$last_name = $row["last_name"];
			$gender = $row["gender"];
			$email_address = $row["email_address"];
			$signupdate = strftime("%d %b %Y", strtotime($row['signupdate']));
			$accounttype = $row["accounttype"];
		}
	} 
?>

<?php 
	if(validation_errors() != false) {
		echo "
			<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<strong>" . validation_errors() . "</strong>
			</div>";
	}
?>

<h1>Edit Information</h1>
<?php
	echo form_open('profile/edit_info', array('id' => 'edit_info', 'class' => 'form-signin', 'role' => 'form'));
	echo form_label('First Name', 'first_name');
	echo form_input(array('name' => 'first_name', 'class' => 'form-control', 'value' => $first_name, 'required' => 'required', 'autofocus' => 'autofocus'));
	echo '<br>';
	echo form_label('Last Name', 'last_name');
	echo form_input(array('name' => 'last_name', 'class' => 'form-control', 'value' => $last_name, 'required' => 'required'));
	echo '<br>';
	echo form_label('Email Address', 'email_address');
	echo form_input(array('name' => 'email_address', 'class' => 'form-control', 'value' => $email_address, 'required' => 'required'));
	echo '<br>';
	echo form_submit(array('name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Submit Changes'));
?>
