import React, { useState, useEffect } from 'react';
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';
import feather from 'feather-icons';

const App = () => {
    const [searchQuery, setSearchQuery] = useState('');
    const [students, setStudents] = useState([]);

    useEffect(() => {
        feather.replace();
    }, []);

    const handleSearch = (e) => {
        e.preventDefault();
        axios.post('your_php_endpoint.php', { noidung: searchQuery })
            .then(response => {
                setStudents(response.data.students);
            })
            .catch(error => {
                console.error('Có lỗi xảy ra:', error);
            });
    };

    const clearSearch = () => {
        setSearchQuery('');
        setStudents([]);
    };

    return 
        <div className="container">
            <nav style={{ background: '#3675cf', lineHeight: '60px' }}>
                <a href="/" style={{ color: 'white' }}>Quản Lý Kí Túc Xá</a>
                <a className="id" href="/" style={{ float: 'right', color: 'white' }}>Nhóm 3</a>
            </nav>

            <nav className="navbar">
                <ul className="navbar__menu">
                    <li className="navbar__item">
                        <a href="home.php" className="navbar__link"><i data-feather="home"></i><span>Home</span></a>
                    </li>
                    <li className="navbar__item">
                        <a href="them1.html" className="navbar__link"><i data-feather="user-plus"></i><span>Thêm hồ sơ sinh viên</span></a>
                    </li>
                    <li className="navbar__item">
                        <a href="danhsach.php" className="navbar__link"><i data-feather="grid"></i><span>Danh sách sinh viên nội trú</span></a>
                    </li>
                    <li className="navbar__item">
                        <a href="dshd.php" className="navbar__link"><i data-feather="grid"></i><span>Hợp đồng thuê phòng</span></a>
                    </li>
                    <li className="navbar__item">
                        <a href="ds.php" className="navbar__link"><i data-feather="grid"></i><span>Danh sách phòng</span></a>
                    </li>
                    <li className="navbar__item">
                        <a href="dspay.php" className="navbar__link"><i data-feather="credit-card"></i><span>Danh sách thanh toán</span></a>
                    </li>
                    <li className="navbar__item">
                        <a href="index.php" className="navbar__link"><i data-feather="log-out"></i><span>Đăng xuất</span></a>
                    </li>
                </ul>
            </nav>

            <h1>DANH SÁCH SINH VIÊN NỘI TRÚ KÍ TÚC XÁ</h1>

            <form onSubmit={handleSearch}>
                <input
                    type="text"
                    value={searchQuery}
                    onChange={(e) > setSearchQuery(e.target.value)}
                    style={{ width: '80%' }}
                    placeholder="Tìm kiếm theo mã sinh viên"
                />
                <button type="submit" style={{ color: '#2a97a1' }}>
                    <i data-feather="search"></i>Tìm Kiếm
                </button>
                <button type="button" onClick={clearSearch} style={{ color: '#2a97a1' }}>Thoát</button>
            </form>

            <br />

            <table className="table table-bordered">
                <thead className="thead-dark">
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
                    {students.map(student) => 
                        <tr key={student.masv}>
                            <td>{student.masv}</td>
                            <td>{student.hoten}</td>
                            <td>{student.ngaysinh}</td>
                            <td>{student.Gioitinh}</td>
                            <td>{student.Diachi}</td>
                            <td>
                                <a href={`sua1.php?sid=${student.masv}`} className="btn btn-info">Sửa</a>
                                <a
                                    href={`xoa1.php?sid=${student.masv}`
                                    className="btn btn-danger"
                                    onClick={(e) > {
                                        if (!window.confirm('Bạn có muốn xóa sinh viên này không?')) {
                                            e.preventDefault();
                                        }
                                    }
                                >
                                    Xoá
                                </a>
                            </td>
                        </tr>
               
                </tbody>
            </table>
        </div>
    ;
;

export default App;
