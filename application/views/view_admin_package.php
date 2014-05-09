<div id="page-wrapper">
<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Package & Charges</h1>
				<?php
					if(validation_errors() != false) {
						echo "
						<div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>" . validation_errors() . "</strong>
						</div>";
					}
				
				?>
			<a href="#" class="btn btn-default pull-right" data-toggle="modal" data-target=".md-add" role="button"><i class="fa fa-plus"></i> Add New</a>
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
								<?php echo $row->charge_id; ?>
							</td>
							<td >
								<?php echo $row->name; ?>
							</td>
							<td >
								<?php echo $row->cost; ?>
							</td>
			
							<td >
								<a href=<?php echo base_url() . "admin/update_charge/" .  $row->charge_id ?> class="btn btn-default" role="button">
									<i class="fa fa-pencil-square-o"></i> Edit
								</a>
								<button class="btn btn-danger" data-toggle="modal" data-target=<?php echo '".md-delete' . $row->charge_id . '"'; ?>><i class="fa fa-trash-o"></i> </button>
							</td>
						</tr>
							
					</tbody>

					<div class=<?php echo '"modal fade md-delete' . $row->charge_id . '"'; ?> tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
								        <a href="<?php echo base_url() . "admin/delete_charge/" .  $row->charge_id ?>" class="btn btn-danger" role="button"> 
										Delete
										</a>
								        <button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>
								      </div>
							</div>
						</div>
					</div>
					<?php } ?>		
				</table>
				<div class="modal fade md-add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Addtional Charges</h4>
							</div>

							<div class="modal-body">

								<?php
									echo form_open('admin/add_charge', array('class' => 'form-signin', 'role' => 'form'));
									echo form_label('Name', 'name');
									echo form_input(array('name' => 'name', 'class' => 'form-control', 'placeholder' => 'Type of charges', 'required' => 'required', 'autofocus' => 'autofocus'));
									echo '<br>';
									echo form_label('Cost (%)', 'cost');
									echo form_input(array('name' => 'cost', 'class' => 'form-control', 'placeholder' => 'Cost in percentage (%)', 'required' => 'required'));
									echo '<br>';
								?>
							</div>

							<div class="modal-footer">
								<?php
									echo form_submit(array('name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Add'));
									echo form_close();
									echo '<button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>';
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>