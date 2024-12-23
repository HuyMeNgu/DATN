<?php
$sql = "SELECT * FROM suppliers";
$listSupplier = $mysqli->query($sql);
?>

<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>NHÀ CUNG CẤP</h2>
            </div>
         </div>
      </div>
      <!-- row -->
      <div class="row column1">
         <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <a href="?action=add_supplier" class="btn btn-success">Thêm mới</a>
                  </div>
               </div>
               <div class="full price_table padding_infor_info">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="table-responsive-sm">
                           <table class="table table-striped projects">
                              <thead class="thead-dark">
                                 <tr>
                                    <th style="width: 1%">STT</th>
                                    <th style="width: 40%">Tên nhà cung cấp</th>
                                    <th style="width: 60%">Địa chỉ</th>
                                    <th>SĐT</th>
                                    <th>Email</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 foreach ($listSupplier as $item) {
                                 ?>
                                    <tr>
                                       <td><?= $item['id'] ?></td>
                                       <td>
                                          <?= $item['supp_name'] ?>
                                       </td>
                                       <td>
                                          <?= $item['address'] ?>
                                       </td>
                                       <td>
                                          <?= $item['phone'] ?>
                                       </td>
                                       <td>
                                          <?= $item['email'] ?>
                                       </td>
                                       <td>
                                          <a href="?action=edit_supplier&id=<?= $item['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                       </td>
                                       <td>
                                          <a href="" data-id="<?= $item['id'] ?>" class="btn btn-danger  btn-sm btn-delete"><i class="fa fa-trash"></i></a>
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
               url: './ajax/delete_supplier.php', // URL của file xử lý xóa
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