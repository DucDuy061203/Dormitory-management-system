<?php 
$masv = $_GET['sid'];
require_once 'connect.php';
$sua1_sql = "SELECT * FROM sinhvien WHERE masv = $masv";
$result = mysqli_query($conn, $sua1_sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css">

    <title>Sua sinh vien</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>

<body>
    <div class="container">
    <nav style="background: #3675cf; line-height: 60px;"> 
        <a href="" style="color:white">Quản Lý Kí Túc Xá</a>
        <a class="id" href="" style="float: right ; color:White">Nhóm 3</a>
    </nav>
       
    <nav class="navbar">
     
  <ul class="navbar__menu">
    <li class="navbar__item">
      <a href="home.php" class="navbar__link"><i data-feather="home"></i><span>Home</span></a>
    </li>
    
    <li class="navbar__item">
      <a href="them1.html" class="navbar__link"><i data-feather="user-plus"></i><span>Thêm hồ sơ sinh viên</span></a>        
    </li>
    <li class="navbar__item">
      <a href="danhsach.php" class="navbar__link"><i data-feather="grid"></i><span>Danh sách sinh viên nội trú</span></a>        
    </li>
    <li class="navbar__item">
      <a href="dshd.php" class="navbar__link"><i data-feather="grid"></i><span>Hợp đồng thuê phòng</span></a>        
    </li>
    <li class="navbar__item">
      <a href="ds.php" class="navbar__link"><i data-feather="grid"></i><span>Danh sách phòng</span></a>        
    </li>
    <li class="navbar__item">
      <a href="dspay.php" class="navbar__link"><i data-feather="credit-card"></i><span>Danh sách thanh toán</span></a>        
    </li>
    <li class="navbar__item">
      <a href="index.php" class="navbar__link"><i data-feather="log-out"></i><span>Đăng xuất</span></a>        
    </li>
  </ul>
</nav>
<!-- partial -->
  <script src='https://unpkg.com/feather-icons'></script>
  <script >feather.replace()</script>
        <br/>
      <h1>SỬA THÔNG TIN SINH VIÊN</h1>
      <br/>
        <form action="update1.php" method="post">
            <div class="form-group">
                <label for="masv">Mã sinh viên</label><br><br>
                <input type="text" class="form-control" name="masv" id="masv" 
                value ="<?php echo $row['masv']?>" readonly>
            </div>
            <div class="form-group">
                <label for="hoten">Họ và tên </label><br><br>
                <input type="text" class="form-control" name="hoten" id="hoten" value = "<?php echo $row['hoten']?>">
            </div>
            <div class="form-group">
                <label for="ngaysinh">Ngày sinh</label><br><br>
                <input type="date" class="form-control" name="ngaysinh" id="ngaysinh" value = "<?php echo $row['ngaysinh']?>">
            </div>
            <div class="form-group">
                <label for="GioiTinh">Giới tính:</label><br><br>
                <div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="GioiTinh" id="1" value="1" class="form-check-input" checked>
                        <label for="1" class="form-check-label">Nam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="GioiTinh" id="0" value="0" class="form-check-input">
                        <label for="0" class="form-check-label">Nữ</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="Diachi">Dia chi</label><br><br>
                <input type="text" class="form-control" name="Diachi" placeholder="Enter Diachi" id="Diachi" value = "<?php echo $row['Diachi']?>">
            </div>
          
            
            
            <button type="submit" class="btn btn-primary">Sửa thông tin sinh viên</button>
        </form>
    </div>
    
</body>

</html>>


