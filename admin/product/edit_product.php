<?php
// Lấy dữ liệu sản phẩm hiện tại
$product_id = $_GET['id']; // ID sản phẩm cần chỉnh sửa
$product_query = $mysqli->prepare("SELECT * FROM products WHERE id = ?");
$product_query->bind_param("i", $product_id);
$product_query->execute();
$product = $product_query->get_result()->fetch_assoc();
$product_query->close();

// Lấy danh sách màu của sản phẩm
$product_colors_query = $mysqli->prepare("SELECT * FROM productcolors WHERE product_id = ?");
$product_colors_query->bind_param("i", $product_id);
$product_colors_query->execute();
$product_colors = $product_colors_query->get_result()->fetch_all(MYSQLI_ASSOC);
$product_colors_query->close();

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
    $brand_id = $_POST['brand_id'];
    $rating = isset($_POST['rating']) ? $_POST['rating'] : 0;
    $is_active = isset($_POST['is_active']) ? (int)$_POST['is_active'] : 0;

    // Cập nhật hình ảnh chính nếu có thay đổi
    $mainImagePath = $product['img'];
    if (!empty($_FILES['img']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $mainImagePath = $targetDir . basename($_FILES['img']['name']);
        move_uploaded_file($_FILES['img']['tmp_name'], $mainImagePath);
    }

    // Cập nhật sản phẩm
    $stmt = $mysqli->prepare("UPDATE products SET product_name = ?, description = ?, price = ?, category_id = ?, brand_id = ?, rating = ?, img = ?, is_active = ? WHERE id = ?");
    $stmt->bind_param("ssdiidsii", $product_name, $description, $price, $category_id, $brand_id, $rating, $mainImagePath, $is_active, $product_id);
    $stmt->execute();
    $stmt->close();

    // Xóa màu sắc cũ và thêm mới
    $mysqli->query("DELETE FROM productcolors WHERE product_id = $product_id");

    if (!empty($_POST['colors']) && is_array($_POST['colors'])) {
        // Định nghĩa thư mục upload
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        foreach ($_POST['colors'] as $key => $color) {
            $color_id = $color['id'];
            $quantity = $color['quantity'];
            $colorImagePath = "";

            // Tải lên hình ảnh màu sắc
            if (isset($_FILES['colors']['name'][$key]['img']) && isset($_FILES['colors']['tmp_name'][$key]['img'])) {
                $color_img = $_FILES['colors']['name'][$key]['img'];
                $tmp_name = $_FILES['colors']['tmp_name'][$key]['img'];
                $colorImagePath = $targetDir . basename($color_img);
                move_uploaded_file($tmp_name, $colorImagePath);
            }

            // Lưu vào cơ sở dữ liệu
            $stmt = $mysqli->prepare("INSERT INTO productcolors (product_id, color_id, img_path, quantity) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iisi", $product_id, $color_id, $colorImagePath, $quantity);
            $stmt->execute();
            $stmt->close();
        }
    }

    echo '<div class="alert alert-success" role="alert">Cập nhật sản phẩm thành công!</div>';
}

?>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>CHỈNH SỬA SẢN PHẨM</h2>
                </div>
            </div>
        </div>
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h4>Nhập thông tin sản phẩm</h4>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group mg-form">
                                        <h4>Tên sản phẩm</h4>
                                        <input id="product_name" name="product_name" class="form-control" value="<?= $product['product_name'] ?>" required>
                                    </div>
                                    <div class="form-group mg-form">
                                        <h4>Mô tả</h4>
                                        <textarea name="description" id="description" class="form-control" required><?= $product['description'] ?></textarea>
                                    </div>
                                    <div class="form-group mg-form">
                                        <h4>Giá bán</h4>
                                        <input id="price" name="price" class="form-control" value="<?= $product['price'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mg-form">
                                        <h4>Sản phẩm loại</h4>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <?php
                                            $listCate = $mysqli->query('SELECT * FROM categories');
                                            foreach ($listCate as $item) { ?>
                                                <option value="<?= $item['id'] ?>" <?= $item['id'] == $product['category_id'] ? 'selected' : '' ?>>
                                                    <?= $item['cate_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mg-form">
                                        <h4>Thương hiệu</h4>
                                        <select name="brand_id" class="form-control">
                                            <?php
                                            $listCate = $mysqli->query('SELECT * FROM brands');
                                            foreach ($listCate as $item) { ?>
                                                <option value="<?= $item['id'] ?>" <?= $item['id'] == $product['brand_id'] ? 'selected' : '' ?>>
                                                    <?= $item['brand_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mg-form">
                                        <h4>Màu sắc</h4>
                                        <div id="colorList">
                                            <?php foreach ($product_colors as $key => $product_color) { ?>
                                                <div class="color-entry">
                                                    <select name="colors[<?= $key ?>][id]" required>
                                                        <?php foreach ($colors as $color) : ?>
                                                            <option value="<?= $color['id'] ?>" <?= $color['id'] == $product_color['color_id'] ? 'selected' : '' ?>>
                                                                <?= $color['color_name'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input type="file" name="colors[<?= $key ?>][img]" accept="image/*">
                                                    <input type="number" name="colors[<?= $key ?>][quantity]" placeholder="Số lượng" value="<?= $product_color['quantity'] ?>" min="0" required>
                                                    <button type="button" onclick="removeColorOption(this)">Xóa</button>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <button type="button" onclick="addColorOption()">Thêm màu</button><br>
                                    </div>
                                    <div class="form-group">
                                        <h4>Hình ảnh</h4>
                                        <input type="file" class="form-control" name="img" id="imageUpload" accept="image/*">
                                        <img id="previewImage" src="<?= $product['img'] ?>" alt="Ảnh hiện tại" style="max-width: 100%; margin-top: 20px;">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block mg-btn" style="margin-top: 40px">
                                Cập nhật
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let colorCounter = <?= count($product_colors) ?>;

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
        $(document).ready(function() {
            // Lắng nghe sự kiện change trên input file
            $("#imageUpload").on("change", function(event) {
                // Kiểm tra xem có file được chọn hay không
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Cập nhật nguồn ảnh cho thẻ img
                        $("#previewImage").attr("src", e.target.result);
                        // Hiển thị thẻ img
                        // $('#previewImage').css('display', 'block');
                    };
                    // Đọc dữ liệu của file được chọn
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
</div>