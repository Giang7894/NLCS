<?php

require_once __DIR__ . '/isadmin.php';

require_once __DIR__ . '/../../db/db_connection.php';


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
      <input class="form-control me-2" type="search" placeholder="Tìm kiếm một công thức nào đó" aria-label="Search" name="search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
        <main class="container">  
            <h1>RECIPES</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th >Tên món ăn</th>
                        <th >Hình ảnh</th>
                        <th >Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(isset($_GET['search']) && !empty($_GET['search'])){
                      $search=$_GET['search'];
                      $query="SELECT a.*FROM cong_thuc as a  where  (a.ten_ct like '% $search %' or a.nguyenlieu like '% $search %')";
                   }else
                    {$query='SELECT ma_ct,ten_ct,hinh_anh from cong_thuc';}
                    $result=mysqli_query($connect, $query);
                    $count=mysqli_num_rows($result);
                    if($count==0) echo'<tr><td colspan="4" class="text-center">Không có công thức<td></tr>';
                    else{
                    while($row=mysqli_fetch_array($result)){
                        $id=$row['ma_ct'];
                        $name=$row['ten_ct'];
                        $pic=$row['hinh_anh'];
                        echo"<tr>
                            <td>$name</td>
                            <td><img class=\"img\" width=\"150px\" height=\"150px\" src=\"$pic\"></td>
                            <td><a href=\"edit_recipe.php?id={$row['macongthuc']}\">Sửa</a></td>
                            <td><button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#myModal$id\">
                            Xoa
                          </button></td>
                        </tr>";
                        echo"
                        <div class=\"modal fade\" id=\"myModal$id\">
                        <div class=\"modal-dialog modal-dialog-centered\">
                          <div class=\"modal-content\">
                      
                            <!-- Modal Header -->
                            <div class=\"modal-header\">
                              <h4 class=\"modal-title\">Modal Heading</h4>
                              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
                            </div>
                      
                            <!-- Modal body -->
                            <div class=\"modal-body\">
                              Ban co that su muon xoa
                            </div>
                      
                            <!-- Modal footer -->
                            <div class=\"modal-footer\">
                            <a href=\"delete.php?id=$id\" class=\"btn btn-danger\" role=\"button\" >Xoa</a>
                              <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Dong</button>
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
