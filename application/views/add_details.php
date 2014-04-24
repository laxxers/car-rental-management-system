<div class="row">
	<div class="col-md-5">
	
		<?php 
			if(validation_errors() != false) {
				echo "
					<div class='alert alert-danger alert-dismissable'>
		  				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		  				<strong>" . validation_errors() . "</strong>
					</div>";
			}
		?>
		
		<?php
			echo form_open('profile/add_details');
			
			echo form_label('Identification Card Number:', 'ic_no');
			echo form_input(array('name' => 'ic_no',
							'class' => 'form-control',
							'value' => set_value('ic_no'),
							'placeholder' => 'IC Number',
							'required' => 'required',
							'autofocus' => 'autofocus'));
			echo '<br>';				
			echo form_label('Driving Licence Number:', 'li_no');
			echo form_input(array('name' => 'li_no',
							'class' => 'form-control',
							'value' => set_value('li_no'),
							'placeholder' => 'Licence Number',
							'required' => 'required',
							'autofocus' => 'autofocus'));
			echo '<br>';
			
			echo form_submit(array('name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Add or Update'));
			
			?>
		
	
	</div>
</div>