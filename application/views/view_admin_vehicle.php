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
		
			<h4> Found <?php echo $vehicle_no; ?> Vehicles</h4>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered  table-hover">
					<thead>
						<th>ID</th>
						<th>Type</th>
						<th>Name</th>
						<th>Transmission</th>
						<th>Daily</th>
						<th>Capacity</th>
						<th>Luggage</th>
						<th>AC</th>
						<th>Actions</th>
					</thead>
					
					<tbody>
						<?php foreach($records as $row){ ?>
						<tr >
							
							<td >
								<?php echo $row->vehicle_id; ?>
							</td>
							<td >
								<?php echo $row->type; ?>
							</td>
							<td >
								<?php echo $row->name; ?>
							</td>
							<td >
								<?php echo $row->transmission; ?>
							</td>
							<td >
								<?php echo $row->daily; ?>
							</td>
							<td >
								<?php echo $row->capacity; ?>
							</td>
							<td >
								<?php echo $row->luggage; ?>
							</td>
							<td >
								<?php echo $row->ac; ?>
							</td>
							<td >
								<a href="<?php echo base_url() . "admin/update_vehicle/". $row->vehicle_id ?>" class="btn btn-default" role="button">
									<i class="fa fa-pencil-square-o"></i> Edit
								</a>
								<button class="btn btn-danger" data-toggle="modal" data-target=<?php echo '".md-delete' . $row->vehicle_id . '"'; ?>><i class="fa fa-trash-o"></i> </button>
							</td>
						</tr>
							
					</tbody>

					<div class=<?php echo '"modal fade md-delete' . $row->vehicle_id . '"'; ?> tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle"></i> Delete Confirmation</h4>
								</div>
								      <div class="modal-body">
								        Are you sure you want to delete this item?
								      </div>
								      <div class="modal-footer">
								        <a href="<?php echo base_url() . "admin/delete_vehicle/" .  $row->vehicle_id ?>" class="btn btn-danger" role="button"> 
										Delete
										</a>
								        <button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>
								      </div>
							</div>
						</div>
					</div>
					<?php } ?>	
				</table>
			</div>
		</div>
	</div>
	
</div>
