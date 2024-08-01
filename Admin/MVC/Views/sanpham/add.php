<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-warning">
      <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
  <?php } ?>
  <form action="?mod=sanpham&act=store" method="POST" role="form" enctype="multipart/form-data">
    <div class="form-group">
      <label for="cars">Danh mục: </label>
      <select id="" name="MaDM" class="form-control">
        <?php foreach ($data_dm as $row) { ?>
          <option value="<?= $row['MaDM'] ?>"><?= $row['TenDM'] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="cars">Loại sản phẩm: </label>
      <select id="" name="MaLSP" class="form-control">
        <?php foreach ($data_lsp as $row) { ?>
          <option value="<?= $row['MaLSP'] ?>"><?= $row['TenLSP'] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="">Tên sản phẩm</label>
      <input type="text" class="form-control" id="" placeholder="" name="TenSP">
    </div>
    <div class="form-group">
      <label for="">Đơn giá</label>
      <input type="text" class="form-control" id="" placeholder="" name="DonGia">
    </div>
    <div class="form-group">
      <label for="">Số lượng</label>
      <input type="text" class="form-control" id="" placeholder="" name="SoLuong">
    </div>
    <div class="form-group">
      <label for="">Hình ảnh 1 </label>
      <input type="file" class="form-control" id="" placeholder="Chọn ảnh" name="HinhAnh1" >
    </div>
    <div class="form-group">
      <label for="">Hình ảnh 2</label>
      <input type="file" class="form-control" id="" placeholder="Chọn ảnh" name="HinhAnh2">
    </div>
    <div class="form-group">
      <label for="">Hình ảnh 3</label>
      <input type="file" class="form-control" id="" placeholder="" name="HinhAnh3">
    </div>
    <div class="form-group">
      <label for="cars">Mã khuyến mãi </label>
      <select id="" name="MaKM" class="form-control">
        <?php foreach ($data_km as $row) { ?>
          <option value="<?= $row['MaKM'] ?>"><?= $row['TenKM'] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="">Kích thước</label>
      <input type="text" class="form-control" id="" placeholder="" name="KichThuoc">
    </div>
    <div class="form-group">
      <label for="">Màu sắc</label>
      <input type="text" class="form-control" id="" placeholder="" name="MauSac">
    </div>
    <div class="form-group">
      <label for="">Chất Liệu</label>
      <input type="text" class="form-control" id="" placeholder="" name="ManHinh">
    </div>
    <div class="form-group">
      <label for="">Kiểu dáng</label>
      <input type="text" class="form-control" id="" placeholder="" name="HDH">
    </div>
    <div class="form-group">
      <label for="">Thông tin người mẫu</label>
      <input type="text" class="form-control" id="" placeholder="" name="CamTruoc">
    </div>
    <div class="form-group">
      <label for="">Sản phẩm kết hợp (với quần hay với áo gì đó...)</label>
      <input type="text" class="form-control" id="" placeholder="" name="CamSau">
    </div>
    <!-- <div class="form-group">
      <label for="">CPU</label>
      <input type="text" class="form-control" id="" placeholder="" name="CPU">
    </div>
    <div class="form-group">
      <label for="">Ram</label>
      <input type="text" class="form-control" id="" placeholder="" name="Ram">
    </div>
    <div class="form-group">
      <label for="">Rom</label>
      <input type="text" class="form-control" id="" placeholder="" name="Rom">
    </div>
    <div class="form-group">
      <label for="">Pin</label>
      <input type="text" class="form-control" id="" placeholder="" name="Pin">
    </div>
    <div class="form-group">
      <label for="">SDCard</label>
      <input type="text" class="form-control" id="" placeholder="" name="SDCard">
    </div> -->
    <label for="">Mô tả</label>
    <div class="form-group">
      <textarea class="form-control" id="summernote" placeholder="" name="MoTa"></textarea>
    </div>
    <div class="form-group">
      <label for="">Trạng thái</label>
      <input type="checkbox" id="" placeholder="" value="1" name="TrangThai"><em>(Check cho phép hiện thị sản phẩm)</em>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
  <script>
    $(document).ready(function() {
      $('#summernote').summernote();
    });
  </script>
</table>