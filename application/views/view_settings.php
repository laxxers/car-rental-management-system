<h1>Settings</h1>
<hr>

<div class="row">
	<div class="col-xs-12 col-md-3">
		<ul class="nav nav-pills nav-stacked" id="settingsPills">
		  	<li class="active"><a href="#account" data-toggle="tab">Account</a></li>
		  	<li><a href="#profile" data-toggle="tab">Profile</a></li>
		  	<li><a href="#verification" data-toggle="tab">Verification</a></li>
		</ul>
	</div>
	
	<div class="col-xs-12 col-md-9">

		<!-- All the messages/errors, including success, validation, upload -->
		<?php
			if($msg != NULL) {
				echo "
					<div class='alert alert-success alert-warning'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>" . $msg . "</strong>
					</div>";
				}

			if(validation_errors() != false) {
				echo "
					<div class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>" . validation_errors() . "</strong>
					</div>";
			}

			if(isset($error)) {
				echo '
					<div class="alert alert-danger alert-dismissable">
		  				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  				<strong>' . $error . '</strong>
		  			</div>';
			} 
		?>
		
	</div>
	<div class="col-xs-12 col-md-9">
		<div class="tab-content">
		  	<div class="tab-pane active" id="account">
		  		<?php 
					$status = $this->session->userdata('loggedIn');
					$id = $this->session->userdata('id');
					$username = $this->session->userdata('username');						
					if($status) {
						$sql = mysql_query("SELECT * FROM users WHERE id='$id' LIMIT 1");
						$count = mysql_num_rows($sql);
						if ($count > 1) {
							echo "There is no user with that id here.";
							exit();	
						}
						while($row = mysql_fetch_array($sql))
						{
							$first_name = $row["first_name"];
							$last_name = $row["last_name"];
							$gender = $row["gender"];
							$email_address = $row["email_address"];
							$signupdate = strftime("%d %b %Y", strtotime($row['signupdate']));
							$accounttype = $row["accounttype"];
						}
					} 
				?>
				<h3>Account</h3>
				<p class="help-block">Change your basic account settings.</p>
				<hr>
				<?php
					echo form_open('profile/edit', array('id' => 'edit', 'class' => 'form-signin', 'role' => 'form'));
					echo form_label('First Name', 'first_name');
					echo form_input(array('name' => 'first_name', 'class' => 'form-control', 'value' => $first_name, 'required' => 'required', 'autofocus' => 'autofocus'));
					echo '<br>';
					echo form_label('Last Name', 'last_name');
					echo form_input(array('name' => 'last_name', 'class' => 'form-control', 'value' => $last_name, 'required' => 'required'));
					echo '<br>';
					echo form_label('Email Address', 'email_address');
					echo form_input(array('name' => 'email_address', 'class' => 'form-control', 'value' => $email_address, 'required' => 'required'));
					echo '<br>';
					echo form_submit(array('name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Submit Changes'));
					echo '</form>';
				?>
		  	</div>

		  	<div class="tab-pane" id="profile">
		  		<h3>Profile</h3>
				<p class="help-block">This information appears on your public profile.</p>
				<hr>
		  		
				<?php 
					$id = $this->session->userdata('id');
					echo "<img src='" . base_url() . "pic/" . $id ."/pic1.jpg' class='img-thumbnail' alt ='Profile Picture' width='250'/>";
					echo '<br>';
					echo form_open_multipart('profile/do_upload');
					echo '<br>';
					echo form_upload(array('name' => 'userfile', 'size' => '20'));
					echo '<br>';
					echo form_submit(array('name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Upload'));
				?>
				<br />
		

				</form>
		  	</div>

		  	<div class="tab-pane" id="verification">
				<h3>Verification</h3>
				<p class="help-block">Update your details to verify your account.</p>
				<hr>
				<?php

					echo form_open('profile/verify', array('id' => 'verify', 'class' => 'form-signin', 'role' => 'form'));
					
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
									'required' => 'required'));
					echo '<br>';
					
					echo form_submit(array('name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Verify'));
					echo '</form>';
				?>

		  	</div>

		</div>
	</div>

</div>
<script>
  $(function () {
    $('#settingsPills a:last').tab('show')
  })
</script>