<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Nhập Hàng</title>
   <style>
      .color-entry {
         margin-bottom: 10px;
      }

      .product-list {
         margin-top: 20px;
      }

      .button {
         margin-top: 10px;
         padding: 5px 10px;
      }
   </style>
</head>
<?php
$conn = new mysqli('localhost', 'username', 'password', 'database_name');
if ($conn->connect_error) {
   die('Connection failed: ' . $conn->connect_error);
}

$query = "SELECT id, supp_name FROM suppliers";
$result = $conn->query($query);

$suppliers = [];
while ($row = $result->fetch_assoc()) {
   $suppliers[] = $row;
}

echo json_encode($suppliers);
$conn->close();
?>

<body>
   <h1>Nhập Hàng</h1>
   <form id="importForm" method="POST" action="process_import.php">
      <label for="supplier">Nhà cung cấp:</label>
      <select name="supplier_id" id="supplier" required>
         <!-- Tùy chọn nhà cung cấp sẽ được thêm động -->
      </select>
      <br>

      <label for="admin">Nhân viên nhập:</label>
      <select name="admin_id" id="admin" required>
         <!-- Tùy chọn nhân viên sẽ được thêm động -->
      </select>
      <br>

      <div id="productList" class="product-list"></div>

      <button type="button" class="button" onclick="addProductColor()">Thêm sản phẩm</button>
      <button type="submit" class="button">Lưu phiếu nhập</button>
   </form>

   <script>
      let productCounter = 0;

      // Hàm để lấy danh sách nhà cung cấp và nhân viên nhập hàng
      async function loadSuppliersAndAdmins() {
         const supplierResponse = await fetch('fetch_suppliers.php');
         const adminResponse = await fetch('fetch_admins.php');

         const suppliers = await supplierResponse.json();
         const admins = await adminResponse.json();

         const supplierSelect = document.getElementById('supplier');
         const adminSelect = document.getElementById('admin');

         suppliers.forEach(supplier => {
            supplierSelect.innerHTML += `<option value="${supplier.id}">${supplier.supp_name}</option>`;
         });

         admins.forEach(admin => {
            adminSelect.innerHTML += `<option value="${admin.id}">${admin.fullname}</option>`;
         });
      }

      // Gọi hàm ngay khi trang tải
      window.onload = loadSuppliersAndAdmins;

      // Hàm thêm sản phẩm nhập hàng
      function addProductColor() {
         const productList = document.getElementById('productList');
         const newColorDiv = document.createElement('div');
         newColorDiv.setAttribute('class', 'color-entry');
         const currentCounter = productCounter;

         // Fetch danh sách sản phẩm
         fetch('fetch_products.php')
            .then(response => response.json())
            .then(products => {
               // Tạo dropdown sản phẩm
               let productOptions = products.map(product =>
                  `<option value="${product.id}">${product.product_name}</option>`
               ).join('');
               let productDropdown = `
                  <select name="details[${currentCounter}][product_id]" 
                          onchange="fetchColorsForProduct(this, ${currentCounter})" required>
                     <option value="">Chọn sản phẩm</option>
                     ${productOptions}
                  </select>`;

               // Tạo dropdown màu sắc (ban đầu rỗng)
               let colorDropdown = `
                  <select name="details[${currentCounter}][color_id]" 
                          id="colorSelect${currentCounter}" required>
                     <option value="">Chọn màu sắc</option>
                  </select>`;

               // Thêm các trường nhập
               newColorDiv.innerHTML = `
                  ${productDropdown}
                  ${colorDropdown}
                  <input type="number" name="details[${currentCounter}][quantity]" 
                         placeholder="Số lượng" min="1" required>
                  <input type="number" step="0.01" name="details[${currentCounter}][price]" 
                         placeholder="Đơn giá" required>
                  <button type="button" onclick="removeColorOption(this)">Xóa</button>`;
               productList.appendChild(newColorDiv);
               productCounter++;
            });
      }

      // Hàm lấy danh sách màu sắc theo sản phẩm
      function fetchColorsForProduct(select, counter) {
         const productId = select.value;
         const colorSelect = document.getElementById(`colorSelect${counter}`);

         // Reset dropdown màu sắc
         colorSelect.innerHTML = '<option value="">Chọn màu sắc</option>';

         if (productId) {
            fetch(`fetch_colors.php?product_id=${productId}`)
               .then(response => response.json())
               .then(colors => {
                  let colorOptions = colors.map(color =>
                     `<option value="${color.color_id}">${color.color_name}</option>`
                  ).join('');
                  colorSelect.innerHTML += colorOptions;
               });
         }
      }

      // Xóa dòng sản phẩm
      function removeColorOption(button) {
         button.parentElement.remove();
      }
   </script>
</body>

</html>