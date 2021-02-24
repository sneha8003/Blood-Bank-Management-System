<?php
ob_start();
include '../connection/db_connection.php';//connection to database

if (isset($_GET['dId'])) {
	//delete from donors table where delete id and id matches
	$del_donor=$connection->prepare("DELETE FROM donors WHERE donor_id =:dId");
	//if deletion is executed
	if ($del_donor->execute($_GET)) {
		header('location:view_donorInformation.php');//directs to the page where donors records are displayed

	}
}
ob_flush();
?>