<?php

require_once __DIR__ . '/isuser.php';
require_once __DIR__ . '/../db/db_connection.php';

if(isset($_GET['ma_ct']) && isset($_GET['danh_gia'])){
    $query="INSERT INTO danh_gia values('$_GET[ma_ct]','$_SESSION[id]','$_GET[danh_gia]')";
    mysqli_query($connect,$query);
    $_SESSION['focus']=1;
    header('location:view_recipe.php?id='.$_GET['ma_ct'].'');
}

?>