<body class="skin-black">
  <header class="header">
    <!-- logo of the blood bank -->
       <a href="user_home.php" class="logo">
                Sneha's Blood Bank
        </a>
        <!-- collapse of navigation bar-->
<nav class="navbar navbar-static-top" role="navigation">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
            <span class="icon-bar bg-black"></span>
            <span class="icon-bar bg-black"></span>
            <span class="icon-bar bg-black"></span>
    </button>
        <div id="nav" class="navbar-right collapse navbar-collapse menubar">
            <ul class="nav navbar-nav">
                <!-- menu of the user page -->
                <li><a href="user_home.php">Home</a></li>
                <li><a href="registers.php">Register</a></li>
                <li><a href="user_login.php">Login</a></li>                                
            </ul>
        </div>
</nav>       
</header>

<aside>
    <section class="container content">
        <div class="row">
                <div class="col-xs-2 bg-blue text-center">
                    <h5><b>News:</b></h5>
                </div>

                <div class="col-xs-10 bg-gray">
                <h5><b><marquee> 

                    <?php
                    // selects the last inserted row from the donation camp table
                    $camp=$connection->prepare("SELECT * FROM donation_camp order by camp_id desc limit 1");
                    $camp ->execute();
                    foreach ($camp as $row) {
                    ?>
                     <?php
                        // expiry and current date and time range has been defined
                        $expiry= $row['date_time'];
                        $current= date("YYY-MM-DD h:mm A");

                        // when date and time range expires 
                        if($expiry <= $current){
                        // displays the no event message 
                        echo "No Donation Camp Event";
                        }
                        else{
                        // when date and time range not passed displays the date and time range of camp
                        echo $row['organization'];
                        echo " is conducting donation event at ";
                        echo $row['location'];
                        echo " on ";
                        echo $row['date_time'];
                        }
                    ?> 

                </marquee></b></h5>
                   <?php }?>
                </div>

                    <h5>
                    <div class="container text-center"></div>
                    </h5>
                    <!-- displays the image from the located path -->
                    <div class="col-xs-12 text-center">
                        <img src="../images/blood.jpg" style="width:100%; height: 20%;">
                    </div>  
                    <br><br><br><br><br><br>
                                