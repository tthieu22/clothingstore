<?php
require_once("model.php");

class Checkout extends Model
{
  function save($data)
  {
    if (!isset($_SESSION['sanpham']) || count($_SESSION['sanpham']) == 0) {
      setcookie('msg', 'Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm vào giỏ hàng trước khi đặt hàng.', time() + 2);
      header('Location: ?act=cart');
      exit();
    }

    $f = "";
    $v = "";
    foreach ($data as $key => $value) {
      $f .= $key . ",";
      $v .= "'" . $value . "',";
    }
    $f = trim($f, ",");
    $v = trim($v, ",");

    // Kiểm tra số lượng sản phẩm trong giỏ hàng
    $all_products_available = true; // Biến để kiểm tra nếu tất cả sản phẩm đều có đủ số lượng
    $totalGiaNhap = 0; // Biến lưu tổng giá nhập của tất cả sản phẩm trong hóa đơn

    foreach ($_SESSION['sanpham'] as $value) {
      $MaSP = $value['MaSP'];
      $SoLuong = $value['SoLuong'];

      // Kiểm tra tồn tại sản phẩm và số lượng đủ để bán
      $query_sl = "SELECT SoLuong, GiaNhap FROM sanpham WHERE MaSP = $MaSP";
      $data_sl = $this->conn->query($query_sl)->fetch_assoc();

      if (!$data_sl || $data_sl['SoLuong'] < $SoLuong) {
        $all_products_available = false; // Sản phẩm không tồn tại hoặc không đủ số lượng
        break; // Ngừng kiểm tra ngay khi phát hiện một sản phẩm không đủ số lượng
      }

      // Tính tổng giá nhập của sản phẩm
      $totalGiaNhap += $data_sl['GiaNhap'] * $SoLuong;
    }

    if ($all_products_available) {
      // Giả sử phí vận chuyển là $shippingFee
      $shippingFee = 15000; // Ví dụ: 15000 VND

      // Tính tổng tiền lãi
      $TongTien = $data['TongTien'];
      $TongTienLai = ($TongTien - $shippingFee) - $totalGiaNhap;

      // Thêm giá trị TongTienLai vào mảng $data
      $data['TongTienLai'] = $TongTienLai;

      // Thêm hóa đơn
      $query = "INSERT INTO HoaDon($f, TongTienLai) VALUES ($v, $TongTienLai);";
      $status = $this->conn->query($query);

      if ($status) {
        // Lấy MaHD của hóa đơn vừa thêm
        $query_mahd = "SELECT MaHD FROM hoadon ORDER BY NgayLap DESC LIMIT 1";
        $data_mahd = $this->conn->query($query_mahd)->fetch_assoc();
        $MaHD = $data_mahd['MaHD'];
        $status_ct = true; // Khởi tạo biến kiểm tra tình trạng thêm chi tiết hóa đơn

        foreach ($_SESSION['sanpham'] as $value) {
          $MaSP = $value['MaSP'];
          $SoLuong = $value['SoLuong'];
          $DonGia = $value['DonGia'];
          $GiaNhap = $this->conn->query("SELECT GiaNhap FROM sanpham WHERE MaSP = $MaSP")->fetch_assoc()['GiaNhap'];

          // Thêm vào chi tiết hóa đơn
          $query_ct = "INSERT INTO chitiethoadon(MaHD, MaSP, SoLuong, DonGia, GiaNhap) VALUES ($MaHD, $MaSP, $SoLuong, $DonGia, $GiaNhap)";
          $status_ct = $this->conn->query($query_ct);

          if (!$status_ct) {
            $status_ct = false;
            break;
          }
        }

        if ($status_ct) {
          setcookie('msg', 'Đặt hàng thành công', time() + 2);
          header('location: ?act=checkout&xuli=order_complete');
        } else {
          setcookie('msg', 'Đặt hàng thất bại', time() + 2);
          header('location: ?act=checkout');
        }
      } else {
        setcookie('msg', 'Đặt hàng thất bại', time() + 2);
        header('location: ?act=checkout');
      }
    } else {
      setcookie('msg', 'Một hoặc nhiều sản phẩm trong giỏ hàng không đủ số lượng để đặt. Vui lòng kiểm tra lại giỏ hàng.', time() + 2);
      header('Location: ?act=checkout');
    }
  }
}
