<?php

require_once __DIR__ . '/isuser.php';

require_once __DIR__ . '/../db/db_connection.php';

$query="SELECT b.ten_ct,b.hinh_anh FROM chi_tiet_kho as a join cong_thuc as b where a.ma_ct=b.ma_ct";
$r=mysqli_query($connect,$query);
$row=mysqli_fetch_array($r);

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Let me cook</title>
        <?php require_once __DIR__ . '/../framework.php' ?>
        <link href="img/logo.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    </head>
    <body>
        <?php require_once __DIR__ . '/../UI/header.php'; ?>
        <main>

        </main>
        <?php require_once __DIR__ . '/../UI/footer.php'; ?>
    </body>
</html>