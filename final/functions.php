<?php
function checkLogin(){
    require_once('dbconn.php');
    session_start();
    if (!isset($_SESSION['username'])) {
        header('location:/');
        exit();
    }
}
?>
