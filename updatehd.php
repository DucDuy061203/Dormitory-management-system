
<?php
$id = $_POST['id'];
$masv = $_POST['masv'];
$hoten = $_POST['hoten'];
$tg = $_POST['tg'];
$tien = $tg * 100000;
require_once 'connect.php';

$updatesql = "UPDATE qlhd SET masv='$masv', hoten ='$hoten',tg='$tg',tien='$tien' WHERE id ='$id' ";
if (mysqli_query($conn, $updatesql))
{
    echo "<h1>Them thanh cong </h1>";
}
else{
    echo "<h1>Them khong thanh cong </h1>";
}
header("Location: dshd.php");
?>


