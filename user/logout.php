<?php
session_start();//starts the session
session_unset();//unsets the session
session_destroy();//destroys the sesssion
header('Location:user_login.php');//directs to the login page
?>
