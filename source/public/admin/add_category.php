<?php

require_once __DIR__ . '/isadmin.php';


if(isset($_POST['submit'])){

    $ten=$_POST['ten'];

    $query1="INSERT INTO danh_muc(ten_loai) values ('$ten')";
    $query="SELECT ma_loai from danh_muc where ten_loai='$name'";
    $result=mysqli_query($connect, $query);
    $row=mysqli_fetch_array($result);
     if(empty($row['ma_loai'])){
        mysqli_query($connect, $query1); 
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
            echo'<script>alert("'.$error.'");</script>';
        } ?>
    </head>
    <body >
        <?php require_once __DIR__ . '/nav.php'?>
        <main class="container"> 
            <h1>Thêm một danh mục mới</h1>
            <form method="post" enctype="application/x-www-form-urlencoded" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="name">Tên danh mục</label>
                    <input type="text" class="form-control" id="name" name="ten" placeholder="" required pattern=".{,20}">
                    <div class="invalid-feedback">
                        Vui lòng nhập tên danh mục.
                    </div>
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