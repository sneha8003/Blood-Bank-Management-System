<?php
include'header.php';//includes header 
include'sidebar.php';//includes sidebar
?>          

                <aside class="right-side">
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="box box-primary">
                                <!-- without the value in every fields the record donot gets submitted -->
                                <form role="form" method="POST">
                                    <div class="box-body">
                                        <?php
                                        //username of the loggedin superadmin is selected 
                                        $super_admin_id =$_SESSION['login'];
                                        $super_profile =$connection->prepare('SELECT * FROM registers WHERE username=:username');
                                        $super_profile->execute(['username'=> $super_admin_id]);
                                        foreach ($super_profile as $profile) {
                                        ?>
                                      
                                        <div class="form-group">
                                        <label for="name">Name</label>
                                        <!-- name of the logged in superadmin is displayed in the textfield -->
                                            <input type="name" name="new_name" class="form-control" id="name" value="<?php echo $profile['name'] ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Address</label>
                                        <!-- address of the logged in superadmin is displayed in the textfield -->
                                            <input type="address" name="new_address" class="form-control" id="address" value="<?php echo $profile['address']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <label for="email">Email Address</label>
                                        <!-- email of the logged in superadmin is displayed in the textfield -->
                                            <input type="email" name="new_email" class="form-control" id="email" value="<?php echo $profile['email']?>"required>
                                        </div>

                                         <div class="form-group">
                                            <!-- contact number of the logged in superadmin is displayed in the textfield -->
                                            <label for="contact">Contact Number</label>
                                            <input type="contact" name="new_contact" class="form-control" maxlength="10" id="contact" value="<?php echo $profile['contact']?>"required>
                                        </div>

                                        <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <!-- icon of calendar -->
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <!-- stored date of birth is retrieved in the textbox--->
                                            <input type="Date" name="new_date" class="form-control" value="<?php echo $profile['date_of_birth']?>" required><!-- placeholder of the date format -->
                                        </div>
                                    </div>

                                    <!-- radio option for gender  -->
                                    <div class="form-group"> 
                                            <label>Gender</label>
                                            <div  class="radio">
                                                <label>
                                                <!-- male option value is checked according to the value in the row of the gender -->
                                                    <input name="new_gender" type="radio" value="Male" <?php if($profile['gender']=='Male') {echo 'checked';} ?> checked>
                                                    Male
                                                </label>
                                                <label>
                                                     <!-- female option value is checked according to the value in the row of the gender -->
                                                    <input name="new_gender" type="radio" value="Female" <?php if($profile['gender']=='Female') {echo 'checked';}?>>
                                                    Female
                                                </label>
                                            </div>
                                        </div>  
                                               
                                    </div>
                                <?php }?>
                                </form>
                            </div>
                        </div>
                    </div> 
                </section>
            </aside>
