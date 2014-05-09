<!DOCTYPE html>
<html>
<head>
	<title>Twitter Bootstrap jQuery Calendar component</title>

	<meta name="description" content="Full view calendar component for twitter bootstrap with year, month, week, day views.">
	<meta name="keywords" content="jQuery,Bootstrap,Calendar,HTML,CSS,JavaScript,responsive,month,week,year,day">
	<meta name="author" content="Serhioromano">
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/calendar/components/bootstrap3/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/calendar/components/bootstrap3/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/calendar/css/calendar.css">
	<script type="text/javascript">

		var js_base_url = function( urlText ){
		var urlTmp = "<?php echo base_url('" + urlText + "'); ?>";
		return urlTmp;
		}
		
		var today_date = function(){
			var today = "<?php echo date("Y-m-d"); ?>";
			return today
		}
		
	</script>
</head>
<body>
<div id="page-wrapper" >
	<div class="container">
		

		<div class="page-header">
			<h3></h3>
			<small>To see example with events navigate to march 2013</small>
		</div>

		<div class="row">
			<div class="col-md-12">
					<div class="btn-group">
						<button class="btn btn-default" data-calendar-nav="prev"><< Prev</button>
						<button class="btn btn-default" data-calendar-nav="today">Today</button>
						<button class="btn btn-default" data-calendar-nav="next">Next >></button>
					</div>
					<div class="btn-group">
						<button class="btn btn-default" data-calendar-view="year">Year</button>
						<button class="btn btn-default active" data-calendar-view="month">Month</button>
						<button class="btn btn-default" data-calendar-view="week">Week</button>
						<button class="btn btn-default" data-calendar-view="day">Day</button>
					</div>
			</div>
			<div class="col-md-12">
				<div id="calendar"></div>
			</div>
			
		</div>

		<div class="clearfix"></div>
		<br><br>
		
		<div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Event</h4>
					</div>
					<div class="modal-body" style="height: 400px">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		
		<script type="text/javascript" src="<?php echo base_url(); ?>public/calendar/components/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public/calendar/components/bootstrap3/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public/calendar/components/underscore/underscore-min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public/calendar/components/jstimezonedetect/jstz.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public/calendar/js/calendar.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>public/calendar/js/app.js"></script>
		
		
		
	</div>
</div>
</body>
</html>
