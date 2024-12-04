<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $color_name = $_POST['color_name'];
    $code = $_POST['code'];
    // Thêm sản phẩm vào bảng `colors`
    $stmt = $mysqli->prepare("INSERT INTO colors (color_name, code) VALUES (?, ?)");
    $stmt->bind_param("ss", $color_name, $code);

    $stmt->execute();
    $product_id = $stmt->insert_id;
    $stmt->close();
    //Thông báo
    echo '<div class="alert alert-success" role="alert">Thêm màu sắc thành công!</div>';
    header("Location: ?action=color");
    exit;
}
?>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>THÊM MÀU SẮC</h2>
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
                                        <input id="color_name" name="color_name" class="form-control" placeholder="Nhập màu sắc" required>
                                    </div>
                                    <div class="form-group mg-form">
                                        <h4>Mã màu</h4>
                                        <input id="code" name="code" class="form-control" placeholder="Nhập mã màu" value="" require>
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