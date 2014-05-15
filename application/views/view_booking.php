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
<div class="row">
	<div class="col-lg-12">
		<h5><i class="fa fa-chevron-left"></i> <a href="<?php echo base_url() . 'gallery'?>" style="text-decoration:none;"> Back to Gallery</a></h5>
	</div>
</div>
<div class="row">
	<?php foreach($rows as $row) {?>
	<?php $selected_id = $row->vehicle_id;?>
	<div class="col-xs-12 col-md-3">
		<div class="thumbnail" style="height: 650px;">
			<img src="<?php echo base_url(); ?>public/car/<?php echo $row->vehicle_id;?>.jpg" alt="">
			
			<div class="caption">
				<h3><?php echo $row->name; ?><small> - <?php echo $row->type; ?></small></h3>
				<p>
					<ul class="list-unstyled">
						<li><small><i class="fa fa-road"></i> Unlimited Mileage</small></li>
						<li><small><i class="fa fa-user"></i> <?php echo  $row->capacity; ?> Adults</small></li>
						<li><small><i class="fa fa-briefcase"></i> <?php echo  $row->luggage; ?> bags</small></li>
						<li><small><i class="fa fa-cog"></i> <?php echo $row->transmission; ?> Transmission</small></li>
						<li><small><i class="fa fa-leaf"></i> 
						<?php 
							if($row->ac == '1') 
								echo 'Air Conditioning';
							else 
								echo 'No Air Conditioning';
						?>
						</small></li>
						<li><small><i class="fa fa-usd"></i> Price starting from
						<?php 
							echo '<h3><center>RM' . $row->daily . '/day</center></h3><br>';
						
						?>							 
						</small></li>
					</ul>
					
				</p>
			</div>
			
		</div>
	</div>
	<?php } ?>
	
	<div class="col-xs-12 col-md-5" >
		<div class="panel panel-info" style="height: 650px;">
			<div class="panel-heading"><i class="fa fa-book"></i> Reservation Details</div>
			
			<div class="panel-body">
				<?php
					//error
					if(validation_errors() != false) {
					echo "
						<div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>" . validation_errors() . "</strong>
						</div>";
					}
					
					echo form_open('gallery/reserve/' . $selected_id, array('id' => 'reserve', 'class' => 'form-horizontal','method' => 'post' , 'role' => 'form'));
					
					echo form_input(array('name' => 'user_id', 'class' => 'hidden', 'value' => $user_id));
					echo form_input(array('name' => 'status', 'class' => 'hidden', 'value' => 'pending'));
					
					echo '<div class="form-group">';
						echo form_label('Phone Number', 'phone', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';					
						echo form_input(array('name' => 'phone', 'class' => 'form-control', 'value' => set_value('phone'), 'placeholder' => '012-3456789', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '</div></div>';
					
					echo '<div class="form-group">';
						echo form_label('First Name', 'first_name', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';
						echo form_input(array('name' => 'first_name', 'class' => 'form-control', 'value' => $first_name, 'required' => 'required', 'readonly'=>'readonly'));
					echo '</div></div>';

					echo '<div class="form-group">';
						echo form_label('Last Name', 'last_name', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';
						echo form_input(array('name' => 'last_name', 'class' => 'form-control', 'value' => $last_name, 'required' => 'required', 'readonly'=>'readonly'));
					echo '</div></div>';
					
					echo '<div class="form-group">';
						echo form_label('Email Address', 'email_address', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';	
						echo form_input(array('name' => 'email_address', 'class' => 'form-control', 'value' => $email_address, 'required' => 'required', 'readonly'=>'readonly'));
					echo '</div></div>';
					
					echo '<div class="form-group">';
						echo form_label('Location', 'location', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';
						echo form_input(array('name' => 'location', 'class' => 'form-control', 'value' => set_value('location'), 'placeholder' => 'Eg: Location or Address, eg. Kuala Lumpur', 'required' => 'required'));
					echo '</div></div>';	
					
					echo '<div class="form-group">';
						echo form_label('Pick-Up Date', 'pickup', array('class' => 'col-sm-4 control-label'));					
					echo '<div class="col-sm-8" >';
						echo form_input(array('name' => 'pickup', 'class' => 'form-control', 'value' => $pickup, 'required' => 'required', 'readonly'=>'readonly'));
					echo '</div></div>';	
					
					echo '<div class="form-group">';
						echo form_label('Time', 'pickuptime', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';
						echo form_input(array('name' => 'pickuptime', 'class' => 'form-control', 'value' => $pickuptime, 'required' => 'required', 'readonly'=>'readonly'));
					echo '</div></div>';
						
					echo '<div class="form-group">';
						echo form_label('Drop-Off Date', 'dropoff', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';
						echo form_input(array('name' => 'dropoff', 'class' => 'form-control', 'value' => $dropoff, 'required' => 'required', 'readonly'=>'readonly'));
					echo '</div></div>';
						
					echo '<div class="form-group">';
						echo form_label('Time', 'dropofftime', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';
						echo form_input(array('name' => 'dropofftime', 'class' => 'form-control', 'value' => $dropofftime, 'required' => 'required', 'readonly'=>'readonly'));
					echo '</div></div>';
					
					echo form_submit('submit', 'Reserve Now', 'class="btn btn-success pull-right"');
					echo form_close();
				?>
			</div>
		</div>
	</div>
	
	<div class="col-xs-12 col-md-4">
		<div class="panel panel-info" style="height: 650px;">
			<div class="panel-heading"><i class="fa fa-usd"></i> Estimated Charges </div>
			
				<div class="panel-body">				
					<div class="table-responsive">
						<table class="table table-striped">							
							<thead>
								<th><h4>Estimated Taxes & Fees</h4></th>
								<th> &nbsp </th>
							</thead>
							
							<tbody>
								<tr >
									<?php 										
										if ($days >= 7 && $days < 14)
										{
											$disc = 0.95;
										}
										else if ($days >= 14 && $days < 21)
										{
											$disc = 0.90;
										}
										else if ($days >= 21 && $days < 28)
										{
											$disc = 0.85;
										}
										else if ($days >= 28)
										{
											$disc = 0.80;
										}
										else
										{
											$disc = 1;
										}
										$rental_disc = $days * $row->daily * $disc;
										
										$rental = number_format((float)($rental_disc), 2, '.', ''); 
										if($days == 1) {
											$day = 'day';
										} else {
											$day = 'days';
										}
									?>
									<td ><?php echo '<strong>Car Rental (' . $days . ' ' . $day . ' @ $' . $row->daily . '/day)</strong>' . '(Discount: ' . (100 - ($disc * 100)) . '%)' ?></td>
									<td ><?php echo '$ ' . $rental; ?></td>
								</tr>

								<tr >
									<?php
										$sql = mysql_query("SELECT cost FROM charge WHERE charge_id= 1");
										$row = mysql_fetch_array($sql);
										$fc = $row["cost"] /100;
										$facility = number_format((float)($rental * $fc), 2, '.', ''); 
									?>
									<td ><?php echo 'Facility Charge'; ?></td>
									<td ><?php echo '$ ' . $facility; ?></td>
								</tr>
								<tr >
									<?php
										$sql = mysql_query("SELECT cost FROM charge WHERE charge_id= 2");
										$row = mysql_fetch_array($sql);
										$pf = $row["cost"] /100;
										$process = number_format((float)($rental * $pf), 2, '.', ''); 
									?>
									<td ><?php echo 'Processing Fee'; ?></td>
									<td ><?php echo '$ ' . $process; ?></td>
								</tr>
								<tr >
									<?php 
										$sql = mysql_query("SELECT cost FROM charge WHERE charge_id= 3");
										$row = mysql_fetch_array($sql);
										$gt = $row["cost"] /100;
										$gov = number_format((float)($rental * $gt), 2, '.', ''); 
									?>
									<td ><?php echo 'Gov Tax (6%)'; ?></td>
									<td ><?php echo '$ ' . $gov; ?></td>
								</tr>
								
							</tbody>
							
							<tfoot>
								<td><strong><h4><?php echo 'Total Price (RM)'; ?></strong></h4></td>
								<td><strong><h4><?php echo '$ ' . number_format((float)($rental + $facility + $process + $gov), 2, '.', ''); ?></strong></h4></td>
							</tfoot>
						</table>
					</div>
					<hr>
					<p><strong>Prices are in Ringgit Malaysia (RM)</strong></p>
				</div>
		</div>
	</div>
</div>
