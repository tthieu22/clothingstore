<?php
require_once("Models/login.php");
class LoginController
{
    var $login_model;
    public function __construct()
    {
        $this->login_model = new Login();
    }
    function login()
    {
        $data_danhmuc = $this->login_model->danhmuc();

        $data_chitietDM = array();

        for ($i = 1; $i <= count($data_danhmuc); $i++) {
            $data_chitietDM[$i] = $this->login_model->chitietdanhmuc($i);
        }

        require_once('Views/index.php');
    }
    function login_action()
    {
        $taikhoan = $_POST['taikhoan'];
        $matkhau = md5($_POST['matkhau']);
        if (strpos($taikhoan, "'") != false) {
            $taikhoan = str_replace("'", "\'", $taikhoan);
        }
        $data = array(
            'taikhoan' => $taikhoan,
            'matkhau' => $matkhau,
        );
        $this->login_model->login_action($data);
    }
    function dangky()
    {
        $check1 = 0;
        $check2 = 0;
        $data_check = $this->login_model->check_account();
        foreach ($data_check as $value) {
            if ($value['Email'] == $_POST['Email'] || $value['TaiKhoan'] == $_POST['TaiKhoan']) {
                $check1 = 1;
            }
        }

        if ($_POST['MatKhau'] != $_POST['check_password']) {
            $check2 = 1;
        }

        $data = array(
            'Ho' => $_POST['Ho'],
            'Ten' => $_POST['Ten'],
            'GioiTinh' => $_POST['GioiTinh'],
            'SDT' => $_POST['SĐT'],
            'Email' => $_POST['Email'],
            'DiaChi' => $_POST['DiaChi'],
            'TaiKhoan' => $_POST['TaiKhoan'],
            'MatKhau' => md5($_POST['MatKhau']),
            'MaQuyen' => '1',
            'TrangThai' => '1',
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }

        $this->login_model->dangky_action($data, $check1, $check2);
    }
    function dangxuat()
    {
        $this->login_model->logout();
    }
    function account()
    {
        $data_danhmuc = $this->login_model->danhmuc();

        $data_chitietDM = array();

        for ($i = 1; $i <= count($data_danhmuc); $i++) {
            $data_chitietDM[$i] = $this->login_model->chitietdanhmuc($i);
        }
        $data = $this->login_model->account();

        require_once('Views/index.php');
    }
    function update()
    {

        if (isset($_POST['Ho'])) {
            $data = array(
                'Ho' => $_POST['Ho'],
                'Ten' => $_POST['Ten'],
                'GioiTinh' => $_POST['GioiTinh'],
                'SDT' => $_POST['SĐT'],
                'Email' => $_POST['Email'],
                'DiaChi' => $_POST['DiaChi'],
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $this->login_model->update_account($data);
        } else {
            if ($_POST['MatKhauMoi'] == $_POST['MatKhauXN']) {
                if (md5($_POST['MatKhau']) == $_SESSION['login']['MatKhau']) {
                    $data = array(
                        'MatKhau' => md5($_POST['MatKhauMoi']),
                    );
                    $this->login_model->update_account($data);
                } else {
                    setcookie('doimk', 'Mật khẩu không đúng', time() + 2);
                }
            } else {
                setcookie('doimk', 'Mật khẩu mới không trùng nhau', time() + 2);
            }
        }
        header('location: ?act=taikhoan&xuli=account#doitk');
    }

    function forgot_password()
    {
        require_once('Views/login/forgot_password.php');
    }

    function forgot_password_action()
    {
        $email = $_POST['email'];
        $token = bin2hex(random_bytes(50));
        $this->login_model->store_reset_token($email, $token);
        $reset_link = "http://localhost/banhanghdt/password_resets.php?token=" . $token;  // Sử dụng localhost cho môi trường phát triển
        // Code to send email with $reset_link
        setcookie('msg_forgot', 'Liên kết đặt lại mật khẩu đã được gửi tới email của bạn', time() + 2);
        header('location: ?act=login&xuli=forgot_password');
    }

    function reset_password()
    {
        require_once('Views/password_resets.php');
    }

    function reset_password_action()
    {
        $token = $_POST['token'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if ($new_password == $confirm_password) {
            $is_reset = $this->login_model->reset_password($token, md5($new_password));

            if ($is_reset) {
                setcookie('msg_reset', 'Mật khẩu của bạn đã được đặt lại thành công', time() + 2);
                header('location: ?act=login');
            } else {
                setcookie('msg_reset', 'Token không hợp lệ hoặc đã hết hạn', time() + 2);
                header('location: ?act=login&xuli=reset_password&token=' . $token);
            }
        } else {
            setcookie('msg_reset', 'Mật khẩu xác nhận không khớp', time() + 2);
            header('location: ?act=login&xuli=reset_password&token=' . $token);
        }
    }
}
