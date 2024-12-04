<?php
// Lấy danh sách đơn hàng
$sql = "SELECT * FROM orders";
$listOrder = $mysqli->query($sql);
?>

<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>ĐƠN HÀNG</h2>
            </div>
         </div>
      </div>
      <!-- row -->
      <div class="row column1">
         <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <h2>DANH SÁCH ĐƠN HÀNG</h2>
                  </div>
               </div>
               <div class="full price_table padding_infor_info">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="table-responsive-sm">
                           <table class="table table-striped projects">
                              <thead class="thead-dark">
                                 <tr>
                                    <th style="width: 1%">Mã</th>
                                    <th>Họ tên</th>
                                    <th>Ngày đặt</th>
                                    <th>Thanh toán</th>
                                    <th>Tổng tiền</th>
                                    <th>Tình trạng</th>
                                    <th>Sửa</th>
                                    <th>Duyệt</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 // Lặp qua danh sách đơn hàng và hiển thị
                                 foreach ($listOrder as $item) {
                                 ?>
                                    <tr>
                                       <td><?= $item['code'] ?></td>
                                       <td><?= $item['customer_name'] ?></td>
                                       <td><?= $item['create_at'] ?></td>
                                       <td><?= $item['payment'] ?></td>
                                       <td><?= $item['total_price'] ?></td>
                                       <td>
                                          <!-- Hiển thị trạng thái dựa trên giá trị số -->
                                          <?php
                                          switch ($item['status']) {
                                             case 0:
                                                echo 'Chờ xác nhận';
                                                break;
                                             case 1:
                                                echo 'Đã duyệt';
                                                break;
                                             case 2:
                                                echo 'Đã vận chuyển';
                                                break;
                                             case 3:
                                                echo 'Đã giao';
                                                break;
                                             case 4:
                                                echo 'Đã hủy';
                                                break;
                                             default:
                                                echo 'Chưa xác định';
                                          }
                                          ?>
                                       </td>
                                       <td>
                                          <a href="?action=edit_order&id=<?= $item['id'] ?>" class="btn btn-info btn-sm">
                                             <i class="fa fa-pencil"></i> Sửa
                                          </a>
                                       </td>
                                       <td>
                                          <!-- Nút duyệt đơn hàng -->
                                          <?php if ($item['status'] == 1) { ?>
                                             <a href="?action=approve_order&order_id=<?= $item['id'] ?>" class="btn btn-success btn-sm">
                                                <i class="fa fa-check"></i> Duyệt
                                             </a>
                                          <?php } else { ?>
                                             <span class="badge badge-success">Đã duyệt</span>
                                          <?php } ?>
                                       </td>
                                    </tr>
                                 <?php
                                 }
                                 ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end row -->
      </div>
      <!-- footer -->
      <div class="container-fluid">
         <div class="row">
            <div class="footer">
               <p>Copyright © 2018 Designed by html.design. All rights reserved.</p>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {
      $('.btn-delete').click(function(e) {
         e.preventDefault(); // Ngăn chặn hành động mặc định (không load lại trang)

         var itemId = $(this).data('id'); // Lấy ID của item từ data-id

         if (confirm('Bạn có chắc chắn muốn xóa không?')) {
            $.ajax({
               url: './ajax/delete_category.php', // URL của file xử lý xóa
               type: 'POST',
               data: {
                  id: itemId
               }, // Gửi ID item qua POST
               success: function(response) {

                  alert('Xóa thành công!'); // Hiển thị thông báo thành công
                  location.reload(); // Tải lại trang

               },
               error: function() {
                  alert('Có lỗi xảy ra khi gửi yêu cầu!');
               }
            });
         }
      });
   });
</script>