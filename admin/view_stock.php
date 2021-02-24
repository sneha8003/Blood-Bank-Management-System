<?php
include 'header.php';// includes header 
include 'sidebar.php';// includes sidebar

// donor table and blood table from the database are combined to retrieve the id of the blood
$stock = "SELECT blood_stock.blood_stock_id as blood_stock_id,bag_no,donate_date,expiry_date,
           blood_stock.blood_id,blood.blood_group_name
            as blood_group 

            FROM blood_stock
            JOIN blood ON blood_stock.blood_id = blood.blood_id
            WHERE archive_stock='no' order by expiry_date asc;";

     $blood_stock = $connection->prepare($stock);
     $blood_stock->execute();

?>
            <aside class="right-side">                
                <section class="content-header">
                    <!-- show the path -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">Stock</a></li>
                        <li class="active">View Stock</li>
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
                                            <th>Action</th> 

                                        </tr>
                                        </thead>

                                        <?php
                                        $sn=1;
                                        foreach ($blood_stock as $row) {
                                        ?>

                                        <tr>
                                            <td><?php echo $sn++;?></td>
                                             <!-- displays the record  -->
                                            <td><?php echo $row['bag_no'];?></td>
                                            <td><?php echo $row['donate_date'];?></td>
                                            <td>
                                            <?php
                                            // expiry and current date has been defined
                                            $expiry= $row['expiry_date'];
                                            $current= date("Y-m-d");

                                            // when expiry date of blood passes
                                            if($expiry <= $current){
                                            // displays "expired" message
                                            echo "<p style='color:red;'>" . "Expired" . "</p>";
                                            }
                                            else{
                                            // when expiry date of blood doesnot passes shows the expiry date of blood
                                            echo $row['expiry_date'];
                                            }
                                            ?> 
                                            </td>
                                            
                                            <td><?php echo $row['blood_group'];?></td>
                                            <td>
                                            <!-- retrieves id of the camp to edit--> 
                                             <a href="edit_stock.php?blood_stock_id=<?php echo $row['blood_stock_id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                                            <!-- retrieves id of the camp to archive-->
                                             <a href="#archive<?= $row['blood_stock_id'];?>" class="btn btn-success" data-toggle="modal"><i class="fa fa-minus-circle"></i> Archive</a> 

                                             <!-- retrieves id of the camp to delete-->
                                             <a href="#confirmation<?= $row['blood_stock_id'];?>" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> Delete</a> 
                                         </td>
                                     </tr>

                        <div class="modal fade" id="archive<?= $row['blood_stock_id'];?>" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!-- dismiss the modal -->
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure want to archive the blood stock?
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-xs-1">
                                        <!--dismiss the modal -->
                                            <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                                        </div>
                                        <div class="col-xs-11">
                                        <!-- retrieves the id and directs to the archive page of the blood stock -->
                                            <a href="archive_stock.php?archiveId=<?= $row['blood_stock_id'];?>" class="btn btn-success">Archive</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                                <div class="modal fade" id="confirmation<?= $row['blood_stock_id'];?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <!-- dismiss the modal -->
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure want to delete this blood donor?
                                            </div>
                                        <div class="modal-footer">
                                            <div class="col-xs-1">
                                            <!--dismiss the modal -->
                                                <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                                            </div>
                                            <div class="col-xs-11">
                                            <!-- retrieves the id and directs to the delete page of the blood stock -->
                                            <a href="delete_stock.php?dId=<?= $row['blood_stock_id'];?>" class="btn btn-danger btn-ok">Delete</a> 
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                 </div>
                                    <?php 
                                }?>    
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>              
            </aside>
