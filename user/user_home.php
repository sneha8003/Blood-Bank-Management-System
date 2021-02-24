<?php
include '../script/script.php';//includes the script
include'../connection/db_connection.php';//includes the connection to database
include'user_header.php';//inludes the header

?>      
            <br><br>    
            <div class="col-md-12 text-right">
            <!-- link for login page through the blood request button -->
             <a href="user_login.php" class="btn btn-primary">Add Request</a>
            </div>
             <div class="first">
                <br><br>
                    <div class="col-xs-3">
                        <div class="small-box bg-red">
                            <div class="inner" style="height: 120px;">
                            <h3 class="text-center">O+</h3>
                                    <?php
                                    // total availabilty of O+ blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='1' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of O+ blood group -->
                                        <center>TOTAL: <?php echo $total_stock?></center>
                                    </p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-xs-3">
                        <div class="small-box bg-red">
                            <div class="inner" style="height: 120px;">
                            <h3 class="text-center">O-</h3>
                             <?php
                                    // total availabilty of O- blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='2' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of O- blood group -->
                                        <center>TOTAL: <?php echo $total_stock?></center>
                                    </p>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-3">
                        <div class="small-box bg-red">
                            <div class="inner" style="height: 120px;">
                            <h3 class="text-center">A+</h3>
                                 <?php
                                    // total availabilty of A+ blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='3' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of A+ blood group -->
                                        <center>TOTAL: <?php echo $total_stock?></center>
                                    </p>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-3">
                        <div class="small-box bg-red">
                            <div class="inner" style="height: 120px;">
                            <h3 class="text-center">A-</h3>
                             <?php
                                    // total availabilty of A- blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='4' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of A- blood group -->
                                        <center>TOTAL: <?php echo $total_stock?></center>
                                    </p>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-3">
                        <div class="small-box bg-red" style="height: 120px;">
                            <div class="inner">
                            <h3 class="text-center">B+</h3>
                            <?php
                                    // total availabilty of B+ blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='5' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of B+ blood group -->
                                        <center>TOTAL: <?php echo $total_stock?></center>
                                    </p>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-3">
                        <div class="small-box bg-red">
                            <div class="inner" style="height: 120px;">
                            <h3 class="text-center">B-</h3>
                             <?php
                                    // total availabilty of B- blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='6' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of B- blood group -->
                                        <center>TOTAL: <?php echo $total_stock?></center>
                                    </p>
                                <br>
                            </div>
                        </div>
                    </div>

                     <div class="col-xs-3">
                        <div class="small-box bg-red">
                            <div class="inner" style="height: 120px;">
                            <h3 class="text-center">AB+</h3>
                              <?php
                                    // total availabilty of AB+ blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='7' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of AB+ blood group -->
                                        <center>TOTAL: <?php echo $total_stock?></center>
                                    </p>
                                <br>
                            </div>
                        </div>
                    </div>

                     <div class="col-xs-3">
                        <div class="small-box bg-red">
                            <div class="inner" style="height: 120px;">
                            <h3 class="text-center">AB-</h3>
                              <?php
                                    // total availabilty of AB+ blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='7' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of AB+ blood group -->
                                        <center>TOTAL: <?php echo $total_stock?></center>
                                    </p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>