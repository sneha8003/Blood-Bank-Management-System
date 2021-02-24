<?php
include 'header.php';// includes header 
include 'sidebar.php';// includes sidebar

//selects the record from request table
$request=$connection->prepare("SELECT * FROM request ");
$request ->execute();
?>
            <!-- right side -->
            <aside class="right-side">                
                <section class="content-header">
                    <!-- show the path -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active"> Blood Request</li>
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
                                        <tr>
                                            <!-- headings of the column -->  
                                            <th>Username</th>
                                            <th>Total Bag</th>
                                            <th>Required Date</th>
                                            <th>Request State</th>
                                            <th>Action</th>     
                                        </tr>
                                        </thead>

                                        <?php
                                        foreach ($request as $row) {
                                        ?>
                                        <tbody>
                                        <tr>
                                            <!-- displays the record  -->
                                            <td><?php echo $row['username'];?></td>
                                            <td><?php echo $row['total_bag'];?></td>
                                            <td><?php echo $row['blood_required_date'];?></td>
                                            <td><?php echo "<p style='color:red;'>" . $row['request_state'] . "</p>";?></td>
                                            <td>
                                            <!-- retrieves id of the blood request to accept--> 
                                             <a href="#accept<?= $row['request_id'];?>" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus-circle"></i> Accept</a>
                                            </td>
                                        </tr>

                        <div class="modal fade" id="accept<?= $row['request_id'];?>" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <!-- dismiss the modal -->
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure want to accept the blood request?
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-xs-1">
                                        <!-- dismiss the modal -->
                                            <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                                        </div>
                                        <div class="col-xs-11">
                                        <!-- retrieves id and directs to the accept page of the blood request-->
                                            <a href="accept_request.php?reqId=<?= $row['request_id'];?>" class="btn btn-success">Accept</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    </tbody>
                                            <?php
                                            }
                                        ?>
                                         
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>               
            </aside>
