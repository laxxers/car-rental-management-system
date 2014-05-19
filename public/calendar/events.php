<?php
$con  = mysqli_connect("localhost","root","","car_rental");

$result = mysqli_query($con,"SELECT * FROM reservation");

$count = 0;
$color = array('event-important',
'event-info',
'event-warning',
'event-inverse',
'event-success',
'event-special'
);

while($row = mysqli_fetch_array($result))
{
	$mysqldate1 = strtotime( $row['pickup'] );
	$phpdate1 = date( 'd-m-Y', $mysqldate1 );
	$ms_phpdate1 = 1000 * strtotime($phpdate1);
	
	$mysqldate2 = strtotime( $row['dropoff']  );
	$phpdate2 = date( 'd-m-Y', $mysqldate2 );
	$ms_phpdate2 = 1000 * strtotime($phpdate2);
	
	$out[] = array(
		
		'id' =>  $row['res_id'],
		'title' => "vehicle with id : " . $row['vehicle_id'],
		'url'=> 'schedule_details/' . $row['pickup'] . "/". $row['dropoff']. "/". $row['vehicle_id'],
		'class' => $color[$count],
		'start' => $ms_phpdate1,
		'end' => $ms_phpdate2
	);
	
	$count++;
	if($count % 5 == 0)
		$count = 0;
	
	
}

echo json_encode(array('success' => 1, 'result' => $out));
?>