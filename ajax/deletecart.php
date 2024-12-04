<?php
session_start();

// Kiểm tra xem id sản phẩm được gửi lên
if (isset($_POST['id'])) {
    $productId = $_POST['id'];

    // Kiểm tra session cart
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            // Tìm sản phẩm có id trùng khớp
            if ($item['id'] == $productId) {
                unset($_SESSION['cart'][$key]); // Xóa sản phẩm khỏi session
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Đánh lại chỉ số mảng
                echo json_encode(['success' => true]);
                exit();
            }
        }
    }
}

// Trả về thông báo lỗi nếu không xóa được
echo json_encode(['success' => false]);
?>
