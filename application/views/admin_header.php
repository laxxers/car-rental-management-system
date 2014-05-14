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
                $status = $this->session->userdata('loggedIn');
                $user_id = $this->session->userdata('user_id');
                $username = $this->session->userdata('username');
                
                // echo '<pre>';
                // print_r($this->session->all_userdata());
                // echo '</pre>';

                if($status) {
                    $sql = mysql_query("SELECT * FROM users WHERE user_id='$user_id' LIMIT 1");
                    $count = mysql_num_rows($sql);
                    if ($count > 1) {
                        echo "There is no user with that id here.";
                        exit(); 
                    }
                    while($row = mysql_fetch_array($sql))
                    {
                        $first_name = $row["first_name"];
                        $last_name = $row["last_name"];
                        $username = $row["username"];
                        $gender = $row["gender"];
                        $email_address = $row["email_address"];
                        $signupdate = strftime("%d %b %Y", strtotime($row['signupdate']));
                        $ic_no = $row["ic_no"];
                        $li_no = $row["li_no"];
                        $accounttype = $row["accounttype"];
                        $verified = $row["verified"];
                    }
                } 
            ?>
            
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
	                    		<h3><strong><?php echo $first_name . " " . $last_name; ?></strong></h3>
	                    		<h4><i><?php echo "'" . $accounttype . "'"; ?></i><h4>
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
