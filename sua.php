<?php 
$id = $_GET['sid'];
require_once 'connect.php';
$sua_sql = "SELECT * FROM phong WHERE id = $id";
$result = mysqli_query($conn, $sua_sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css">

    <title></title>
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
      <h1>CÂP NHẬT DANH SÁCH PHÒNG</h1>
      <br/>
        <form action="update.php" method="post">
        <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $row['id']?>">
            </div>
       
        <div style="display: flex; align-items: flex-start;">
   

            </div>
            <div class="form-group">
                <label for="masv">Mã Sinh Viên</label><br/><br>
                <input type="text" class="form-control" name="masv" id="masv" 
                value ="<?php echo $row['masv']?>" readonly >
            </div>
            <div class="form-group">    
    <label for="">Phòng</label><br><br>
    <select name="phong" class="form-control"> 
        <option value="Phòng 01" <?php if ($row['phong'] == 'Phòng 01') echo 'selected'; ?>>Phòng 01</option>
        <option value="Phòng 02" <?php if ($row['phong'] == 'Phòng 02') echo 'selected'; ?>>Phòng 02</option>
        <option value="phòng 03" <?php if ($row['phong'] == 'Phòng 03') echo 'selected'; ?>>Phòng 03</option>
        <option value="Phòng 04" <?php if ($row['phong'] == 'Phòng 04') echo 'selected'; ?>>Phòng 04</option>
        <option value="Phòng 05" <?php if ($row['phong'] == 'Phòng 05') echo 'selected'; ?>>phòng 05</option>
    </select>
</div>

           <div class="form-group">    
    <label for="">Tầng</label><br><br>
    <select name="tang" class="form-control"> 
        <option value="Tầng 01" <?php if ($row['tang'] == 'Tầng 01') echo 'selected'; ?>>Tầng 01</option>
        <option value="Tầng 02" <?php if ($row['tang'] == 'Tầng 02') echo 'selected'; ?>>Tầng 02</option>
        <option value="Tầng 03" <?php if ($row['tang'] == 'Tầng 03') echo 'selected'; ?>>Tầng 03</option>
        <option value="Tầng 04" <?php if ($row['tang'] == 'Tầng 04') echo 'selected'; ?>>Tầng 04</option>
        <option value="Tầng 05" <?php if ($row['tang'] == 'Tầng 05') echo 'selected'; ?>>Tầng 05</option>
    </select>
</div>

       
          
            <button type="submit" class="btn btn-primary">Cập Nhật Danh Sách Phòng</button>
        </form>
    </div>
</body>

</html>>


