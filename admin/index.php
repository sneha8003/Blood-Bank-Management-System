<?php
include 'header.php';//includes header
include 'sidebar.php';//includes sidebar
?>
            <aside class="right-side">
                <section class="content-header">
                    <!-- show the path -->
                    <ol class="breadcrumb">
                          <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                          <li class="active">Dashboard</li>
                    </ol>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        O+
                                    </h3>
                                    <?php
                                    // total availabilty of O+ blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='1' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of O+ blood group -->
                                        TOTAL: <?php echo $total_stock?>
                                    </p>
                                </div>
                            </div>
                      
                        </div>

                          <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        O-
                                    </h3>
                                     <?php
                                    // total availabilty of O- blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='2' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of O- blood group -->
                                        TOTAL: <?php echo $total_stock?>
                                    </p>
                                </div>
                            </div>
                        </div>

                          <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                   <h3>
                                        A+
                                    </h3>
                                     <?php
                                    // total availabilty of A+ blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='3' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of A+ blood group -->
                                        TOTAL: <?php echo $total_stock?>
                                    </p>
                                </div>
                            </div>
                        </div>

                          <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                   <h3>
                                        A-
                                    </h3>
                                     <?php
                                    // total availabilty of A- blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='4' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of A- blood group -->
                                        TOTAL: <?php echo $total_stock?>
                                    </p>
                                </div>
                            </div>
                        </div>

                          <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                   <h3>
                                        B+
                                    </h3>
                                     <?php
                                    // total availabilty of B+ blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='5' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of B+ blood group -->
                                        TOTAL: <?php echo $total_stock?>
                                    </p>
                                </div>
                            </div>
                        </div>

                          <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                   <h3>
                                        B-
                                    </h3>
                                     <?php
                                    // total availabilty of B- blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='6' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of B- blood group -->
                                        TOTAL: <?php echo $total_stock?>
                                    </p>
                                </div>
                            </div>
                        </div>

                          <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                   <h3>
                                        AB+
                                    </h3>
                                     <?php
                                    // total availabilty of AB+ blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='7' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of AB+ blood group -->
                                        TOTAL: <?php echo $total_stock?>
                                    </p>
                                </div>
                            </div>
                        </div>

                          <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                   <h3>
                                        AB-
                                    </h3>
                                     <?php
                                    // total availabilty of AB- blood group
                                    $stock = $connection->prepare("SELECT * FROM blood_Stock WHERE blood_id='8' and archive_stock='no'");
                                    $stock->execute();
                                    $total_stock = $stock->rowCount();
                                    ?>
                                    <p>
                                        <!-- displays the total blood bag of AB- blood group -->
                                        TOTAL: <?php echo $total_stock?>
                                    </p>
                                </div>
                            </div>
                        </div>
                </section>
            </aside>