<?php 
$id_update = $this->uri->segment(3);

$sql = mysql_query("SELECT * FROM vehicle WHERE id= $id_update");
$count = mysql_num_rows($sql);

if ($count > 1) {
	echo "There is no vehicle with that id here.";
	exit();	
}
while($row = mysql_fetch_array($sql))
{
	$type = $row["type"];
	$name = $row["name"];
	$transmission = $row["transmission"];
	$ac = $row["ac"];
	$capacity = $row["capacity"];
	$luggage = $row["luggage"];
	$daily = $row["daily"];
}

?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Update Vehicle Information</h1>
		</div>		
	</div>	
		<!-- Not working, just a template -->
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
					
					if($msg != NULL) {
						echo "
						<div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>" . $msg . "</strong>
						</div>";
					}
					
					echo form_open_multipart("admin/update_vehicle/$id_update", array('id' => 'edit', 'class' => 'form-signin', 'role' => 'form'));
					// picture
					// $q = $this->db->query('SELECT id FROM vehicle');
					// $id = $q->last_row()->id;
					// $path = base_url() . "public/car/" . $id_update . ".jpg";
					
					// if(!file_exists($path)) {
						$display = base_url() . "public/car/$id_update.jpg";
					// } else {
						// $display = $path;
					// }
					echo "<img src='" . $display . "' class='img-thumbnail' alt ='Car Picture' width='250'/>";
					echo '<br>';
					echo form_input(array('name' => 'userfile', 'type' => 'file')); 
					echo '<br>';
					// picture
					echo form_label('Type', 'type');
					$options = array(
						'Compact'=>'Compact',
						'Standard'=>'Standard',
						'Luxury'=>'Luxury',
						'MPV'=>'MPV',
						'Van'=>'Van'
					);
					echo form_dropdown('type', $options, $type, 'class="form-control"');
					echo '<br>';
					echo form_label('Name', 'name');
					echo form_input(array('name' => 'name', 'class' => 'form-control', 'value' => $name, 'placeholder' => 'Eg: Perodua Viva', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_label('Transmission', 'transmission');
					$options = array(
						'Auto'=>'Auto',
						'Manual'=>'Manual'
					);
					echo form_dropdown('transmission', $options ,$transmission, 'class="form-control"');					
					echo '<br>';
					echo form_label('Air Conditioning', 'ac');
					$options = array(
						'1'=>'Yes',
						'0'=>'No'
					);
					echo form_dropdown('ac', $options, $ac, 'class="form-control"');	
					echo '<br>';
					echo form_label('Capacity', 'capacity');
					echo form_input(array('name' => 'capacity', 'class' => 'form-control', 'value' => $capacity, 'placeholder' => 'Number of Passenger', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_label('Luggage', 'luggage');
					echo form_input(array('name' => 'luggage', 'class' => 'form-control', 'value' => $luggage, 'placeholder' => 'Number of Luggage', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_label('Daily', 'daily');
					echo form_input(array('name' => 'daily', 'class' => 'form-control', 'value' => $daily, 'placeholder' => 'Daily Price', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_submit(array('name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Update'));
					echo form_close();
				?>
			</div>
        </div>
</div>