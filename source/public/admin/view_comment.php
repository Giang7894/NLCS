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
            <h1 class="text-center pb-5">BÌNH LUẬN</h1>
            <table class="table table-hover table-striped table-bordered border-black">
                <thead>
                    <tr>
                        <th>Tên tài khoản</th>
                        <th>Tên công thức</th>
                        <th>Ngày giờ</th>
                        <th>Bình luận</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_GET['search']) && !empty($_GET['search'])){
                        $search=$_GET['search'];
                        $query="SELECT a.*,b.ten_tk,c.ten_ct  FROM binh_luan as a  join cong_thuc as c  join tai_khoan as b where a.id=b.id  and a.ma_ct=c.ma_ct and (b.ten_tk like '%$search%' or c.ten_ct like '%$search%' or a.binh_luan like '%$search%')";
                     }else
                    {$query='SELECT a.*,b.ten_tk,c.ten_ct   FROM binh_luan as a  join cong_thuc as c  join tai_khoan as b where a.id=b.id  and a.ma_ct=c.ma_ct';}
                    $stament=mysqli_query($connect,$query);
                    $count=mysqli_num_rows($stament);
                    if($count==0) echo'<tr><td colspan="5" class="text-center">Không có bình luận nào</td></tr>';
                    else{
                    while($row=mysqli_fetch_array($stament)){
                        $username=$row['ten_tk'];
                        $recipe=$row['ten_ct'];
                        $time=$row['ngay_gio'];
                        $cmt=$row['binh_luan'];
                        $id=$row['id'];
                        $recipeid=$row['ma_ct'];
                        if($row['an']==0) $stt="Bình thường";
                        else $stt="Đã bị ẩn đi";
                        echo'<tr>
                            <td>'.$username.'</td>
                            <td>'.$recipe.'</td>
                            <td>'.$time.'</td>
                            <td>'.$cmt.'</td>
                            <td>'.$stt.'<a type="button" class="btn btn-warning ms-2" href="hide_cmt.php?id='.$id.'&ma_ct='.$recipeid.'&ngay_gio='.$time.'"> Ẩn</a></td>
                        </tr>';
                    }}
                    ?>
                </tbody>
            </table>

        </main>
    </body>
        
</html>