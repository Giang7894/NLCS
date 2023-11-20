<?php

require_once __DIR__ . '/isuser.php';

 require_once __DIR__ . '/../db/db_connection.php';


 if(isset($_SESSION['id']) && ($_SESSION['id']>0)){
    $query="SELECT * from chitiettaikhoan where id='$_SESSION[id]'";
    $stament=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($stament);
 }
if(isset($_POST['submit']) && empty($row)){
    $query="INSERT INTO chitiettaikhoan values('$_SESSION[id]','$_POST[name]','$_POST[phone]','$_POST[gender]','$_POST[email]')";
    $stament=mysqli_query($connect,$query);
}elseif(isset($_POST['submit']) && !empty($row)){
    $query="UPDATE chitiettaikhoan set hoten='$_POST[name]',sdt='$_POST[phone]',gioitinh='$_POST[gender]',email='$_POST[email]' where id='$_SESSION[id]'";
    $stament=mysqli_query($connect,$query);

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
        <main>
        <form action="" method="post" enctype="application/x-www-form-urlencoded" >
                <fieldset>
                    <legend>Cập nhật thông tin</legend>
                      <div class="form-floating m-5 mb-3">
                        <input type="text" class="form-control" name="name"  placeholder="" id="floatingInput3" value="<?php if(!empty($row)) echo''.$row['hoten'].''; ?>">
                        <label for="floatingInput3">Họ tên</label>
                      </div>
                      <div class="form-floating mx-5 mb-3">
                        <input type="text" class="form-control" name="phone" placeholder="" id="floatingInput1"  value="<?php if(!empty($row)) echo''.$row['sdt'].''; ?>" >
                        <label for="floatingInput1">SDT</label>
                      </div>
                      <div class="form-floating mx-5 mb-3">
                        <input type="text" class="form-control" name="gender" placeholder=""  id="floatingInput2" value="<?php if(!empty($row)) echo''.$row['gioitinh'].''; ?>">
                        <label for="floatingInput2">Giới tính</label>
                      </div>
                      <div class="form-floating mx-5 mb-3">
                        <input type="email" class="form-control" name="email" placeholder=""  id="floatingInput4" value="<?php if(!empty($row)) echo''.$row['email'].''; ?>">
                        <label for="floatingInput4">Email</label>
                      </div>
                      <div >
                        <button class="ad btn btn-primary col-6 ms-5" type="submit" name="submit">Cập nhật</button>
                      </div>                    
                </fieldset>
            </form>
        </main>
    </body>
</html>