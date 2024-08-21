
<!-- Rest of your code -->

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
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
      <!-- Chart.js for Bar Chart -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="./style.css">

<!-- Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>

<!-- Chart.js for Bar Chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
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

        <!-- Header -->
     

        <!-- Navigation Menu -->
       

        <!-- Bar Chart for Student Participation -->
        <div class="mt-4">
            <h2 class="text-center" >Thống Kê Sinh Viên Tham Gia Theo Tháng</h2>
            <canvas id="participationChart"></canvas>
        </div>

        <!-- Summary Table -->
        <div class="mt-4">
            <h3 class="text-center">Tổng Số Sinh Viên</h3>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Phòng</th>
                        <th>Tầng</th>
                        <th>Tổng Số Sinh Viên</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fetch data from the database and populate the table -->
                    <?php
                    require_once 'connect.php';
                    $summary_sql = "SELECT phong, tang, COUNT(*) AS total_students FROM phong GROUP BY phong, tang";
                    $summary_result = mysqli_query($conn, $summary_sql);
                    while ($row = mysqli_fetch_assoc($summary_result)) {
                        echo "<tr>
                                <td>{$row['phong']}</td>
                                <td>{$row['tang']}</td>
                                <td>{$row['total_students']}</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
<!-- partial -->
  <script src='https://unpkg.com/feather-icons'></script>
  <script >feather.replace()</script>
        <br/>
      <h1 class="text-center">DANH SÁCH PHÒNG</h1>
      <br/>

           <!--Chức năng tìm kiếm-->
     <form method="post">
            <input  type="text"name="noidung" style="width: 80%;";  placeholder="Tìm kiếm theo phòng" >
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
       
       <table class="table table-bordered">
            <thead class="thead-blue" >
                <tr>
                    <th>STT</th>
                    <th>Mã sinh viên</th>
                    <th>Phòng</th>
                    <th>Tầng</th>
                    <th>Thao tác</th>
                </tr>
            
            </thead>
            <tbody>
                <?php
                $i=1;
                require_once 'connect.php';
                $danhsach_sql = "SELECT * FROM phong WHERE phong LIKE '%$noidung%' or masv  LIKE '%$noidung%' order by id";
                $result = mysqli_query($conn, $danhsach_sql);
                while ($r = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $r['masv']; ?></td>
                        <td><?php echo $r['phong']; ?></td>
                        <td><?php echo $r['tang']; ?></td>
                        
                      
                        <td>
                            <a href="sua.php?sid=<?php echo $r['id'];?>" class="btn btn-info">Cập nhật</a> 
                            <a onclick=" return confirm('Xác nhận xoá phòng này');" href="xoa.php?sid=<?php echo $r['id'];?>" class="btn btn-danger">Xoá</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>    
        </table>
    </div>
    <script>feather.replace()</script>

<!-- Bar Chart Script -->
<script>
    var ctx = document.getElementById('participationChart').getContext('2d');
    var participationChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [{
                label: 'Số lượng sinh viên',
                data: [12, 19, 3, 5, 2, 3, 7, 10, 11, 14, 16, 8], // Example data, replace with dynamic data from the database
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>

</html>
