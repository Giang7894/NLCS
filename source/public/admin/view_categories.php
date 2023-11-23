<?php  

require_once __DIR__ . '/isadmin.php';

?>


<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . '/../../framework.php';?>
        <?php if(!empty($_SESSION['msg'])){
            echo'<script>alert("'.$_SESSION['msg'].'");</script>';
        $_SESSION['msg']='';}
         ?>
    </head>
    <body>
            <?php  require_once __DIR__ . '/nav.php';?>
        <main class="container">
            <h1 class="text-center">DANH MỤC</h1>
            <a type="button" class="btn btn-primary mb-5" href="add_category.php"><i class="fa fa-plus pe-2" aria-hidden="true"></i>Thêm</a>
            <table class="table table-hover table-striped table-bordered border-black">
                <thead>
                    <tr>
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Số công thức</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     if(isset($_GET['search']) && !empty($_GET['search'])){
                        $search=$_GET['search'];
                        $query="SELECT a.*,count(b.ma_ct) as tong FROM danh_muc as a left outer join cong_thuc as b  on a.ma_loai=b.ma_loai where   a.ten_loai like '%$search%' group by a.ma_loai";
                     }
                    else{$query='SELECT a.*,count(b.ma_ct) as tong FROM danh_muc as a left outer join cong_thuc as b  on a.ma_loai=b.ma_loai group by a.ma_loai';}
                    $stament=mysqli_query($connect,$query);
                    $count=mysqli_num_rows($stament);
                    if($count==0) echo'<tr><td colspan="5" class="text-center">Không có danh mục nào</td></tr>';
                    else{
                    while($row=mysqli_fetch_array($stament)){
                        echo'<tr>
                            <td>'.$row['ma_loai'].'</td>
                            <td>'.$row['ten_loai'].'</td>
                            <td>'.$row['tong'].'</td>
                            <td><a type="button" class="btn btn-success" href="edit_category.php?ma_loai='.$row['ma_loai'].'"><i class="fas fa-edit pe-1"></i>Sửa</a></td>
                            <td><a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal'.$row['ma_loai'].'"><i class="fa-solid fa-trash pe-1" style="color: #ffffff;"></i>Xóa</a></td>
                        ';
                        echo'
                        <div class="modal fade" id="myModal'.$row['ma_loai'].'">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                      
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Xóa danh mục</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                      
                            <!-- Modal body -->
                            <div class="modal-body">
                              Bạn có thật sự muốn xóa danh mục này
                            </div>
                      
                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <a href="delete_category.php?ma_loai='.$row['ma_loai'].'" class="btn btn-danger" role="button" >Xóa</a>
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

