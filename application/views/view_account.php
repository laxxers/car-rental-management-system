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

<html>
	<head>
		<title>Welcome Back</title>
	</head>
	
	<style type="text/css">
	body {margin: 0px}
	</style>
	
	<body>	

	<table style="background-color: #CCC" width="100%" border="0" cellpadding="12">
		<tr>
			<td>
				<h1>!!!</h1>
			</td>
			
			<td>
				<?php echo anchor('home/profile', $username); ?> &bull;
				<?php echo anchor('home/view_account', 'Account'); ?> &bull;
				<?php echo anchor('home/logout', 'Logout'); ?>
			</td>
		</tr>	
	</table >
	
	<table width="768" cellpadding="3" cellspacing="3" style="line-height:1.5em;">
		<tr>
			<td >
				<?php echo anchor('home/view_edit_info', 'Edit Information '); ?><br />
				<?php echo anchor('home/view_edit_pic', 'Edit Picture '); ?><br />
				<?php echo anchor('home/view_add_details', 'Add Rent Details '); ?><br />
			</td>
		</tr>
	</table>
	
	</body>
</html>