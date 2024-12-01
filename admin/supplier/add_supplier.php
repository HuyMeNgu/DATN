<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $supp_name = $_POST['supp_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    // Thêm sản phẩm vào bảng `colors`
    $stmt = $mysqli->prepare("INSERT INTO suppliers (supp_name, address,phone,email ) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $supp_name, $address, $phone, $email);

    $stmt->execute();
    $product_id = $stmt->insert_id;
    $stmt->close();
    //Thông báo
    echo '<div class="alert alert-success" role="alert">Thêm nhà cung cấp thành công!</div>';
}
?>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>THÊM NHÀ CUNG CẤP</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h4>Nhập thông nhà cung cấp</h4>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group mg-form">
                                        <h4>Tên nhà cung cấp</h4>
                                        <input id="supp_name" name="supp_name" class="form-control" placeholder="Nhập tên nhà cung cấp" required>
                                    </div>
                                    <div class="form-group mg-form">
                                        <h4>Địa chỉ</h4>
                                        <input id="address" name="address" class="form-control" placeholder="Nhập địa chỉ" value="" require>
                                    </div>
                                    <div class="form-group mg-form">
                                        <h4>Số điện thoại</h4>
                                        <input id="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="" require>
                                    </div>
                                    <div class="form-group mg-form">
                                        <h4>email</h4>
                                        <input id="email" name="email" class="form-control" placeholder="Nhập email" value="" require>
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