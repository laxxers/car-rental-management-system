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
			$username = $row['username'];
			$gender = $row["gender"];
			$email_address = $row["email_address"];
			$signupdate = strftime("%d %b %Y", strtotime($row['signupdate']));
			$ic_no = $row["ic_no"];
			$li_no = $row["li_no"];
			$accounttype = $row["accounttype"];
		}
	} 
?>


	<div class="row">
		<div class="col-xs-12 col-md-3">
			<img src="<?php echo base_url();?>pic/<?php echo "$id"; ?>/pic1.jpg" class="img-thumbnail" alt ="Upload Picture" width="250"/>
				<h3><strong><?php echo $first_name . " " . $last_name ?></strong></h3>
				<h4><i><?php echo "'" . $username . "'"; ?></i></h4>
				<hr>
				<ul class="list-group">
			  		<li class="list-group-item"><span class="glyphicon glyphicon-envelope"></span><?php echo " " . $email_address ?>  <br></li>
			  		<li class="list-group-item"><span class="glyphicon glyphicon-time"></span><?php echo " Joined on  " . $signupdate ?></li>
			 		<li class="list-group-item">Morbi leo risus</li>
			 		<li class="list-group-item">Porta ac consectetur ac</li>
			  		<li class="list-group-item">Vestibulum at eros</li>
				</ul>
		</div>
		<div class="col-xs-12 col-md-9 well">
			Later.....
		</div>
	</div>
