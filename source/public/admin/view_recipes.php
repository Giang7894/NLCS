<?php

require_once __DIR__ . '/isadmin.php';




?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . '/../../framework.php' ?>
        <?php if(!empty($_SESSION['msg'])){
            echo'<script>alert("'.$_SESSION['msg'].'");</script>';
        $_SESSION['msg']='';}
         ?>
        <title>ADMIN Page</title>
    </head>
    <body >
        <?php require_once __DIR__ . '/nav.php'?>
        <form class="d-flex" method="GET" action="#">
      <input class="form-control me-2" type="search" placeholder="Tìm kiếm một công thức nào đó" aria-label="Search" name="search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
        <main class="container">  
            <h1 class="text-center">CÔNG THỨC</h1>
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th >Tên món ăn</th>
                        <th>Danh mục</th>
                        <th >Hình ảnh</th>
                        <th>Chi tiết</th>
                        <th >Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(isset($_GET['search']) && !empty($_GET['search'])){
                      $search=$_GET['search'];
                      $query="SELECT a.*,b.ten_loai FROM cong_thuc as a join danh_muc as b  where a.ma_loai=b.ma_loai and  (a.ten_ct like '% $search %' or a.nguyen_lieu like '% $search %')";
                   }else
                    {$query='SELECT a.*,b.ten_loai from cong_thuc as a join danh_muc as b where a.ma_loai=b.ma_loai';}
                    $result=mysqli_query($connect, $query);
                    $count=mysqli_num_rows($result);
                    if($count==0) echo'<tr><td colspan="6" class="text-center">Không có công thức</td></tr>';
                    else{
                    while($row=mysqli_fetch_array($result)){
                        $id=$row['ma_ct'];
                        $name=$row['ten_ct'];
                        $pic=$row['hinh_anh'];
                        $cate=$row['ten_loai'];
                        echo"<tr>
                            <td>$name</td>
                            <td>$cate</td>
                            <td><img class=\"img\" width=\"150px\" height=\"150px\" src=\"$pic\"></td>
                            <td><a type=\"button\" class=\"btn btn-info\" href=\"view_recipe_detail.php?ma_ct=$id\"><i class=\"fa-regular fa-eye pe-1\" style=\"color: #ffffff;\"></i>Xem chi tiết</a></td>
                            <td><a type=\"button\" class=\"btn btn-success\" href=\"edit_recipe.php?id=$id\"><i class=\"fas fa-edit pe-1\"></i>Sửa</a></td>
                            <td><button type=\"button\" class=\"btn btn-danger\" data-bs-toggle=\"modal\" data-bs-target=\"#myModal$id\">
                            <i class=\"fa-solid fa-trash pe-1\" style=\"color: #ffffff;\"></i>Xoá
                          </button></td>
                        </tr>";
                        echo"
                        <div class=\"modal fade\" id=\"myModal$id\">
                        <div class=\"modal-dialog modal-dialog-centered\">
                          <div class=\"modal-content\">
                      
                            <!-- Modal Header -->
                            <div class=\"modal-header\">
                              <h4 class=\"modal-title\">Xóa công thức</h4>
                              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
                            </div>
                      
                            <!-- Modal body -->
                            <div class=\"modal-body\">
                              Bạn có thật sự muốn xóa công thức này
                            </div>
                      
                            <!-- Modal footer -->
                            <div class=\"modal-footer\">
                            <a href=\"delete_recipe.php?id=$id\" class=\"btn btn-danger\" role=\"button\" >Xóa</a>
                              <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Đóng</button>
                            </div>
                      
                          </div>
                        </div>
                      </div>
                        ";
                    }}
                    ?>
                </tbody>
            </table>

        </main>

        
</html>
