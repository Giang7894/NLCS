<?php

require_once __DIR__ . '/isuser.php';

require_once __DIR__ . '/../db/db_connection.php';

if(isset($_GET['id']) && $_GET['id']>0 && is_numeric($_GET['id'])){
    $query="SELECT * FROM congthuc where macongthuc='$_GET[id]'";
    $stament=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($stament);
    $ing=$row['nguyenlieu'];
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
    $query="INSERT INTO danhgia values('$id','$recipeid','$cmt','$dateTime','$star')";
    mysqli_query($connect,$query);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . '/../framework.php';
            require_once __DIR__ . '/../UI/header.php';?>
            <script type="text/javascript" src="js/rating.js"></script>
    </head>
    <body>
        <main class="container">
            <?php 
                echo'<h1>'.$row['tencongthuc'].'</h1>
                <div>'.$row['mota'].'</div>
                <img src="'.$row['hinhanh'].'">
                <div>Số lượng người ăn: '.$row['soluongnguoian'].'</div>
                <h1>Dụng cụ cần thiết</h1>
                <div>'.$row['dungcu'].'</div>
                <h1>Các nguyên liệu cần chuẩn bị</h1>
                <div id="ing">'.$ing.'</div>
                <h1>Các bước thực hiện</h1>
                <div id="step">'.$row['buoc'].'</div>';
            ?>
        </main>
        <aside>
            <h1>Binh luan</h1>
            <form method="post">
                <div>
                    <div>Ban</div>
                    <div name="star">So sao</div>
                    <div class="rate">
        <input type="radio" id="star5" name="rating" value="5" >
        <label for="star5"></label>
        <input type="radio" id="star4" name="rating" value="4" >
        <label for="star4"></label>
        <input type="radio" id="star3" name="rating" value="3" >
        <label for="star3"></label>
        <input type="radio" id="star2" name="rating" value="2" >
        <label for="star2"></label>
        <input type="radio" id="star1" name="rating" value="1" >
        <label for="star1"></label>
    </div>
                    <input name="cmt"></input>
                    <button name="submit" type="submit">Bình luận</button>
                </div>
            </form>
            <?php 
                $query="SELECT * FROM taikhoan as a join danhgia as b where a.id=b.id";
                $stament=mysqli_query($connect,$query);
                while($row=mysqli_fetch_array($stament)){
                    echo'<div>
                        <div>'.$row['tentaikhoan'].'</div>
                        <div>'.$row['binhluan'].'</div>
                        <div>'.$row['sosao'].'</div>
                        <div>'.$row['ngaybinhluan'].'</div>';
                    if($row['id']==$_SESSION['id']){
                        echo'<a name="Xoa" type="button" href="deletecmt.php?id='.$_GET['id'].'">Xoa</a>';
                    }
                    echo'</div>';
                }
            
            ?>
        </aside>
    </body>
            <script language="javascript" type="text/javascript">
        $(function() {
    $('.rate input').on('click', function(){
        var postID = 'no1';
        var ratingNum = $(this).val();
		
        $.ajax({
            type: 'POST',
            url: 'rating.php',
            data: 'postID='+postID+'&ratingNum='+ratingNum,
            dataType: 'json',
            success : function(resp) {
                if(resp.status == 1){
                    $('#avgrat').text(resp.data.average_rating);
                    $('#totalrat').text(resp.data.rating_num);
					
                    alert('Thanks! You have rated '+ratingNum+' to ');
                }else if(resp.status == 2){
                    alert('You have already rated to ');
                }
				
                $( ".rate input" ).each(function() {
                    if($(this).val() <= parseInt(resp.data.average_rating)){
                        $(this).attr('checked', 'checked');
                    }else{
                        $(this).prop( "checked", false );
                    }
                });
            }
        });
    });
});
        </script>
</html>