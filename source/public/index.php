<?php

session_start();

require_once __DIR__ . '/../db/db_connection.php';

$query="SELECT a.ma_ct,a.ten_ct,a.hinh_anh,avg(so_sao) as tb,count(b.id) as tong from cong_thuc as a left outer join danh_gia as b on a.ma_ct=b.ma_ct group by a.ma_ct order by tb desc";
$r=mysqli_query($connect,$query);

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
                <div class="col-7">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="5000">
                                <img style="height: 600px;" src="https://cdn.tgdd.vn/Files/2022/01/25/1412805/cach-nau-pho-bo-nam-dinh-chuan-vi-thom-ngon-nhu-hang-quan-202201250230038502.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <img style="height: 600px;" src="https://static.vinwonders.com/production/bun-bo-hue-cau-giay-1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <img style="height: 600px;" src="https://cdn.tgdd.vn/Files/2020/07/23/1273104/dam-da-tinh-que-voi-mon-com-chay-kho-quet-mien-tay-202206031111072558.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 bg-beige ms-4" id="news" style="height: 550px;">
                    <div class="row text-center pt-2"><h2>News</h2></div>
                    <div class="row my-5 new">
                        <div class="col-4"><img src="https://i1-dulich.vnecdn.net/2023/06/09/Image-787774701-ExtractWord-3-9100-5554-1686295848.png?w=500&h=300&q=100&dpr=1&fit=crop&s=eSviS4tumPcbwxKykIf4GQ" style="width: 100%; height: 100%;"></div>
                        <div class="col-8 article"><b>Hơn ba năm đưa Michelin Guide về Việt Nam</b></div>
                    </div>
                    <div class="row my-5 new">
                        <div class="col-4"><img src="https://i1-dulich.vnecdn.net/2023/06/22/inter-1687411393-8206-1687411413.png?w=500&h=300&q=100&dpr=1&fit=crop&s=ESRhhBb_J3aNirTxixxOXA" style="height: 100%;width: 100%;"></div>
                        <div class="col-8 article"><b>InterContinental Phu Quoc giới thiệu menu mùa hè 5 sao</b></div>
                    </div>
                    <div class="row my-5 new">
                        <div class="col-4"><img src="https://i1-giadinh.vnecdn.net/2023/03/01/nh22-1677655227-3617-1677655410.jpg?w=500&h=300&q=100&dpr=1&fit=crop&s=uVLwLK70E4-2ZctFN45PgQ" style="height: 100%;width: 100%;"></div>
                        <div class="col-8 article"><b>Luộc gà bằng nước lạnh hay nước sôi?</b></div>
                    </div>
                    <div class="row my-5 new">
                        <div class="col-4"><img src="https://i1-vnexpress.vnecdn.net/2022/12/26/topp-1672040273-4207-1672040296.jpg?w=500&h=300&q=100&dpr=1&fit=crop&s=iNdViZLb1NddaEB9_jcpJg" style="height: 100%;width: 100%;"></div>
                        <div class="col-8 article"><b>Làng khô cá bổi vào vụ Tết</b></div>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <h2 class="text-center">Công thức nổi bật</h2>
            </div>
            <div class="row my-5 px-2">
                <?php for($i=1;$i<=2;$i++){
                    echo'<div class="row my-4">';
                    for($j=1;$j<=3;$j++){
                        $row=mysqli_fetch_array($r);
                        if(!empty($row)){
                        echo'<div class="col-3 recipe" href="view_recipe.php?id='.$row['ma_ct'].'">
                                <div class="row my-3"><img src="'.$row['hinh_anh'].'" style="height: 200px;width: 100%;"></div>
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

        </main>
        <?php
            require_once __DIR__ . '/../UI/footer.php';
        ?>

    </body>
    <style>
        .link:hover{
            text-decoration: underline;
        }
        .recipe:hover{
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 12%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }
        .recipe:hover{
            cursor: pointer;
        }
        #news{
            background: beige;
        }
        .new:hover{
            cursor: pointer;
        }
        .article:hover{
            text-decoration: underline;
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