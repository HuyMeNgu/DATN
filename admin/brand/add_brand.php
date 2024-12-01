<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand_name = $_POST['brand_name'];
    // Thêm sản phẩm vào bảng `colors`
    $stmt = $mysqli->prepare("INSERT INTO brands (brand_name) VALUES (?)");
    $stmt->bind_param("s", $brand_name);

    $stmt->execute();
    $product_id = $stmt->insert_id;
    $stmt->close();
    //Thông báo
    echo '<div class="alert alert-success" role="alert">Thêm thương hiệu thành công!</div>';
}
?>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>THÊM THƯƠNG HIỆU</h2>
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
                                        <input id="brand_name" name="brand_name" class="form-control" placeholder="Nhập thương hiệu" required>
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