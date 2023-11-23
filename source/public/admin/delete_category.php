<?php

require_once __DIR__ . '/isadmin.php';

if(isset($_GET['ma_loai'])){
    $query="SELECT a.ma_loai,count(b.ma_ct) as dem FROM danh_muc as a left outer join cong_thuc as b on a.ma_loai=b.ma_loai group by a.ma_loai";
    $r=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($r);
    if($row['dem']!=0){
        $_SESSION['msg']="Vui lòng thay đổi danh mục của tất cả công thức thuộc danh mục này trước khi xóa";
    }else{
        $query="DELETE FROM danh_muc where ma_loai='$_GET[ma_loai]'";
        $r=mysqli_query($connect,$query);
        $_SESSION['msg']="Xóa thành công!";
    }
    header('location:view_categories.php');
    exit();
}

?>

