<?php

require_once __DIR__ . '/isadmin.php';


if(isset($_POST['submit'])){

    $name=$_POST['ten'];

    $query1="INSERT INTO danh_muc(ten_loai) values ('$name')";
    $query="SELECT ma_loai from danh_muc where ten_loai='$name'";
    $result=mysqli_query($connect, $query);
    $row=mysqli_fetch_array($result);
     if(empty($row['ma_loai'])){
        mysqli_query($connect, $query1);
        $_SESSION['msg']="Thêm thành công";
        header('location:view_categories.php');
    }else{
        $error="Đã tồn tại danh mục";

    } 
}
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . '/../../framework.php' ?>
        <title>ADMIN Page</title>
        <?php if(!empty($row)){
            echo'<script>alert("'.$error.'");</script>';}
         ?>
    </head>
    <body >
        <?php require_once __DIR__ . '/nav.php'?>
        <main class="container"> 
            <h1 class="text-center pb-5">Thêm một danh mục mới</h1>
            <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <hr>
                    <div class="col-3"></div>
                </div>
            </div>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                    <form method="post" enctype="application/x-www-form-urlencoded" class="needs-validation mt-5 border border-black border-1 p-2" novalidate>
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input type="text" class="form-control" id="name" name="ten" placeholder="" required pattern=".{,20}">
                            <div class="invalid-feedback">
                                Vui lòng nhập tên danh mục.
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="ad btn btn-primary col-6 mt-3" type="submit" name="submit">Thêm</button>
                            <button class="btn btn-secondary col-2 float-end mt-3" type="reset">Hủy</button>
                        </div> 
                    </form>
                    <div class="col-3"></div>
                </div>
            </div>
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