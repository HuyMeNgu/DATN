<?php
    // Lấy danh sách màu
    $colors_result = $mysqli->query("SELECT * FROM colors");
    $colors = [];
    while ($row = $colors_result->fetch_assoc()) {
        $colors[] = $row;
    }
    // Kiểm tra dữ liệu POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    // $rating = $_POST['rating'];
    // $img = $_FILES['img'];

    // Tải lên hình ảnh chính
    $targetDir = "uploads/";
    // $mainImagePath = $targetDir . basename($img['name']);
    // move_uploaded_file($img['tmp_name'], $mainImagePath);

    // Thêm sản phẩm vào bảng `products`
    $stmt = $mysqli->prepare("INSERT INTO products (product_name, description, price, category_id, rating, img, is_active) VALUES (?, ?, ?, ?, 1, ?, 1)");
    $stmt->bind_param("ssdids", $product_name, $description, $price, $category_id, $rating, $mainImagePath);
    $stmt->execute();
    $product_id = $stmt->insert_id;
    $stmt->close();

    // Xử lý màu sắc
    if (!empty($_POST['colors'])) {
        foreach ($_POST['colors'] as $color) {
            $color_id = $color['id'];
            $quantity = $color['quantity'];
            $color_img = $_FILES['colors']['name'][$color_id]['img'];
            $tmp_name = $_FILES['colors']['tmp_name'][$color_id]['img'];

            $colorImagePath = $targetDir . basename($color_img);
            move_uploaded_file($tmp_name, $colorImagePath);

            // Thêm vào bảng `productcolors`
            $stmt = $mysqli->prepare("INSERT INTO productcolors (product_id, color_id, img_path, quantity) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iisi", $product_id, $color_id, $colorImagePath, $quantity);
            $stmt->execute();
            $stmt->close();
        }
    }

    echo "Sản phẩm đã được thêm thành công!";
}
?>

<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>THÊM SẢN PHẨM</h2>
            </div>
         </div>
      </div>
   <!-- row -->
   <div class="row column1">
      <div class="col-md-12">
         <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
               <div class="heading1 margin_0">
                  <h4>Nhập thông tin sản phẩm</h4>
               </div>
            </div>
         <div class="full price_table padding_infor_info">
            <form method="POST">
            <div class="row">
               <div class="col-lg-8">
                    <div class="form-group mg-form">
                        <h4>Tên sản phẩm</h4>
                        <input id="product_name" name="product_name" class="form-control" placeholder="Nhập tên sản phẩm" value="">
                    </div>
                    <div class="form-group mg-form">
                        <h4>Mô tả</h4>
                        <textarea name="description" id="description" class="form-control" placeholder="Mô tả"></textarea>
                    </div>
                    <div class="form-group mg-form">
                        <h4>Giá bán</h4>
                        <input id="price" name="price" class="form-control" placeholder="Nhập giá tiền" value="">
                    </div>
               </div>
               <div class="col-lg-4">
                    <div class="form-group mg-form">
                        <h4>Sản phẩm loại</h4>
                        <select name="category_id" class="form-control">
                            <?php
                                $listCate = $mysqli->query('SELECT * FROM categories');
                                foreach($listCate as $item){?>
                                    <option value="<?=$item['id']?>">
                                        <?= $item['cate_name']?>
                                    </option>
                                <?php
                                }
                            ?> 
                        </select>
                    <div class="form-group mg-form">
                        <h4>Thương hiệu</h4>
                        <select name="category_id" class="form-control">
                            <?php
                                $listCate = $mysqli->query('SELECT * FROM brands');
                                foreach($listCate as $item){?>
                                    <option value="<?=$item['id']?>">
                                        <?= $item['brand_name']?>
                                    </option>
                                <?php
                                }
                            ?> 
                        </select>
                    </div>
                    <div class="form-group mg-form">
                        <h4>Màu sắc</h4>
                        <div id="colorList"></div>
                        <button type="button" onclick="addColorOption()">Thêm màu</button><br>
                    </div>
                    <div class="form-group">
                        <h4>Hình ảnh</h4>
                        <input type="file" class="form-control" name="" name="img" accept="">
                    </div>
                    <div class="form-group">
                        <img id="previewImage" src="" alt="Demo" style="max-width: 100%; max-height: 100%; margin-top: 20px;">
                    </div>
               </div>
            </div>
            <button type="submit" class="btn btn-success btn-block mg-btn" style="margin-top: 40px">
                Thêm
            </button>
            </form>
         </div>
      </div>
   </div>
   <!-- end row -->
   </div>
   <script>
        let colorCounter = 0;

        function addColorOption() {
            const colorList = document.getElementById('colorList');
            const newColorDiv = document.createElement('div');
            newColorDiv.setAttribute('class', 'color-entry');
            newColorDiv.innerHTML = `
                <select name="colors[${colorCounter}][id]" required>
                    <?php foreach ($colors as $color) : ?>
                        <option value="<?= $color['id'] ?>"><?= $color['color_name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="file" name="colors[${colorCounter}][img]" accept="image/*" required>
                <input type="number" name="colors[${colorCounter}][quantity]" placeholder="Số lượng" min="0" required>
                <button type="button" onclick="removeColorOption(this)">Xóa</button>`;
            colorList.appendChild(newColorDiv);
            colorCounter++;
        }

        function removeColorOption(button) {
            button.parentElement.remove();
        }
    </script>
   <!-- footer -->
   <div class="container-fluid">
      <div class="row">
         <div class="footer">
            <p>Copyright © 2018 Designed by html.design. All rights reserved.</p>
         </div>
      </div>
   </div>
</div>

<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "balostore");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect product details
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $rating = $_POST['rating'];
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    // Insert product details
    $stmt = $conn->prepare("INSERT INTO products (product_name, description, price, category_id, brand_id, rating, is_active, create_at, update_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
    $stmt->bind_param("ssdiidi", $product_name, $description, $price, $category_id, $brand_id, $rating, $is_active);
    $stmt->execute();
    $product_id = $stmt->insert_id;
    $stmt->close();

    // Insert colors and image paths
    if (!empty($_POST['color_ids'])) {
        foreach ($_POST['color_ids'] as $color_id) {
            if (isset($_FILES['img_paths']['name'][$color_id]) && $_FILES['img_paths']['error'][$color_id] == 0) {
                $target_dir = "uploads/";
                $img_path = $target_dir . basename($_FILES['img_paths']['name'][$color_id]);
                move_uploaded_file($_FILES['img_paths']['tmp_name'][$color_id], $img_path);

                // Insert color and image for the product
                $quantity = 100; // Default quantity or fetch from form if needed
                $stmt = $conn->prepare("INSERT INTO productcolors (product_id, color_id, img_path, quantity) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("iisi", $product_id, $color_id, $img_path, $quantity);
                $stmt->execute();
                $stmt->close();
            }
        }
    }

    echo "Product and colors added successfully!";
}
?>
