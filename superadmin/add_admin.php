<?php
include 'header.php';//includes header
include 'sidebar.php';//includes sidebar

//stores the null value into the variable
$error_message='';
$success='';

if (isset($_POST['submit'])) {
    //inserts into the registers table in the database along with their particular column
    $register_admin=$connection->Prepare("INSERT INTO registers(name,address,email,contact,date_of_birth,gender,username,user_type,password) VALUES(:name,:address,:email,:contact,:date_of_birth,:gender,:username,:user_type,:password)");

    $admin=[
        'name'=>$_POST['name'],
        'address'=>$_POST['address'],
        'email'=>$_POST['email'],
        'contact'=>$_POST['contact'],
        'date_of_birth'=>$_POST['date_of_birth'],
        'gender'=>$_POST['gender'],
        'username'=>$_POST['username'],
        'user_type'=>$_POST['user_type'],
        'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT)//password is stored in the hash form
        ];

        if ($register_admin->execute($admin)) {
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
                        <li><a href="#">Admin</a></li>
                        <li class="active">Add Admin</li>
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
                                    <!-- labels and textbox to add the record of the admin--> 
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="name" name="name" class="form-control" id="name" placeholder="Enter name"required><!-- validation for the name input box -->
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="address" name="address" class="form-control" id="address" placeholder="Enter address" required><!-- validation for the address input box -->
                                    </div>

                                     <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address" required><!-- validation for the email input box -->
                                    </div>

                                     <div class="form-group">
                                        <label>Contact Number</label>
                                        <!-- contact number cannot exceed from 10 digits -->
                                        <input type="contact" name="contact" maxlength="10" class="form-control" id="contact" placeholder="Enter contact number" required><!-- validation for the contact input box -->
                                    </div>

                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <!-- icon of the calendar in the input box -->
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <!-- stores the date in displayed format-->
                                        <input type="Date" name="date_of_birth" class="form-control" required><!-- validation for the date of birth rage input box  -->
                                    </div>
                                    </div>

                                     <div class="form-group">
                                        <label>Username</label>
                                        <input type="username" name="username" class="form-control" id="username" placeholder="Enter username" required><!-- validation for the username input box -->
                                    </div>

                                     <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" id="pass" placeholder="Enter password" required><!-- validation for the password input box -->
                                    </div>

                                    <!-- radio button -->
                                      <div class="form-group"> 
                                            <label>Gender</label>
                                            <div  class="radio">
                                                <label>
                                                <!-- male option value is checked -->
                                                    <input type="radio" name="gender" id="optradio" value="Male" checked>
                                                    Male
                                                </label>
                                                <label>
                                                <!-- option value of female -->
                                                    <input type="radio" name="gender" id="optradio1" value="Female">
                                                    Female
                                                </label>
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <!-- user type is set to admin -->
                                            <input type="hidden" name="user_type" value="admin" class="form-control">
                                        </div>

                                    <!-- adds to the database when submit button is pressed--> 
                                     <div class="box-footer">
                                         <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                        </div>
                    </div> 
                </section>
            </aside>