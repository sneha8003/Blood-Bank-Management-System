<?php
include 'header.php';// includes header 
include 'sidebar.php';// includes sidebar

// combines the table for id of the blood and selects the row which archive stock column contains yes value 
$stock = "SELECT blood_stock.blood_stock_id as blood_stock_id,bag_no,donate_date,expiry_date,
           blood_stock.blood_id,blood.blood_group_name
            as blood_group 

            FROM blood_stock
            JOIN blood ON blood_stock.blood_id = blood.blood_id
            WHERE archive_stock='yes';";

     $view_stock = $connection->prepare($stock);
     $view_stock->execute();
?>

<aside class="right-side">                
                <section class="content-header">
                    <!-- show the path -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">Stock</a></li>
                        <li class="active">View Archived Stock</li>
                    </ol>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <!-- table for displaying the records -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <!-- headings of the column -->
                                        <tr>
                                            <th>SN</th> 
                                            <th>Bag Number</th>  
                                            <th>Donation Date</th>  
                                            <th>Expiry Date</th> 
                                            <th>Blood Group</th> 
                                        </tr>
                                        </thead>

                                        <?php
                                        $sn=1;
                                        foreach ($view_stock as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $sn++;?></td>
                                             <!-- displays the record  -->
                                            <td><?php echo $row['bag_no'];?></td>
                                            <td><?php echo $row['donate_date'];?></td>
                                            <td>
                                            <?php
                                            // current and exipry date is defined
                                            $expiry= $row['expiry_date'];
                                            $current= date("Y-m-d");

                                            // checks whether expiry date is less or equals to the current date
                                            if($expiry <= $current){
                                            echo "<p style='color:red;'>" . "Expired" . "</p>";
                                            }
                                            else{
                                            // displays the expiry date
                                            echo $row['expiry_date'];
                                            }
                                            ?> 
                                            </td>
                                            <td><?php echo $row['blood_group'];?></td>
                                    </tr>
                                <?php }?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </aside>