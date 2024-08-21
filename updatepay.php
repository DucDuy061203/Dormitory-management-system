
<?php
$id = $_POST['id'];
$phong = $_POST['phong'];
$tang = $_POST['tang'];
$cscd = $_POST['cscd'];
$csmd = $_POST['csmd'];
$cscn = $_POST['cscn'];
$csmn = $_POST['csmn'];
$dongia = $_POST['dongia'];
$dongia1 = $_POST['dongia1'];
$sdtt = $_POST['sdtt'];
$sntt = $_POST['sntt'];
$sdtt = $csmd - $cscd;
$sntt = $csmn - $cscn;
$tt = (($sdtt*$dongia)+($sntt*$dongia1));
require_once 'connect.php';

$updatesql = "UPDATE pay SET phong='$phong', tang='$tang', cscd='$cscd', csmd ='$csmd', cscn='$cscn', csmn ='$csmn',dongia='$dongia', dongia1='$dongia1', sdtt='$sdtt',sntt='$sntt',tt='$tt' WHERE id ='$id' ";
if (mysqli_query($conn, $updatesql))
{
    echo "<h1>Them thanh cong </h1>";
}
else{
    echo "<h1>Them khong thanh cong </h1>";
}
header("Location: dspay.php");
?>


