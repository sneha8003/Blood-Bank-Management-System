<?php
include 'header.php';//includes header
include 'sidebar.php';//includes sidebar

//stores the null value into the variable
$error_message='';
$success='';

if (isset($_POST['submit'])) {
//inserts into the blood_stock table in the database along with their particular column
 $blood_stock=$connection->prepare("INSERT INTO blood_stock(bag_no,donate_date,expiry_date,blood_id)VALUES(:bag_no,:donate_date,:expiry_date,:blood_id)");

    $stock=[
        'bag_no'=>$_POST['bag_no'],
        'donate_date'=>$_POST['donate_date'],
        'expiry_date'=>$_POST['expiry_date'],
        'blood_id'=>$_POST['blood_id']
    ];

    if($blood_stock->execute($stock)){
        $success='Inserted Successfully!!';//message is stored into the variable
    }
    else
        $error_message='Not Inserted!!';//message is stored into the variable
}
?>
    <!-- right side -->
    <aside class="right-side">
        <section class="content-header">
            <!-- show the path --> 
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Stock</a></li>
                <li class="active">Add Stock</li>
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
                        <!-- labels and textbox to add the record of the stock--> 
                        <div class="form-group">
                        <label>Bag Number</label>
                        <input name="bag_no" class="form-control" id="organization1" placeholder="Enter bloog bag number" required><!-- validation for the bag no input box -->
                        </div>

                        <div class="form-group">
                            <label>Donation Date</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <!-- icon of the calendar in the input box -->
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <!-- displays the format of the data when cursor moved to the donation date field -->
                                    <input type="Date" name="donate_date" class="form-control" required><!-- validation for the donation date input box -->
                                    </div>
                                </div>

                        <div class="form-group">
                            <label>Expiry Date</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <!-- displays the format of the data when cursor moved to the expiry date field -->
                                    <input type="Date" name="expiry_date" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask/ required><!-- validation for the expiry date input box -->
                                </div>
                        </div>

                        <!-- blood category option -->
                        <div class="form-group">
                            <label>Blood Group</label>
                                <select class="form-control"  name="blood_id">
                                    <?php
                                    // selects from the blood table
                                    $blood_category = $connection->prepare("SELECT * FROM blood");
                                    $blood_category->execute();
                                    //fetch the row from database
                                    $category = $blood_category->fetchAll();
                                    foreach ($category as $row) {
                                    ?>
                                    <!-- id of the blood is retrieved and the blood group is displayed in the option  -->
                                    <option value="<?php echo $row['blood_id']; ?>"><?php echo $row['blood_group_name']; ?></option>
                                    <?php }?>
                                </select>
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