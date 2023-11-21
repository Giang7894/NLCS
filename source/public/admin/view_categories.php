<?php  

require_once __DIR__ . '/isadmin.php';

?>


<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <header>
            <?php require_once __DIR__ . '/../../framework.php';
                require_once __DIR__ . '/nav.php';?>
        </header>
        <main>
            <h1 class="text-center">Danh mục công thức</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Số công thức<th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     if(isset($_GET['search']) && !empty($_GET['search'])){
                        $search=$_GET['search'];
                        $query="SELECT a.*,count(b.ma_ct) as tong FROM danh_muc as a join cong_thuc as b  where a.ma_loai=b.ma_loai and  a.ten_loai like '%$search%' group by a.ma_loai";
                     }
                    else{$query='SELECT a.*,count(b.ma_ct) FROM danh_muc as a join cong_thuc as b  where a.ma_loai=b.ma_loai group by a.ma_loai';}
                    $stament=mysqli_query($connect,$query);
                    $count=mysqli_num_rows($stament);
                    if($count==0) echo'<tr><td colspan="5" class="text-center">Không có danh mục nào<td></tr>';
                    else{
                    while($row=mysqli_fetch_array($stament)){
                        echo'<tr>
                            <td>'.$row['ma_loai'].'</td>
                            <td>'.$row['ten_loai'].'</td>
                            <td>'.$row['tong'].'</td>
                            <td><a type="button" class="btn btn-success" href="edit_category.php?ma_loai='.$row['ma_loai'].'">Sửa</a></td>
                            <td><a type="button" class="btn btn-danger" href="delete_category.php?ma_loai='.$row['ma_loai'].'">Xóa</a></td>
                        </tr>';
                    }}
                    ?>
                </tbody>
            </table>
        </main>
    </body>
</html>

