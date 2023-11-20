<?php 

require_once __DIR__ . '/isuser.php';

require_once __DIR__ . '/../db/db_connection.php';


if(isset($_POST['submit'])){
  $query="INSERT INTO chitiettaikhoan values('$_SESSION[id]','$_POST[name]','$_POST[phone]','$_POST[gender]','$_POST[email]')";
  $stament=mysqli_query($connect,$query);
  header('location:index.php');
}



?>

<!DOCTYPE html>
<html>
    <head>
      <?php require_once __DIR__ . '/../framework.php'; ?>
      <link href="css/login.css" rel="stylesheet">
    </head>
    <body>
        <main>
        <form action="" method="post" enctype="application/x-www-form-urlencoded" >
                <fieldset>
                    <legend>Cập nhật thông tin</legend>
                      <div class="form-floating m-5 mb-3">
                        <input type="text" class="form-control" name="name"  placeholder="" id="floatingInput3">
                        <label for="floatingInput3">Họ tên</label>
                      </div>
                      <div class="form-floating mx-5 mb-3">
                        <input type="text" class="form-control" name="phone" placeholder="" aria-labelledby="passwordHelpBlock" id="floatingPassword">
                        <label for="floatingPassword">SDT</label>
                      </div>
                      <div class="form-floating mx-5 mb-3">
                        <input type="text" class="form-control" name="gender" placeholder="" aria-labelledby="passwordHelpBlock" id="floatingPassword2">
                        <label for="floatingPassword2">Giới tính</label>
                      </div>
                      <div class="form-floating mx-5 mb-3">
                        <input type="email" class="form-control" name="email" placeholder="" aria-labelledby="passwordHelpBlock" id="floatingPassword2">
                        <label for="floatingPassword2">Email</label>
                      </div>
                      <div >
                        <button class="ad btn btn-primary col-6 ms-5" type="submit" name="submit">Cập nhật</button>
                        <a class="ad btn btn-primary col-2 ms-5" id="skip" type="button">Bo qua</a>
                      </div>                    
                </fieldset>
            </form>
        </main>
    </body>
    <script>
        $(document).ready(function(){
          $("#skip").on('click',function(){
            window.location.replace('http://recipes.localhost/index.php');
          })
        })
    </script>
</html>