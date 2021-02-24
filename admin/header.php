<?php
session_start();//ssession is started
include '../connection/db_connection.php';//includes the connection to the database
?> 
<head>
        <!-- link of css -->
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
       
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
</head>
        <!-- scripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
       
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>

        <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>

        <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>

        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
   
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    // pagination in the datatable
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

        <script type="text/javascript">
            $(function() {

                $('#reservation').daterangepicker();

                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY-MM-DD h:mm A'});
            });
        </script>
   
<body class="skin-black">
  <header class="header">
      <!-- logo of the blood bank -->
       <a class="logo">
                Sneha's Blood Bank
        </a>
            <?php
            // starts the sesion to display the username of the loggedin admin
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
                                       <a href="profile.php" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-user"></i> Profile</a> 
                                    </div>
                                    <div class="col-xs-5">
                                        <!--displays the logout link on the dropdown menu and directs to login page when pressed-->
                                        <a href="sign_out.php" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-off"></i> Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php }?>
    </header>