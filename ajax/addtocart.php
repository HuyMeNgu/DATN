<?php

include('../models/connectdb.php');

include('../models/database.php');

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // Khởi tạo giỏ hàng như một mảng rỗng
}

$productId = $_POST['productId'];
$productQtt=$_POST['productQtt'];

$cart = &$_SESSION['cart']; // Tham chiếu đến giỏ hàng

// Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
$found = false;
foreach ($cart as &$item) {
    if ($item['id'] == $productId) {
        $item['quantity'] += $productQtt; // Cộng dồn số lượng
        $found = true;
        break;
    }
}
$proDetail=oneRaw("SELECT * FROM products WHERE id=$productId");

// Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
if (!$found) {
    $cart[] = [
        'id' => $productId,
        'name' => $proDetail['product_name'],
        'price' => $proDetail['price'],
        'quantity' => $productQtt,
        'image' =>$proDetail['img'],
    ];
    
}
echo $productId;


