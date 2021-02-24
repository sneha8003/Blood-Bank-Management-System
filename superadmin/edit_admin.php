<?php
ob_start();//output buffering is started
include 'header.php';//includes header
include 'sidebar.php';//includes sidebar

if (isset($_POST['edits'])) {
    //store the updated data in registers table of the database
    $edit_admin = $connection->prepare("UPDATE registers SET name=:name, address=:address, email=:email, contact=:contact, date_of_birth=:date_of_birth, gender=:gender WHERE id = :id");

    $admin=[
        'id'=>$_POST['id'],
        'name'=>$_POST['new_name'],
        'address'=>$_POST['new_address'],
        'email'=>$_POST['new_email'],
        'contact'=>$_POST['new_contact'],
        'date_of_birth'=>$_POST['new_date'],
        'gender'=>$_POST['new_gender']
       
    ];
    $edit_admin->execute($admin);
    header('location:view_admin.php');//directs to the page where the admin records are displayed
}
if (isset($_GET['id'])) {
//selects id from registers table
    $edit_admin = $connection->prepare("SELECT * FROM registers WHERE id = :id");
    $edit_admin->execute($_GET);
    $admin = $edit_admin->fetch();//fetch the data from the database and stored in the variable
}
ob_flush();//output buffering is stopped
?>
            <!-- right side -->
            <aside class="right-side">
                <section class="content-header">
                    <!-- show the path -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Admin</li>
                        <li class="active">View Admin</li>
                        <li class="active">Edit Admin</li>
                    </ol>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <!-- without the value in every fields the record donot gets submitted -->
                                <form role="form" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <!-- id is retrieved from the database which is hidden -->
                                            <input type="hidden" name="id" class="form-control" id="name" value ="<?php echo $_GET['id']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <!-- stored name is retrieved in the textbox and data in the textbox can be changed-->
                                            <input type="name" name="new_name" class="form-control" id="name" placeholder="Enter name" value="<?php echo $admin['name']?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <!-- stored address is retrieved in the textbox and data in the textbox can be changed- -->
                                            <input type="address" name="new_address" class="form-control" id="address" placeholder="Enter address" value="<?php echo $admin['address']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <!-- stored address is retrieved in the textbox and data in the textbox can be changed--->
                                            <input type="email" name="new_email" class="form-control" id="email" placeholder="Enter email address" value="<?php echo $admin['email']?>"required>
                                        </div>

                                        <div class="form-group">
                                        <label>Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <!-- icon of the phone in the input box -->
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <!-- stored address is retrieved in the textbox and data in the textbox can be changed not more than 10 digits--->
                                           <input type="contact" name="new_contact"  maxlength="10" class="form-control" id="contact1" placeholder="Enter contact number" value="<?php echo $admin['contact']?>"required>
                                        </div>
                                        </div>

                                        <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <!-- stored date of birth is retrieved in the textbox and date can be changed-->
                                            <input type="Date" name="new_date" class="form-control" value="<?php echo $admin['date_of_birth']?>" required>
                                        </div>
                                        </div>

                                        <div class="form-group"> 
                                            <label>Gender</label>
                                            <div  class="radio">
                                                <label>
                                                    <!-- when the stored gender value is male than male option is checked and gender also can be edited-->
                                                    <input name="new_gender" type="radio" value="Male" <?php if($admin['gender']=='Male') {echo 'checked';} ?> checked>
                                                    Male
                                                </label>
                                                <label>
                                                    <!-- when the stored gender value is female than female option is checked and gender also can be edited-->
                                                    <input name="new_gender" type="radio" value="Female" id="optionsRadios2" <?php if($admin['gender']=='Female') {echo 'checked';}?>>
                                                    Female
                                                </label>
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
