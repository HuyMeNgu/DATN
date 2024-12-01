<?php
if (isset($_GET['action']) && $_GET['action'] == 'delete_color' && isset($_GET['id'])) {
    $id = intval($_GET['id']); // Lấy ID màu để xóa
    $deleteSql = "DELETE FROM colors WHERE id = $id";
    if ($mysqli->query($deleteSql)) {
        echo "<script>alert('Xóa thành công!'); window.location.href = 'color.php';</script>";
    } else {
        echo "<script>alert('Xóa thất bại!'); window.location.href = 'color.php';</script>";
    }
}
