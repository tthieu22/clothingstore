<?php
require_once("connection.php");
class login
{
    var $conn;
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }
    function tk_sanpham($id)
    {
        $query = "SELECT SUM(SoLuong) as Count FROM sanpham WHERE MaDM = $id";

        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_nguoidung($id)
    {
        $query = "SELECT count(MaND) as Count FROM NguoiDung WHERE MaQuyen = $id";

        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_thongbao()
    {
        $query = "SELECT count(MaHD) as Count FROM HoaDon WHERE TrangThai = 0";

        return $this->conn->query($query)->fetch_assoc();
    }


    //Thống kê doanh thu
    function tk_dthomnay()
    {
        $today = date("Y-m-d");
        $query = "SELECT SUM(TongTien - 15000) as Count FROM HoaDon WHERE DATE(NgayLap) = '$today' AND TrangThai = 1";
        return $this->conn->query($query)->fetch_assoc();
    }

    function tk_dtthang($m)
    {
        $y = date("Y"); // Lấy năm hiện tại
        $query = "SELECT SUM(TongTien - 15000) as Count FROM HoaDon WHERE MONTH(NgayLap) = $m AND YEAR(NgayLap) = $y AND TrangThai = 1";
        return $this->conn->query($query)->fetch_assoc();
    }

    function tk_dtnam($y)
    {
        $query = "SELECT SUM(TongTien - 15000) as Count FROM HoaDon WHERE YEAR(NgayLap) = $y AND TrangThai = 1";
        return $this->conn->query($query)->fetch_assoc();
    }
    //Thống kê tiền lãi
    function getProfitByDay()
    {
        $today = date("Y-m-d");
        $query = "SELECT SUM(TongTienLai) as Count FROM HoaDon WHERE DATE(NgayLap) = '$today' And TrangThai = 1";
        return $this->conn->query($query)->fetch_assoc();
    }

    function getProfitByMonth($m)
    {
        $y = date("Y"); // Lấy năm hiện tại
        $query = "SELECT SUM(TongTienLai) as Count FROM HoaDon WHERE MONTH(NgayLap) = $m AND YEAR(NgayLap) = $y AND TrangThai = 1";
        return $this->conn->query($query)->fetch_assoc();
    }

    function getProfitByYear($y)
    {
        $query = "SELECT SUM(TongTienLai) as Count FROM HoaDon WHERE YEAR(NgayLap) = $y And TrangThai = 1";

        return $this->conn->query($query)->fetch_assoc();
    }

    //sp ton kho
    function tk_sptonkho()
    {
        $query = "SELECT SUM(SoLuong) as Count FROM sanpham";
        return $this->conn->query($query)->fetch_assoc();
    }

    function getTopCustomers()
    {
        $query = "SELECT NguoiDung.MaND, CONCAT(NguoiDung.Ho, ' ', NguoiDung.Ten) as HoTen, SUM(ChiTietHoaDon.SoLuong) as TotalQuantity
          FROM NguoiDung
          JOIN HoaDon ON NguoiDung.MaND = HoaDon.MaND
          JOIN ChiTietHoaDon ON HoaDon.MaHD = ChiTietHoaDon.MaHD
          WHERE HoaDon.TrangThai = 1
          GROUP BY NguoiDung.MaND
          ORDER BY TotalQuantity DESC
          LIMIT 10";

        $result = $this->conn->query($query);

        if (!$result) {
            die("Lỗi truy vấn: " . $this->conn->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //bieu do thong ke doanh thu
    function getRevenueByDay($month, $year)
    {
        $query = "SELECT DAY(NgayLap) as Day, SUM(TongTien - 15000) as Revenue 
                  FROM HoaDon 
                  WHERE MONTH(NgayLap) = $month AND YEAR(NgayLap) = $year AND TrangThai = 1 
                  GROUP BY DAY(NgayLap)";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function getRevenueByMonth($year)
    {
        $query = "SELECT MONTH(NgayLap) as Month, SUM(TongTien - 15000) as Revenue 
              FROM HoaDon 
              WHERE YEAR(NgayLap) = $year AND TrangThai = 1 
              GROUP BY MONTH(NgayLap)
              ORDER BY Month ASC";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function getRevenueByYear()
    {
        $query = "SELECT YEAR(NgayLap) as Year, SUM(TongTien - 15000) as Revenue 
                  FROM HoaDon 
                  WHERE TrangThai = 1 
                  GROUP BY YEAR(NgayLap)";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    // bieu do thong ke tien lai
    function ProfitByDay($month, $year)
    {
        $query = "SELECT DAY(NgayLap) as Day, SUM(TongTienLai) as Revenue 
                  FROM HoaDon 
                  WHERE MONTH(NgayLap) = $month AND YEAR(NgayLap) = $year AND TrangThai = 1 
                  GROUP BY DAY(NgayLap)";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function ProfitByMonth($year)
    {
        $query = "SELECT MONTH(NgayLap) as Month, SUM(TongTienLai) as Revenue 
              FROM HoaDon 
              WHERE YEAR(NgayLap) = $year AND TrangThai = 1 
              GROUP BY MONTH(NgayLap)
              ORDER BY Month ASC";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function ProfitByYear()
    {
        $query = "SELECT YEAR(NgayLap) as Year, SUM(TongTienLai) as Revenue 
                  FROM HoaDon 
                  WHERE TrangThai = 1 
                  GROUP BY YEAR(NgayLap)";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }
}
