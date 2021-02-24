<?php
ob_start();
include '../connection/db_connection.php';//connection to database

if (isset($_GET['archiveId'])) {
	// updates the column of the archive stock at blood stock database table
    $archive_stock = $connection->prepare("UPDATE blood_stock SET archive_stock=:archive_stock WHERE blood_stock_id=:archiveId");

    $stock=[
    	'archiveId'=>$_GET['archiveId'],
    	// the value is set
        'archive_stock'=>'yes'
    ];
	if($archive_stock->execute($stock)){
	// directs to page where stock are displayed
	header('location:view_stock.php');
}
}
ob_flush();
?>
