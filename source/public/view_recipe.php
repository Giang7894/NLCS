<?php

require_once __DIR__ . '/isuser.php';

require_once __DIR__ . '/../db/db_connection.php';

if(isset($_GET['id']) && $_GET['id']>0 && is_numeric($_GET['id'])){
    $query="SELECT * FROM cong_thuc where ma_ct='$_GET[id]'";
    $stament=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($stament);
    $ing=$row['nguyen_lieu'];
}else{
    header('location:index.php');
}

if(isset($_POST['submit'])){
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
            <script type="text/javascript" src="js/rating.js"></script>
            <style>
                .rating-group i:hover{
                    cursor: pointer;
                }
            </style>
    </head>
    <body>
        <main class="container">
            <?php 
                echo'<h1>'.$row['ten_ct'].'</h1>
                <div>'.$row['mo_ta'].'</div>
                <img src="'.$row['hinh_anh'].'" alt="Nothing to see here">
                <h1>Dụng cụ cần thiết</h1>
                <div>'.$row['dung_cu'].'</div>
                <h1>Các nguyên liệu cần chuẩn bị</h1>
                <div id="ing">'.$ing.'</div>
                <h1>Các bước thực hiện</h1>
                <div id="step">'.$row['buoc'].'</div>';
            ?>
        </main>
        <aside class="container">
            <h1>Binh luan</h1>
            <form method="post">
                <div>
                    <div>Ban</div>
                    <div name="star">Đánh giá</div>
                    <span class="rating-group">
                        <span><i class="fa-regular fa-star" style="color: #ea8f10;"  id="1" onmouseenter="rating(this.id)" onmouseleave="unrating(this.id)" onclick="rate(this.id)"></i></span>
                        <span><i class="fa-regular fa-star" style="color: #ea8f10;"  id="2" onmouseenter="rating(this.id)" onmouseleave="unrating(this.id)" onclick="rate(this.id)"></i></span>
                        <span><i class="fa-regular fa-star" style="color: #ea8f10;"  id="3" onmouseenter="rating(this.id)" onmouseleave="unrating(this.id)" onclick="rate(this.id)"></i></span>
                        <span><i class="fa-regular fa-star" style="color: #ea8f10;"  id="4" onmouseenter="rating(this.id)" onmouseleave="unrating(this.id)" onclick="rate(this.id)"></i></span>
                        <span><i class="fa-regular fa-star" style="color: #ea8f10;"  id="5" onmouseenter="rating(this.id)" onmouseleave="unrating(this.id)" onclick="rate(this.id)"></i></span>
                    </span>
                </div>
            </form>
            <form method="post">
                    <input name="cmt"></input>
                    <button name="submit" type="submit">Bình luận</button>
            <?php 
                $query="SELECT * FROM tai_khoan as a join binh_luan as b where a.id=b.id";
                $stament=mysqli_query($connect,$query);
                while($row=mysqli_fetch_array($stament)){
                    if($row['an']==1) echo'<div>Bình luận đã bị ẩn đi</div>';
                    else{
                    echo'<div class="cmt">
                        <div>'.$row['ten_tk'].'</div>
                        <div>'.$row['binh_luan'].'</div>
                        <div>'.$row['ngay_gio'].'</div>';
                    if($row['id']==$_SESSION['id']){
                        echo'<a name="Xoa" type="button" href="delete_cmt.php?ma_ct='.$_GET['id'].'&id='.$_SESSION['id'].'&ngay_gio='.$row['ngay_gio'].'">Xoa</a>';
                    }
                    echo'</div>';
                    }
                }
            ?>
            </form>
        </aside>
    </body>
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