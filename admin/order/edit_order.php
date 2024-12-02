<?php

// Lấy danh sách đơn hàng
$sql_orders = "SELECT * FROM orders";
$result_orders = $mysqli->query($sql_orders);

// Lấy chi tiết đơn hàng nếu có yêu cầu
$order_details = [];
if (isset($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']);
    $sql_details = "
        SELECT od.*, p.product_name, p.price AS product_price 
        FROM order_details od
        JOIN products p ON od.productcolor_id = p.id
        WHERE od.order_id = $order_id
    ";
    $result_details = $mysqli->query($sql_details);
    if ($result_details->num_rows > 0) {
        $order_details = $result_details->fetch_all(MYSQLI_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1,
        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        a {
            color: blue;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h1>Order Management</h1>
    <div class="orders">
        <h2>Orders</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer ID</th>
                    <th>Order Date</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = $result_orders->fetch_assoc()): ?>
                    <tr>
                        <td><?= $order['id'] ?></td>
                        <td><?= $order['customer_id'] ?></td>
                        <td><?= $order['order_date'] ?></td>
                        <td><?= $order['total_price'] ?></td>
                        <td><?= $order['status'] == 1 ? 'Active' : 'Inactive' ?></td>
                        <td><a href="?order_id=<?= $order['id'] ?>">View Details</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <?php if (!empty($order_details)): ?>
        <div class="order-details">
            <h2>Order Details (Order ID: <?= $_GET['order_id'] ?>)</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price (Per Unit)</th>
                        <th>Total Price</th>
                        <th>Review ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order_details as $detail): ?>
                        <tr>
                            <td><?= $detail['product_name'] ?></td>
                            <td><?= $detail['quantity'] ?></td>
                            <td><?= $detail['product_price'] ?></td>
                            <td><?= $detail['price'] ?></td>
                            <td><?= $detail['review_id'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</body>

</html>