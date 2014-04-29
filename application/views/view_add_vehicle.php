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
					echo form_open('admin/add_vehicle', array('id' => 'edit', 'class' => 'form-signin', 'role' => 'form'));
					echo form_label('Type', 'type');
					echo form_input(array('name' => 'type', 'class' => 'form-control', 'value' => set_value('type'), 'placeholder' => 'Type', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_label('Name', 'name');
					echo form_input(array('name' => 'name', 'class' => 'form-control', 'value' => set_value('name'), 'placeholder' => 'Name', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_label('Transmission', 'transmission');
					echo form_input(array('name' => 'transmission', 'class' => 'form-control', 'value' => set_value('transmission'), 'placeholder' => 'Transmission', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_label('AC', 'ac');
					echo form_input(array('name' => 'ac', 'class' => 'form-control', 'value' => set_value('ac'), 'placeholder' => 'AC', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_label('Capacity', 'capacity');
					echo form_input(array('name' => 'capacity', 'class' => 'form-control', 'value' => set_value('capacity'), 'placeholder' => 'Capacity', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_label('Luggage', 'luggage');
					echo form_input(array('name' => 'luggage', 'class' => 'form-control', 'value' => set_value('luggage'), 'placeholder' => 'Luggage', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_label('Daily', 'daily');
					echo form_input(array('name' => 'daily', 'class' => 'form-control', 'value' => set_value('daily'), 'placeholder' => 'Daily', 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_submit(array('name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Add'));
					echo form_close();
					
				// 'id' => 'ID',
				// 'type' => 'Type ',
				// 'name' => 'Name',
				// 'transmission' => 'Transmission',
				// 'ac' => 'AC',
				// 'capacity' => 'Capacity',
				// 'luggage' => 'Luggage',
				// 'daily' => 'Daily'
				?>
			</div>
        </div>
</div>