<?php

require_once __DIR__ . '/isadmin.php';

require_once __DIR__ . '/../db/db_connection.php';
    if(isset($_GET['id'])){
        $query="DELETE FRom congthuc where macongthuc='$_GET[id]'";
        mysqli_query($connect, $query); 
        $query="DELETE FRom danhgia where macongthuc='$_GET[id]'";
        mysqli_query($connect, $query); 
        header('location:view.php');
    }
?>

<!DOCTYPE html>
