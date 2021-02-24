<?php
ob_start();
include '../connection/db_connection.php';//connection to database
if (isset($_GET['dId'])) {
	//delete from blood_stock table where delete id and id matches
	$del_stock=$connection->prepare("DELETE FROM blood_stock WHERE blood_stock_id=:dId");
	//if deletion is executed
if ($del_stock->execute($_GET)) {
		header('location:view_stock.php');//directs to the page where stocks are displayed

	}
}
ob_start();
?>