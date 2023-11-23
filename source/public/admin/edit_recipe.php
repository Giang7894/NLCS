<?php

require_once __DIR__ . '/isadmin.php';



if(isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id']>0){
    $name=$_POST['name'];
    $img=$_POST['img'];
    $descrb=$_POST['descrb'];
    $tool=$_POST['tool'];
    $ingredient=$_POST['ingr'];
    $steps=$_POST['step'];
    $cate=$_POST['cate'];

    $query1="UPDATE cong_thuc set ten_ct='$name',hinh_anh='$img',mo_ta='$descrb',ma_loai='$cate' where ma_ct='$_POST[id]'";

    mysqli_query($connect, $query1); 
    $_SESSION['msg']="Sửa thành công";
    header('location:view_recipe_detail.php?ma_ct='.$_POST['id'].'');
}

if(isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id']>0)){
    $query="SELECT * FROM cong_thuc where ma_ct='$_GET[id]'";

    $stament=mysqli_query($connect, $query);


    $row=mysqli_fetch_array($stament);
    if(!empty($row)){
        $name=$row['ten_ct'];
        $img=$row['hinh_anh'];
        $descrb=$row['mo_ta'];
        $tool=$row['dung_cu'];
        $ingredient=$row['nguyen_lieu'];
        $steps=$row['buoc'];
        $category=$row['ma_loai'];
    }else{
        $erorr_message='Khong the lay du lieu';
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
            <h1 class="text-center">Chỉnh sửa công thức</h1>
            <form method="post" enctype="application/x-www-form-urlencoded" >
            <?php echo'<input type="hidden" name="id" value='.$_GET['id'].'>' ?>
                <div class="form-group">
                    <label for="name">Danh mục</label>
                    <select name="cate">
                        <?php $sql="SELECT * from danh_muc";
                                $ca=mysqli_query($connect,$sql);
                                while($cat=mysqli_fetch_array($ca)){
                                    if ($category==$cat['ma_loai']) $se='selected'; else $se='';
                                    echo '<option value="'.$cat['ma_loai'].'" '.$se.'>'.$cat['ten_loai'].'</option>';
                                } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Tên công thức</label>
                    <?php 
                        echo '<input type="text" class="form-control" id="name" name="name" value='.$name.'>';
                    ?>
                </div>
                <div class="form-group">
                    <label for="img">Hình ảnh (URL)</label>
                    <?php 
                        echo '<input type="text" class="form-control" id="img" name="img" value='.$img.'>';
                    ?>
                </div>
                <div class="form-group">
                    <label for="descrb">Mô tả</label>
                    <?php 
                        echo '<textarea type="text" class="form-control" id="descrb" name="descrb" value="">'.$descrb.'</textarea>';
                    ?>
                </div>
                <div class="form-group">
                    <label for="tool">Dụng cụ</label>
                    <?php 
                        echo '<textarea id="tool" name="tool" class="summernote">'.$tool.'</textarea>';
                    ?>
                </div>
                <div class="form-group">
                    <label for="ingr">Nguyên liệu</label>
                    <?php 
                        echo '<textarea id="ingr" name="ingr" class="summernote">'.$ingredient.'</textarea>';
                    ?>
                </div>  
                <div class="form-group">
                    <label for="step">Bước</label>
                    <?php 
                        echo '<textarea id="step" name="step" class="summernote">'.$steps.'</textarea>';
                    ?>
                </div>
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