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
      <input class="form-control me-2" type="search" placeholder="Tìm kiếm các đánh giá của một tài khoản hoặc một công thức nào đó" aria-label="Search" name="search">
      <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <main class="container">  
            <h1 class="text-center">ĐÁNH GIÁ</h1>
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Tên tài khoản</th>
                        <th>Tên công thức</th>
                        <th>Số sao</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_GET['search']) && !empty($_GET['search'])){
                        $search=$_GET['search'];
                        $query="SELECT a.*,b.ten_tk,c.ten_ct  FROM danh_gia as a  join cong_thuc as c  join tai_khoan as b where a.id=b.id  and a.ma_ct=c.ma_ct and (b.ten_tk like '%$search%' or c.ten_ct like '%$search%')";
                     }else
                    {$query='SELECT a.*,b.ten_tk,c.ten_ct   FROM danh_gia as a  join cong_thuc as c  join tai_khoan as b where a.id=b.id  and a.ma_ct=c.ma_ct';}
                    $stament=mysqli_query($connect,$query);
                    $count=mysqli_num_rows($stament);
                    if($count==0) echo'<tr><td colspan="3" class="text-center">Không có bình luận nào</td></tr>';
                    else{
                    while($row=mysqli_fetch_array($stament)){
                        $username=$row['ten_tk'];
                        $recipe=$row['ten_ct'];
                        $star=$row['so_sao'];

                        echo'<tr>
                            <td>'.$username.'</td>
                            <td>'.$recipe.'</td>
                            <td>'.$star.'</td>
                        </tr>';
                    }}
                    ?>
                </tbody>
            </table>

        </main>
    </body>
        
</html>