<?php

require_once __DIR__ . '/isadmin.php';

 require_once __DIR__ . '/../db/db_connection.php';


 ?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . '/../framework.php' ?>
        <title>ADMIN Page</title>
    </head>
    <body >
        <?php require_once __DIR__ . '/nav.php'?>
        <form class="d-flex" method="GET" action="#">
      <input class="form-control me-2" type="search" placeholder="Tìm kiếm một tài khoản hoặc một người dùng nào đó" aria-label="Search" name="search" value="<?php if(isset($_GET['search'])) echo''.$_GET['search'].''; ?>">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
        <main class="container">  
            <h1>USER</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tên tài khoản</th>
                        <th>Họ tên</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Mật khẩu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     if(isset($_GET['search']) && !empty($_GET['search'])){
                        $search=$_GET['search'];
                        $query="SELECT * FROM taikhoan as a left outer join chitiettaikhoan as b on a.id=b.id where  tentaikhoan like '%$search%' or hoten like '%$search%'";
                     }
                    else{$query='SELECT a.tentaikhoan,b.hoten,b.gioitinh,b.sdt,a.matkhau  FROM taikhoan as a left outer join chitiettaikhoan as b on a.id=b.id ';}
                    $stament=mysqli_query($connect,$query);
                    $count=mysqli_num_rows($stament);
                    if($count==0) echo'<tr><td colspan="4" class="text-center">Không có kết quả<td></tr>';
                    else{
                    while($row=mysqli_fetch_array($stament)){
                        $username=$row['tentaikhoan'];
                        $name=$row['hoten'];
                        if(is_null($name)) $name="Chưa điền thông tin";
                        $sex=$row['gioitinh'];
                        if(is_null($sex)) $sex="Chưa điền thông tin";
                        $phone=$row['sdt'];
                        if(is_null($phone)) $phone="Chưa điền thông tin";
                        $password=password_hash($row['matkhau'],PASSWORD_DEFAULT);
                        echo'<tr>
                            <td>'.$username.'</td>
                            <td>'.$name.'</td>
                            <td>'.$sex.'</td>
                            <td>'.$phone.'</td>
                            <td>'.$password.'</td>
                        </tr>';
                    }}
                    ?>
                </tbody>
            </table>

        </main>
    </body>
        
</html>