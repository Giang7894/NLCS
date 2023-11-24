<?php

require_once __DIR__ . '/isadmin.php';


$query1="SELECT count(id) as tong from tai_khoan";
$query2="SELECT count(ma_ct) as tong FROM cong_thuc";
$query3="SELECT count(*) as tong from binh_luan";
$query4="SELECT count(*) as tong from danh_gia";
$r=mysqli_query($connect,$query1);
$user=mysqli_fetch_array($r);
$r=mysqli_query($connect,$query2);
$recipe=mysqli_fetch_array($r);
$r=mysqli_query($connect,$query3);
$cmt=mysqli_fetch_array($r);
$r=mysqli_query($connect,$query4);
$rate=mysqli_fetch_array($r);

?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . '/../../framework.php' ?>
        <title>ADMIN Page</title>
         <link href="/../img/logo.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    </head>
    <body >
        <header>
                <?php require_once __DIR__ . '/nav.php';?>
        </header>
        <main class="container">
        <div class="row" style="height: 30%">
          <div class="col-lg-3 col-3 " style="height: 40%">
            <!-- small box -->
            <div class="small-box bg-info  shadow-lg p-3 mb-5 " style="height: 100%; width: 100%;">
              <div class="inner">
                <h1 class="text-center display-1"><?php if(!empty($user)) echo $user['tong']; else echo '0'; ?></h1>

                <p class="in">User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="view_user.php" class="small-box-footer ">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-3" style="height: 40% ">
            <!-- small box -->
            <div class="small-box bg-success  shadow-lg p-3 mb-5" style="height: 100%; width: 100%;">
              <div class="inner">
                <h1 class="text-center display-1"> <?php if(!empty($recipe)) echo $recipe['tong']; else echo '0'; ?></h1>

                <p class="in">Recipes</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="view_recipes.php" class="small-box-footer text-light">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-3" style="height: 40%">
            <!-- small box -->
            <div class="small-box bg-warning  shadow-lg p-3 mb-5" style="height: 100%; width: 100%;">
              <div class="inner">
                <h1 class="text-center display-1"> <?php if(!empty($cmt)) echo $cmt['tong']; else echo '0'; ?></h1>

                <p class="in">Comment</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="view_comment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-3" style="height: 40%">
            <!-- small box -->
            <div class="small-box bg-danger  shadow-lg p-3 mb-5" style="height: 100%; width: 100%;">
              <div class="inner">
                <h1 class="text-center display-1"> <?php if(!empty($rate)) echo $rate['tong']; else echo '0'; ?></h1>

                <p class="in">Rating</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="view_rating.php" class="small-box-footer text-light">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="row" id="chart-container" >
            <canvas id="graph"></canvas>
        </div>
        </main>
       
    </body>
    <script>
         $(document).ready(function () {
            showGraph();
        });

        function showGraph(){
        
            $.post("data.php",
                function (data){
                    console.log(data);
                    var formStatusVar = [];
                    var total = []; 

                    for (var i in data) {
                        formStatusVar.push(data[i].so_sao+" star");
                        total.push(data[i].tong);
                    }

                    var options = {
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                display: true
                            }],
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    };

                    var myChart = {
                        labels: formStatusVar,
                        datasets: [
                            {
                                label: 'Tổng số đánh giá trên sao',
                                backgroundColor: '#17cbd1',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#0ec2b6',
                                hoverBorderColor: '#42f5ef',
                                data: total
                            }
                        ]
                    };

                    var bar = $("#graph"); 
                    var barGraph = new Chart(bar, {
                        type: 'bar',
                        data: myChart,
                        options: options
                    });
                });
        }
        </script>
        
</html>
