
<?php

$masv = $_POST['masv'];
$hoten = $_POST['hoten'];
$ngaysinh = $_POST['ngaysinh'];
$Gioitinh = $_POST['GioiTinh'];
$Diachi = $_POST['Diachi'];


require_once 'connect.php';

$them1sql = "INSERT INTO sinhvien(masv, hoten, ngaysinh ,Gioitinh, Diachi) VALUES('$masv','$hoten','$ngaysinh','$Gioitinh','$Diachi')";

if(mysqli_query($conn, $them1sql)) {
    echo "Thêm sinh viên thành công";
    // Thêm phòng cho sinh viên
    $them1sql = "INSERT INTO  phong(masv) VALUES('$masv')";
    if(mysqli_query($conn, $them1sql)) {
        echo "<h1>Them thanh cong </h1>";
    }else{
        echo "<h1>Them khong thanh cong </h1>";
    }
    // thêm cho hợp đồng
     $them1sql = "INSERT INTO  qlhd(masv,hoten) VALUES('$masv','$hoten')";
     if(mysqli_query($conn, $them1sql)) {
         echo "<h1>Them thanh cong </h1>";
     }else{
         echo "<h1>Them khong thanh cong </h1>";
     }
   
} else {
    echo "<h1>Them khong thanh cong </h1>";
}
header("Location: danhsach.php");

?>



