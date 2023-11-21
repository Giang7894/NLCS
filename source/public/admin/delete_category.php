<?php

require_once __DIR__ . '/isadmin.php';

if(isset($_GET['ma_loai'])){
    $query="SELECT a.ma_loai,count(b.ma_ct) as dem FROM danh_muc as a join cong_thuc as b where a.ma_loai=b.ma_loai";
    $r=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($r);
    if($row['dem']!=0){
        $_SESSION['error']="Vui lòng thay đổi danh mục của tất cả công thức thuộc danh mục này trước khi xóa";
    }else{
        $query="DELETE FROM danh_muc where ma_loai='$_GET[ma_loai]'";
        $r=mysqli_query($connect,$query);
        $_SESSION['msg']="Xóa thành công!";
    }
    header('location:view_category.php');
    exit();
}

?>

