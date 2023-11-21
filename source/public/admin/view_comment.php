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
      <input class="form-control me-2" type="search" placeholder="Tìm kiếm các bình luận của một tài khoản hoặc một công thức nào đó" aria-label="Search" name="search">
      <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <main class="container">  
            <h1>COMMENT</h1>
            <table class="table table-hover">
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
                        $query="SELECT a.*,b.ten_tk,c.ten_ct  FROM binh_luan as a  join cong_thuc as c  join tai_khoan as b where a.id=b.id  and a.ma_ct=c.ma_ct and (b.ten_tk like '%$search%' or c.ten_ct like '%$search%')";
                     }else
                    {$query='SELECT a.*,b.ten_tk,c.ten_ct   FROM binh_luan as a  join cong_thuc as c  join tai_khoan as b where a.id=b.id  and a.ma_ct=c.ma_ct';}
                    $stament=mysqli_query($connect,$query);
                    $count=mysqli_num_rows($stament);
                    if($count==0) echo'<tr><td colspan="5" class="text-center">Không có bình luận nào<td></tr>';
                    else{
                    while($row=mysqli_fetch_array($stament)){
                        $username=$row['ten_tk'];
                        $recipe=$row['ten_ct'];
                        $time=$row['ngay_gio'];
                        $cmt=$row['binhluan'];
                        $id=$row['id'];
                        $recipeid=$row['ma_ct'];
                        if($row['an']==0) $stt="Bình thường";
                        else $stt="Đã bị ẩn đi";
                        echo'<tr>
                            <td>'.$username.'</td>
                            <td>'.$recipe.'</td>
                            <td>'.$time.'</td>
                            <td>'.$cmt.'</td>
                            <td>'.$stt.'<a type="button" class="btn btn-info" href="hide_cmt.php?id='.$id.'&ma_ct='.$recipeid.'&ngay_gio='.$time.'"> Ẩn</a></td>
                        </tr>';
                    }}
                    ?>
                </tbody>
            </table>

        </main>
    </body>
        
</html>