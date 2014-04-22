<?php 
	$status = $this->session->userdata('loggedIn');
	$id = $this->session->userdata('id');
	$username = $this->session->userdata('username');
	
	//echo '<pre>';
	//print_r($this->session->all_userdata());
	//echo '</pre>';

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

<html>
	<head>
		<title>Welcome Back</title>
	</head>

	<body>		
	
	<?php
		// show all users
		// $query = $this->db->query("SELECT * FROM users");
		// echo $this->table->generate($query);
	?>
	<table >
		<th>Profile</th>
		<tr>
			<td >
				First Name:   <?php echo $first_name ?> 	<br>
				Last Name:    <?php echo $last_name ?>  	<br>
				Gender:       <?php echo $gender ?>   		<br>
				Email Address:<?php echo $email_address ?>  <br>
				Signup Date:  <?php echo $signupdate ?>  	<br>
				Acccount Type:<?php echo $accounttype ?> 	<br>
			</td>
			<td >
				<div align="center"><img src="" alt="Pics" width="150" height="150"/></div>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo anchor('home/logout', 'Logout'); ?>
			</td>
		</tr>
		
	</table>	
		
	</body>
</html>