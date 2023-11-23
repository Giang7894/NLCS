<?php
  require_once __DIR__ . '/../db/db_connection.php';
  session_start();
  if(isset($_SESSION['id'])){
    header('location:index.php');
  }
  if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM tai_khoan where ten_tk='$username'";
    $query=mysqli_query($connect,$sql);
    $row=mysqli_fetch_array($query);
    if($row){
      if($password==$row['mat_khau']){
        session_start();
        $_SESSION['id'] = $row['id'];
        header("location:index.php");
      }else{
        $error="Mật khẩu không đúng";
        $rp=$username;
      }

    }
    else{
      $error='Tài khoản không tồn tại. Bấm vào <a href="register.php">đây</a> để đăng ký.';
    }
  }


?>

<!DOCTYPE html>
<html>
    <head>
    <link href="css/login.css" rel="stylesheet">
    <?php require_once __DIR__ . '/../framework.php'; ?>
    </head>
    <body>
        <main>
        <form action="login.php" method="post" enctype="application/x-www-form-urlencoded" >
                <fieldset>
                    <legend>ĐĂNG NHẬP</legend>
                    <div id="login_img" class="text-center">
                        <img src="img/login.png" height="150px" width="150px">
                        <br>
                    </div>
                    <div class="form-floating m-5">
                        <input type="text" class="form-control" name="username"  placeholder="abc123" id="floatingInput" <?php if(!empty($rp)) echo'value="'.$rp.'"' ?>>
                        <label for="floatingInput">Tên tài khoản</label>
                      </div>
                      <div class="form-floating mx-5 mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" aria-labelledby="passwordHelpBlock" id="floatingPassword">
                        <label for="floatingPassword">Mật khẩu</label>

                      </div>
                      <div class="form-floating m-5">
                        <a class="link-opacity-50-hover p-10" href="register.php">Chưa có tài khoản ?</a>
                      </div>
                      <div class="d-grid d-md-block">
                        <button class="ad btn btn-primary col-6 ms-5" type="submit" name="submit">Đăng nhập</button>
                        <button class="btn btn-secondary col-2 float-end me-5" type="reset">Hủy</button>
                      </div>       
                      <br> 
                      <?php if(!empty($error)) echo'<div class="text-danger m-5">'.$error.'</div>'; ?>        
                </fieldset>
            </form>
        </main>
    </body>
</html>