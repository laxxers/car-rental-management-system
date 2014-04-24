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
			        <!-- <a class="navbar-brand" href="">Project name</a> -->
			    </div>  
				
				<div class=" nav-collapse">
<<<<<<< HEAD
=======
					<ul class="nav navbar-nav">
						
						<li><a href="<?php echo base_url();?>"><i class="glyphicon glyphicon-home"></i>Home</a></li>
						
						<li><a href='<?php echo base_url();?>Profile/view_profile'><i class="glyphicon glyphicon-user"></i>Profile</a></li>
						
						<li><a href="#"><i class="glyphicon glyphicon-book"></i>Rent-A-Car Booking</a></li>
>>>>>>> b4010189d6a8bce479dea94ff7d551b3aef7b4b6
					
				</div>
				
			    <div class="collapse navbar-collapse">
			    	<ul class="nav navbar-nav">						
						<li><a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
						
						<li><a href="#"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
						
						<li><a href="#"><i class="glyphicon glyphicon-book"></i> Rent-A-Car Booking</a></li>
					
						<li><a href="#"><i class="glyphicon glyphicon-picture"></i> Vehicles Gallery</a></li>					
					</ul>
					
			    	<ul class="nav navbar-nav navbar-right">
			    		<?php 
			    		$session = $this->session->userdata("loggedIn");
			    		$username = $this->session->userdata("username");
			    		if($session) {
			    			echo "
				    		<li class='dropdown'>
				    			<a href='#'' class='dropdown-toggle' data-toggle='dropdown'>". $username ." <b class='caret'></b></a>
				    			<ul class='dropdown-menu'>
	               				<li><a href='" . base_url() . "'>Home</a></li>
	               				<li><a href='" . base_url() . "Profile/view_profile'>Profile</a></li>
	                			<li><a href='" . base_url() . "Profile/add_details'>Add Details</a></li>
	                			<li><a href='" . base_url() . "Profile/do_upload'>Add Picture</a></li>
	                			<li><a href='" . base_url() . "Profile/edit_info'>Settings</a></li>
	                			<li class='divider'></li>
	                			<li><a href='" . base_url() . "home/logout'>Logout</a></li>
	              				</ul>
				    		</li>";

			    		} else {
			    			echo "<a href=' " . base_url() . "login' class='btn btn-primary btn-success navbar-btn navbar-right'>Sign in</a>";
			    		}
			    		?>
			    	</ul>
			    	
			    </div><!--/.nav-collapse -->

			</div>
		</div>	

    	<!-- Container -->
		<div class="container">