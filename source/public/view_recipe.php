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

            <?php if(!empty($_SESSION['addmsg'])) echo '<script>alert("'.$_SESSION['addmsg'].'")</script>'; $_SESSION['addmsg']=''; ?>
            <?php if(!empty($_SESSION['error'])) echo '<script>alert("'.$_SESSION['error'].'")</script>'; $_SESSION['error']=''; ?>
    </head>
    <body>
        <main class="container">
            <div class="row">
            <div class="col-8">
            <?php 
                echo'<div class="my-5 content px-5 pb-5"><h1 class="mb-3">'.$row['ten_ct'].'</h1>
                <img src="'.$row['hinh_anh'].'" alt="Nothing to see here" style="width: 100%;">
                <div class="mt-3">'.$row['mo_ta'].'</div></div>
                <div class="my-5 content px-5 pb-5"><h1 class="mb-3">Dụng cụ cần thiết</h1>
                <div>'.$row['dung_cu'].'</div></div>
                <div class="my-5 content px-5 pb-5"><h1 class="mb-3">Các nguyên liệu cần chuẩn bị</h1>
                <div id="ing">'.$ing.'</div></div>
                <div class="my-5 content px-5 pb-5"><h1 class="mb-3">Các bước thực hiện</h1>
                <div id="step">'.$row['buoc'].'</div></div>';
            ?>
            </div>
            <div class="col-1"></div>
            <div class="col-3"></div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="row content my-5 px-5 pb-5 border border-dark">
                        <div class="col-4">

                                <h2>Đánh giá</h2>
                                <div id="rate" class="ms-3"><?php echo round($row['tb'],1); ?><small id="s">/5 <i class="fa-solid fa-star" style="color: #ea8f10;"></i></small></div>
                                
                                <div class="ms-4 mt-4"><?php echo $row['tong'];?> đánh giá</div>
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
                        <div class="col-3"><a type="button" class="btn btn-primary add" href="add_my_recipe.php?ma_ct=<?php echo $_GET['id'] ?>">Thêm vô kho</a></div>
                    </div>
                </div>
            </div></div></div>
            

           <div class="row">
            <div class="col-8 content mt-5 mb-4 px-5 ">
            <h1 class="mb-3">BÌNH LUẬN</h1>
            <form method="post">
                <div class="row">
                    <div class="col-1 text-center">Bạn</div>
                    <div class="col-10">
                        <div class="row pb-3"><textarea name="cmt" placeholder="Cảm thấy công thức của chúng tôi có ích? Hãy để lại bình luận" required></textarea></div>
                        <div class="row pb-3">
                            <div class="col-9"></div>
                            <div class="col-3"><button name="submit" type="submit">Bình luận</button></div>
                        </div>
                    </div>
                </div>
                </div>
            <div class="col-4"></div>
            </div>
            <?php 
                $query="SELECT a.id,a.ten_tk,b.* FROM tai_khoan as a join binh_luan as b where a.id=b.id";
                $stament=mysqli_query($connect,$query);
                while($row=mysqli_fetch_array($stament)){
                    if($row['an']==1) echo'<div class="cmt col-8 content pe-5 ps-3 py-4 border border-subtle mb-2">
                    <div class="row ">
                    <div class="col-1"><img src="https://st.nettruyenus.com/Data/SiteImages/anonymous.png"></div>
                    <div class="col-10 border border-black">
                            <div class="uname">'.$row['ten_tk'].'</div>
                            <hr>
                            <div class="pb-3"><i>Bình luận đã bị ẩn đi</i></div>
                        </div></div></div>';
                    else{
                    echo'<div class="cmt col-8 content pe-5 ps-3 py-4 border border-subtle mb-2">
                        <div class="row ">
                        <div class="col-1"><img src="https://st.nettruyenus.com/Data/SiteImages/anonymous.png"></div>
                        <div class="col-10 border border-black">
                            <div class="uname">'.$row['ten_tk'].'</div>
                            <hr>
                            <div class="pb-3">'.$row['binh_luan'].'</div>
                        </div>';
                    if(!empty($_SESSION['id'])){
                        if($row['id']==$_SESSION['id'])
                        echo'<div class="col-1 mt-4"><a name="Xoa" type="button" class="btn btn-danger" href="delete_cmt.php?ma_ct='.$_GET['id'].'&id='.$_SESSION['id'].'&ngay_gio='.$row['ngay_gio'].'">Xóa</a></div>';
                    }
                    echo'</div></div>';
                    }
                }
            ?>
            </form>
            </main>
            <?php require_once __DIR__ . '/../UI/footer.php';?>
    </body>
    <style>
        .add{
            margin-top:50%;
        }
        .uname{
            color: #03f;
        }
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
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
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





