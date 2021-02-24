<?php
include 'header.php';// includes header 
include 'sidebar.php';// includes sidebar

//displays the record of the user from the regisers table
$user=$connection->prepare("SELECT * FROM registers WHERE user_type='user'");
$user ->execute();
?>
            <aside class="right-side">   
            <section class="content-header">   
            <!-- show the path   -->        
                 <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">User</a></li>
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
                                            <th>SN</th> 
                                            <th>Name</th>  
                                            <th>Address</th>  
                                            <th>Email Address</th>  
                                            <th>Contact Number</th> 
                                            <th>Date of Birth</th> 
                                            <th>Gender</th> 
                                            <th>Action</th>     
                                        </tr>
                                        </thead>

                                        <?php
                                        $sn=1;
                                        foreach ($user as $row) {
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $sn++;?></td>
                                            <!-- displays the record  -->
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['address'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['contact'];?></td>
                                            <td><?php echo $row['date_of_birth'];?></td>
                                            <td><?php echo $row['gender'];?></td>
                                            <td>
                                        
                                         <!-- retrieves the id of the particular user-->
                                        <a href="#confirmation<?= $row['id'];?>" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> Delete</a> 
                                    </td>
                                </tr>

                                <div class="modal fade" id="confirmation<?= $row['id'];?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <!-- dismiss the modal -->
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete the record?
                                            </div>
                                        <div class="modal-footer">
                                            <div class="col-xs-1">
                                                <!--dismiss the modal -->
                                                <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                                            </div>
                                            <div class="col-xs-11">
                                                <!-- retrieves the id and directs to the delete page of the user-->
                                                <a href="delete_user.php?dId=<?= $row['id'];?>" class="btn btn-danger btn-ok">Delete</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                 </div>
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
