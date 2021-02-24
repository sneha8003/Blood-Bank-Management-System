<?php
session_start();
include'../script/script.php';//includes script
include'header.php';
include'sidebar.php';//includes sidebar

$error_message='';
$success='';

// selects the record of the particular logged in user
$request_id =$_SESSION['login'];
$blood_request =$connection->prepare('SELECT * FROM request WHERE username=:username');
$blood_request->execute(['username'=> $request_id]);
?>

            <aside class="right-side">              
                 <!-- displays the path  -->
                <section class="content-header">
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">Request</a></li>
                        <li class="active">View Request</li>
                    </ol>
                </section>
                  
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            $sn=1;
                            foreach ($blood_request as $request) {
                            ?>
                            <div class="box">
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <!-- headings of the table -->
                                        <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Total Bag</th>
                                            <th>Blood Required Date</th>
                                            <th>Request state</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                        </thead>
                                        <tr>
                                        <!-- displays the record -->
                                        <td><?php echo $sn++;?></td>
                                        <td><?php echo $request['total_bag'];?></td> 
                                        <td><?php echo $request['blood_required_date'];?></td> 
                                        <td><?php echo "<p style='color:red;'>" . $request['request_state'] . "</p>";?></td>
                                        <!-- retrieves id of the user to cancel the blood request -->
                                        <td><a href="#confirmation<?= $request['request_id'];?>" class="btn btn-danger" data-toggle="modal"> Cancel Request</a></td>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="confirmation<?= $request['request_id'];?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <!-- dismiss the deletion modal -->
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to cancel blood request?
                                            </div>
                                        <div class="modal-footer">
                                            <div class="col-xs-1">
                                            <!-- dismiss the deletion modal -->
                                                <a class="btn btn-default" data-dismiss="modal">No</a>
                                            </div>
                                            <div class="col-xs-11">
                                            <!-- retrieves the id and directs to the cancel request page of the blood -->
                                            <a href="request_cancel.php?cId=<?php echo $request['request_id']; ?>" class="btn btn-danger btn-ok">Cancel Request</a> 
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                 </div> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </section>
        </aside>
                               