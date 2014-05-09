<?php 
$id_update = $this->uri->segment(3);

$sql = mysql_query("SELECT * FROM charge WHERE charge_id= $id_update");
$count = mysql_num_rows($sql);

if ($count > 1) {
	echo "There is no vehicle with that id here.";
	exit();	
}
while($row = mysql_fetch_array($sql))
{
	$name = $row["name"];
	$cost = $row["cost"];
}

?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Update Charge Information</h1>
		</div>		
	</div>	
		<div class="row">
			<div class="col-lg-4">
				<?php
					if(validation_errors() != false) {
						echo "
						<div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>" . validation_errors() . "</strong>
						</div>";
					}
					
					echo form_open("admin/update_charge/$id_update", array('id' => 'edit', 'class' => 'form-signin', 'role' => 'form'));
					echo form_label('Name', 'name');
					echo form_input(array('name' => 'name', 'class' => 'form-control', 'value' => $name, 'placeholder' => 'Type of charge', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_label('Cost (%)', 'cost');

					echo form_input(array('name' => 'cost', 'class' => 'form-control', 'value' => $cost, 'placeholder' => 'Cost in percentage (%)', 'required' => 'required'));
					echo '<br>';
					echo form_submit(array('name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Update'));
					echo form_close();
				?>
			</div>
        </div>
</div>