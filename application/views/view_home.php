<!DOCTYPE html>

<html>
	<head>
		<title>Login</title>
	</head>

	<body>		
		<?php 
			echo form_open('home/login');
			if($msg != NULL) echo $msg;
			echo 'Username: &nbsp&nbsp';
			echo form_input('username');
			echo '<br> Password: &nbsp&nbsp';
			echo form_password('password');
			echo '<br>';
			echo form_submit('submit', 'Login');
			echo anchor('home/signup', 'Create Account');
			echo form_close();
		?>		
	</body>
</html>