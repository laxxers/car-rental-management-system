
<!DOCTYPE html>
<html lang="en">
 	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

	    <title>Car Rental Management System | Home</title>

	    <!-- Bootstrap core CSS -->
	    <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
	    <link href="<?php echo base_url(); ?>public/css/custom.css" rel="stylesheet">
  	</head>

	  <body>

	    <!-- Fixed navbar -->
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
			    <div class="navbar-header">
			       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			          	<span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			        </button>
			        <a class="navbar-brand" href="#">Project name</a>
			    </div>  

			    <div class="collapse navbar-collapse">
			        <a href="#" class="btn btn-primary btn-success navbar-btn navbar-right">Sign in</a>
			    </div><!--/.nav-collapse -->

			</div>
		</div>	

    <!-- Container -->
    <div class="container">
    	<h1>Home page</h1>
		<?php 
			echo form_open('home/login', ['class' => 'form-signin', 'role' => 'form']);
			if($msg != NULL) {
				echo '<div class="alert alert-warning alert-dismissable">
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


	
	<hr>

	<footer>
        <p>&copy; Company 2014</p>
      </footer>
	</body>

	</div>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
</html>