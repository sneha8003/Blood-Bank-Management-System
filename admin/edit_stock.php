<?php
ob_start();
include 'header.php';//includes header
include 'sidebar.php';//includes sidebar

if (isset($_POST['edits'])) {
    //store the updated data in blood_stock table of the database
    $edit_stock = $connection->prepare("UPDATE blood_stock SET bag_no=:bag_no, donate_date=:donate_date, expiry_date=:expiry_date, blood_id=:blood_id WHERE blood_stock_id = :blood_stock_id");
    $stock=[
        'blood_stock_id'=>$_POST['blood_stock_id'],
        'bag_no'=>$_POST['new_no'],
        'donate_date'=>$_POST['new_date'],
        'expiry_date'=>$_POST['new_expiry'],
        'blood_id'=>$_POST['new_blood_id']
    ];
    $edit_stock->execute($stock);
    header('location:view_stock.php');//directs to page which displays the stock details
}
if (isset($_GET['blood_stock_id'])) {
    //select the id of stock from blood_stock table
    $edit_stock = $connection->prepare("SELECT * FROM blood_stock WHERE blood_stock_id = :blood_stock_id");
    $edit_stock->execute($_GET);
    $blood_stock = $edit_stock->fetch();//fetch the data and store in the variable
}
ob_flush();
?>
             <!-- right side -->
            <aside class="right-side">
                <section class="content-header">
                    <!-- show the path -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Stock</li>
                        <li class="active">View Stock</li>
                        <li class="active">Edit Stock</li>
                    </ol>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <form role="form" method="POST">
                                    <!-- without the value in every fields the record donot gets submitted -->
                                    <div class="box-body">
                                        <div class="form-group">
                                        <!-- id is retrieved from the database which is hidden -->
                                        <input type="hidden" name="blood_stock_id" value ="<?php echo $_GET['blood_stock_id']?>">
                                        </div>

                                         <div class="form-group">
                                            <label for="unit">Blood Bag Number</label>
                                            <!-- stored bag number is retrieved in the textbox and data in the textbox can be changed-->
                                            <input type="text" name="new_no" value="<?php echo $blood_stock['bag_no']?>" class="form-control"required>
                                        </div>

                                      <div class="form-group">
                                        <label>Donate Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                 <!-- icon of the calendar in the input box -->
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <!-- stored donation date is retrieved in the textbox and data in the textbox can be changed-->
                                            <input type="Date" name="new_date" class="form-control" value="<?php echo $blood_stock['donate_date']?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Expiry Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <!-- icon of the calendar in the input box -->
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <!-- stored expiry date is retrieved in the textbox and data in the textbox can be changed-->
                                            <input type="Date" name="new_expiry" class="form-control" value="<?php echo $blood_stock['expiry_date']?>" required>
                                        </div>
                                    </div>

                                        <div class="form-group">
                                            <label>Blood Group</label>
                                            <select class="form-control" name="new_blood_id">
                                                <?php
                                                //select from the blood table
                                                $edit_donor = $connection->prepare("SELECT * FROM blood");
                                                $edit_donor->execute();
                                                $blood = $edit_donor->fetchAll();//fetch the row and store into the variable
                                                foreach ($blood as $row) {
                                                    ?>
                                                    <!-- id of the blood is retrieved  -->
                                                    <option value="<?php echo $row['blood_id']; ?>"
                                                        <?php if($row['blood_id'] == $blood_stock['blood_id']) {echo 'selected';} ?>>
                                                        <!-- displays the selected blood group name in the option -->
                                                        <?php echo $row['blood_group_name']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
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
