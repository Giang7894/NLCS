<?php

    require_once __DIR__ . '/../db/db_connection.php';

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $passwordrepeat=$_POST['passwordrepeat'];   

        $sql="INSERT INTO tai_khoan(ten_tk,mat_khau) values ('$username','$password')";

        $sql1="SELECT id,ten_tk from tai_khoan where ten_tk='$username'";

        $query=mysqli_query($connect,$sql1);
        $row=mysqli_fetch_array($query);
        if($row){
            $error= 'Tài khoản đã được đăng ký';
        }else{
            $query2=mysqli_query($connect,$sql);
            if($query2 && $password==$passwordrepeat){
                $query=mysqli_query($connect,$sql1);
                $row=mysqli_fetch_array($query);
                $kho="INSERT INTO kho_cong_thuc values('$row[id]',0)";
                $s=mysqli_query($connect,$kho);
                session_start();
                $_SESSION['id']=$row['id'];
                header('location:profile.php');
            }
            else{
                echo'Mật khẩu không khớp';
            }
        }
    }


?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="css/login.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
      <?php require_once __DIR__ . '/../UI/header.php';?>
        <main>
        <form action="register.php" method="post" enctype="application/x-www-form-urlencoded" id="a">
                <fieldset>
                    <legend>ĐĂNG KÝ</legend>
                      <div class="form-floating m-5 mb-3">
                        <input type="text" class="form-control" name="username"  placeholder="abc123" id="floatingInput3" required>
                        <label for="floatingInput3">Tên tài khoản</label>
                      </div>
                      <div class="form-floating mx-5 mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" aria-labelledby="passwordHelpBlock" id="floatingPassword" required>
                        <label for="floatingPassword">Mật khẩu</label>
                      </div>
                      <div class="form-floating mx-5 mb-3">
                        <input type="password" class="form-control" name="passwordrepeat" placeholder="Password" aria-labelledby="passwordHelpBlock" id="floatingPassword2" required>
                        <label for="floatingPassword2">Nhập lại mật khẩu</label>
                      </div>
                      <div class="form-floating m-5">
                        <a class="link-opacity-50-hover p-10" href="login.php">Đã có tài khoản</a>
                      </div>
                      <div >
                        <button class="ad btn btn-primary col-6 ms-5" type="submit" name="submit">Đăng ký</button>
                        <button class="btn btn-secondary col-2 float-end me-5" type="reset">Hủy</button>
                      </div>
                      <?php if(!empty($error)){
                        echo'<br><div class="text-danger form-floating mx-5 mb-3">'.$error.'</div>';
                      } ?>
                      <br>                   
                </fieldset>
            </form>
        </main>
        <?php require_once __DIR__ . '/../UI/footer.php';?>
    </body>
</html>