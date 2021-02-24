<?php
ob_start();//output buffering is started
include 'header.php';//includes header
include 'sidebar.php';//includes sidebar

    if(isset($_POST['edit'])){
    //store the updated data in donors table of the database
    $edit_donor =$connection->prepare("UPDATE donors SET donor_name=:donor_name, donor_photo=:donor_photo,donor_address=:donor_address, donor_email=:donor_email, donor_contact=:donor_contact, date_of_birth=:date_of_birth, donor_gender=:donor_gender, blood_id=:blood_id WHERE donor_id = :donor_id");

         $donor=[
         'donor_id'=>$_POST['donor_id'],
         'donor_name'=>$_POST['new_name'],
         'donor_photo'=>$_FILES['new_donor_photo']['name'],
         'donor_address'=>$_POST['new_address'],
         'donor_email'=>$_POST['new_email'],
         'donor_contact'=>$_POST['new_contact'],
         'date_of_birth'=>$_POST['new_date'],
         'donor_gender'=>$_POST['new_gender'],
         'blood_id'=>$_POST['new_blood']
          ];

        $edit_donor->execute($donor);
        header('location:view_donorInformation.php');//directs to page which displays the donors details
    }
    if(isset($_GET['donor_id'])){
        //select the id of donor from donors table
        $edit_donor=$connection->prepare("SELECT * FROM donors WHERE donor_id =:donor_id");
        $edit_donor->execute($_GET);
        $info=$edit_donor->fetch();//fetch the data and store in the variable
     }
ob_flush();
?>
            <!-- right side -->
            <aside class="right-side">
                <section class="content-header">
                    <!-- show the path -->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Donor</li>
                        <li class="active">View Donor</li>
                        <li class="active">Edit Donor</li>
                    </ol>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <!-- without the value in every fields the record donot gets submitted -->
                                <form role="form" method="POST" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="form-group">
                                         <!-- id is retrieved from the database which is hidden -->   
                                        <input type="hidden" name="donor_id" value ="<?php echo $_GET['donor_id']?>">
                                        </div>

                                        <div class="form-group">
                                         <label for="name1">Name</label>
                                        <!-- stored name is retrieved in the textbox and data in the textbox can be changed-->
                                         <input type="text" class="form-control" name="new_name" value="<?php echo $info['donor_name']?>"required>
                                        </div>

                                        <div class="form-group">
                                        <?php
                                        // displays the previous image 
                                        if (file_exists('../images/')) {
                                        echo '<img style="width: 100px; height:90px;" src="../images/'.$info['donor_photo'].'">';
                                        }
                                        ?>
                                        </div>

                                        <div class="form-group">
                                            <!-- inserts the next selected image -->
                                            <label for="exampleInputFile">Photo</label>
                                            <input type="file" name="new_donor_photo" required>
                                        </div>

                                        <div class="form-group">
                                        <label for="address1">Address</label>
                                        <!-- stored address is retrieved in the textbox and data in the textbox can be changed--->
                                        <input type="text" name="new_address" class="form-control" id="address1" value="<?php echo $info['donor_address']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label for="email1">Email Address</label>
                                        <!-- stored email address is retrieved in the textbox and data in the textbox can be changed--->
                                            <input type="email" name="new_email" value="<?php echo $info['donor_email']?>"class="form-control" id="email1"required>
                                        </div>

                                         <div class="form-group">
                                            <label for="contact1">Contact Number</label>
                                            <!-- stored contact number is retrieved in the textbox and data in the textbox can be changed--->
                                            <input type="contact" name="new_contact" maxlength="10" value="<?php echo $info['donor_contact']?>" class="form-control" id="contact1"required>
                                        </div>
                                    
                                       
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <!-- icon of calendar -->
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <!-- stored date of birth is retrieved in the textbox and data in the textbox can be changed--->
                                            <input type="Date" name="new_date" class="form-control" value="<?php echo $info['date_of_birth']?>" required><!-- placeholder of the date format -->
                                        </div>
                                    </div>

                                    <!-- radio option for gender  -->
                                    <div class="form-group"> 
                                            <label>Gender</label>
                                            <div  class="radio">
                                                <label>
                                                <!-- male option value is checked according to the value in the row of the gender -->
                                                    <input name="new_gender" type="radio" value="Male" <?php if($info['donor_gender']=='Male') {echo 'checked';} ?> checked>
                                                    Male
                                                </label>
                                                <label>
                                                     <!-- female option value is checked according to the value in the row of the gender -->
                                                    <input name="new_gender" type="radio" value="Female" <?php if($info['donor_gender']=='Female') {echo 'checked';}?>>
                                                    Female
                                                </label>
                                            </div>
                                        </div>  

                                         <div class="form-group">
                                            <label>Blood Group</label>
                                            <select class="form-control" name="new_blood">
                                                <?php
                                                //selects records from the blood table 
                                                $edit_donor = $connection->prepare("SELECT * FROM blood");
                                                $edit_donor->execute();
                                                $blood = $edit_donor->fetchAll();//fetch the row and store into the variable
                                                foreach ($blood as $row) {
                                                    ?>
                                                    <!-- id of the blood is retrieved  -->
                                                    <option value="<?php echo $row['blood_id']; ?>"
                                                        <?php if($row['blood_id'] == $info['blood_id']) {echo 'selected';} ?>>
                                                        <!-- displays the selected blood group name in the option -->
                                                        <?php echo $row['blood_group_name']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>  

                                        <!-- edits to the database when submit button is pressed--> 
                                        <div class="box-footer">
                                         <button type="submit" name="edit" value="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                                            
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 