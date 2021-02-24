<?php
ob_start();
include '../connection/db_connection.php';//connection to database

if (isset($_GET['dId'])) {
	//delete from donation camp table where delete id and id matches
	$del_camp=$connection->prepare("DELETE FROM donation_camp WHERE camp_id=:dId");
//if deletion is executed
if ($del_camp->execute($_GET)) {
		header('location:view_camp.php');//directs to the view camp page

	}
}
ob_flush();
?>