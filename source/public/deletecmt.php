<?php


require_once __DIR__ . '/isuser.php';

require_once __DIR__ . '/../db/db_connection.php';

if(isset($_GET['id'])){
    $query="DELETE FROM danhgia where id='$_SESSION[id]'";
    $stament=mysqli_query($connect,$query);
    header('location:view_recipe.php?id='.$_GET['id'].'');
}


?>