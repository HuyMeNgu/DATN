<!-- Footer Section Begin -->
<footer class="footer spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer__about">
              <div class="footer__about__logo">
                <a href="./index.html"><img src="img/logo.png" alt="" /></a>
              </div>
              <ul>
                <li>Địa chỉ: 65 Huỳnh Thúc Kháng, P.Bến Nghé, Q.1, Tp.HCM</li>
                <li>Phone: 028 38 212 868</li>
                <li>Email: ktcaothang@caothang.edu.vn</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
            <div class="footer__widget">
              <h6>Các chính sách có liên quan</h6>
              <ul>
                <li><a href="privacy-return.php">Chính sách đổi trả</a></li>
                <li><a href="privacy-security.php">Chính sách bảo mật</a></li>

              </ul>

            </div>
          </div>
          <div class="col-lg-4 col-md-12">
            <div class="footer__widget">
              <h6>Thông tin xin gửi mail về</h6>
              <p>
                Nhận thông tin cập nhật qua E-mail về cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt.
              </p>
              <form action="#">
                <input type="text" placeholder="Nhập mail của bạn tại đây" />
                <button type="submit" class="site-btn">Đăng ký</button>
              </form>
              <div class="footer__widget__social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </footer>
    <!-- Footer Section End -->
    <!-- Js Plugins -->
   <script src="../public/js/jquery-3.3.1.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/jquery.nice-select.min.js"></script>
    <script src="../public/js/jquery-ui.min.js"></script>
    <script src="../public/js/jquery.slicknav.js"></script>
    <script src="../public/js/mixitup.min.js"></script>
    <script src="../public/js/owl.carousel.min.js"></script>
    <script src="../public/js/main.js?v=<?=rand(10,99)?>"></script>
    
  </body>
</html>
<?php
include('../models/connectdb.php');
$conn->close();
?>