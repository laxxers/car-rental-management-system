<!DOCTYPE html>
<html lang="en">
 	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>Car Rental Management System | Home</title>

	    <!-- Bootstrap core CSS -->
	    <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
	    <link href="<?php echo base_url(); ?>public/css/custom.css" rel="stylesheet">
	    <!-- Datapicker -->
	    <link href="<?php echo base_url(); ?>public/css/datepicker.css" rel="stylesheet">
	    <!-- Font Awesome -->
	    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
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
								
			    <div class="collapse navbar-collapse">
			    	<ul class="nav navbar-nav">
						
						<li><a href="<?php echo base_url();?>"><i class="fa fa-home fa-lg"></i> Home</a></li>
						
						<?php 
							$session = $this->session->userdata("loggedIn");
							$user_id = $this->session->userdata("user_id");
							$sql = mysql_query("SELECT accounttype FROM users WHERE user_id='$user_id'");
							$row = mysql_fetch_array($sql);
							$accounttype = $row["accounttype"];
							
							if($session && $accounttype == 'admin')
							{
								echo "
									<li><a href='" . base_url() . "profile'><i class='fa fa-user fa-lg'></i> Dashboard</a></li>
		               				<li><a href='" . base_url() . "gallery'><i class='fa fa-archive fa-lg'></i> Gallery</a></li>
									<li><a href='" . base_url() . "admin'><i class='fa fa-cogs fa-lg'></i> Admin  </a></li>
									";
							}
							else if ($session && $accounttype == 'user')
							{
								echo "
									<li><a href='" . base_url() . "profile'><i class='fa fa-user fa-lg'></i> Dashboard</a></li>
									<li><a href='" . base_url() . "gallery'><i class='fa fa-archive fa-lg'></i> Gallery</a></li>
									";
							}
						?>
						<!--
						<li><a href="<?php //echo base_url(); ?>gallery"><i class="fa fa-archive fa-lg"></i> Gallery</a></li>
						-->
					</ul>
			    	<ul class="nav navbar-nav navbar-right">
			    		<?php 
			    			$username = $this->session->userdata("username");
							
				    		if($session) {
				    			echo "
					    		<li class='dropdown'>
					    			<a href='#'' class='dropdown-toggle' data-toggle='dropdown'>". $username ." <b class='caret'></b></a>
					    			<ul class='dropdown-menu'>
		               				<li><a href='" . base_url() . "'><i class='fa fa-home'></i> Home</a></li>
		               				<li><a href='" . base_url() . "profile'><i class='fa fa-user'></i> Dashboard</a></li>
		                			<li><a href='" . base_url() . "profile/settings'><i class='fa fa-wrench'></i> Settings</a></li>
		                			<li class='divider'></li>
		                			<li><a href='" . base_url() . "home/logout'><i class='fa fa-power-off'></i> Logout</a></li>
		              				</ul>
					    		</li>";

				    		}
							else {
				    			echo "<a href=' " . base_url() . "login' class='btn btn-primary btn-success navbar-btn navbar-right'>Sign in</a>";
				    		}
			    		?>
			    	</ul>
			    	
			    </div><!--/.nav-collapse -->

			</div>
		</div>	

    	<!-- Container -->
		<div class="container">