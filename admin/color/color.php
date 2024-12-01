<?php
$sql = "SELECT * FROM colors";
$listColor = $mysqli->query($sql);

// Xử lý xóa màu
if (isset($_GET['action']) && $_GET['action'] == 'delete_color' && isset($_GET['id'])) {
   $id = intval($_GET['id']); // Lấy ID màu để xóa
   $deleteSql = "DELETE FROM colors WHERE id = $id";
   if ($mysqli->query($deleteSql)) {
      echo "<script>alert('Xóa thành công!'); window.location.href = 'color.php';</script>";
   } else {
      echo "<script>alert('Xóa thất bại!'); window.location.href = 'color.php';</script>";
   }
}
?>

<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>MÀU SẮC</h2>
            </div>
         </div>
      </div>
      <!-- row -->
      <div class="row column1">
         <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <a href="?action=add_color" class="btn btn-success">Thêm màu</a>
                  </div>
               </div>
               <div class="full price_table padding_infor_info">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="table-responsive-sm">
                           <table class="table table-striped projects">
                              <thead class="thead-dark">
                                 <tr>
                                    <th>STT</th>
                                    <th>Màu</th>
                                    <th>Mã màu</th>
                                    <th style="width: 10%">Sửa</th>
                                    <th style="width: 10%">Xóa</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 foreach ($listColor as $item) {
                                 ?>
                                    <tr>
                                       <td><?= $item['id'] ?></td>
                                       <td>
                                          <a><?= $item['color_name'] ?></a>
                                       </td>
                                       <td>
                                          <a><?= $item['code'] ?></a>
                                       </td>
                                       <td>
                                          <a href="?action=edit_color&id=<?= $item['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                       </td>
                                       <td>
                                          <a href="?action=delete_color&id=<?= $item['id'] ?>"
                                             onclick="return confirm('Bạn chắc chắn muốn xóa?')"
                                             class="btn btn-danger btn-sm">
                                             <i class="fa fa-trash"></i>
                                          </a>
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
               <p>BALO STORE</p>
            </div>
         </div>
      </div>
   </div>
</div>