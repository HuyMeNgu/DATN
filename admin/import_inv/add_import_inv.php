<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "balostore";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// Nếu form được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // Lấy dữ liệu từ form
   $code = $_POST['code'];
   $admin_id = $_POST['admin_id'];
   $create_at = $_POST['create_at'];
   $supplier_id = $_POST['supplier_id'];
   $total = $_POST['total'];
   $status = $_POST['status'];

   $details = $_POST['details']; // Mảng chứa chi tiết đơn hàng

   // Bắt đầu giao dịch
   $conn->begin_transaction();

   try {
      // Chèn vào bảng import_orders
      $stmt = $conn->prepare("INSERT INTO import_orders (code, admin_id, create_at, supplier_id, total, status) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sisddi", $code, $admin_id, $create_at, $supplier_id, $total, $status);
      $stmt->execute();

      // Lấy ID của import_order vừa chèn
      $import_order_id = $conn->insert_id;

      // Chèn chi tiết đơn hàng vào import_detail_orders và cập nhật productcolors
      $stmt_detail = $conn->prepare("INSERT INTO import_detail_orders (imporder_id, product_id, color_id, quantity, price) VALUES (?, ?, ?, ?, ?)");
      $stmt_update_productcolor = $conn->prepare("UPDATE productcolors SET quantity = quantity + ? WHERE product_id = ? AND color_id = ?");

      foreach ($details as $detail) {
         $stmt_detail->bind_param("iiiid", $import_order_id, $detail['product_id'], $detail['color_id'], $detail['quantity'], $detail['price']);
         $stmt_detail->execute();

         // Cập nhật số lượng trong bảng productcolors
         $stmt_update_productcolor->bind_param("iii", $detail['quantity'], $detail['product_id'], $detail['color_id']);
         $stmt_update_productcolor->execute();
      }

      // Commit giao dịch
      $conn->commit();
      echo "Đơn hàng đã được lưu thành công và số lượng sản phẩm đã được cập nhật!";
   } catch (Exception $e) {
      // Rollback nếu có lỗi
      $conn->rollback();
      echo "Đã xảy ra lỗi: " . $e->getMessage();
   }

   $stmt->close();
   $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Thêm Đơn Hàng Nhập</title>
</head>

<body>
   <h1>Thêm Đơn Hàng Nhập</h1>
   <form method="POST">
      <label>Mã đơn hàng:</label>
      <input type="text" name="code" required><br>
      <label>Admin ID:</label>
      <input type="number" name="admin_id" required><br>
      <label>Ngày tạo:</label>
      <input type="datetime-local" name="create_at" required><br>
      <label>Nhà cung cấp ID:</label>
      <input type="number" name="supplier_id" required><br>
      <label>Tổng giá trị:</label>
      <input type="number" step="0.01" name="total" required><br>
      <label>Trạng thái:</label>
      <input type="number" name="status" value="1" required><br>

      <h3>Chi tiết đơn hàng</h3>
      <div id="details">
         <div class="detail">
            <label>Product ID:</label>
            <input type="number" name="details[0][product_id]" required>
            <label>Color ID:</label>
            <input type="number" name="details[0][color_id]" required>
            <label>Số lượng:</label>
            <input type="number" name="details[0][quantity]" required>
            <label>Giá:</label>
            <input type="number" step="0.01" name="details[0][price]" required>
         </div>
      </div>
      <button type="button" onclick="addDetail()">Thêm chi tiết</button><br><br>
      <button type="submit">Lưu đơn hàng</button>
   </form>

   <script>
      let detailIndex = 1;

      function addDetail() {
         const detailsDiv = document.getElementById('details');
         const newDetail = document.createElement('div');
         newDetail.className = 'detail';
         newDetail.innerHTML = `
                <label>Product ID:</label>
                <input type="number" name="details[${detailIndex}][product_id]" required>
                <label>Color ID:</label>
                <input type="number" name="details[${detailIndex}][color_id]" required>
                <label>Số lượng:</label>
                <input type="number" name="details[${detailIndex}][quantity]" required>
                <label>Giá:</label>
                <input type="number" step="0.01" name="details[${detailIndex}][price]" required>
            `;
         detailsDiv.appendChild(newDetail);
         detailIndex++;
      }
   </script>
</body>

</html>