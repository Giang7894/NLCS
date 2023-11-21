<?php


require_once __DIR__ . '/isadmin.php';

if(isset($_GET['id']) $$ isset($_GET['ma_ct']) $$ isset($_GET['ngay_gio'])){
    $query="UPDATE binh_luan set an='1' where id='$_GET[id]' and ma_ct='$_GET[ma_ct]' and ngay_gio='$_GET[ngay_gio]'";
    mysqli_query($connect,$query);
    header('location:view_comment.php');
}

?>