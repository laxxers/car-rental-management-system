<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<h2><i class="fa fa-chevron-left"></i> <a href="<?php echo base_url() . 'gallery';?>" style="text-decoration:none;"> Back to Gallery</a></h2>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<h2>Error Crash</h2>
			<h3>Vehicle is not available during:<h3>
			
			<?php 
				$zipped = array_map(null, $pickup, $dropoff);

				foreach($zipped as $tuple) {
					echo "<li><strong>" . strftime("%d %b %Y", strtotime($tuple[0]))  . "</strong> to "; 
					echo "<strong>" . strftime("%d %b %Y", strtotime($tuple[1])) . "</strong> <br></li>"; 
				}
			?>
		</div>
	</div>
</div>