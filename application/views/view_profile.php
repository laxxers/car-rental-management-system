<?php 
	$status = $this->session->userdata('loggedIn');
	$user_id = $this->session->userdata('user_id');
	$username = $this->session->userdata('username');
	
	// echo '<pre>';
	// print_r($this->session->all_userdata());
	// echo '</pre>';

	if($status) {
		$sql = mysql_query("SELECT * FROM users WHERE user_id='$user_id' LIMIT 1");
		$count = mysql_num_rows($sql);
		if ($count > 1) {
			echo "There is no user with that id here.";
			exit();	
		}
		while($row = mysql_fetch_array($sql))
		{
			$first_name = $row["first_name"];
			$last_name = $row["last_name"];
			$username = $row["username"];
			$gender = $row["gender"];
			$email_address = $row["email_address"];
			$signupdate = strftime("%d %b %Y", strtotime($row['signupdate']));
			$ic_no = $row["ic_no"];
			$li_no = $row["li_no"];
			$accounttype = $row["accounttype"];
			$verified = $row["verified"];
		}
	} 
?>
	
	<?php
		//Set default display picture
        $user_id = $this->session->userdata("user_id");
        $path = "public/upload/profile/" . $user_id . "/pic1.jpg";
		
		if(!file_exists($path)) 
		{
			$display = "public/upload/profile/default.jpg";
        } else {
			$display = $path;
        }
    ?>

	<div class="row">
		<div class="col-xs-12 col-md-3">
			<img src="<?php echo $display; ?>" class="img-thumbnail" alt ="Upload Picture" width="250"/>
				<h3><strong><?php echo $first_name . " " . $last_name ?></strong></h3>
				<h4><i><?php echo "'" . $username . "'"; ?></i></h4>
				<hr>
				<ul class="list-group">
			  		<li class="list-group-item"><i class="fa fa-envelope-o"></i><?php echo " " . $email_address ?>  <br></li>
			  		<li class="list-group-item"><i class="fa fa-clock-o"></i><?php echo " Joined on  " . $signupdate ?></li>
			 		<?php 
			 			if($verified == '1' && $ic_no != null &&  $li_no != null ) {
			 				echo "<li class='list-group-item' style='color: green;'><i class='fa fa-check'></i><strong> Verified</strong></li>";
			 			} else {
			 				echo "<li class='list-group-item' style='color: red;'><i class='fa fa-times'></i><a href='" . base_url() . "profile/settings' style='text-decoration: none; color: red;'><strong> Not verified</strong></a></li>";
			 			}
			 		?>
				</ul>
		</div>
		<div class="col-xs-12 col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-search"></i> <strong>Search for a car rental</strong></h3>
				</div>
			
			<div class="panel-body">
				<?php
					echo form_open('/gallery', array('id' => 'search', 'class' => 'form', 'method' => 'post' , 'role' => 'form'));
					// echo form_label('Location', 'location');
					// echo form_input(array('name' => 'location', 'class' => 'form-control', 'placeholder' => 'Location name or Address, E.g. Kuala Lumpur', 'required' => 'required', 'autofocus' => 'autofocus'));
					// echo form_checkbox(array('name' => 'return', 'value' => true));
					// echo form_label('&nbsp;Return at different location');
					// echo '<br>';
					// echo '<br>';
				?>

				<div class="row">
				  <div class="col-xs-3">
				  	<?php
				  		echo form_label('Pick-Up Date', 'pickup');
				  		echo '<div class="input-group">';
				  		echo '<span class="input-group-addon"><i class="fa fa-calendar"></i></span>';
				  		echo form_input(array('name' => 'pickup', 'class' => 'form-control', 'data-provide' => 'datepicker', 'placeholder' => 'MM/DD/YYYY', 'required' => 'required'));
				  		echo '</div>';
				  	?>
				  </div>
				  <div class="col-xs-3">
				  	<?php
				  		echo form_label('Time', 'pickuptime');
				  		echo form_dropdown('pickuptime', array('8 a.m' => '8 a.m', '12 p.m' => '12 p.m', '4 p.m' => '4 p.m', '8 p.m' => '8 p.m', '12 a.m' => '12 a.m'), '8 a.m', 'class="form-control"');
				  	?>
				  </div>
				  <div class="col-xs-3">
					<?php
				  		echo form_label('Drop-Off Date', 'dropoff');
				  		echo '<div class="input-group">';
				  		echo '<span class="input-group-addon"><i class="fa fa-calendar"></i></span>';
				  		echo form_input(array('name' => 'dropoff', 'class' => 'form-control', 'data-provide' => 'datepicker', 'placeholder' => 'MM/DD/YYYY', 'required' => 'required'));
				  		echo '</div>';
				  	?>
				  </div>
				   <div class="col-xs-3">
				  	<?php
				  		echo form_label('Time', 'dropofftime');
				  		echo form_dropdown('dropofftime', array('8 a.m' => '8 a.m', '12 p.m' => '12 p.m', '4 p.m' => '4 p.m', '8 p.m' => '8 p.m', '12 a.m' => '12 a.m'), '8 a.m', 'class="form-control"');
				  	?>
				  </div>
				</div>
					<br/>

					<div class="row">
						<div class="col-xs-4">
						  	<?php
						  		echo form_label('Car Size', 'size');
						  		echo form_dropdown('size', array('compact' => 'Compact', 'standard' => 'Standard', 'luxury' => 'Luxury', 'van' => 'Van', 'mpv' => 'MPV'), 'compact', 'class="form-control"');
						  	?>
						</div>
					</div>
					<br/>
					<button class="btn btn-success"><i class="fa fa-search"></i> Search Now</button>
				</form>
			</div>
			</div>
		</div>
	</div>
