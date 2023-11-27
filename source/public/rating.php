<?php

require_once __DIR__ . '/isuser.php';
require_once __DIR__ . '/../db/db_connection.php';

if(isset($_GET['ma_ct']) && isset($_GET['danh_gia'])){
    $s="SELECT * FROM danh_gia where id='$_SESSION[id]' and ma_ct='$_GET[ma_ct]'";
    $r=mysqli_query($connect,$s);
    $check=mysqli_fetch_array($r);
    if(!empty($check)) $query="UPDATE danh_gia set so_sao=$_GET[danh_gia] where id='$_SESSION[id]' and ma_ct='$_GET[ma_ct]'";
    else
    $query="INSERT INTO danh_gia values('$_GET[ma_ct]','$_SESSION[id]','$_GET[danh_gia]')";
    mysqli_query($connect,$query);
    $_SESSION['ratemsg']="Cảm ơn bạn đã thực hiện đánh giá";
    $_SESSION['focusrate']=1;
    header('location:view_recipe.php?id='.$_GET['ma_ct'].'');
}

?>