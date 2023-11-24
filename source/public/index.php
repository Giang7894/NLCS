<?php


require_once __DIR__ . '/isuser.php';

require_once __DIR__ . '/../db/db_connection.php';



$query="SELECT * FROM cong_thuc";

$stament=mysqli_query($connect,$query);

$i=0;

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
        <main>
        <div class="container text-center">
        <div class="row">
        <?php while($row=mysqli_fetch_array($stament)){
                    echo'
                        <div class="col">
                        <img class="img" src="'.$row['hinh_anh'].'"/>
                        <div><a href="view_recipe.php?id='.$row['ma_ct'].'">'.$row['ten_ct'].'</a></div>
                        <div>'.$row['mo_ta'].'</div>
                        </div>';
            if($i==2){
                echo'
                </div>';
                echo'
                <div class="row">';
                $i=0;
            }
            $i=$i+1;
            }
        ?>
        </div>
        </main>
        <?php
            require_once __DIR__ . '/../UI/footer.php';
        ?>

        <a href='logout.php'>logout</a>
    </body>
</html>