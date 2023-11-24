<?php

header('Content-Type: application/json');
require_once __DIR__ . '/isadmin.php';
$data=array();
$query="SELECT so_sao,count(id) as tong from danh_gia group by so_sao order by so_sao asc";
$r=mysqli_query($connect,$query);
while($row=mysqli_fetch_array($r)){
    $data[]=$row;
}
echo json_encode($data);



?>