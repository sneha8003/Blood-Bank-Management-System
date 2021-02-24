<?php
include '../script/script.php';//includes the scripts
include '../connection/db_connection.php';//includes the connection of database
include'user_header.php';//includes the header

//null value are stored in the variable
$error_message='';
$success='';

if (isset($_POST['submit'])) {
    //Inserts to the registers table
    $register_user=$connection->Prepare("INSERT INTO registers(name,address,email,contact,date_of_birth,gender,username,user_type,password) VALUES(:name,:address,:email,:contact,:date_of_birth,:gender,:username,:user_type,:password)");

    $user=[
        'name'=>$_POST['name'],
        'address'=>$_POST['address'],
        'email'=>$_POST['email'],
        'contact'=>$_POST['contact'],
        'date_of_birth'=>$_POST['date_of_birth'],
        'gender'=>$_POST['gender'],
        'username'=>$_POST['username'],
        'user_type'=>$_POST['user_type'],
        // password in hash form
        'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT)
        ];
        //stores the message to the variable when executed
        if ($register_user->execute($user)) {
        $success='Inserted Successfully!!';
        }
        else
        //otherwise the error message stored in the variable
        $error_message='Not Inserted!!';

}       
?>
                    <div class="col-xs-9">
                        <!-- displays the error message in the alert box -->
                         <?php
                        if($error_message != '') {
                            echo "<script>alert('".$error_message."')</script>";
                        }
                         // displays the success message in the alert box 
                        if($success != '') {
                            echo "<script>alert('".$success."')</script>";
                        }
                        ?>
                        <br>
                        <div class="box box-primary right-side col-xs-10">
                            <form role="form" method="POST">
                                <div class="box-body">
                                    <!-- labels and textbox to add the records--> 
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="name" name="name" class="form-control" id="name" placeholder="Enter name" required><!-- validation for the name input box -->
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="address" name="address" class="form-control" id="address" placeholder="Enter address" required><!-- validation for the address input box -->
                                    </div>

                                     <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address" required><!-- validation for the email input box -->
                                    </div>

                                     <div class="form-group">
                                        <label for="contact">Contact Number</label>
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
                                        <label for="username">Username</label>
                                        <input type="username" name="username" class="form-control" id="username" placeholder="Enter username" required><!-- validation for the username input box -->
                                    </div>

                                     <div class="form-group">
                                        <label for="pass">Password</label>
                                        <input type="password" name="password" class="form-control" id="pass" placeholder="Enter password" required><!-- validation for the password input box -->
                                    </div>

                                    <!-- radio buttons for the gender -->
                                      <div class="form-group"> 
                                            <label>Gender</label>
                                            <div  class="radio">
                                                <label>
                                                    <!-- At the beginning male value is checked -->
                                                    <input type="radio" name="gender" id="optradio" value="Male" checked>
                                                    Male
                                                </label>
                                                <label>
                                                    <!-- option value for female -->
                                                    <input type="radio" name="gender" id="optradio1" value="Female">
                                                    Female
                                                </label>
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <!-- user type is set to user -->
                                            <input type="hidden" name="user_type" value="user" class="form-control">
                                        </div>

                                    <!-- submit button at the footer and registers the user-->
                                     <div class="box-footer">
                                         <button type="submit" name="submit" value="submit" class="btn btn-primary">Register</button>
                                    </div>

                                    <!-- login link and when clicked directs to login page -->
                                    <div>
                                        <p>Already a Member? <a href="user_login.php">Login</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </aside>