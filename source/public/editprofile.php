<?php

require_once __DIR__ . '/isuser.php';

 require_once __DIR__ . '/../db/db_connection.php';


 if(isset($_SESSION['id']) && ($_SESSION['id']>0)){
    $query="SELECT * from chi_tiet_tk where id='$_SESSION[id]'";
    $stament=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($stament);
 }
if(isset($_POST['submit']) && empty($row)){
    $query="INSERT INTO chi_tiet_tk values('$_SESSION[id]','$_POST[name]','$_POST[phone]','$_POST[email]')";
    $stament=mysqli_query($connect,$query);
}elseif(isset($_POST['submit']) && !empty($row)){
    $query="UPDATE chi_tiet_tk set hoten='$_POST[name]',sdt='$_POST[phone]',email='$_POST[email]' where id='$_SESSION[id]'";
    $stament=mysqli_query($connect,$query);

}
 ?>


<!DOCTYPE html>
<html>
    <head>
      <link href="css/login.css" rel="stylesheet">
      <meta charset="UTF-8">
        <title>Let me cook</title>
        <?php require_once __DIR__ . '/../framework.php' ?>
        <link href="img/logo.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    </head>
    <body>
        <?php require_once __DIR__ . '/../UI/header.php'; ?>
        <main>
        <form action="" method="post" enctype="application/x-www-form-urlencoded" id="a">
                <fieldset>
                    <legend>Cập nhật thông tin</legend>
                      <div class="form-floating m-5 mb-3">
                        <input type="text" class="form-control" name="name"  placeholder="" id="floatingInput3" value="<?php if(!empty($row)) echo''.$row['ten_nguoi_dung'].''; ?>">
                        <label for="floatingInput3">Họ tên</label>
                      </div>
                      <div class="form-floating mx-5 mb-3">
                        <input type="text" class="form-control" name="phone" placeholder="" id="floatingInput1"  value="<?php if(!empty($row)) echo''.$row['sdt'].''; ?>" >
                        <label for="floatingInput1">SDT</label>
                      </div>
                      <div class="form-floating mx-5 mb-3">
                        <input type="email" class="form-control" name="email" placeholder=""  id="floatingInput4" value="<?php if(!empty($row)) echo''.$row['email'].''; ?>">
                        <label for="floatingInput4">Email</label>
                      </div>
                      <div >
                        <button class="ad btn btn-primary col-10 m-5" type="submit" name="submit">Cập nhật</button>
                      </div>                    
                </fieldset>
            </form>
        </main>
        <?php require_once __DIR__ . '/../UI/footer.php'; ?>
    </body>
</html>