<?php
include 'header.php';// includes header 
include 'sidebar.php';// includes sidebar

//displays the record of the camp from the donation camp table
$camp=$connection->prepare("SELECT * FROM donation_camp");
$camp ->execute();
?>
            <aside class="right-side">                
                <section class="content-header">
                    <!-- show the path -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">Donation Camp</a></li>
                        <li class="active">View Camp</li>
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
                                            <th>Organization</th>  
                                            <th>Location</th> 
                                            <th>Date and Time</th>  
                                            <th>Action</th>  
                                        </tr>
                                        </thead>

                                        <!-- numbering starts from numeber 1 -->
                                        <?php
                                        $sn=1;
                                        foreach ($camp as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $sn++;?></td><!-- the serial number increases -->
                                            <!-- displays the record  -->
                                            <td><?php echo $row['organization'];?></td>
                                            <td><?php echo $row['location'];?></td>
                                            <td><?php echo $row['date_time'];?></td>
                                            <td>
                                              <!-- retrieves id of the camp to edit--> 
                                             <a href="edit_camp.php?camp_id=<?php echo $row['camp_id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                             <!-- retrieves id of the camp to delete-->
                                              <a href="#confirmation<?= $row['camp_id'];?>" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> Delete</a> 
                                             </td>
                                        </tr>
                                        
                                 <!-- modal to confirm the deletion of the donation camp-->     
                                <div class="modal fade" id="confirmation<?= $row['camp_id'];?>" role="dialog">
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
                                              <!-- dismiss the modal -->
                                                <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                                            </div>
                                            <div class="col-xs-11">
                                            <!-- retrieves id and directs to the delete page of the camp-->
                                            <a href="delete_camp.php?dId=<?= $row['camp_id'];?>" class="btn btn-danger btn-ok">Delete</a>
                                            </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php }?>
                  </table>
              </div>
          </div>
      </div>
  </div>
</section>
</aside>