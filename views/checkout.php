<?php
$is_homepage = false;
include('header.php');
require_once('../models/connectdb.php');
require_once('../models/function.php');
require_once('../models/database.php');
require_once('../models/session.php');


$cart =$_SESSION['cart'];

?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
              <h2>Thanh toán</h2>
              <div class="breadcrumb__option">
                <a href="./index.html">Home</a>
                <span>Thanh Toán</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h6>
              <span class="icon_tag_alt"></span> Have a coupon?
              <a href="#">Click here</a> to enter your code
            </h6>
          </div>
        </div>
        <div  class="checkout__form">
          <h4>Thông tin đơn hàng</h4>
          <form id="checkout-form" action="manage-order.php" method="post" name="create_order">
            <div class="row">
              <div class="col-lg-8 col-md-6">
                <div class="row">
                  
                  
                </div>
                <div class="checkout__input">
                  <p>Họ và tên<span>*</span></p>
                  <input name="customer_name" type="text" placeholder="Nhập họ tên " required  />
                  <span id="customername_Error" style="color: red;"></span><br>
                </div>
                <div class="checkout__input">
                  <p>Địa chỉ<span>*</span></p>
                  <input
                    type="text"
                    placeholder="Nhập địa chỉ giao hàng"
                    class="checkout__input__add"
                    name="address"
                    required
                  />
                  <span id="address_Error" style="color: red;"></span><br>

                </div>
                <div class="checkout__input">
                  <p>Email<span>*</span></p>
                  <input name="email" type="email" placeholder="Nhập Email" required/>
                  <span id="email_Error" style="color: red;"></span><br>

                </div>
                <div class="checkout__input">
                  <p>Số điện thoại<span>*</span></p>
                  <input name="phone" type="text"  placeholder="Nhập số điện thoại" required/>
                  <span id="phone_Error" style="color: red;"></span><br>

                </div>
              
                <div class="checkout__input">
                  <p>Ghi chú</p>
                  <textarea  style="width:100%;height:fit-content" name="note" id="" placeholder="Ghi chú(tuỳ chọn)"></textarea>
                </div>
             
               
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="checkout__order">
                  <h4>Đơn hàng của bạn</h4>
                  <div class="checkout__order__products">
                    Sản phẩm <span>Thành Tiền</span>
                  </div>
                  <ul>
                    <?php
                    $sum=0;
                     foreach($cart as $item):
                      $sum+=($item['price']*$item['quantity']);
                     ?>
                    <li name="proname"> <?= mb_strimwidth($item['name'], 0, 30, '...') ?> <span name="proprice"><?=$item['price']*$item['quantity']?></span></li>
                    <?php endforeach; ?>
                  </ul>
                  <div class="checkout__order__subtotal">
                    Phí vận chuyển <span>30000</span>
                  </div>
                  <div class="checkout__order__total">
                    Tổng cộng <span ><?=$sum+30000?></span>
                  </div>
                  <input name="totalprice" type="hidden" value="<?=$sum+30000?>">
                  <!-- <p>
                    Lorem ipsum dolor sit amet, consectetur adip elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </p> -->
                  <div class="checkout__input__checkbox">
                    <label for="payment">
                      COD
                      <input  value="COD" name="payment" class="payment-option" type="checkbox" id="payment" />
                      <span class="checkmark "></span>
                    </label>
                  </div>
                  <div class="checkout__input__checkbox">
                    <label for="paypal">
                      Ví điện tử VN-Pay
                      <input value="VN-pay" name="payment" class="payment-option" type="checkbox" id="paypal" />
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <button name="create_order" type="submit" class="site-btn order-btn">Đặt hàng</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- Checkout Section End -->
    <script>
  $(".payment-option").change(function () {
    $(".payment-option").not(this).prop("checked", false); // Bỏ chọn các checkbox khác
  });

  
</script>

    <!-- Footer Section Begin -->
<?php
include('footer.php');
?>
