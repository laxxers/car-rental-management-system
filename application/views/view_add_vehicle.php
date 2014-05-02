<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add New Vehicle</h1>
            </div>
        </div>
		
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
		?>
		
		<div class="row">
			<div class="col-lg-12">
				<?php
					echo form_open_multipart('admin/add_vehicle', array('id' => 'edit', 'class' => 'form-signin', 'role' => 'form'));
					
					// picture
					$q = $this->db->query('SELECT id FROM vehicle');
					$id = $q->last_row()->id;
					$path = base_url() . "public/car/" . $id+1 . ".jpg";
					
					if(!file_exists($path)) {
						$display = base_url() . "public/car/default.jpg";
					} else {
						$display = $path;
					}
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
					echo form_dropdown('type', $options,'','class="form-control"');
					echo '<br>';
					echo form_label('Name', 'name');
					echo form_input(array('name' => 'name', 'class' => 'form-control', 'value' => set_value('name'), 'placeholder' => 'Eg: Perodua Viva', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_label('Transmission', 'transmission');
					$options = array(
						'Auto'=>'Auto',
						'Manual'=>'Manual'
					);
					echo form_dropdown('transmission', $options,'','class="form-control"');					
					echo '<br>';
					echo form_label('Air Conditioning', 'ac');
					$options = array(
						'1'=>'Yes',
						'0'=>'No'
					);
					echo form_dropdown('ac', $options,'','class="form-control"');	
					echo '<br>';
					echo form_label('Capacity', 'capacity');
					echo form_input(array('name' => 'capacity', 'class' => 'form-control', 'value' => set_value('capacity'), 'placeholder' => 'Number of Passenger', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_label('Luggage', 'luggage');
					echo form_input(array('name' => 'luggage', 'class' => 'form-control', 'value' => set_value('luggage'), 'placeholder' => 'Number of Luggage', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_label('Daily', 'daily');
					echo form_input(array('name' => 'daily', 'class' => 'form-control', 'value' => set_value('daily'), 'placeholder' => 'Daily Price', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_submit(array('name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Add'));
					echo form_close();
				?>
			</div>
        </div>
</div>