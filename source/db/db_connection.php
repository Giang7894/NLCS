<?php

$severname='localhost';
$user='root';
$pass='kurumi1234';
$db_name='recipes';

$connect='';

try{
    $connect=mysqli_connect($severname,$user,$pass,$db_name);
} catch(mysqli_connect_exception){
    echo'Can not connect!';
}

// try {
//     $pdo = new PDO('mysql:host=localhost;dbname=demo', 'root', 'kurumi1234');
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     $error_message = 'Không thể kết nối đến CSDL';
//     $reason = $e->getMessage();
//     include 'show_error.php';

//     include_once 'footer.php';
//     exit();
// }