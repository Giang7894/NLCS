<?php 

require_once __DIR__ . '/isadmin.php';

if(isset($_GET['ma_ct'])){
    $query="SELECT * FROm cong_thuc where ma_ct='$_GET[ma_ct]'";
    $result=mysqli_query($connect,$query);
}


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
            <h1 class="text-center">Chi tiết</h1>
            <table class="table table-hover table-striped table-bordered border-black">
                <thead>
                    <tr>
                        <th>Mô tả</th>
                        <th>Dụng cụ</th>
                        <th>Nguyên liệu</th>
                        <th>Bước</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while($row=mysqli_fetch_array($result)){
                        $de=$row['mo_ta'];
                        $tool=$row['dung_cu'];
                        $ing=$row['nguyen_lieu'];
                        $step=$row['buoc'];
                        echo'
                            <tr>
                                <td>'.$de.'</td>
                                <td>'.$tool.'</td>
                                <td>'.$ing.'</td>
                                <td>'.$step.'</td>
                            </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>

        </main>

        
</html>