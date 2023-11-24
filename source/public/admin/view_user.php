<?php

require_once __DIR__ . '/isadmin.php';



 ?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . '/../../framework.php' ?>
        <title>ADMIN Page</title>
         <link href="/../img/logo.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    </head>
    <body >
        <?php require_once __DIR__ . '/nav.php'?>
        <main class="container">  
            <h1 class="text-center pb-5">NGƯỜI DÙNG</h1>
            <table class="table table-hover table-striped table-bordered border-black">
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
                    else{$query='SELECT a.ten_tk,b.ten_nguoi_dung,b.sdt,b.email,a.id  FROM tai_khoan as a left outer join chi_tiet_tk as b on a.id=b.id ';}
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
                        if(is_null($email)) $email="Chưa điền thông tin";
                        $phone=$row['sdt'];
                        if(is_null($phone)) $phone="Chưa điền thông tin";
                        echo'<tr>
                            <td>'.$username.'</td>
                            <td>'.$name.'</td>
                            <td>'.$phone.'</td>
                            <td>'.$email.'</td>
                            <td><a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal'.$id.'"><i class="fa-solid fa-trash pe-1" style="color: #ffffff;"></i>Xóa</a></td>
                        ';
                        echo'
                        <div class="modal fade" id="myModal'.$id.'">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                      
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Xóa người dùng</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                      
                            <!-- Modal body -->
                            <div class="modal-body">
                              Bạn có thật sự muốn xóa người dùng này
                            </div>
                      
                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <a href="delete_user.php?ma_loai='.$id.'" class="btn btn-danger" role="button" >Xóa</a>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            </div>
                      
                          </div>
                        </div>
                      </div>
                        ';
                    }}
                    ?>
                </tbody>
            </table>

        </main>
    </body>
        
</html>