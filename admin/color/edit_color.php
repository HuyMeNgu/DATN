<?php
// Lấy dữ liệu thuong hieu hiện tại
$color_id = $_GET['id']; // ID thuong hieu cần chỉnh sửa
$color_query = $mysqli->prepare("SELECT * FROM colors WHERE id = ?");
$color_query->bind_param("i", $color_id);
$color_query->execute();
$color = $color_query->get_result()->fetch_assoc();
$color_query->close();
// Cập nhật sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $color_name = $_POST['color_name'];
    $code = $_POST['code'];
    $stmt = $mysqli->prepare("UPDATE colors SET color_name = ?, code = ? WHERE id = ?");
    $stmt->bind_param("ssi", $color_name, $code, $color_id);
    $stmt->execute();
    $stmt->close();

    echo '<div class="alert alert-success" role="alert">Cập nhật màu sắc thành công!</div>';
}
?>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>CHỈNH SỬA MÀU SẮC</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h4>Nhập thông tin màu sắc</h4>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group mg-form">
                                        <h4>Màu sắc</h4>
                                        <input id="color_name" name="color_name" class="form-control" placeholder="Nhập" value=" <?= $color['color_name'] ?>" required>
                                    </div>
                                    <div class="form-group mg-form">
                                        <h4>Mã màu</h4>
                                        <input id="code" name="code" class="form-control" placeholder="Nhập" value=" <?= $color['code'] ?>" required>
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