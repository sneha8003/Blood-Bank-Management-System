<?php
include 'header.php';// includes header 
include 'sidebar.php';// includes sidebar

// donor table and blood table from the database are combined to retrieve the id of the blood
    $donor = "SELECT donors.donor_id as donor_id,donor_name,donor_photo,donor_address,donor_email,donor_contact,date_of_birth,donor_gender,
           donors.blood_id,blood.blood_group_name
            as blood_group
            
            FROM donors
            JOIN blood ON donors.blood_id = blood.blood_id;";

     $blood_donor = $connection->prepare($donor);
     $blood_donor->execute();
?>
            <aside class="right-side">                
                <section class="content-header">
                    <!-- show the path -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">Donor</a></li>
                        <li class="active">View Donor</li>
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
                                        <!-- headings of the column for the table-->
                                            <th>SN</th> 
                                            <th>Name</th> 
                                            <th>Photo</th> 
                                            <th>Address</th>  
                                            <th>Email Address</th>
                                            <th>Contact Number</th>
                                            <th>Date of Birth</th>
                                            <th>Blood Group</th>
                                            <th>Gender</th>   
                                            <th>Action</th> 
                                        </tr>
                                        </thead>

                                        <!-- numbering starts from number 1 -->
                                        <?php
                                         $sn =1;
                                        foreach ($blood_donor as $row) {
                                        ?>
                                      
                                        <tr>
                                            <td><?php echo $sn++;?></td>
                                            <!-- displays the record  -->
                                            <td><?php echo $row['donor_name'];?></td>
                                           <td><?php echo '<img style="width: 100px; height:90px;" src="../images/'.$row['donor_photo'].'">';?></td>
                                            <td><?php echo $row['donor_address'];?></td>
                                            <td><?php echo $row['donor_email'];?></td>
                                            <td><?php echo $row['donor_contact'];?></td>
                                            <td><?php echo $row['date_of_birth'];?></td>
                                            <td><?php echo $row['blood_group'];?></td>
                                            <td><?php echo $row['donor_gender'];?></td>
                                            <td>
                                            <!-- retrieves id of the particular donor--> 
                                             <a href="edit_donor.php?donor_id=<?php echo $row['donor_id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                             <!-- retrieves the id of the particular donor-->
                                            <a href="#confirmation<?= $row['donor_id'];?>" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> Delete</a> 
                                            </td>
                                        </tr>

                                <!-- modal to confirm deletion of record-->
                                 <div class="modal fade" id="confirmation<?= $row['donor_id'];?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <!-- dismiss the modal-->
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete?
                                            </div>
                                        <div class="modal-footer">
                                            <div class="col-xs-1">
                                            <!--dismiss the modal -->
                                                <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                                            </div>
                                            <div class="col-xs-11">
                                            <!-- delete button retrieves the id and directs to the delete page of the donor-->
                                            <a href="delete_donor.php?dId=<?= $row['donor_id'];?>" class="btn btn-danger btn-ok">Delete</a> 
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
