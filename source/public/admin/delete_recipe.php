<?php

require_once __DIR__ . '/isadmin.php';


    if(isset($_GET['id'])){
        $query="DELETE FRom danh_gia where ma_ct='$_GET[id]'";
        mysqli_query($connect, $query);
        $query="DELETE FRom binh_luan where ma_ct='$_GET[id]'";
        mysqli_query($connect, $query); 
        $query="DELETE FRom cong_thuc where ma_ct='$_GET[id]'";
        mysqli_query($connect, $query); 
        header('location:view_recipes.php');
    }
?>

