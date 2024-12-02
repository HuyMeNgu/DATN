<?php
require_once('../models/connectdb.php');
require_once('../models/database.php');


// Lấy dữ liệu từ yêu cầu AJAX
$color_id = isset($_POST['color_id']) ? $_POST['color_id'] : null;
$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : null;


// Kiểm tra nếu có thông tin màu và sản phẩm
if ($color_id && $product_id) {
    // Truy vấn để lấy hình ảnh theo màu và sản phẩm
    // $query = "SELECT img FROM product_colors WHERE product_id = $product_id AND color_id = $color_id LIMIT 1";
    // $result = mysqli_query($conn, $query); // Kết nối với cơ sở dữ liệu của bạn

    $img = oneRaw("SELECT * FROM productcolors WHERE color_id=$color_id AND product_id=$product_id");


    echo "../admin/" . $img['img_path']; // Trả về đường dẫn hình ảnh

}
