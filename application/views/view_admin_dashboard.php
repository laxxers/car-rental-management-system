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
                                    <a href="<?php echo base_url();?>admin/user"><span class="glyphicon glyphicon-edit"></span> 
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
    						
    						$query = $this->db->query("SELECT user_id,first_name,last_name,username,email_address,accounttype,verified FROM users LIMIT 5");

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
                                    <a href="<?php echo base_url();?>admin/getAll_vehicle"><span class="glyphicon glyphicon-edit"></span> View All </a>  
                                </button>
                            </div>
                        </div>
                    </div>
                         
    					<div class="table-responsive">
    					<?php 
    				 		$tmpl = array ( 'table_open'  => '<table class="table table-bordered table-hover table-striped">' );
    						$this->table->set_template($tmpl);

    						$this->table->set_heading('ID','Type','Name','Transmission','AC','Capacity','Luggage','Daily');
    						
    						$query = $this->db->query("SELECT vehicle_id,type,name,transmission,ac,capacity,luggage,daily FROM vehicle LIMIT 5");

    						echo $this->table->generate($query);
    					
    					?>
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
                                <span class="pull-right text-muted small">
                                    <em>
                                    <?php
                                        $q = $this->db->query("SELECT COUNT( vehicle_id ) as count  FROM vehicle") ;
                                        $tmp = $q->result();
                                        echo $tmp[0]->count;
                                    ?>
                                    </em>
                                </span>
                            </a>
                            <a href="#" class="list-group-item">
                                Rented Vehicles
                                <span class="pull-right text-muted small">
                                    <em>
                                    <?php
                                        $q = $this->db->query("SELECT COUNT( res_id ) as count  FROM reservation") ;
                                        $tmp = $q->result();
                                        echo $tmp[0]->count;
                                    ?>
                                </em>
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
