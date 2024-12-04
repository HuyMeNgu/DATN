<?php
// Duyệt đơn hàng - Xử lý khi bấm vào nút duyệt
if (isset($_GET['action']) && $_GET['action'] == 'approve_order' && isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $sql = "UPDATE orders SET status = 0 WHERE id = $order_id"; // Cập nhật trạng thái thành "Đã duyệt"
    if ($mysqli->query($sql) === TRUE) {
        echo "Đơn hàng đã được duyệt!";
        header("Location: index.php?action=order");
        exit;
    } else {
        echo "Lỗi khi duyệt đơn hàng: " . $mysqli->error;
    }
}
