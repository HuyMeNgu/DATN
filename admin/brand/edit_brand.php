<?php
// Lấy dữ liệu thuong hieu hiện tại
$brand_id = $_GET['id']; // ID thuong hieu cần chỉnh sửa
$brand_query = $mysqli->prepare("SELECT * FROM brands WHERE id = ?");
$brand_query->bind_param("i", $brand_id);
$brand_query->execute();
$brand = $brand_query->get_result()->fetch_assoc();
$brand_query->close();
// Cập nhật sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand_name = $_POST['brand_name'];
    $stmt = $mysqli->prepare("UPDATE brands SET brand_name = ? WHERE id = ?");
    $stmt->bind_param("si", $brand_name, $brand_id);
    $stmt->execute();
    $stmt->close();

    echo '<div class="alert alert-success" role="alert">Cập nhật thương hiệu thành công!</div>';
}
?>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>CHỈNH SỬA THƯƠNG HIỆU</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h4>Nhập thông tin thương hiệu</h4>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group mg-form">
                                        <h4>Thương hiệu</h4>
                                        <input id="brand_name" name="brand_name" class="form-control" placeholder="Nhập thương hiệu" value=" <?= $brand['brand_name'] ?>" required>
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