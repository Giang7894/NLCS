<?php

require_once __DIR__ . '/isadmin.php';



if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $img=$_POST['img'];
    $descrb=$_POST['descrb'];
    $cate=$_POST['cate'];
    $tool=mysqli_real_escape_string($connect,$_POST['tool']);
    $ingredient=mysqli_real_escape_string($connect,$_POST['ingr']);
    $steps=mysqli_real_escape_string($connect,$_POST['step']);
    $query1="INSERT INTO cong_thuc(ten_ct,mo_ta,dung_cu,nguyen_lieu,buoc,hinh_anh,ma_loai) values('$name','$descrb','$tool','$ingredient','$steps','$img','$cate')";
    $query="SELECT ma_ct from cong_thuc where ten_ct='$name'";
    $result=mysqli_query($connect, $query);
    $row=mysqli_fetch_array($result);
     if(empty($row['ma_ct'])){
        mysqli_query($connect, $query1);
        header('location:view_recipes.php');
        $_SESSION['msg']="Thêm thành công";
    }else{
        $error="Đã tồn tại công thức";

    } 
}
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . '/../../framework.php' ?>
        <title>ADMIN Page</title>
        <?php if(!empty($row)){
            echo'<script>alert("'.$error.'");</script>';
        } ?>
    </head>
    <body >
        <?php require_once __DIR__ . '/nav.php'?>
        <main class="container"> 
            <h1 class="text-center">Thêm một công thức mới</h1>
            <form method="post" enctype="application/x-www-form-urlencoded" class="needs-validation" novalidate>
            <div class="form-group">
                    <label for="name">Danh mục</label>
                    <select name="cate">
                        <?php $sql="SELECT * from danh_muc";
                                $ca=mysqli_query($connect,$sql);
                                while($cat=mysqli_fetch_array($ca)){
                                    echo '<option value="'.$cat['ma_loai'].'">'.$cat['ten_loai'].'</option>';
                                } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Tên món ăn</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" required pattern=".{,20}">
                    <div class="invalid-feedback">
                        Vui lòng nhập tên công thức.
                    </div>
                </div>
                <div class="form-group">
                    <label for="img">Hình ảnh (URL)</label>
                    <input type="text" class="form-control" id="img" name="img" placeholder="" required >
                    <div class="invalid-feedback">
                        Vui lòng nhập URL hình ảnh.
                    </div>
                </div>
                <div class="form-group">
                    <label for="descrb">Mô tả</label>
                    <textarea type="text" class="form-control" id="descrb" name="descrb" placeholder="" required pattern=".{50,500}"></textarea>
                    <div class="invalid-feedback">
                        Vui lòng nhập mô tả.
                    </div>
                </div>
                <div class="form-group">
                    <label for="tool">Dụng cụ</label>
                    <textarea id="tool" name="tool" class="summernote" required pattern=".{1,500}"></textarea>
                </div>
                <div class="form-group">
                    <label for="ingr">Nguyên liệu</label>
                    <textarea id="ingr" name="ingr" class="summernote" required pattern=".{20,500}"></textarea>
                </div>  
                <div class="form-group">
                    <label for="step">Bước</label>
                    <textarea id="step" name="step" class="summernote" required pattern=".{50,500}"></textarea>
                </div>
                <div class="form-group">
                    <button class="ad btn btn-primary col-6 ms-5" type="submit" name="submit">Thêm</button>
                    <button class="btn btn-secondary col-2 float-end me-5" type="reset">Hủy</button>
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
        (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
    </script>
</html>