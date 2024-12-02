<?php
//Danh sach san pham
$listproduct = $mysqli->query("SELECT * FROM products");
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
   $mysqli->begin_transaction();

   try {
      // Chèn vào bảng import_orders
      $stmt = $mysqli->prepare("INSERT INTO import_orders (code, admin_id, create_at, supplier_id, total, status) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sisddi", $code, $admin_id, $create_at, $supplier_id, $total, $status);
      $stmt->execute();

      // Lấy ID của import_order vừa chèn
      $import_order_id = $mysqli->insert_id;

      // Chèn chi tiết đơn hàng vào import_detail_orders và cập nhật productcolors
      $stmt_detail = $mysqli->prepare("INSERT INTO import_detail_orders (imporder_id, product_id, color_id, quantity, price) VALUES (?, ?, ?, ?, ?)");
      $stmt_update_productcolor = $mysqli->prepare("UPDATE productcolors SET quantity = quantity + ? WHERE product_id = ? AND color_id = ?");

      foreach ($details as $detail) {
         $stmt_detail->bind_param("iiiid", $import_order_id, $detail['product_id'], $detail['color_id'], $detail['quantity'], $detail['price']);
         $stmt_detail->execute();

         // Cập nhật số lượng trong bảng productcolors
         $stmt_update_productcolor->bind_param("iii", $detail['quantity'], $detail['product_id'], $detail['color_id']);
         $stmt_update_productcolor->execute();
      }

      // Commit giao dịch
      $mysqli->commit();
      echo '<div class="alert alert-success" role="alert">Đơn hàng đã được lưu thành công và số lượng sản phẩm đã được cập nhật!</div>';
   } catch (Exception $e) {
      // Rollback nếu có lỗi
      $conn->rollback();
      echo "Đã xảy ra lỗi: " . $e->getMessage();
   }

   $stmt->close();
}
?>
<!-- <div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>THÔNG TIN ĐƠN HÀNG NHẬP</h2>
            </div>
         </div>
      </div> -->
<!-- row -->
<!-- <div class="row column1">
         <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
               <div class="full price_table padding_infor_info">
                  <form method='POST' action="" id='importForm'>
                     <div class="row">
                        <div class="col-6">
                           <h6>Tài khoản: <span class="fw-bold"><?= $_SESSION['full'] ?></span></h6>
                           <h6>Ngày giờ: <span class="fw-bold"><?= date('H:i') ?></span></h6>
                           <h6>Nhà cung cấp:</h6>
                           <select name="supplier_id" id="supplier_id">
                              <?php
                              foreach ($listSupplier as $item) {
                              ?>
                                 <option value="<?= $item['id'] ?>">
                                    <?= $item['supp_name'] ?>
                                 </option>
                              <?php
                              }
                              ?>
                           </select>
                        </div>
                        <div class="col-6">
                           <h6>Tổng số lượng: <span class="fw-bold"><?= $_SESSION['full'] ?></span></h6>
                        </div>
                     </div>
                     <h3>Chi tiết sản phẩm nhập hàng</h3>
                     <div>
                        <div class="row align-items-center mb-2 py-0 product-detail">
                           <label class="form-label">Sản phẩm tên: </label>
                           <label for="total_price" class="form-label">Màu sắc</label>
                           <label for="total_price" class="form-label">Giá nhập</label>
                           <label for="quantity" class="form-label">Số lượng</label>
                        </div>
                     </div>
                     <div class="row align-items-center mb-2 py-0 product-detail" id="details">
                        <div class="detail">
                           <input type="number" name="details[0][product_id]" required>
                           <input type="number" name="details[0][color_id]" required>
                           <input type="number" name="details[0][quantity]" required>
                           <input type="number" step="0.01" name="details[0][price]" required>
                        </div>
                     </div>
                     <p class="mt-2"><a href="#" onclick="addDetail()" class="text-decoration-none">+ Thêm sản phẩm</a></p>
                     <button type="submit" id="complete" class="mt-4 btn btn-success">Lưu đơn hàng</button>
                  </form>
               </div>
            </div>
         </div> -->
<!-- end row -->
<!-- </div> -->
<!-- footer -->
<!-- <div class="container-fluid">
         <div class="row">
            <div class="footer">
               <p>BALO STORE</p>
            </div>
         </div>
      </div>
   </div>
</div> -->
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


</body>

</html>