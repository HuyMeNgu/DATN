<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'balostore';

   

// Kết nối
$conn = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
// echo "Kết nối thành công!";



