<?php

require_once __DIR__ . '/isadmin.php';


    if(isset($_GET['id'])){
        $query="DELETE FRom danh_gia where id='$_GET[id]'";
        mysqli_query($connect, $query);
        $query="DELETE FRom binh_luan where id='$_GET[id]'";
        mysqli_query($connect, $query); 
        $query="DELETE FRom chi_tiet_tk where id='$_GET[id]'";
        mysqli_query($connect, $query);
        $query="DELETE FRom tai_khoan where id='$_GET[id]'";
        mysqli_query($connect, $query);
        header('location:view_user.php');
    }
?>