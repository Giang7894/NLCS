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
      <input class="form-control me-2" type="search" placeholder="Tìm kiếm các bình luận của một tài khoản hoặc một công thức nào đó" aria-label="Search" name="search">
      <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <main class="container">  
            <h1>COMMENT</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Họ tên</th>
                        <th>Tên tài khoản</th>
                        <th>Tên món ăn</th>
                        <th>Số sao</th>
                        <th>Bình luận</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_GET['search']) && !empty($_GET['search'])){
                        $search=$_GET['search'];
                        $query="SELECT d.tentaikhoan,c.tencongthuc,a.sosao,a.binhluan  FROM danhgia as a  join congthuc as c join taikhoan as d where a.id=d.id and a.macongthuc=c.macongthuc and (b.hoten like '%$search%' or c.tencongthuc like '%$search%')";
                     }else
                    {$query='SELECT d.tentaikhoan,c.tencongthuc,a.sosao,a.binhluan  FROM danhgia as a  join congthuc as c join taikhoan as d where a.id=d.id and a.macongthuc=c.macongthuc  ';}
                    $stament=mysqli_query($connect,$query);
                    $count=mysqli_num_rows($stament);
                    if($count==0) echo'<tr><td colspan="4" class="text-center">Không có kết quả<td></tr>';
                    else{
                    while($row=mysqli_fetch_array($stament)){
                        $name=$row['hoten'];
                        $username=$row['tentaikhoan'];
                        $recipe=$row['tencongthuc'];
                        $star=$row['sosao'];
                        $cmt=$row['binhluan'];
                        echo'<tr>
                            <td>'.$name.'</td>
                            <td>'.$username.'</td>
                            <td>'.$recipe.'</td>
                            <td>'.$star.'</td>
                            <td>'.$cmt.'</td>
                        </tr>';
                    }}
                    ?>
                </tbody>
            </table>

        </main>
    </body>
        
</html>