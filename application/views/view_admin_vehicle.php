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
		
			<h4> Found ??? Vehicles</h4>
			
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
						<th>Edit</th>
					</thead>
					
					<tbody>
						<?php foreach($records as $row){ ?>
						<tr >
							
							<td >
								<?php echo $row->id; ?>
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
								<button type="button" class="btn btn-default">Edit</button>
								<a href="<?php echo base_url();?>admin/delete/<?php echo $row->id;?>"> <button type="button" class="btn btn-default">X</button></a>
							</td>
						</tr>
						<?php } ?>		
					</tbody>
					
				</table>
			</div>
		</div>
	</div>
	
</div>
