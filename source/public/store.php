<?php

require_once __DIR__ . '/isuser.php';

require_once __DIR__ . '/../db/db_connection.php';

$query="SELECT a.ma_ct,b.ten_ct,b.hinh_anh FROM chi_tiet_kho as a join cong_thuc as b where a.ma_ct=b.ma_ct";
$r=mysqli_query($connect,$query);
$count=mysqli_num_rows($r);

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
        <?php require_once __DIR__ . '/../UI/header.php'; ?>
        <main class="container">
            <h1 class="text-center mb-5">MY RECIPES</h1>
            <?php if($count==0){
                echo '<div>Bạn chưa có công thức nào trong kho cả. Để thêm một công thức vào kho hãy nhấn nút "Thêm vào kho" trong phần đánh giá của mỗi công thức.</div>';
            }else{
                for($i=1;$i<=$count;$i++){
                    echo'<div class="row my-4">';
                        for($i=1;$i<=4;$i++){
                            $row=mysqli_fetch_array($r);
                            if(!empty($row)){
                                echo'<div class="col-2 recipe" href="view_recipe.php?id='.$row['ma_ct'].'">
                                        <div class="row my-3"><img src="'.$row['hinh_anh'].'" style="height: 100px;width: 100%;"></div>
                                        <div class="row my-2"><h3 class="link">'.$row['ten_ct'].'</h3></div>
                                        </div>';       
                            } 
                        }
                        echo '</div>';
                }
            } ?>
        </main>
        <?php require_once __DIR__ . '/../UI/footer.php'; ?>
    </body>
    <style>
        .recipe:hover{
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 12%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }
        .recipe:hover{
            cursor: pointer;
        }
        .recipe{
            background: white;
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