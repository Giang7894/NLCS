<?php

require_once __DIR__ . '/isuser.php';
require_once __DIR__ . '/../db/db_connection.php';

if(isset($_GET['ma_ct'])){
    $query="SELECT * FROM chi_tiet_kho where id='$_SESSION[id]' and ma_ct='$_GET[ma_ct]'";
    $check=mysqli_query($connect,$query);
    $checked=mysqli_fetch_array($check);
    if(empty($checked)){
        $query="INSERT INTO chi_tiet_kho values('$_SESSION[id]','$_GET[ma_ct]')";
        mysqli_query($connect,$query);
        $up="UPDATE kho_cong_thuc set so_luong_ct=so_luong_ct+1";
        mysqli_query($connect,$up);
        $_SESSION['addmsg']="Đã thêm vào kho My Recipes";
    }else{
        $_SESSION['error']="Bạn đã thêm vào kho công thức này rồi";
    }
    header('location:view_recipe.php?id='.$_GET['ma_ct'].'');
}

?>