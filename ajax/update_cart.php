<?php
session_start();

 
    // Lấy ID sản phẩm và số lượng mới
    $productId = isset($_POST['product_id']) ? (int) $_POST['product_id'] : 0;
    $quantity = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 0;

    if ($productId > 0 && $quantity > 0) {
        // Cập nhật số lượng sản phẩm trong session cart
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity'] = $quantity;
                break;
            }
        }
        unset($item);
        // Tính lại tổng giá trị giỏ hàng (nếu cần)
        $totalPrice = 0;
        foreach ($_SESSION['cart'] as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Trả về tổng giá mới
        echo json_encode([
            'status' => 'success',
            'total_price' => $totalPrice,
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ.']);
    }
