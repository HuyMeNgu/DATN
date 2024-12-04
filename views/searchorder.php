<?php
$is_homepage = false;
require_once('header.php');
require_once('../models/connectdb.php');
require_once('../models/function.php');
require_once('../models/database.php');
require_once('../models/session.php');

if (isset($_GET['phone'])) {
    $phone = $_GET['phone'];
    $order = getRaw("SELECT * FROM orders WHERE phone=$phone");
    if (!$order) {
        echo "Không có thông tin đơn hàng!";
    } else {

?>
        <?php foreach ($order as $item):

        

            $orderID = $item['id'];
            $orderDetail = getRaw("SELECT * FROM order_details INNER JOIN colors ON order_details.productcolor_id=colors.id WHERE order_id=$orderID"); ?>
            <div class="mx-auto w-50 my-5">
                <h2 class="text-center fw-bold mb-5">Thông tin đơn hàng</h2>
                <p>Ngày đặt hàng: <?=convertDateTime($item['create_at'])?></p>
                <p>Tên khách hàng: <?= $item['customer_name'] ?></p>
                <p>Địa chỉ: <?= $item['address'] ?></p>
                <p>Số điện thoại: <?= $item['phone'] ?></p>
                <p>Email: <?= $item['email'] ?></p>
                <p>Hình thức thanh toán:<?= $item['payment'] ?></p>
                <p>Ghi chú: <?= $item['note'] ?></p>
                <p class="fw-bold ">Trạng thái đơn hàng: <?= $item['status'] ?></p>


                <table class="table">
                    <thead>
                        <tr>
                            <td>Hình ảnh</td>
                            <td>Tên sản phẩm</td>
                            <td>Màu sắc</td>
                            <td>Giá tiền</td>
                            <td>Số lượng</td>
                            <td>Tổng tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orderDetail as $item):
                            $itemID = $item['product_id'];
                            $clo_id=$item['productcolor_id'];
                            $itemDetail = oneRaw("SELECT * FROM products WHERE id=$itemID");
                            $p_image=oneRaw("SELECT * FROM productcolors WHERE product_id=$itemID AND color_id=$clo_id");
                        ?>
                            <tr>
                                <td><img style="width: 50px;height: 50px;object-fit: cover;" src="../admin/<?=$p_image['img_path']?>"></td>
                                <td><?= $itemDetail['product_name'] ?></td>
                                <td><?=$item['color_name']?></td>
                                <td><?= $itemDetail['price'] ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td><?= $itemDetail['price'] * $item['quantity'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        <?php endforeach; ?>

    <?php

    }
} else {
    ?>
    <h2 class="text-center fw-bold mt-5">Tra cứu đơn hàng</h2>
    <form class="w-25 mx-auto mb-5" action="" method="get">
        <input name="phone" type="text" class="form-control my-3" placeholder="Nhập số điện thoại">
        <button class="btn btn-primary w-100 " type="submit">Tìm kiếm</button>
    </form>
<?php
}

?>


<?php

require_once("footer.php");
?>