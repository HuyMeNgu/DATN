<?php
require_once('../../config.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // Xử lý xóa màu

    $deleteSql = "DELETE FROM products WHERE id = $id";
    $deleteSql2 = "DELETE FROM productcolors WHERE product_id = $id";
    $mysqli->query($deleteSql2);
    $mysqli->query($deleteSql);


    echo 'success';
}

die();
