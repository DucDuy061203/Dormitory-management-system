
<?php
$masv = $_POST['masv'];
$hoten = $_POST['hoten'];
$ngaysinh = $_POST['ngaysinh'];
$Gioitinh = $_POST['GioiTinh'];
$Diachi = $_POST['Diachi'];

require_once 'connect.php';

$update1sql = "UPDATE sinhvien SET  hoten='$hoten', ngaysinh='$ngaysinh',Gioitinh='$Gioitinh',Diachi='$Diachi' WHERE masv='$masv'";
if (mysqli_query($conn, $update1sql))
{
    echo "<h1>Them thanh cong </h1>";
    
}
else{
    echo "<h1>Them khong thanh cong </h1>";
}
header("Location: danhsach.php");
?>


