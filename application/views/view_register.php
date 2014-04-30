	<div class="row">
	<div class="col-xs-12 col-md-5">
		<h1>Create an Account</h1>
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
	
		<fieldset>
		<legend>Personal Information</legend>
			<?php
			echo form_open('/register/create_user', array('id' => 'personal_info', 'class' => 'form-signin', 'role' => 'form'));
			echo form_label('First Name', 'first_name');
			echo form_input(array('name' => 'first_name', 'class' => 'form-control', 'value' => set_value('first_name'), 'placeholder' => 'First Name', 'required' => 'required', 'autofocus' => 'autofocus'));
			echo '<br>';
			echo form_label('Last Name', 'last_name');
			echo form_input(array('name' => 'last_name', 'class' => 'form-control', 'value' => set_value('last_name'), 'placeholder' => 'Last Name', 'required' => 'required'));
			echo '<br>';
			echo form_label('Gender', 'gender');
			echo '<br>';
			echo "<label class='radio-inline'>";
			echo form_radio(array('name' => 'gender', 'value' => 'male', 'checked' => 'checked'));
			echo "Male";
			echo "</label>";
			echo "<label class='radio-inline'>";
			echo form_radio(array('name' => 'gender', 'value' => 'female'));
			echo "Female";
			echo "</label>";
			echo '<br><br>';
			echo form_label('Email Address', 'email_address');
			echo form_input(array('name' => 'email_address', 'class' => 'form-control', 'value' => set_value('email_address'), 'placeholder' => 'Email Address', 'required' => 'required'));
			echo '<br>';
			?>
		</fieldset>

		<fieldset>
			<legend>Login Info</legend>
			<?php
			echo form_open('/register/create_user', array('id' => 'login_info', 'class' => 'form-signin', 'role' => 'form'));
			echo form_input(array('name' => 'accounttype', 'class' => 'hidden', 'value' => 'user'));
			echo form_input(array('name' => 'verified', 'class' => 'hidden', 'value' => '0'));
			//echo 'Account Type:';
			//$options = array(
			//	'admin'  => 'Admin',
			//	'user'    => 'User'
			//);
			//echo form_dropdown('accounttype', $options, 'admin');
			echo form_label('Username', 'username');
			echo form_input(array('name' => 'username', 'class' => 'form-control', 'value' => set_value('username'), 'placeholder' => 'Username', 'required' => 'required'));
			echo '<br>';
			echo form_label('Password', 'password');
			echo form_password(array('name' => 'password', 'class' => 'form-control', 'value' => set_value('password'), 'placeholder' => 'Password', 'required' => 'required'));
			echo '<br>';
			echo form_label(' Password Confirmation', 'password2');
			echo form_password(array('name' => 'password2', 'class' => 'form-control', 'value' => set_value('password2'), 'placeholder' => 'Password Confirmation', 'required' => 'required'));
			echo '<br>';
			echo form_submit(array('name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Sign up!'));
			?>
		</fieldset>
	</div>
	</div>
