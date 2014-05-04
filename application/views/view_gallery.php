		<div class="row">
            <div class="col-lg-12">
                <h2>Vehicle Gallery<h2>
            </div>
        </div>
		
		<div class="row">
			<?php foreach($rows as $row) { ?>
            <div class="col-xs-12 col-md-3">
                <div class="thumbnail">
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
									//echo '/week - RM' . $row->weekly . '<br>';
									//echo '/day - RM' . $row->daily . '<br>';
									//echo '/month - RM' . $row->monthly . '<br>';
								
								?>							 
								</small></li>
							</ul>
						</p>
                    </div>
					
                </div>
            </div>
			<?php } ?>
        </div>