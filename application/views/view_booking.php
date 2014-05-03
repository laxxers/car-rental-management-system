<div class="row">
	
	<?php foreach($rows as $row) { ?>
	<div class="col-xs-12 col-md-3">
		<div class="thumbnail" style="height: 600px;">
			<img src="<?php echo base_url(); ?>public/car/<?php echo $row->id;?>.jpg" alt="">
			
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
		<div class="panel panel-info" style="height: 600px;">
			<div class="panel-heading"><i class="fa fa-book"></i>Reservation Details</div>
			
			<div class="panel-body">
				<?php
					//error
					echo form_open('', array('id' => 'search', 'class' => 'form-horizontal','method' => 'post' , 'role' => 'form'));
					
					echo '<div class="form-group">';
						echo form_label('First Name', 'first_name', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';
						echo form_input(array('name' => 'first_name', 'class' => 'form-control', 'value' => '', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '</div></div>';

					echo '<div class="form-group">';
						echo form_label('Last Name', 'last_name', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';
						echo form_input(array('name' => 'last_name', 'class' => 'form-control', 'value' => '', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '</div></div>';
					
					echo '<div class="form-group">';
						echo form_label('Email Address', 'email_address', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';	
						echo form_input(array('name' => 'email_address', 'class' => 'form-control', 'value' => '', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '</div></div>';
					
					echo '<div class="form-group">';
						echo form_label('Phone Number', 'phone', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';					
						echo form_input(array('phone' => 'location', 'class' => 'form-control', 'value' => set_value('phone'), 'placeholder' => 'Phone Number', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '</div></div>';
					
					echo '<div class="form-group">';
						echo form_label('Location', 'location', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';
						echo form_input(array('name' => 'location', 'class' => 'form-control', 'value' => set_value('location'), 'placeholder' => 'Location, E.g. Kuala Lumpur', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '</div></div>';	
					
					echo '<div class="form-group">';
						echo form_label('Pick-Up Date', 'pickup', array('class' => 'col-sm-4 control-label'));					
					echo '<div class="col-sm-8" >';
						echo form_input(array('name' => 'pickup', 'class' => 'form-control', 'data-provide' => 'datepicker', 'value' => set_value('pickup'), 'required' => 'required'));
					echo '</div></div>';	
					
					echo '<div class="form-group">';
						echo form_label('Time', 'pickuptime', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';
						echo form_dropdown('pickuptime', array('8 a.m' => '8 a.m', '12 p.m' => '12 p.m', '4 p.m' => '4 p.m', '8 p.m' => '8 p.m', '12 a.m' => '12 a.m'), set_value('pickuptime'), 'class="form-control"');
					echo '</div></div>';
						
					echo '<div class="form-group">';
						echo form_label('Drop-Off Date', 'dropoff', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';
						echo form_input(array('name' => 'dropoff', 'class' => 'form-control', 'data-provide' => 'datepicker', 'value' => set_value('dropoff'), 'required' => 'required'));
					echo '</div></div>';
						
					echo '<div class="form-group">';
						echo form_label('Time', 'dropofftime', array('class' => 'col-sm-4 control-label'));
					echo '<div class="col-sm-8" >';
						echo form_dropdown('dropofftime', array('8 a.m' => '8 a.m', '12 p.m' => '12 p.m', '4 p.m' => '4 p.m', '8 p.m' => '8 p.m', '12 a.m' => '12 a.m'), set_value('dropofftime'), 'class="form-control"');
					echo '</div></div>';
					
					echo form_submit('submit', 'Reserve Now', 'class="btn btn-success pull-right"');
					echo form_close();
				?>
			</div>
		</div>
	</div>
	
	<div class="col-xs-12 col-md-4">
		<div class="panel panel-info" style="height: 600px;">
			<div class="panel-heading"><i class="fa fa-usd"></i> Estimated Charges </div>
			
				<div class="panel-body">
					<p><strong>Total Days :</strong> 1 day</p>
				
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<th>Estimated Taxes & Fees</th>
								<th> &nbsp </th>
							</thead>
							
							<tbody>
								<tr >
									<td ><?php echo 'Facility Charge'; ?></td>
									<td ><?php echo '$ 100'; ?></td>
								</tr>
								<tr >
									<td ><?php echo 'Processing Fee'; ?></td>
									<td ><?php echo '$ 100'; ?></td>
								</tr>
								<tr >
									<td ><?php echo 'Gov Tax (6%)'; ?></td>
									<td ><?php echo '$ 100'; ?></td>
								</tr>
								
							</tbody>
							
							<tfoot>
								<td><strong><?php echo 'Total'; ?></strong></td>
								<td><strong><?php echo '$ 100'; ?></strong></td>
							</tfoot>
						</table>
					</div>
					
					<p><strong>Prices are in Ringgit Malaysia (RM)</strong></p>
				</div>
		</div>
	</div>
</div>
