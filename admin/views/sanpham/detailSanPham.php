<?php include './views/layout/header.php' ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php' ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header bg-light py-3 border-bottom">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-primary">Quản lý danh sách </h1>
        </div>
      </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content mt-3">

    <!-- Default box -->
    <div class="card card-solid shadow-lg">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <div class="col-12 text-center">
              <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="product-image img-fluid rounded border" alt="Product Image" style="max-height: 500px;">
            </div>
            <div class="col-12 product-image-thumbs mt-3 d-flex justify-content-center">
              <?php foreach ($listAnhSanPham as $key => $anhSP) { ?>
                <div class="product-image-thumb mx-1 <?= $anhSP[$key] == 0 ? 'active border-primary' : '' ?>">
                  <img src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" class="img-thumbnail" alt="Product Image" style="height: 100px; width: auto;">
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <h3 class="my-3 text-dark">Tên sản phẩm: <span class="text-info"><?= $sanPham['ten_san_pham'] ?></span></h3>
            <hr>
            <p class="lead"><strong>Giá tiền:</strong> <?= $sanPham['gia_san_pham'] ?></p>
            <p class="lead text-success"><strong>Giá khuyến mãi:</strong> <?= $sanPham['gia_khuyen_mai'] ?></p>
            <p><strong>Số lượng:</strong> <?= $sanPham['so_luong'] ?></p>
            <p><strong>Lượt xem:</strong> <?= $sanPham['luot_xem'] ?></p>
            <p><strong>Ngày nhập:</strong> <?= $sanPham['ngay_nhap'] ?></p>
            <p><strong>Danh mục:</strong> <?= $sanPham['ten_danh_muc'] ?></p>
            <p><strong>Trạng thái:</strong>
              <span class="badge 
        <?= $sanPham['so_luong'] == 0 ? 'badge-warning' : ($sanPham['trang_thai'] == 1 ? 'badge-success' : 'badge-danger') ?>">
                <?= $sanPham['so_luong'] == 0 ? 'Hết hàng' : ($sanPham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán') ?>
              </span>
            </p>

            <p><strong>Mô tả:</strong> <?= $sanPham['mo_ta'] ?></p>
          </div>
        </div>

        <hr class="my-4">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="tab-pane fade show active" id="binh-luan" role="tabpanel" aria-labelledby="product-desc-tab">
            <h2 class="text-secondary mb-4">Bình luận</h2>
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th>STT</th>
                    <th>Người bình luận</th>
                    <th>Nội dung</th>
                    <th>Ngày bình luận</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listBinhLuan as $key => $binhLuan) { ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td>
                        <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id'] ?>" class="text-primary">
                          <?= $binhLuan['ho_ten'] ?>
                        </a>
                      </td>
                      <td><?= $binhLuan['noi_dung'] ?></td>
                      <td><?= $binhLuan['ngay_dang'] ?></td>
                      <td>
                        <form action="<?= BASE_URL_ADMIN . '?act=xoa-binh-luan' ?>" method="POST">
                          <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                          <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Bạn có muốn xóa bình luận này không?')">
                            Xóa
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>

<!-- /.content-wrapper -->
<!--footer-->
<?php include './views/layout/footer.php'; ?>

<!-- /.control-sidebar -->
</div>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  var faqs_row = 0;

  function addfaqs() {

    html = '<tr id="faqs-row' + faqs_row + '">';
    html += '<td><input type="text" class="form-control" placeholder="User name"></td>';
    html += '<td><input type="text" placeholder="Product name" class="form-control"></td>';
    html += '<td class="text-danger mt-10"> 18.76% <i class="fa fa-arrow-down"></i></td>';
    html += '<td class="mt-10"><button class="badge badge-danger" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> Delete</button></td>';

    html += '</tr>';

    $('#faqs tbody').append(html);

    faqs_row++;
  }
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function() {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
</body>

</html>