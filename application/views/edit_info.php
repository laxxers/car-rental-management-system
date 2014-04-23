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
echo form_open('profile/edit_info');
echo 'First Name:';
echo form_input(array('name' => 'first_name','value' => $first_name));
echo '<br> Last Name:';
echo form_input(array('name' => 'last_name','value' => $last_name));
echo '<br> Email Address:';
echo form_input(array('name' => 'email_address','value' => $email_address));
echo '<br>';
echo form_submit('submit', 'Submit Changes');
?>
