<?php

session_start();
if(!isset($_SESSION['id']) && $_SESSION['id']<'1'){
    header('location:login.php');
}

?>