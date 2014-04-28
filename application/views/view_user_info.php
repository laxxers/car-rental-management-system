<!DOCTYPE html>
<html lang="en-US">
 	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

	    <title>Car Rental Management System | Home</title>

	    <!-- Bootstrap core CSS -->
	    <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
	    <link href="<?php echo base_url(); ?>public/css/custom.css" rel="stylesheet">
  	
	<style>
		.sort_asc:after {
			content: "asc";
		}
		.sort_desc:after {
			content: "dsc";
		}
	</style>
	
	</head>
	
	<h1> <span class="label label-primary">Found <?php echo $num_results; ?> users</span></h1>
	
	<div class="table-responsive">
		<table class="table table-striped table-bordered  table-hover">
			<thead>
				<?php foreach($fields as $field_name => $field_display){ ?>
				<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
					<?php 
					echo anchor("admin/user_info/$field_name/" .
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
</html>


