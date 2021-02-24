<?php
include '../connection/db_connection.php';//connection to database
?>
<body class="skin-black">
  <header class="header">
      <!-- logo of the blood bank -->
       <a href="" class="logo">
                Sneha's Blood Bank
        </a>
            <?php
            // starts the sesion to display the username of the loggedin user
            if(isset($_SESSION['login'])){
       
            ?>
                <nav class="navbar navbar-static-top" role="navigation">
                <!-- toggle navigation when responsive-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <!-- navbar at the right side -->
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <!-- dropdown menu when the name  of the user gets clicked-->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $_SESSION['login'];?>
                                <i class="caret"></i></span>
                             </a>
                           <!-- displays through the dropdown -->
                            <ul class="dropdown-menu">
                                <!-- footer of the dropdown menu -->
                                <li class="user-footer">
                                    <div class="col-xs-7">
                                        <!-- displays the profile link on the dropdown menu and directs to profile page when pressed-->
                                       <a href="user_profile.php" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-user"></i> Profile</a> 
                                    </div>
                                    <div class="col-xs-5">
                                        <!--displays the logout link on the dropdown menu and directs to login page when pressed-->
                                        <a href="logout.php" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-off"></i> Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php }?>
        </header>
