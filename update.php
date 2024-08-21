<?php
function checkMaxStudents($conn, $phong, $tang){
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM phong WHERE phong = '$phong' AND tang='$tang'");
    $data = mysqli_fetch_assoc($result);
    return ($data['total'] < 4) ? true : false;
}

/* rest of your code */

$id = $_POST['id'];
$masv = $_POST['masv'];
$phong = $_POST['phong'];
$tang = $_POST['tang'];
require_once 'connect.php';

if (checkMaxStudents($conn, $phong, $tang)) {
    $updatesql = "UPDATE phong SET masv='$masv', phong ='$phong',tang ='$tang' WHERE id ='$id' ";
    if (mysqli_query($conn, $updatesql)){
        echo "<h1>Cập nhật thành công </h1>";
        if (checkMaxStudents($conn, $phong, $tang)) {
            $checkPaySql = "SELECT * FROM pay WHERE phong='$phong' AND tang='$tang'";
            $checkPayResult = mysqli_query($conn, $checkPaySql);
            if(mysqli_num_rows($checkPayResult) == 0) {
                $themsql = "INSERT INTO pay(phong,tang) VALUES('$phong','$tang')";
                if(mysqli_query($conn, $themsql)) {
                    header("Location: ds.php?phong=$phong&tang=$tang");
                    exit;
                } else {
                    echo "<h1>Thêm không thành công </h1>";
                }
            } else {
                echo "<h1>Phòng đã được thêm vào bảng pay trước đó.</h1>";
            }
        } else {
            echo "<h1>Phòng đã đủ 4 sinh viên. Xin vui lòng chọn phòng khác.</h1>";
        }
    } else {
        echo "<h1>Cập nhật không thành công </h1>";
    }
} else {
    echo "<h1>Phòng đã đủ 4 sinh viên. Xin vui lòng chọn phòng khác.</h1>";
}

header("Location: ds.php");
?>
