<?php
$con  = mysqli_connect("localhost","root","","car_rental");

$result = mysqli_query($con,"SELECT * FROM reservation");

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
		'title' => $row['vehicle_id'],
		// 'url'=> 'http://www.example.com/',
		// 'class' => 'event-important',
		'start' => $ms_phpdate1,
		'end' => $ms_phpdate2
	);
}

echo json_encode(array('success' => 1, 'result' => $out));
?>