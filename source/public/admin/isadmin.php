<?php
require_once __DIR__ . '/../../db/db_connection.php';
session_start();
if(!isset($_SESSION['id']) && $_SESSION['id']!='0'){
    header('location:login.php');
}

?>