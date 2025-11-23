<?php 
    session_start();
    $_SESSION = array();
    session_write_close();
    header('Location: ./homepage.php');
?>