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
            <h1 class="text-center pb-5">ĐÁNH GIÁ</h1>
            <table class="table table-hover table-striped table-bordered border-black">
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
                        $query="SELECT a.*,b.ten_tk,c.ten_ct  FROM danh_gia as a  join cong_thuc as c  join tai_khoan as b where a.id=b.id  and a.ma_ct=c.ma_ct and (b.ten_tk like '%$search%' or c.ten_ct like '%$search%' or a.so_sao='$search')";
                     }else
                    {$query='SELECT distinct a.*,b.ten_tk,c.ten_ct   FROM danh_gia as a  join cong_thuc as c  join tai_khoan as b where a.id=b.id and a.ma_ct=c.ma_ct order by c.ten_ct asc';}
                    $stament=mysqli_query($connect,$query);
                    $count=mysqli_num_rows($stament);
                    if($count==0) echo'<tr><td colspan="3" class="text-center">Không có đánh giá nào</td></tr>';
                    else{
                    while($row=mysqli_fetch_array($stament)){
                        $username=$row['ten_tk'];
                        $recipe=$row['ten_ct'];
                        $star=$row['so_sao'];

                        echo'<tr>
                            <td>'.$username.'</td>
                            <td>'.$recipe.'</td>
                            <td>';
                        for ($i=1;$i<=$star;$i++)  echo '<i class="fa-solid fa-star" style="color: #ea8f10;"></i>';
                        echo'('.$star.')</td></tr>';
                    }}
                    ?>
                </tbody>
            </table>

        </main>
    </body>
        
</html>