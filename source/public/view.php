<?php 

session_start();
require_once __DIR__ . '/../db/db_connection.php';

$query="SELECT a.ma_ct,a.ten_ct,a.hinh_anh,ifnull(0,avg(so_sao)) as tb,count(b.id) as tong from cong_thuc as a left outer join danh_gia as b on a.ma_ct=b.ma_ct group by a.ma_ct order by tb desc";
$r=mysqli_query($connect,$query);
$count=mysqli_num_rows($r);
$sql="SELECT ten_loai from danh_muc";
$dm=mysqli_query($connect,$sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Let me cook</title>
        <?php require_once __DIR__ . '/../framework.php' ?>
        <link href="img/logo.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    </head>
    <body>
        <?php
            require_once __DIR__ . '/../UI/header.php';
        ?>
        <main class="container">
            <div class="row">
                <div class="col-2">
                    <?php while($cate=mysqli_fetch_array($dm)){
                        echo '<div class="row category">'.$cate['ten_loai'].'</div>';
                    } ?>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                    <?php for($j=1;$j<=$count;$j++){
                        echo'<div class="row my-4">';
                        for($i=1;$i<=4;$i++){
                            $row=mysqli_fetch_array($r);
                            if(!empty($row)){
                                echo'<div class="col-2 recipe" href="view_recipe.php?id='.$row['ma_ct'].'">
                                        <div class="row my-3"><img src="'.$row['hinh_anh'].'" style="height: 100px;width: 100%;"></div>
                                        <div class="row my-2"><h3 class="link">'.$row['ten_ct'].'</h3></div>
                                        <div class="row my-1"><span>';
                                for($m=1;$m<=round($row['tb']);$m++)      
                                echo'<span><i class="fa-solid fa-star" style="color: #ea8f10;"></i></span>';
                                        
                                echo'<span class="ms-3">'.$row['tong'].' đánh giá</span></span></div>
                                    </div><div class="col-1"></div>';
                            }
                            
                        }
                        echo '</div>';
                    } ?>
                </div>
            </div>
        </main>
        <?php
            require_once __DIR__ . '/../UI/footer.php';
        ?>

    </body>
    <style>
        .recipe:hover{
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 12%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }
        .recipe:hover{
            cursor: pointer;
        }
    </style>
    <script>
        $(document).ready(function(){
            $(".recipe").click(function(evt){
                location.href=$(this).attr("href");
            
            })
        })
    </script>
</html>