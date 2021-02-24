<?php
include 'header.php';//includes header
include 'sidebar.php';//includes sidebar

//stores the null value into the variable
$error_message='';
$success='';

if (isset($_POST['submit'])){

    // name of the image
    $file=$_FILES["donor_photo"]["name"];
    $temp=$_FILES["donor_photo"]["tmp_name"];
    // path of the image
    $path="../images/".$file;
    move_uploaded_file($temp, $path);

//inserts into the donors table in the database along with their particular column
   $blood_donor=$connection->prepare("INSERT INTO donors(donor_name,donor_photo,donor_address,donor_email,donor_contact,date_of_birth,donor_gender,blood_id) VALUES (:donor_name,:donor_photo,:donor_address,:donor_email,:donor_contact,:date_of_birth,:donor_gender,:blood_id)");
     
     $donor=[
     'donor_name'=>$_POST['donor_name'],
     'donor_photo'=>$_FILES['donor_photo']['name'],
     'donor_address'=>$_POST['donor_address'],
     'donor_email'=>$_POST['donor_email'],
     'donor_contact'=>$_POST['donor_contact'],
     'date_of_birth'=>$_POST['date_of_birth'],
     'donor_gender'=>$_POST['donor_gender'],
     'blood_id'=>$_POST['blood_id']
      ];

    if($blood_donor->execute($donor)){
    $success ='Inserted Successfully!!';//message is stored into the variale
 
    }
    else
     $error_message='Not Inserted!!';//message is stored into the varibale
}
?>
    <!-- Right side -->
    <aside class="right-side">
        <section class="content-header">
            <!-- show the path --> 
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Donor</a></li>
                <li class="active">Add Donor</li>
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
                    <form role="form" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                            <!-- labels and textbox to add the record of the donors--> 
                            <label for="name1">Name</label>
                                <input type="name" name="donor_name" class="form-control" id="name1" placeholder="Enter name" required><!-- validation for the nameinput box  -->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Photo</label>
                                <input type="file" name="donor_photo" required>
                            </div>

                            <div class="form-group">
                                 <label for="address1">Address</label>
                                <input type="address" name="donor_address" class="form-control" id="address1" placeholder="Enter address" required><!-- validation for the address input box  -->
                            </div>

                            <div class="form-group">
                                <label for="email1">Email Address</label>
                                <input type="email" name="donor_email" class="form-control" id="email1" placeholder="Enter email address" required><!-- validation for the email input box  -->
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <!--  contact number cannot exceed from 10 digits -->
                                        <input type="contact" name="donor_contact"  maxlength="10" class="form-control" id="contact1" placeholder="Enter contact number" required><!-- validation for the contact number input box  -->
                                        </div>
                            </div>

                            <div class="form-group">
                                <label>Date of Birth</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <!-- icon of the calendar in the input box -->
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <!-- displays the format of the data when cursor moved to the date of birth field and stores in displayed format-->
                                        <input type="Date" name="date_of_birth" class="form-control" required><!-- validation for the date of birth rage input box  -->
                                    </div>
                            </div>

                            <!-- the value of the gender is checked when particular radio button is clicked -->
                            <div class="form-group"> 
                                <label>Gender</label>
                                    <div  class="radio">
                                    <!-- male option value is checked at first in the add donor page-->
                                    <label><input type="radio" name="donor_gender" id="optradio" value="Male" checked> Male</label>
                                    <!-- option value of female -->
                                    <label><input type="radio" name="donor_gender" id="optradio1" value="Female"> Female</label>
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