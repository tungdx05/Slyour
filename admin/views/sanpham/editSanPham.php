<?php include './views/layout/header.php' ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php' ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-9">
          <h1>Sửa thông tin sản phẩm: <?= $sanPham['ten_san_pham'] ?></h1>
        </div>
        <div class="col-sm-3">
          <a href="<?= BASE_URL_ADMIN . '?act=san-pham'?>" class="btn btn-secondary">Quay lại</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Thông tin sản phẩm</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                <label for="ten_san_pham">Tên sản phẩm</label>
                <input type="text" name="ten_san_pham" id="ten_san_pham" class="form-control" value="<?= $sanPham['ten_san_pham'] ?>">
                <?php if (isset($_SESSION['errors']['ten_san_pham'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['ten_san_pham'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="gia_san_pham">Giá sản phẩm</label>
                <input type="number" name="gia_san_pham" id="gia_san_pham" class="form-control" value="<?= $sanPham['gia_san_pham'] ?>">
                <?php if (isset($_SESSION['errors']['gia_san_pham'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['gia_san_pham'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="gia_khuyen_mai">Giá khuyến mãi(Nhập 0 nếu không có giá KM)</label>
                <input type="number" name="gia_khuyen_mai" id="gia_khuyen_mai" class="form-control" value="<?= $sanPham['gia_khuyen_mai'] ?>">
              </div>
              <div class="form-group">
                                <label for="hinh_anh">Hình ảnh</label>
                                <input type="file" name="hinh_anh" id="hinh_anh" class="form-control">
                                <p>Hình hiện tại:</p>
                                <img src="<?= BASE_URL . htmlspecialchars($sanPham['hinh_anh']) ?>" alt="Ảnh sản phẩm" style="width: 100px; height: auto;">
                                <?php if (isset($_SESSION['errors']['hinh_anh'])): ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['hinh_anh'] ?></p>
                                <?php endif; ?>
                            </div>
              <div class="form-group">
                <label for="so_luong">Số lượng</label>
                <input type="number" name="so_luong" id="so_luong" class="form-control" value="<?= $sanPham['so_luong'] ?>">
                <?php if (isset($_SESSION['errors']['so_luong'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['so_luong'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="ngay_nhap">Ngày nhập</label>
                <input type="date" name="ngay_nhap" id="ngay_nhap" class="form-control" value="<?= $sanPham['ngay_nhap'] ?>">
                <?php if (isset($_SESSION['errors']['ngay_nhap'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['ngay_nhap'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="inputStatus">Danh mục sản phẩm</label>
                <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                  <?php foreach ($listDanhMuc as $danhMuc) { ?>
                    <option <?= $danhMuc['id'] === $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                  <?php } ?>
                </select>
                <?php if (isset($_SESSION['errors']['danh_muc'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['danh_muc'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="trang_thai">Trạng thái</label>
                <select id="trang_thai" name="trang_thai" class="form-control custom-select">

                  <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn bán</option>
                  <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="2">Dừng bán</option>

                </select>
                <?php if (isset($_SESSION['errors']['trang_thai'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?></p>
                <?php } ?>
              </div>


              <div class="form-group">
                <label for="mo_ta">Mô tả sản phẩm</label>
                <textarea name="mo_ta" id="mo_ta" class="form-control" rows="4" value="<?= $sanPham['mo_ta'] ?>"><?= $sanPham['mo_ta'] ?></textarea>
              </div>
              <?php if (isset($_SESSION['errors']['mo_ta'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['mo_ta'] ?></p>
                <?php } ?>
            </div>

            <!-- /.card-body -->
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary">Sửa thông tin</button>
            </div>
        </div>
        </form>

        <!-- /.card -->
      </div>

      <div class="col-md-4">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Album ảnh sản phẩm</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <form action="<?= BASE_URL_ADMIN . '?act=sua-album-anh-san-pham' ?>" method="POST" enctype="multipart/form-data">

              <div class="table-responsive">
                <table id="faqs" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Ảnh</th>
                      <th>File</th>
                      <th>
                        <div class="text-center"><button type="button" onclick="addfaqs();" class="badge badge-success"><i class="fa fa-plus"></i> ADD NEW</button></div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                  <input type="hidden" name="san_pham_id" value="<?=$sanPham['id']?>">
                  <input type="hidden" name="img_delete" id="img_delete">
                  <?php foreach($listAnhSanPham as $key=>$value){?>
                    <tr id = "faqs-row-<?=$key?>">
                      <input type="hidden" name="current_img_ids[]" value="<?=$value['id']?>">
                      <td><img src="<?= BASE_URL .$value['link_hinh_anh']?>" alt="" style = "width: 50px; height: 50px"></td>
                      <td><input type="file" name="img_array[]" class="form-control"></td>
                      <td class="mt-10"><button type= "button" class="badge badge-danger" onclick="removeRow(<?=$key?>, <?=$value['id']?>)"><i class="fa fa-trash"></i> Delete</button></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>

          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Sửa thông tin</button>
          </div>
          </form>
        </div>
      </div>
    </div>
   
  </section>

</div>

<?php include './views/layout/footer.php'; ?>
<script>
  var faqs_row = <?=count($listAnhSanPham);?>;

  function addfaqs() {
    html = '<tr id="faqs-row' + faqs_row + '">';
    html += '<td><img src="" alt="" style = "width: 50px; height: 50px"></td>';
    html += '<td><input type="file"name ="img_array[]" class="form-control"></td>';
    html += '<td class="mt-10"><button type= "button" class="badge badge-danger" onclick="removeRow('+ faqs_row + ', null);' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> Delete</button></td>';

    html += '</tr>';

    $('#faqs tbody').append(html);

    faqs_row++;
  }
  function removeRow(rowId, imgId){
    $('#faqs-row-' + rowId).remove()
    if (imgId !== null){
      var imgDeleteInput = document.getElementById('img_delete');
      var currentValue = imgDeleteInput.value;
      imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
    }

}
</script>
</body>

</html>

