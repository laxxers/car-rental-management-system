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
			<h1 class="page-header">User Management</h1>
			
			<h4> Found <?php echo $num_results; ?> Users</h4>
				
			<div class="table-responsive">
				<table class="table table-striped table-bordered  table-hover">
					<thead>
						<?php foreach($fields as $field_name => $field_display){ ?>
						<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
							<?php 
							echo anchor("admin/user/$field_name/" .
								(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc') ,
								$field_display); ?>
								
						</th>
						<?php } ?>
					</thead>
					
					<tbody>
						<?php foreach($users as $user){ ?>
						<tr >
							<?php foreach($fields as $field_name => $field_display){ ?>
							<td >
								<?php echo $user->$field_name; ?>
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


