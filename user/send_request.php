<?php
session_start();
include '../script/script.php';//includes the scripts
include'header.php';//includes the header
include'sidebar.php';//includes the header

//stores the null value into the variable
$error_message='';
$success='';

if (isset($_POST['submit'])) {
//inserts into the blood_stock table in the database along with their particular column
 $send_request=$connection->prepare("INSERT INTO request(username,total_bag,blood_required_date,request_state)VALUES(:username,:total_bag,:blood_required_date,:request_state)");

    $request=[
        'username'=>$_POST['username'],
        'total_bag'=>$_POST['total_bag'],
        'blood_required_date'=>$_POST['blood_required_date'],
        'request_state'=>$_POST['request_state']

    ];

    if($send_request->execute($request)){
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
                <li><a href="#">Request</a></li>
                <li class="active">Send Request</li>
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
                        <?php
                        if (isset($_SESSION['login'])) {
                        ?>
                        <input type="hidden" name="username" value="<?php echo $_SESSION['login']?>">
                        <?php }?>

                        <!-- labels and textbox to add the record of the stock--> 
                        <div class="form-group">
                        <label>Total Bag</label>
                        <input name="total_bag" class="form-control" id="organization1" placeholder="Enter blood bag number" required><!-- validation for the bag no input box -->
                        </div>

                        <div class="form-group">
                            <label>Blood Required Date</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <!-- displays the format of the data when cursor moved to the expiry date field -->
                                    <input type="Date" name="blood_required_date" class="form-control" required><!-- validation for the expiry date input box -->
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

                        <div class="form-group">
                            <input type="hidden" name="request_state" value="Request Sent" class="form-control">
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