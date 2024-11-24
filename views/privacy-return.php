<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chính Sách Đổi Trả - BaloOnline</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <?php
        $is_homepage = false;
        require_once('header.php');

    ?>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .breadcrumb {
            background-color: transparent;
        }
        .policy-section {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 5px;
        }
        .policy-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .policy-content {
            line-height: 1.8;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class=" text-black py-3">
        <div class="container">
            <h1 class="text-center">Chính Sách Bảo Mật</h1>
        </div>
    </header>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mt-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chính sách bảo mật</li>
            </ol>
        </div>
    </nav>

    <!-- Chính sách -->
    <div class="container my-4">
        <div class="policy-section">
            <h2 class="policy-title">1. Điều kiện đổi trả</h2>
            <p class="policy-content">
                - Sản phẩm còn nguyên tem, bao bì, chưa qua sử dụng.<br>
                - Có hóa đơn mua hàng đi kèm.<br>
                - Thời gian áp dụng đổi trả trong vòng 7 ngày kể từ ngày nhận hàng.
            </p>


            

            <h2 class="policy-title">2. Quy trình đổi trả</h2>
            <p class="policy-content">
                - Bước 1: Liên hệ với bộ phận chăm sóc khách hàng qua hotline hoặc email.<br>
                - Bước 2: Cung cấp thông tin và hình ảnh sản phẩm lỗi.<br>
                - Bước 3: Gửi sản phẩm về địa chỉ trung tâm đổi trả.<br>
                - Bước 4: Nhận sản phẩm thay thế hoặc hoàn tiền.
            </p>

            <h2 class="policy-title">3. Lưu ý</h2>
            <p class="policy-content">
                - Chi phí vận chuyển đổi trả do khách hàng chịu, trừ trường hợp lỗi từ phía cửa hàng.<br>
                - Các sản phẩm giảm giá hoặc trong chương trình khuyến mãi đặc biệt sẽ không được hỗ trợ đổi trả.<br>
                - Mọi thắc mắc vui lòng liên hệ qua hotline: <strong>1800-1234</strong> hoặc email: <strong>support@baloonline.com</strong>.
            </p>
        </div>
    </div>

    <!-- Footer -->
    <?php
        include("footer.php");
    ?>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
