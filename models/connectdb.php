<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'balostore';

   

// Kết nối
$conn = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn->connect_error) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
// echo "Kết nối thành công!";

?>

<?php

// $sql = "SELECT * FROM ten_bang";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//     while($row = mysqli_fetch_assoc($result)) {
//         echo "ID: " . $row["id"] . " - Tên: " . $row["ten"] . "<br>";
//     }
// } else {
//     echo "Không có kết quả nào.";
// }
?>

<?php
//đóng kết nối
// mysqli_close($conn);
?>

<?php
//example 
// $host = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'ten_database';

// $conn = mysqli_connect($host, $username, $password, $dbname);

// if (!$conn) {
//     die("Kết nối thất bại: " . mysqli_connect_error());
// }
// echo "Kết nối thành công!";

// $sql = "SELECT * FROM ten_bang";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//     while($row = mysqli_fetch_assoc($result)) {
//         echo "ID: " . $row["id"] . " - Tên: " . $row["ten"] . "<br>";
//     }
// } else {
//     echo "Không có kết quả nào.";
// }

// mysqli_close($conn);
?>