<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>
    <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/admin_custom.css" rel="stylesheet">
	
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
                
				<a href="<?php echo base_url(); ?>" class="btn btn-success navbar-btn navbar-right" style="margin-left: 20px;"><span class="glyphicon glyphicon-home"></span> Back to Home</a>		 
            </div>
            <!-- /.navbar-header -->
            <?php
                //Set default display picture
                $id = $this->session->userdata("id");
                $path = base_url() . "public/upload/profile/" . $id . "/pic1.jpg";
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
                            <a href="<?php echo base_url();?>admin/user_info"> User Management</a>
                        </li>
                        <li>
                            <a href="#"> Vehicle Inventory</a>
                        </li>
                        <li>
                            <a href="#"> Package & Charges</a>
                        </li>
                        <li>
                            <a href="#"> Rental Schedule</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
