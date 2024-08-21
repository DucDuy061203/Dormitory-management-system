<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="menu.css" >
    <title>liet ke </title>
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
      <h1>HỢP ĐỒNG THUÊ PHÒNG</h1>
      <br/>
           <!--Chức năng tìm kiếm-->
     <form method="post">
            <input  type="text"name="noidung" style="width: 80%;" placeholder="tìm kiếm theo mã sinh viên hoặc họ tên">
            <button type="submit" name="btn" style="color: #2a97a1;"> Tìm Kiếm </button>
            <button type="submit" name="btn" style="color: #2a97a1;"> Thoát </button>
        </form>
        <br>
        <?php
       require_once 'connect.php';
       if(isset($_POST['btn'])){
            $noidung = mysqli_real_escape_string($conn, $_POST['noidung']); 
        } else {
            $noidung = '';
        }
        if(isset($_POST['clear'])){
            header("Refresh:0");
         }
        ?>

        <table class="table">
            <thead class="thead-dark" >
                <tr>
                    <th>STT</th>
                    <th>Mã sinh viên</th>
                    <th>Họ và tên</th>
                    <th>Thời gian nội trú (Tháng)</th>
                    <th>Tiền nội trú</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                require_once 'connect.php';
                $danhsach_sql = "SELECT * FROM qlhd WHERE masv AND hoten LIKE '%$noidung%' order by id";
                $result = mysqli_query($conn, $danhsach_sql);
                while ($r = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $r['masv']; ?></td>
                        <td><?php echo $r['hoten']; ?></td>
                        <td><?php echo $r['tg']; ?></td>
                        <td><?php echo $r['tien']; ?></td>
                      
                        <td>
                            <a href="suahd.php?sid=<?php echo $r['id'];?>" class="btn btn-info">Sửa</a> 
                            <a onclick=" return confirm('Xác nhận thanh toán và xoá hợp đồng');" href="xoahd.php?sid=<?php echo $r['id'];?>" class="btn btn-success">Xoá Hợp Đồng</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>    
        </table>
    </div>
</body>

</html>
