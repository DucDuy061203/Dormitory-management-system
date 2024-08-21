
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>liet  ke</title>
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
      <h1>DANH SÁCH SINH VIÊN NỘI TRÚ KÍ TÚC XÁ</h1>
      <br/>
            <!--Chức năng tìm kiếm-->
     <form method="post">
            <input  type="text"name="noidung" style="width: 80%;" placeholder="Tìm kiếm theo mã sinh viên">
            <button type="submit" name="btn" style="color: #2a97a1;" data-feather="search"><i data-feather="search"></i>Tìm Kiếm</button>
            <button type="submit" name="btn"  style="color: #2a97a1"> Thoát </button>
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
       
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Họ và tên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tinh</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'connect.php';
                $danhsach_sql = "SELECT * FROM sinhvien WHERE masv  LIKE '%$noidung%'  order by masv";
                $result = mysqli_query($conn, $danhsach_sql);
                while ($r = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $r['masv']; ?></td>
                        <td><?php echo $r['hoten']; ?></td>
                        <td><?php echo $r['ngaysinh']; ?></td>
                        <td><?php echo $r['Gioitinh']; ?></td>                  
                        <td><?php echo $r['Diachi']; ?></td>

                        
                        <td><a href="sua1.php?sid=<?php echo $r['masv'];?>" class="btn btn-info">Sửa</a> 
                       <a onclick=" return confirm(' Ban co muon xoa sinh vien nay khong');" href="xoa1.php?sid=<?php echo $r['masv'];?>" class="btn btn-danger">Xoá</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>    
        </table>
       
    </div>
</body>

</html>