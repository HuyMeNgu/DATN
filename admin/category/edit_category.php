<?php
// Lấy dữ liệu thuong hieu hiện tại
$category_id = $_GET['id']; // ID thuong hieu cần chỉnh sửa
$category_query = $mysqli->prepare("SELECT * FROM categories WHERE id = ?");
$category_query->bind_param("i", $category_id);
$category_query->execute();
$category = $category_query->get_result()->fetch_assoc();
$category_query->close();
// Cập nhật sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cate_name = $_POST['cate_name'];
    $stmt = $mysqli->prepare("UPDATE categories SET cate_name = ? WHERE id = ?");
    $stmt->bind_param("si", $cate_name, $category_id);
    $stmt->execute();
    $stmt->close();

    echo '<div class="alert alert-success" role="alert">Cập nhật loại sản phẩm thành công!</div>';
    header("Location: category.php");
}
?>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>CHỈNH SỬA LOẠI SẢN PHẨM</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h4>Nhập thông tin loại sản phẩm</h4>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group mg-form">
                                        <h4>Loại sản phẩm</h4>
                                        <input id="cate_name" name="cate_name" class="form-control" placeholder="Nhập" value=" <?= $category['cate_name'] ?>" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-block mg-btn" style="margin-top: 40px">
                                    Cập nhật
                                </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- footer -->
        <div class="container-fluid">
            <div class="row">
                <div class="footer">
                    <p>BALO STORE</p>
                </div>
            </div>
        </div>
    </div>
</div>