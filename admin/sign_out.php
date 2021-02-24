<?php
session_start();//starts the session
session_unset();//unsets the session
session_destroy();//destroys the session
header('Location:../user/user_login.php');//directs to the login page 
?>
