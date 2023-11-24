<?php


require_once __DIR__ . '/isuser.php';

require_once __DIR__ . '/../db/db_connection.php';

if(isset($_GET['id']) && isset($_GET['ma_ct']) && isset($_GET['ngay_gio'])){
    $query="DELETE FROM binh_luan where id='$_SESSION[id]' and ma_ct='$_GET[ma_ct]' and ngay_gio='$_GET[ngay_gio]'";
    $stament=mysqli_query($connect,$query);
    $_SESSION['focus']=1;
    header('location:view_recipe.php?id='.$_GET['ma_ct'].'');
}


?>