<?php
ob_start();
include '../connection/db_connection.php';//connection to database

if (isset($_GET['dId'])) {
	//delete from registers table where delete id and id matches
	$del_user=$connection->prepare("DELETE FROM registers WHERE id=:dId");
//if deletion is executed
if ($del_user->execute($_GET)) {
		header('location:view_user.php');//directs to the page where user records are displayed

	}
}
ob_flush();
?>