<?php
// Lấy dữ liệu thuong hieu hiện tại
$supplier_id = $_GET['id']; // ID thuong hieu cần chỉnh sửa
$supplier_query = $mysqli->prepare("SELECT * FROM suppliers WHERE id = ?");
$supplier_query->bind_param("i", $supplier_id);
$supplier_query->execute();
$supplier = $supplier_query->get_result()->fetch_assoc();
$supplier_query->close();
// Cập nhật sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $supp_name = $_POST['supp_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $stmt = $mysqli->prepare("UPDATE suppliers SET supp_name = ?, address = ?, phone =?, email=? WHERE id = ?");
    $stmt->bind_param("ssssi", $supp_name, $address, $phone, $email, $supplier_id);
    $stmt->execute();
    $stmt->close();

    echo '<div class="alert alert-success" role="alert">Cập nhật nhà cung cấp thành công thành công!</div>';
}
?>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>CHỈNH SỬA NHÀ CUNG CẤP</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h4>Nhập thông tin nhà cung cấp</h4>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group mg-form">
                                        <h4>Tên nhà cung cấp</h4>
                                        <input id="supp_name" name="supp_name" class="form-control" placeholder="Nhập" value=" <?= $supplier['supp_name'] ?>" required>
                                    </div>
                                    <div class="form-group mg-form">
                                        <h4>Địa chỉ</h4>
                                        <input id="address" name="address" class="form-control" placeholder="Nhập" value=" <?= $supplier['address'] ?>" required>
                                    </div>
                                    <div class="form-group mg-form">
                                        <h4>Số điện thoại</h4>
                                        <input id="phone" name="phone" class="form-control" placeholder="Nhập" value=" <?= $supplier['phone'] ?>" required>
                                    </div>
                                    <div class="form-group mg-form">
                                        <h4>Email</h4>
                                        <input id="email" name="email" class="form-control" placeholder="Nhập" value=" <?= $supplier['email'] ?>" required>
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