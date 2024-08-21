<?php
session_start();
$mod = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($mod) {
    case 'home':
        require_once('Controllers/HomeController.php');
        $controller_obj = new HomeController();
        $controller_obj->list();
        break;
    case 'shop':
        require_once('Controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
    case 'checkout':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "list";
        require_once('Controllers/CheckoutController.php');
        $controller_obj = new CheckoutController();
        switch ($act) {
            case 'list':
                $controller_obj->list();
                break;
            case 'save':
                $controller_obj->save();
                break;
            case 'order_complete':
                $controller_obj->order_complete();
                break;
            default:
                $controller_obj->list();
                break;
        }
        break;
    case 'detail':
        require_once('Controllers/DetailController.php');
        $controller_obj = new DetailController();
        $controller_obj->list();
        break;
    case 'quickview':
        require_once('Controllers/QuickviewController.php');
        $controller_obj = new QuickviewController();
        $controller_obj->list();
        break;
    case 'cart':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "list";
        require_once('Controllers/CartController.php');
        $controller_obj = new CartController();
        switch ($act) {
            case 'list':
                $controller_obj->list_cart();
                break;
            case 'update':
                $controller_obj->update_cart();
                break;
            case 'add':
                $controller_obj->add_cart();
                break;
            case 'delete':
                $controller_obj->delete_cart();
                break;
            case 'deleteall':
                $controller_obj->deleteall_cart();
                break;
            case 'apply_coupon':
                $controller_obj->applyCoupon();
                break;
            case 'remove_coupon':
                $controller_obj->removeCoupons();
                break;
            default:
                $controller_obj->list_cart();
                break;
        }
        break;
    case 'taikhoan':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "taikhoan";
        require_once('Controllers/LoginController.php');
        $controller_obj = new LoginController();
        if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
            switch ($act) {
                case 'dangxuat':
                    $controller_obj->dangxuat();
                    break;
                case 'account':
                    $controller_obj->account();
                    break;
                case 'update':
                    $controller_obj->update();
                    break;

                default:
                    header('location: ?act=error');
                    break;
            }
        } else {
            if ((isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) || (isset($_SESSION['isLogin_Nhanvien']) && $_SESSION['isLogin_Nhanvien'] == true)) {
                switch ($act) {
                    case 'dangxuat':
                        $controller_obj->dangxuat();
                        break;
                    case 'account':
                        $controller_obj->account();
                        break;
                    case 'update':
                        $controller_obj->update();
                        break;
                    default:
                        header('location: ?act=error');
                        break;
                }
            } else {
                switch ($act) {
                    case 'login':
                        $controller_obj->login();
                        break;
                    case 'dangnhap':
                        $controller_obj->login_action();
                        break;
                    case 'dangky':
                        $controller_obj->dangky();
                        break;
                    case 'forgot_password': // Xử lý quên mật khẩu
                        $controller_obj->forgot_password();
                        break;
                    case 'reset_password': // Xử lý đặt lại mật khẩu
                        $controller_obj->reset_password();
                        break;
                    default:
                        $controller_obj->login();
                        break;
                }
            }
        }
        break;
    case 'momo':
        require_once('Controllers/QRMomoController.php');
        $controller_obj = new QRMomoController();
        $controller_obj->processPayment();
        break;
    case 'momoatm':
        require_once('Controllers/ATMMomoController.php');
        $controller_obj = new ATMMomoController();
        $controller_obj->processPayment();
        break;
    default:
        require_once('Controllers/HomeController.php');
        $controller_obj = new HomeController();
        $controller_obj->list();
        break;
}
