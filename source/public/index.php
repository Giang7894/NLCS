<?php

session_start();

require_once __DIR__ . '/../db/db_connection.php';



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
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000">
                    <img style="height: 600px;" src="https://cdn.tgdd.vn/Files/2022/01/25/1412805/cach-nau-pho-bo-nam-dinh-chuan-vi-thom-ngon-nhu-hang-quan-202201250230038502.jpg" class="d-block w-90" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                    <img style="height: 600px;" src="https://static.vinwonders.com/production/bun-bo-hue-cau-giay-1.jpg" class="d-block w-90" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                    <img style="height: 600px;" src="https://cdn.tgdd.vn/Files/2020/07/23/1273104/dam-da-tinh-que-voi-mon-com-chay-kho-quet-mien-tay-202206031111072558.jpg" class="d-block w-90" alt="...">
                    </div>
                </div>
            </div>
        </main>
        <?php
            require_once __DIR__ . '/../UI/footer.php';
        ?>

    </body>
</html>