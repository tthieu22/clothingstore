<?php
require_once("Models/Checkout.php"); // Assuming Checkout.php is correctly capitalized and in the right path

class CheckoutController
{
    private $checkout_model;

    public function __construct()
    {
        $this->checkout_model = new Checkout();
    }

    public function list()
    {
        if (isset($_SESSION['login'])) {
            // Retrieve category and detailed category information
            $data_danhmuc = $this->checkout_model->danhmuc();
            $data_chitietDM = [];

            for ($i = 1; $i <= count($data_danhmuc); $i++) {
                $data_chitietDM[$i] = $this->checkout_model->chitietdanhmuc($i);
            }

            // Calculate total amount in cart
            $count = 0;
            if (isset($_SESSION['sanpham'])) {
                foreach ($_SESSION['sanpham'] as $value) {
                    $count += $value['ThanhTien'];
                }
            }

            // Load view
            require_once('Views/index.php');
        } else {
            // Redirect to login if not logged in
            header('location: ?act=taikhoan');
        }
    }

    public function save()
    {
        // Ensure proper timezone setting for date
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian = date('Y-m-d H:i:s');

        // Calculate total amount in cart
        $count = 0;
        if (isset($_SESSION['sanpham'])) {
            foreach ($_SESSION['sanpham'] as $value) {
                $count += $value['ThanhTien'];
            }
        }

        // Prepare data for order insertion
        $data = array(
            'MaND' => $_SESSION['login']['MaND'],
            'NgayLap' => $ThoiGian,
            'NguoiNhan' => isset($_POST['NguoiNhan']) ? $_POST['NguoiNhan'] : '',
            'SDT' => isset($_POST['SDT']) ? $_POST['SDT'] : '',
            'DiaChi' => isset($_POST['DiaChi']) ? $_POST['DiaChi'] : '',
            'TongTien' => $count,
            'TrangThai' => '0',
            'PhuongThucTT' => 'default_value' // Replace 'default_value' with actual default value for PhuongThucTT
        );

        // Call save method from model to insert order data
        $this->checkout_model->save($data);

        // Redirect to order complete page
        header('location: ?act=checkout&xuli=order_complete');
    }

    public function order_complete()
    {
        // Retrieve category and detailed category information
        $data_danhmuc = $this->checkout_model->danhmuc();
        $data_chitietDM = [];

        for ($i = 1; $i <= count($data_danhmuc); $i++) {
            $data_chitietDM[$i] = $this->checkout_model->chitietdanhmuc($i);
        }

        // Calculate total amount in cart
        $count = 0;
        if (isset($_SESSION['sanpham'])) {
            foreach ($_SESSION['sanpham'] as $value) {
                $count += $value['ThanhTien'];
            }
        }

        // Load view
        require_once('Views/index.php');
    }
}
?>
