
		<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<?php 
			echo form_open('/login/session', ['id' => 'login', 'class' => 'form-signin well', 'role' => 'form']);
			if($msg != NULL) {
				echo '<div class="alert alert-danger alert-dismissable">
		  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  			<strong>' . $msg . '</strong></div>';
				}
					
			echo form_label('Username', 'username');
			echo form_input(array('name' => 'username', 'class' => 'form-control', 'value' => set_value('username'), 'placeholder' => 'Username', 'required' => 'required', 'autofocus' => 'autofocus'));
			echo '<br>';
			echo form_label('Password', 'password');
			echo form_password(array('name' => 'password', 'class' => 'form-control', 'value' => set_value('password'), 'placeholder' => 'Password', 'required' => 'required'));
			echo '<br>';
			echo form_submit(array('name' => 'submit', 'class' => 'btn btn-default', 'value' => 'Login'));
			echo '&nbsp or ';   
			echo anchor('home/signup', 'create an account');
			echo form_close();

		?>
		</div>
		</div>