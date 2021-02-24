<?php
ob_start();
include 'header.php';//includes header
include 'sidebar.php';//includes sidebar

if (isset($_POST['edits'])) {
     //store the updated data in donation_camp table of the database
    $edit_camp = $connection->prepare("UPDATE donation_camp SET organization=:organization, location=:location, date_time=:date_time WHERE camp_id = :camp_id");
    $camp=[
        'camp_id'=>$_POST['camp_id'],
        'organization'=>$_POST['new_organization'],
        'location'=>$_POST['new_location'],
        'date_time'=>$_POST['date_time']

    ];
    $edit_camp->execute($camp);
    header('location:view_camp.php');//directs to page which displays the camp details
}
if (isset($_GET['camp_id'])) {
    //select the id of camp from donation_camp table
    $edit_camp = $connection->prepare("SELECT * FROM donation_camp WHERE camp_id = :camp_id");
    $edit_camp->execute($_GET);
    $donation_camp = $edit_camp->fetch();//fetch the data and store in the variable
}
ob_flush();
?>
            <!-- right side -->
            <aside class="right-side">
                <section class="content-header">
                    <!-- show the path -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Donation Camp</li>
                        <li class="active">View Camp</li>
                        <li class="active">Edit Camp</li>
                    </ol>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <form role="form" method="POST">
                                    <div class="box-body">
                                        <!-- without the value in every fields the record donot gets submitted -->
                                        <div class="form-group">
                                        <!-- id is retrieved from the database which is hidden -->
                                        <input type="hidden" name="camp_id" value ="<?php echo $_GET['camp_id']?>">
                                        </div>

                                         <div class="form-group">
                                            <label for="organization1">Organization</label>
                                            <!-- stored organization name is retrieved in the textbox and data in the textbox can be changed-->
                                            <input type="text" name="new_organization" value="<?php echo $donation_camp['organization']?>" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="location1">Location</label>
                                            <!-- stored location is retrieved in the textbox and data in the textbox can be changed-->
                                            <input type="location" name="new_location" value="<?php echo $donation_camp['location']?>" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                        <label>Date and time range:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <!-- icon of the clock in the input box -->
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <!-- stored date and time is retrieved in the textbox and date can be changed-->
                                         <input type="text" name="date_time" class="form-control pull-right" id="reservationtime" value="<?php echo $donation_camp['date_time'];?>" required>
                                        </div>
                                    </div>
                                    
                                     <!-- edits to the database when submit button is pressed--> 
                                    <div class="box-footer">
                                        <button type="submit" name="edits" value="edits" class="btn btn-primary">Submit</button>
                                    </div>
                                                            
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                </section>
            </aside>
