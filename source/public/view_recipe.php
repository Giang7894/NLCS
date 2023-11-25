<?php

session_start();

require_once __DIR__ . '/../db/db_connection.php';

if(isset($_GET['id']) && $_GET['id']>0 && is_numeric($_GET['id'])){
    $query="SELECT a.*,avg(b.so_sao) as tb,count(b.id) as tong FROM cong_thuc as a left outer join danh_gia as b on a.ma_ct=b.ma_ct where a.ma_ct='$_GET[id]' group by a.ma_ct";
    $stament=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($stament);
    $ing=$row['nguyen_lieu'];
}else{
    header('location:index.php');
}

if(isset($_POST['submit'])){
    if(!isset($_SESSION['id'])) {header('location:login.php'); exit();}
    $id=$_SESSION['id'];
    $recipeid=$_GET['id'];
    $cmt=$_POST['cmt'];
    $star='5';
    $time=new \DATETIME();
    $time->setTimezone(new \DateTimeZone('Asia/Ho_Chi_Minh'));
    $dateTime = $time->format(' Y-m-d h:m:s ');
    $query="INSERT INTO binh_luan values('$recipeid','$id','$dateTime','$cmt','0')";
    mysqli_query($connect,$query);
    $focus=1;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . '/../framework.php';
            require_once __DIR__ . '/../UI/header.php';?>
    </head>
    <body>
        <main class="container">
            <div class="row">
            <div class="col-8">
            <?php 
                echo'<div class="my-5 content px-5 pb-5"><h1 class="mb-3">'.$row['ten_ct'].'</h1>
                <img src="'.$row['hinh_anh'].'" alt="Nothing to see here" style="width: 100%;">
                <div class="mt-3">'.$row['mo_ta'].'</div></div>
                <div class="my-5 content px-5 pb-5"><h1>Dụng cụ cần thiết</h1>
                <div>'.$row['dung_cu'].'</div></div>
                <div class="my-5 content px-5 pb-5"><h1>Các nguyên liệu cần chuẩn bị</h1>
                <div id="ing">'.$ing.'</div></div>
                <div class="my-5 content px-5 pb-5"><h1>Các bước thực hiện</h1>
                <div id="step">'.$row['buoc'].'</div></div>';
            ?>
            </div>
            <div class="col-1"></div>
            <div class="col-3"></div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="row content my-5 px-5 pb-5 border border-dark">
                        <div class="col-5">
                            <div class="">
                                <h1>Đánh giá</h1>
                                <div id="rate" class="ms-5"><?php echo round($row['tb'],1); ?><small id="s">/5 <i class="fa-solid fa-star" style="color: #ea8f10;"></i></small></div>
                                
                                <div class="ms-5 mt-4"><?php echo $row['tong'];?> đánh giá</div>
                            </div>
                        </div>
                        <div class="col-5">
                            <h2>Đánh giá của bạn</h2>
                            <br><br>
                            <span class="rating-group ms-5 border border-dark me-5 p-3">
                                <span><i class="fa-regular fa-star" style="color: #ea8f10;"  id="1" onmouseenter="rating(this.id)" onmouseleave="unrating(this.id)" onclick="rate(this.id)"></i></span>
                                <span><i class="fa-regular fa-star" style="color: #ea8f10;"  id="2" onmouseenter="rating(this.id)" onmouseleave="unrating(this.id)" onclick="rate(this.id)"></i></span>
                                <span><i class="fa-regular fa-star" style="color: #ea8f10;"  id="3" onmouseenter="rating(this.id)" onmouseleave="unrating(this.id)" onclick="rate(this.id)"></i></span>
                                <span><i class="fa-regular fa-star" style="color: #ea8f10;"  id="4" onmouseenter="rating(this.id)" onmouseleave="unrating(this.id)" onclick="rate(this.id)"></i></span>
                                <span><i class="fa-regular fa-star" style="color: #ea8f10;"  id="5" onmouseenter="rating(this.id)" onmouseleave="unrating(this.id)" onclick="rate(this.id)"></i></span>
                            </span>
                            <?php if(!empty($_SESSION['ratemsg'])) echo '<div class="text-success mt-5">'.$_SESSION['ratemsg'].'<div>'; ?>
                        </div>
                    </div>
                </div>
                <div class="col-2"><a type="button" class="btn btn-primary mt-5" href="add_my_recipe.php?ma_ct=<?php echo $_GET['id'] ?>">Thêm vào kho</a></div>
            </div></div></div>
            

           
            <h1>BÌNH LUẬN</h1>
            <form method="post">
                <div class="row">
                    <div class="col-1 text-end">Bạn</div>
                    <div class="col-5">
                        <div class="row pb-3"><textarea name="cmt" placeholder="Cảm thấy công thức của chúng tôi có ích? Hãy để lại bình luận" required></textarea></div>
                        <div class="row pb-3">
                            <div class="col-9"></div>
                            <div class="col-3"><button name="submit" type="submit">Bình luận</button></div>
                        </div>
                    </div>
                </div>
            <?php 
                $query="SELECT a.id,a.ten_tk,b.* FROM tai_khoan as a join binh_luan as b where a.id=b.id";
                $stament=mysqli_query($connect,$query);
                while($row=mysqli_fetch_array($stament)){
                    if($row['an']==1) echo'<div>Bình luận đã bị ẩn đi</div>';
                    else{
                    echo'<div class="cmt">
                        <div>'.$row['ten_tk'].'</div>
                        <div>'.$row['binh_luan'].'</div>
                        <div>'.$row['ngay_gio'].'</div>';
                    if(!empty($_SESSION['id'])){
                        if($row['id']==$_SESSION['id'])
                        echo'<a name="Xoa" type="button" href="delete_cmt.php?ma_ct='.$_GET['id'].'&id='.$_SESSION['id'].'&ngay_gio='.$row['ngay_gio'].'">Xoa</a>';
                    }
                    echo'</div>';
                    }
                }
            ?>
            </form>
            </main>
    </body>
    <style>
        .rating-group i:hover{
                    cursor: pointer;
                }
        #s{
            font-size: 20px;
        }
        #rate{
            font-size: 50px;
        }
        .content{
            background: white;

        }
        body{
            background: #f3f3f3;
        }
        textarea{
            resize: none;
            height: 70px;
        }
    </style>
    <script>
        $(document).ready(function(){
            <?php if(!empty($focus) || !empty($_SESSION['focus'])) {echo '$("html, body").scrollTop($(".cmt").offset().top);'; $_SESSION['focus']='';}?>
        })
        function rating(e){
            for(let i=1;i<=e;i++){
                $("#"+i).removeClass('fa-regular');
                $("#"+i).addClass('fa-solid');
            }
        }

        function unrating(e){
            for(let i=1;i<=e;i++){
                $("#"+i).removeClass('fa-solid');
                $("#"+i).addClass('fa-regular');
            }
        }

        function rate(e){
            location.href="http://recipes.localhost/rating.php?ma_ct=<?php echo $_GET['id'] ?>&danh_gia="+e;
        }
    </script>
</html>





