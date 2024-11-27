<?php 
include('../models/connectdb.php');

include('../models/database.php');
 session_start();
   
if($_SERVER["REQUEST_METHOD"]==='POST'){
    $cartJson = isset($_POST['cart2']) ? $_POST['cart2'] : '';
    $cart2 = json_decode($cartJson, true); // Giải mã JSON thành mảng PHP

    if(!empty($cart2)){
        foreach($cart2 as $item){
            echo "Sản phẩm: " . $item['name'] . ", Số lượng: " . $item['quantity'] . "<br>";
        }
        echo "Đơn hàng đã được tạo thành công!";
    }else{
        echo"gio hang trong";
    }
   
}