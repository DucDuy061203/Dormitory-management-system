<?php
$masv = $_GET['sid'];
require_once 'connect.php';
$xoa1_sql = "DELETE FROM sinhvien WHERE masv=$masv";
mysqli_query($conn, $xoa1_sql);
echo '<h1>Xoa thanh cong</h1>';
header("Location: danhsach.php");
?>