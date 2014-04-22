<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>Sign Up!</title>	
</head>
<body>

	<h1>Create an Account</h1>
	<fieldset>
	<legend>Personal Information</legend>
		<?php
		echo form_open('home/create_member');
		echo 'First Name:';
		echo form_input('first_name', set_value('first_name'));
		echo '<br> Last Name:';
		echo form_input('last_name', set_value('last_name'));
		echo '<br> Gender: &nbsp&nbsp&nbsp';
		echo 'Male ';
		echo form_radio('gender', 'male', true, set_value('gender'));
		echo 'Female ';
		echo form_radio('gender', 'female', set_value('gender'));
		echo '<br> Email Address:';
		echo form_input('email_address', set_value('email_address'));
		?>
	</fieldset>

	<fieldset>
		<legend>Login Info</legend>
		<?php
		echo form_open('home/create_member');
		
		echo 'Account Type:';
		$options = array(
			'admin'  => 'Admin',
			'user'    => 'User'
		);
		echo form_dropdown('accounttype', $options, 'admin');
		echo '<br>Username:';
		echo form_input('username', set_value('username'));
		echo '<br> Password: ';
		echo form_password('password');
		echo '<br> Password Confirmation: ';
		echo form_password('password2');
		echo '<br>';
		echo form_submit('submit', 'Create Acccount');
		?>
		
		<?php echo validation_errors('<p class="error">'); ?>
	</fieldset>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>	

	<script type="text/javascript" charset="utf-8">
	
	</script>

</body>
</html>