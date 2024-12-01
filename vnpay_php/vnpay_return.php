<?php

require_once("./config.php");
$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
?>
<!--Begin display -->

<?php
$is_homepage = false;
require_once('../views/header.php');

?>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">VNPAY RESPONSE</h3>
    </div>
    <div class="table-responsive">
        <div class="form-group">
            <label>Mã đơn hàng:</label>

            <label><?php echo $_GET['vnp_TxnRef'] ?></label>
        </div>
        <div class="form-group">

            <label>Số tiền:</label>
            <label><?php echo $_GET['vnp_Amount'] ?></label>
        </div>
        <div class="form-group">
            <label>Nội dung thanh toán:</label>
            <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
        </div>
        <div class="form-group">
            <label>Mã phản hồi (vnp_ResponseCode):</label>
            <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
        </div>
        <div class="form-group">
            <label>Mã GD Tại VNPAY:</label>
            <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
        </div>
        <div class="form-group">
            <label>Mã Ngân hàng:</label>
            <label><?php echo $_GET['vnp_BankCode'] ?></label>
        </div>
        <div class="form-group">
            <label>Thời gian thanh toán:</label>
            <label><?php echo $_GET['vnp_PayDate'] ?></label>
        </div>
        <div class="form-group">
            <label>Kết quả:</label>
            <label>
                <?php

                if ($secureHash == $vnp_SecureHash) {
                    if ($_GET['vnp_ResponseCode'] == '00') {
                        echo "<span style='color:blue'>GD Thanh cong</span>"; //thanh toan thanh cong
                        if (isset($_SESSION['orderData'])) {
                            $orderData = $_SESSION['orderData']; // Lấy dữ liệu đơn hàng
                            $orderInsert = insert('orders', $orderData);
                            
                        }
                        if ($orderInsert) {
                            if (isset($_SESSION['orderDetail'])) {
                                //$orderID = oneRaw("SELECT id FROM orders WHERE code=$orderCode")['id'];
                                //$orderDetail = $_SESSION['orderDetail'];
                               // print_r($orderData);
                                $orcode=$orderData['code'];
                                //echo $orcode;
                                $orderid=oneRaw("SELECT id FROM orders WHERE code=$orcode")['id'];
                                //echo $orderid;
                                foreach($_SESSION['orderDetail'] as &$item){
                                    $item['order_id']=$orderid;
                                }
                                unset($item);
                                
                                $orderDetail=$_SESSION['orderDetail'];
                                print_r($orderDetail);

                                multiple_insert('order_details',$orderDetail);
                                

                                $_SESSION['cart']=[];
                                $_SESSION['orderData']=[];
                                $_SESSION['orderDetail']=[];
                            }
                        }





                        // if ($orderInsert) {
                        //     if(isset($_SESSION['orderDetail'])){
                        //         $orderDetail=$_SESSION['orderDetail'];
                        //         $detailInsert=insert('order_details', $orderDetail);
                        //         echo $detailInsert;
                        //     }
                        // }

                        echo '<a style="font-size: 20px;" href="../views/index.php">Trở về trang chủ</a>';
                    } else {
                        echo "<span style='color:red'>GD Khong thanh cong</span>";
                    }
                } else {
                    echo "<span style='color:red'>Chu ky khong hop le</span>";
                }
                ?>

            </label>
        </div>
    </div>


</div>

<?php require_once('../views/footer.php') ?>