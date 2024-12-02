<?php
$is_homepage = false;

require_once('../models/connectdb.php');
require_once('../models/function.php');
require_once('../models/database.php');
require_once('../models/session.php');
require_once('../config.php');




if (isset($_POST['create_order'])) {
    $randum = numberRandom(100000, 999999);
    if (isset($_POST['payment']) && $_POST['payment'] == 'COD') {
        require_once('header.php');
        $cart_on_order = $_SESSION['cart'];
        //lay thong tin tu form
        $orderData = [
            'code' => $randum,
            'customer_name' => $_POST['customer_name'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'note' => $_POST['note'],
            'payment' => $_POST['payment'],
            'create_at' => date('Y-m-d H:i:s')
        ];

        $orderInsert = insert('orders', $orderData);
        if ($orderInsert) {
            echo '<div class="alert alert-success text-center " role="alert">Đặt hàng thành công!</div>';
            $orderID = oneRaw("SELECT id FROM orders WHERE code=$randum")['id'];
            foreach ($cart_on_order as $item) {
                $orderDetail = [
                    'order_id' => $orderID,
                    'product_id' => $item['id'],
                    //'productcolor_id'=>$item['productcolor_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    //'review_id'=>''

                ];
                insert('order_details', $orderDetail);
            }

            $_SESSION['cart'] = [];
        } else {
            echo "dat hang that bai";
        }

        require_once("footer.php");

    } else {
        $vnp_TxnRef = $randum; //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $_POST['totalprice']+30000; // Số tiền thanh toán
        $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = ''; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán
        session_start();
        $cart_on_order = $_SESSION['cart'];

        $orderData = [
            'code' => $randum,
            'customer_name' => $_POST['customer_name'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'note' => $_POST['note'],
            'payment' => $_POST['payment'],
            'create_at' => date('Y-m-d H:i:s')
        ];
        
        $orderID = oneRaw("SELECT id FROM orders WHERE code=$randum")['id'];
        $orderDetail=[];
        foreach ($cart_on_order as $item) {
            $orderDetail[] = [
                'order_id' => 1,
                'product_id' => $item['id'],
                //'productcolor_id'=>$item['productcolor_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                //'review_id'=>''
            ];
        };
        $_SESSION['orderData'] = $orderData;
        $_SESSION['orderDetail'] = $orderDetail;
       

        

       


        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        header('Location:'. $vnp_Url);
        die();
    }
}
?>



