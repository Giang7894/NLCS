<?php

require_once __DIR__ . '/isadmin.php';



if(isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id']>0){
    $name=$_POST['name'];


    $query1="UPDATE danh_muc set ten_loai='$_POST[name]' where ma_loai='$_POST[id]'";

    mysqli_query($connect, $query1); 

    header('location:view_categories.php');
}

if(isset($_GET['ma_loai']) && is_numeric($_GET['ma_loai']) && ($_GET['ma_loai']>0)){
    $query="SELECT * FROM danh_muc where ma_loai='$_GET[ma_loai]'";

    $stament=mysqli_query($connect, $query);


    $row=mysqli_fetch_array($stament);
    if(!empty($row)){
        $name=$row['ten_loai'];

    }else{
        $erorro_message='Khong the lay du lieu';
    }
}


?>


<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . '/../../framework.php' ?>
        <title>ADMIN Page</title>
    </head>
    <body >
        <?php require_once __DIR__ . '/nav.php'?>
        <main class="container"> 
            <h1>Chỉnh sửa công thức</h1>
            <form method="post" enctype="application/x-www-form-urlencoded" >
            <?php echo'<input type="hidden" name="id" value='.$_GET['ma_loai'].'>' ?>

                <div class="form-group">
                    <label for="name">Tên công thức</label>
                    <?php 
                        echo '<input type="text" class="form-control" id="name" name="name" value='.$name.'>';
                    ?>
                <div class="form-group">
                    <button class="ad btn btn-primary col-6 ms-5" type="submit" name="submit">Sửa</button>
                </div> 
            </form>

        </main>
    </body>
        
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 150
            });
        });
    </script>
</html>