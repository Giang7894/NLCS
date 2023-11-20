<?php

require_once __DIR__ . '/isadmin.php';

require_once __DIR__ . '/../db/db_connection.php';


?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . '/../framework.php' ?>
        <title>ADMIN Page</title>
    </head>
    <body >
        <?php require_once __DIR__ . '/nav.php'?>
        <main class="container">  
            <h1 class="text-center">Top món ăn được đánh giá cao </h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th >Tên món ăn</th>
                        <th >Hình ảnh</th>
                        <th >Số sao trung bình</th>
                        <th>Số lượt bình luận</th>
                        <th>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="SORT">
                            <option selected id="DESC">Sắp xếp theo đánh giá cao nhất</option>
                            <option value="2" id="ASC">Sắp xếp theo đánh giá thấp nhất</option>
                        </select>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query='SELECT a.macongthuc,a.tencongthuc,a.hinhanh,avg(b.sosao) as saotb,count(b.id) as songuoi FROM congthuc as a left outer join danhgia as b on a.macongthuc=b.macongthuc group by a.macongthuc order by saotb DESC';
                    $stament=mysqli_query($connect,$query);
                    while($row=mysqli_fetch_array($stament)){
                        $name=$row['tencongthuc'];
                        $pic=$row['hinhanh'];
                        $avg=round($row['saotb']);
                        $count=$row['songuoi'];
                        echo'<tr>
                            <td>'.$name.'</td>
                            <td><img class="img" width="150px" height="150px" src='.$pic.'></td>
                            <td>'.$avg.'</td>
                            <td>'.$count.'</td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>

        </main>
        <script>
        $(document).ready(function(){
            $("#SORT").on("change",function(){
                location.href="acs.php";
            })
        })
    </script>
    </body>
        
</html>
