<?php
ob_start();//starts the output buffering
session_start();
include '../script/script.php';//includes the script
include '../connection/db_connection.php';//connection to the database
include 'user_header.php';//includes the header
$error_message='';//variable set to null
            
if (isset($_POST['login'])) {
  // selects the username from the registers table
  $register= $connection->prepare("SELECT * FROM registers WHERE username= :username");
  $login=[
    'username' => $_POST['username']
  ];
  $register-> execute($login);
  if($register-> rowCount() >0){//checks the rowcount 
    $users = $register -> fetch();//fetch the data and stores into the user variable

    if(password_verify($_POST['password'],$users['password'])){//checks the row password and the entered password
     
      if ($users['user_type']=='superadmin'){
         $_SESSION['login']=$users['username'];
    header('Location:../superadmin/index.php');//directs to the superadmin dashboard
      }
      else if ($users['user_type']=='admin'){
         $_SESSION['login']=$users['username'];
    header('Location:../admin/index.php');//directs to the admin dashboard
      }
    else if ($users['user_type']=='user') {
          $_SESSION['login'] = $users['username'];
    header('Location:../user/send_request.php');//directs to the send request page
      }
      else 
      {
         $error_message= 'Enter correct username';//stores the message into the variable
      }
    }
    else 
      $error_message= 'Enter correct password';//stores the message into the variable
  }
  else{
    $error_message= 'Enter correct username or password';//stores the message into the variable
  }
}
ob_flush();//output buffering stops
?>
                    <div class="col-xs-9">
                         <?php
                         // displays the error message in the alert box
                        if($error_message != '') {
                            echo "<script>alert('".$error_message."')</script>";
                        }
                        ?>
                        <br>
                         <div class="box box-primary right-side col-xs-10">
                            <form role="form" method="POST">
                                <div class="box-body">
                                    <div class="form-group">
                                      <!-- label and textbox for username and validation for the textbox-->
                                        <label for="user">Username</label>
                                         <input type="user" name="username" class="form-control" id="user" placeholder="Enter username"required><!-- validation for teh textbox -->
                                    </div>
                                    <!-- label and textbox for password-->
                                    <div class="form-group">
                                        <label for="pass">Password</label>
                                        <input type="password" name="password" class="form-control" id="pass" placeholder="Enter password" required><!-- validation for teh textbox -->
                                    </div>

                                    <!-- login button at the footer-->
                                     <div class="box-footer">
                                         <button type="submit" name="login" value="login" class="btn btn-primary">Login</button>
                                    </div>

                                    <!-- displays link of register and directs to register page -->
                                    <div>
                                        <p>New User? <a href="registers.php">Register</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
    </section>
</aside>