<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Kí Túc Xá</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./style.css">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Chart.js for Bar Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3675cf;">
            <a class="navbar-brand" href="#">Quản Lý Kí Túc Xá</a>
            <span class="navbar-text ml-auto">Quản lý: <strong>Nguyễn Văn A</strong></span>
        </nav>

        <!-- Navigation Menu -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php"><i data-feather="home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="them1.html"><i data-feather="user-plus"></i> Thêm hồ sơ sinh viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="danhsach.php"><i data-feather="grid"></i> Danh sách sinh viên nội trú</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dshd.php"><i data-feather="grid"></i> Hợp đồng thuê phòng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ds.php"><i data-feather="grid"></i> Danh sách phòng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dspay.php"><i data-feather="credit-card"></i> Danh sách thanh toán</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i data-feather="log-out"></i> Đăng xuất</a>
                </li>
            </ul>
        </nav>

        <!-- Bar Chart for Student Participation -->
        <div class="mt-4">
            <h2 class="text-center">Thống Kê Sinh Viên Tham Gia Theo Tháng</h2>
            <canvas id="participationChart"></canvas>
        </div>

        <!-- Summary Table -->
        <div class="mt-4">
            <h3>Tổng Số Sinh Viên</h3>
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

        <!-- Student Room List -->
        <div class="mt-4">
            <h1>DANH SÁCH PHÒNG</h1>
            <!-- Search Functionality -->
            <form method="post" class="form-inline mb-3">
                <input type="text" name="noidung" class="form-control mr-sm-2" placeholder="Tìm kiếm theo phòng" value="<?php echo isset($_POST['noidung']) ? $_POST['noidung'] : ''; ?>">
                <button type="submit" name="search" class="btn btn-primary">Tìm Kiếm</button>
                <button type="submit" name="clear" class="btn btn-secondary ml-2">Thoát</button>
            </form>

            <!-- Student Room Table -->
            <table class="table table-bordered">
                <thead class="thead-blue">
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
                    $i = 1;
                    $danhsach_sql = "SELECT * FROM phong WHERE phong LIKE '%$noidung%' or masv LIKE '%$noidung%' ORDER BY id";
                    $result = mysqli_query($conn, $danhsach_sql);
                    while ($r = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$i}</td>
                                <td>{$r['masv']}</td>
                                <td>{$r['phong']}</td>
                                <td>{$r['tang']}</td>
                                <td>
                                    <a href='sua.php?sid={$r['id']}' class='btn btn-info'>Cập nhật</a>
                                    <a href='xoa.php?sid={$r['id']}' class='btn btn-danger' onclick='return confirm(\"Xác nhận xoá phòng này\");'>Xoá</a>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Feather Icons -->
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
