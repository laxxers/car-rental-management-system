<div id="page-wrapper">
<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Package & Charges</h1>
			<a href="#" class="btn btn-default pull-right" role="button"><i class="fa fa-plus"></i> Add New</a>
		</div>		

	</div>		
	
	<div class="row">
		<div class="col-lg-12">
			<br>
			<div class="table-responsive">
				<table class="table table-striped table-bordered  table-hover">
					<thead>
						<th>#</th>
						<th>Additional Charges</th>
						<th>Cost (%)</th>
						<th>Actions</th>
					</thead>
					
					<tbody>
						<?php foreach($charges as $row){ ?>
						<tr >
							
							<td >
								<?php echo $row->id; ?>
							</td>
							<td >
								<?php echo $row->name; ?>
							</td>
							<td >
								<?php echo $row->charge; ?>
							</td>
			
							<td >
								<a href="#" class="btn btn-default" role="button">
									<i class="fa fa-pencil-square-o"></i> Edit
								</a>
								<button class="btn btn-danger" data-toggle="modal" data-target=".md-delete"><i class="fa fa-trash-o"></i> </button>
							</td>
						</tr>
						<?php } ?>		
					</tbody>

					<div class="modal fade md-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
								        <a href="#" class="btn btn-danger" role="button"> 
										Delete
										</a>
								        <button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>
								      </div>
							</div>
						</div>
					</div>

				</table>
			</div>
		</div>
	</div>