<style>
	.sort_asc:after {
		content: "\25b2";
	}
	.sort_desc:after {
		content: "\25bc";
	}
</style>
	
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Vehicle Inventory</h1>
			<a href="<?php echo base_url();?>admin/add_vehicle" class="btn btn-default pull-right" role="button"><i class="fa fa-plus"></i> Add New</a>
		</div>		
	</div>		
			
	<div class="row">
		<div class="col-lg-12">
			<h4> Found <?php echo $num_results; ?> Vehicles</h4>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered  table-hover">
					<thead>
						<?php foreach($fields as $field_name => $field_display){ ?>
						<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
							<?php 
							echo anchor("admin/list_vehicle/$field_name/" .
								(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc') ,
								$field_display); ?>
						</th>
						<?php } ?>
					</thead>
					
					<tbody>
						<?php foreach($vehicles as $vehicle){ ?>
						<tr >
							<?php foreach($fields as $field_name => $field_display){ ?>
							<td >
								<?php echo $vehicle->$field_name; ?>
							</td>
							<?php } ?>
						</tr>
						<?php } ?>			
					</tbody>
					
				</table>
			</div>	
			
			<?php if (strlen($pagination)){?>
			<h3>
				Pages: <?php echo $pagination; ?>
			</h3>
			<?php }?>
		</div>
	</div>
</div>
