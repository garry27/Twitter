<?php


    session_start();
    $_SESSION['userid'] = null;
   

    unset($_SESSION);

    session_destroy();
	header('Location: login.htm');

  //  require_once('Views/SessionExpiredView.php');   


?>