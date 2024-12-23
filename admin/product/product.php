<?php
$sql = "SELECT DISTINCT products.*, categories.cate_name, colors.color_name FROM products
   INNER JOIN categories ON products.category_id = categories.id
   INNER JOIN productcolors ON products.id = productcolors.product_id
   INNER JOIN colors ON productcolors.color_id = colors.id
   order by products.id
   ";
$listPro = $mysqli->query($sql);
$products = [];
while ($row = mysqli_fetch_assoc($listPro)) {
   $productId = $row['id'];
   if (!isset($products[$productId])) {
      $products[$productId] = [
         'id' => $row['id'],
         'product_name' => $row['product_name'],
         'cate_name' => $row['cate_name'],
         'img' => $row['img'],
         'colors' => [],
      ];
   }
   $products[$productId]['colors'][] = $row['color_name'];
}
?>

<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>DANH SÁCH SẢN PHẨM</h2>
            </div>
         </div>
      </div>
      <!-- row -->
      <div class="row column1">
         <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <a href="?action=add_product" class="btn btn-success">Thêm mới</a>
                  </div>
               </div>
               <div class="full price_table padding_infor_info">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="table-responsive-sm">
                           <table class="table table-striped projects">
                              <thead class="thead-dark">
                                 <tr>
                                    <th style="width: 2%">STT</th>
                                    <th style="width: 10%">Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Loại</th>
                                    <th>Màu sắc</th>
                                    <!-- <th>Trạng thái</th> -->
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 foreach ($products as $item) {
                                 ?>
                                    <tr>
                                       <td><?= $item['id'] ?></td>
                                       <td>
                                          <img width="40" src="<?= $item['img'] ?>" alt="#">
                                       </td>
                                       <td>
                                          <?= $item['product_name'] ?>
                                       </td>
                                       <td class="project_progress">
                                          <?= $item['cate_name'] ?>
                                       </td>
                                       <td> <?= implode(", ", $item['colors']) ?></td>
                                       <!-- <td>
                                          <button type="button" class="btn btn-success btn-xs">Mở</button>
                                       </td> -->
                                       <td>
                                          <a href="?action=edit_product&id=<?= $item['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                       </td>
                                       <td>
                                          <a href="" data-id="<?= $item['id'] ?>" class="btn btn-danger  btn-sm btn-delete"><i class="fa fa-trash"></i></a>
                                       </td>
                                    </tr>
                                 <?php
                                 } ?>
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
               <p>BALO STORE</p>
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
               url: './ajax/delete_product.php', // URL của file xử lý xóa
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