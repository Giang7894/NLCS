<?php

require_once __DIR__ . '/isadmin.php';

require_once __DIR__ . '/../db/db_connection.php';

if(isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id']>0){
    $name=$_POST['name'];
    $time=$_POST['time'];
    $serve=$_POST['serve'];
    $diff=$_POST['diff'];
    $img=$_POST['img'];
    $descrb=$_POST['descrb'];
    $tool=$_POST['tool'];
    $ingredient=$_POST['ingr'];
    $steps=$_POST['step'];

    $query1="UPDATE congthuc set tenmonan='$name',thoigianchuanbi='$time',soluongnguoian='$serve',dokho='$diff',hinhanh='$img',mota='$descrb' where macongthuc='$_POST[id]'";
    $query2="UPDATE chitiet set dungcu='$tool',nguyenlieu='$ingredient',buoc='$steps' where macongthuc='$_POST[id]'";

    mysqli_query($connect, $query1); 
    mysqli_query($connect, $query2); 
    header('location:view.php');
}

if(isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id']>0)){
    $query="SELECT * FROM congthuc as a join chitiet as b WHERE a.macongthuc=b.macongthuc and a.macongthuc='$_GET[id]'";

    $stament=mysqli_query($connect, $query);


    $row=mysqli_fetch_array($stament);
    if(!empty($row)){
        $name=$row['tenmonan'];
        $time=$row['thoigianchuanbi'];
        $serve=$row['soluongnguoian'];
        $diff=$row['dokho'];
        $img=$row['hinhanh'];
        $descrb=$row['mota'];
        $tool=$row['dungcu'];
        $ingredient=$row['nguyenlieu'];
        $steps=$row['buoc'];
    }else{
        $erorro_message='Khong the lay du lieu';
    }
}


?>


<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . '/../framework.php' ?>
        <title>ADMIN Page</title>
    </head>
    <body >
        <?php require_once __DIR__ . '/nav.php'?>
        <main class="container"> 
            <h1>Chinh sua cong thuc</h1>
            <form method="post" enctype="application/x-www-form-urlencoded" >
            <?php echo'<input type="hidden" name="id" value='.$_GET['id'].'>' ?>
                <div class="form-group">
                    <label for="name">Tên món ăn</label>
                    <?php 
                        echo '<input type="text" class="form-control" id="name" name="name" value='.$name.'>';
                    ?>
                </div>
                <div class="form-group">
                    <label for="time">Thời gian chuẩn bị</label>
                    <?php 
                        echo '<input type="text" class="form-control" id="time" name="time" value='.$time.'>';
                    ?>
                </div>
                <div class="form-group">
                    <label for="serve">Số người ăn</label>
                    <?php 
                        echo '<input type="text" class="form-control" id="serve" name="serve" value='.$serve.'>';
                    ?>
                </div>
                <div class="form-group">
                    <label for="diff">Độ khó</label>
                    <?php 
                        echo '<input type="text" class="form-control" id="diff" name="diff" value='.$diff.'>';
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