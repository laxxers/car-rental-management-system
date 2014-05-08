<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>
    <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/admin_custom.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	
</head>



<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>admin">Admin Panel</a>
                
            </div>
            <!-- /.navbar-header -->
	
            <?php
                //Set default display picture
                $user_id = $this->session->userdata("user_id");
                $path = base_url() . "public/upload/profile/" . $user_id . "/pic1.jpg";
                if(!file_exists($path)) {
                    $display = base_url() . "public/upload/profile/default.jpg";
                } else {
                    $display = $path;
                }
            ?>
			
            <div class="navbar-default navbar-static-side" role="navigation">

                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
						<li>
							<a href="<?php echo base_url();?>"><i class="fa fa-home fa-lg"></i> Back To Home </a>
						</li>
                    	<li>
                    		<center>
                    			<img src="<?php echo $display ?>" class="img-thumbnail" alt ="Profile Picture" width="200" style="margin: 20px;"/>
	                    		<h3><strong>Nicole Charley</strong></h3>
	                    		<h4><i>'admin'</i><h4>
	                    			<br>
                    		</center>
                    	</li>
                        <li>
                            <a href="<?php echo base_url();?>admin"> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/user"> User Management</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/getAll_vehicle"> Vehicle Inventory</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/package"> Package & Charges</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/schedule"> Rental Schedule</a>
                        </li>
                    </ul>
                    <!--
					<center><a href="<?php //echo base_url(); ?>" class="btn btn-success" style="margin-top:15px; "><i class="fa fa-home"></i> Back to Home</a></center>
					-->
				</div>
            </div>
        </nav>
