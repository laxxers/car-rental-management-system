<!DOCTYPE html>

<html>
	<head>
		<title>Login</title>
	</head>

	<body>
		<form action="/home/login" method="POST">
			<?php if($msg != NULL) echo $msg; ?>
			Username: <input type="text" name="username"><br>
			Password: <input type="password" name="password"><br>
			<input type="submit" value="Login">
		</form>

		<?php 
			$status = $this->session->userdata('loggedIn');
			$username = $this->session->userdata('username');
			if($status) {
				echo "Welcome, " . $username . "! <br>";
				echo "<a href=\"/home/logout\">Logout</a>";
			} 
			
		?>
		
	</body>
</html>