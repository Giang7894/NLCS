<?php

require_once __DIR__ . '/isadmin.php';



 ?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . '/../../framework.php' ?>
        <title>ADMIN Page</title>
    </head>
    <body >
        <?php require_once __DIR__ . '/nav.php'?>
        <form class="d-flex" method="GET" action="#">
      <input class="form-control me-2" type="search" placeholder="Tìm kiếm một tài khoản nào đó" aria-label="Search" name="search" value="<?php if(isset($_GET['search'])) echo''.$_GET['search'].''; ?>">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
        <main class="container">  
            <h1 class="text-center">NGƯỜI DÙNG</h1>
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Tên tài khoản</th>
                        <th>Họ tên người dùng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     if(isset($_GET['search']) && !empty($_GET['search'])){
                        $search=$_GET['search'];
                        $query="SELECT * FROM tai_khoan as a left outer join chi_tiet_tk as b on a.id=b.id where  ten_tk like '%$search%' or ten_nguoi_dung like '%$search%'";
                     }
                    else{$query='SELECT a.ten_tk,b.ten_nguoi_dung,b.sdt,b.email  FROM tai_khoan as a left outer join chi_tiet_tk as b on a.id=b.id ';}
                    $stament=mysqli_query($connect,$query);
                    $count=mysqli_num_rows($stament);
                    if($count==0) echo'<tr><td colspan="5" class="text-center">Không có người dùng nào</td></tr>';
                    else{
                    while($row=mysqli_fetch_array($stament)){
                        $id=$row['id'];
                        $username=$row['ten_tk'];
                        $name=$row['ten_nguoi_dung'];
                        if(is_null($name)) $name="Chưa điền thông tin";
                        $email=$row['email'];
                        if(is_null($sex)) $sex="Chưa điền thông tin";
                        $phone=$row['sdt'];
                        if(is_null($phone)) $phone="Chưa điền thông tin";
                        echo'<tr>
                            <td>'.$username.'</td>
                            <td>'.$name.'</td>
                            <td>'.$phone.'</td>
                            <td>'.$email.'</td>
                            <td><a type="button" class="btn btn-danger" href="delete_user.php?id='.$id.'"><i class="fa-solid fa-trash pe-1" style="color: #ffffff;"></i>Xóa</a></td>
                        </tr>';
                    }}
                    ?>
                </tbody>
            </table>

        </main>
    </body>
        
</html>