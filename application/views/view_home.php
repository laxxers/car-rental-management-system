<!DOCTYPE html>

<html>
	<head>
		<title>Login</title>
	</head>

	<body>
		<!--<form action="/home/login" method="POST">
			<?php //if($msg != NULL) echo $msg; ?>
			Username: <input type="text" name="username"><br>
			Password: <input type="password" name="password"><br>
			<input type="submit" value="Login">
		</form>-->
		
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

		<?php 
			$status = $this->session->userdata('loggedIn');
			$username = $this->session->userdata('username');
			if($status) {
				echo "Welcome, " . $username . "! <br>";
				echo anchor('home/logout', 'Logout');
			} 
			
		?>
		
	</body>
</html>