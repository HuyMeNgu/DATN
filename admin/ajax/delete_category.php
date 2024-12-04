<?php
require_once('../../config.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // Xử lý xóa màu

    $deleteSql = "DELETE FROM categories WHERE id = $id";
    if ($mysqli->query($deleteSql)) {
        echo 'success';
    }
}
die();
