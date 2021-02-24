<?php
ob_start();
include '../connection/db_connection.php';//connection to database

if (isset($_GET['cId'])) {
	//updates the value to request state column of request database table
    $request_state = $connection->prepare("UPDATE request SET request_state=:request_state WHERE request_id=:cId");

    $state=[
        'cId'=>$_GET['cId'],
        // sets the value
        'request_state'=>'Request Cancelled'
    ];
    if($request_state->execute($state)){
    // directs to view request page
    header('location:view_request.php');
}
}
ob_flush();
?>

