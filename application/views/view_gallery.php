		<div class="row">
            <div class="col-lg-12">
                <h2>Vehicle Gallery<h2>
            </div>
        </div>
		
			
        <div class="row">
			<?php foreach($rows as $row){ ?>
            <div class="col-lg-3 col-md-6">
                <div class="thumbnail">
                    <img src="<?php echo base_url(); ?>public/car/<?php echo $row->name;?>.jpg" alt="">
					
                    <div class="caption">
                        <h3><?php echo $row->name; ?><small> - <?php echo $row->type; ?></small></h3>
                        <p>
                        	<ul class="list-unstyled">
						  		<li><small><span class="glyphicon glyphicon-road"></span> Unlimited Mileage</small></li>
						  		<li><small><span class="glyphicon glyphicon-user"></span> <?php  echo $row->no_passenger; ?> Adults</small></li>
						  		<li><small><span class="glyphicon glyphicon-briefcase"></span> <?php  echo $row->capacity; ?>  bags</small></li>
						  		<li><small><span class="glyphicon glyphicon-cog"></span> <?php echo $row->details; ?>  Transmission</small></li>
						  		<li><small><span class="glyphicon glyphicon-tree-conifer"></span> 
								<?php 
									if($row->ac == '1') 
										echo 'Air Conditioning';
									else 
										echo 'No Air Conditioning';
								?>
								</small></li>
								<li><small><span class="glyphicon glyphicon-usd"></span> 
								Price: <br>
								<?php 
									echo '/hour - ' . $row->hourly . '<br>';
									echo '/week - ' . $row->weekly . '<br>';
									echo '/day - ' . $row->daily . '<br>';
									echo '/month - ' . $row->monthly . '<br>';
								
								?>
								 
								</small></li>
							</ul>
						</p>
                        <p>
                        	<center>
                        	<div class="btn-group">
							  	<button type="button" class="btn btn-default">More Info</button>
							  	<button type="button" class="btn btn-success">Select</button>
							</div>
							</center>
                        </p>
                    </div>
					
                </div>
            </div>
			<?php } ?>
			
        </div>
