<?php
include 'header.php';//includes header
include 'sidebar.php';//includes sidebar

//stores the null value into the variable
$error_message='';
$success='';

if (isset($_POST['submit'])) {
    //inserts into the donation_camp table in the database along with their particular column
    $camp=$connection->prepare("INSERT INTO donation_camp(organization,location,date_time)VALUES(:organization,:location,:date_time)");

    $donation=[
        'organization'=>$_POST['organization'],
        'location'=>$_POST['location'],
        'date_time'=>$_POST['date_time']
    ];

    if($camp->execute($donation)){
    $success ='Inserted Successfully!!';//message is stored into the variale
    }
    else
     $error_message='Not Inserted!!';//message is stored into the varibale
}
?>
    <aside class="right-side">
        <section class="content-header">
            <ol class="breadcrumb">
                <!-- show the path  -->
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Donation Camp</a></li>
                <li class="active">Add Camp</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <?php
                    //error message displayed in the alert box
                    if($error_message != '') {
                        echo "<script>alert('".$error_message."')</script>";
                    }
                    //success message is displayed in the alert box
                    elseif($success != '') {
                        echo "<script>alert('".$success."')</script>";
                    }
                    ?>

                <div class="box box-primary">
                    <form role="form" method="POST">
                        <div class="box-body">
                            <!-- labels and textbox to add the record of the camp--> 
                            <div class="form-group">
                                <label for="organization1">Organization</label>
                                <input type="organization" name="organization" class="form-control" id="organization1" placeholder="Enter organization name" required><!-- validation for the organization input box -->
                            </div>

                            <div class="form-group">
                                <label for="location1">Location</label>
                                <input type="location" name="location" class="form-control" id="location1" placeholder="Enter location" required><!-- validation for the location input box -->
                            </div>

                            <!-- date and time -->
                            <div class="form-group">
                                <label>Date and time range:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <!--  icon of the clock in the text box -->
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <!--  display the calendar when cursor moved onto the textbox of date and time range and stores according to the format-->
                                            <input type="text" name="date_time" class="form-control pull-right" id="reservationtime" required><!-- validation for the date and time range input box  -->
                                        </div>
                                    </div>

                            <!-- Adds to the database when submit button is pressed-->
                            <div class="box-footer">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                            </div>                             
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </section>
</aside>
