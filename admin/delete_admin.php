<?php
ob_start();
include '../connection/db_connection.php';//connection to database

if (isset($_GET['dId'])) {
	//delete from registers table where delete id and id matches
	$del_admin=$connection->prepare("DELETE FROM registers WHERE id=:dId");
//if deletion is executed
if ($del_admin->execute($_GET)) {
		header('location:view_admin.php');//directs to the view admin page

	}
}
ob_flush();
?>