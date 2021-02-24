<?php
ob_start();
include '../connection/db_connection.php';//connection to database

if (isset($_GET['reqId'])) {
	//updates the value to request state column of request database table
    $request_state = $connection->prepare("UPDATE request SET request_state=:request_state WHERE request_id=:reqId");

    $state=[
    	'reqId'=>$_GET['reqId'],
    	// sets the value
        'request_state'=>'Accepted'
    ];
	if($request_state->execute($state)){
	// directs to the page where blood request are displayed
	header('location:view_blood_request.php');
}
}
ob_flush();
?>


