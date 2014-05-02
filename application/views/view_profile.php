<?php 
	$status = $this->session->userdata('loggedIn');
	$id = $this->session->userdata('id');
	$username = $this->session->userdata('username');
	
	// echo '<pre>';
	// print_r($this->session->all_userdata());
	// echo '</pre>';

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
			$verified = $row["verified"];
		}
	} 
?>
	
	<?php
		//Set default display picture
        $id = $this->session->userdata("id");
        $path = base_url() . "public/upload/profile/" . $id . "/pic1.jpg";
        if(!file_exists($path)) {
            $display = base_url() . "public/upload/profile/default.jpg";
        } else {
            $display = $path;
        }
    ?>

	<div class="row">
		<div class="col-xs-12 col-md-3">
			<img src="<?php echo $display ?>" class="img-thumbnail" alt ="Upload Picture" width="250"/>
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
					echo form_open('/', array('id' => 'search', 'class' => 'form', 'method' => 'post' , 'role' => 'form'));
					echo form_label('Location', 'location');
					echo form_input(array('name' => 'location', 'class' => 'form-control', 'value' => set_value('location'), 'placeholder' => 'Location name or Address, E.g. Kuala Lumpur', 'required' => 'required', 'autofocus' => 'autofocus'));
					
				?>
				<form class="form" method="post" action="http://localhost/gallery">
					<div class="form-group">
						<label for="location">Location</label>
						<input type="text" class="form-control" placeholder="Location name or Address, E.g. Kuala Lumpur" required="required" autofocus="autofocus">
					</div>
					<div class="checkbox">
						<label>
						<input type="checkbox" value="">
						Return at different location
						</label>
					</div>
					<br/>

				<div class="row">
				  <div class="col-xs-3">
				  	<label for"pickup">Pick-Up Date</label>
				  	<div class="input-group">
				  		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				  		<input type="text" class="form-control" data-provide="datepicker" required="required" >
				  	</div>
				  </div>
				  <div class="col-xs-3">
				  	<label for"pickuptime">Time</label>
				    <select class="form-control" required="required">
					  	<option>8.00 a.m</option>
					 	<option>12.00 p.m</option>
					  	<option>4.00 p.m</option>
					  	<option>8.00 p.m</option>
					  	<option>12.00 a.m</option>
					</select>
				  </div>
				  <div class="col-xs-3">
				  	<label for"dropoff">Drop-Off Date</label>
					<div class="input-group">
				  		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				  		<input type="text" class="form-control" data-provide="datepicker" required="required">
				  	</div>
				  </div>
				   <div class="col-xs-3">
				   	<label for"dropofftime">Time</label>
				    <select class="form-control" required="required" >
					  	<option>8.00 a.m</option>
					 	<option>12.00 p.m</option>
					  	<option>4.00 p.m</option>
					  	<option>8.00 p.m</option>
					  	<option>12.00 a.m</option>
					</select>
				  </div>
				</div>
					<br/>

					<div class="row">
						<div class="col-xs-4">
						<label for="size">Car Size</label>
						<select class="form-control" required="required" >
							<option>Compact</option>
							<option>Standard</option>
							<option>Luxury</option>
						  	<option>Van</option>
						  	<option>MPV</option>
						</select>
						</div>
					</div>
					<br/>
					<button class="btn btn-success"><i class="fa fa-search"></i> Search Now</button>
				</form>
			</div>
			</div>
		</div>
	</div>
