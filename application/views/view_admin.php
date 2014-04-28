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
                
                
				<a href="<?php echo base_url(); ?>" class="btn btn-success navbar-btn navbar-right" style="margin-left: 25px;"><span class="glyphicon glyphicon-home"></span> Back to Home</a>		 
            </div>
            <!-- /.navbar-header -->
            	
            <div class="navbar-default navbar-static-side" role="navigation">

                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                    	<li>
                    		<center>
                    			<img src="pic/1/pic1.jpg" class="img-thumbnail" alt ="Profile Picture" width="200" style="margin: 20px;"/>
	                    		<h3><strong>Nicole Charley</strong></h3>
	                    		<h4><i>'admin'</i><h4>
	                    			<br>
                    		</center>
                    	</li>
                        <li>
                            <a href="#"> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"> User Management</a>
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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registered Users' Information
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs">
                                        <a href="<?php echo base_url();?>admin/user_info"><span class="glyphicon glyphicon-edit"></span> 
										View All</a>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
							<?php 
							
								$tmpl = array ( 'table_open'  => '<table class="table table-bordered table-hover table-striped">' );
								$this->table->set_template($tmpl);

								$this->table->set_heading('#', 'First Name', 'Last Name', 'Username','Email Address','Account Type','Verified');
								
								$query = $this->db->query("SELECT id,first_name,last_name,username,email_address,accounttype,verified FROM users LIMIT 5");

								echo $this->table->generate($query);
							
							?>
						</div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Vehicle Inventory
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-edit"></span> View All   
                                    </button>
                                </div>
                            </div>
                        </div>
                             
							<div class="table-responsive">
								<table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>3326</td>
                                            <td>10/21/2013</td>
                                            <td>3:29 PM</td>
                                            <td>$321.33</td>
                                        </tr>
                                        <tr>
                                            <td>3325</td>
                                            <td>10/21/2013</td>
                                            <td>3:20 PM</td>
                                            <td>$234.34</td>
                                        </tr>
                                        <tr>
                                            <td>3324</td>
                                            <td>10/21/2013</td>
                                            <td>3:03 PM</td>
                                            <td>$724.17</td>
                                        </tr>
                                        <tr>
                                            <td>3323</td>
                                            <td>10/21/2013</td>
                                            <td>3:00 PM</td>
                                            <td>$23.71</td>
                                        </tr>
                                        <tr>
                                            <td>3322</td>
                                            <td>10/21/2013</td>
                                            <td>2:49 PM</td>
                                            <td>$8345.23</td>
                                        </tr>
                                        <tr>
                                            <td>3321</td>
                                            <td>10/21/2013</td>
                                            <td>2:23 PM</td>
                                            <td>$245.12</td>
                                        </tr>
                                        <tr>
                                            <td>3320</td>
                                            <td>10/21/2013</td>
                                            <td>2:15 PM</td>
                                            <td>$5663.54</td>
                                        </tr>
                                        <tr>
                                            <td>3319</td>
                                            <td>10/21/2013</td>
                                            <td>2:13 PM</td>
                                            <td>$943.45</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Summary
                        </div>
 
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    Admin Users
                                    <span class="pull-right text-muted small"><em>1</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    Registered Members
                                    <span class="pull-right text-muted small"><em>21</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    Available Vehicles
                                    <span class="pull-right text-muted small"><em>23</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    Rented Vehicles
                                    <span class="pull-right text-muted small"><em>45</em>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Active Admin Users
                        </div>
                        <div class="panel-body">
                            <a href="#" class="btn btn-default btn-block">View Details</a>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script>
    	//Loads the correct sidebar on window load,
		//collapses the sidebar on window resize.
	    $(function() {
	    $(window).bind("load resize", function() {
	        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
	        if (width < 768) {
	            $('div.sidebar-collapse').addClass('collapse')
	        } else {
	            $('div.sidebar-collapse').removeClass('collapse')
	        }
	    })
		})
    </script>

</body>

</html>
