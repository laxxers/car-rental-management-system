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
                                <span class="pull-right text-muted small">
								<em>
									<?php
										$q = $this->db->query("SELECT COUNT( accounttype ) as count  FROM users WHERE accounttype =  'admin'") ;
										$tmp = $q->result();
										echo $tmp[0]->count;
									?>
								</em>
                                </span>
                            </a>
                            <a href="#" class="list-group-item">
                                Registered Members
                                <span class="pull-right text-muted small">
								<em>
									<?php
										$q = $this->db->query("SELECT COUNT( accounttype ) as count  FROM users WHERE accounttype =  'user'") ;
										$tmp = $q->result();
										echo $tmp[0]->count;
									?>
								</em>
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
