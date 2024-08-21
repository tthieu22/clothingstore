<?php
require_once("MVC/Models/login.php");
class LoginController
{
    var $login_model;
    public function __construct()
    {
        $this->login_model = new login();
    }
    // public function login()
    // {
    //     require_once("MVC/Views/login/login.php");
    // }
    // public function login_action()
    // {
    //     $this->login_model->login_action();
    // }
    public function admin()
    {
        // Các dữ liệu khác
        $data_tksp1 = $this->login_model->tk_sanpham(1);
        $data_tksp2 = $this->login_model->tk_sanpham(4);
        $data_tksp3 = $this->login_model->tk_sanpham(5);
        $data_hd = $this->login_model->tk_thongbao();
        $data_nguoidung = $this->login_model->tk_nguoidung(1);
        $data_quanly = $this->login_model->tk_nguoidung(2);
        $data_nhanvien = $this->login_model->tk_nguoidung(3);
        $data_tonkho = $this->login_model->tk_sptonkho();

        //thống kê doanh thu
        $data_countToday = $this->login_model->tk_dthomnay();
        $data_countM = $this->login_model->tk_dtthang(date("m"));
        $data_countY = $this->login_model->tk_dtnam(date("Y"));


        //thống kê tiền lãi
        $profitByDay = $this->login_model->getProfitByDay();
        $profitByMonth = $this->login_model->getProfitByMonth(date("m"));
        $profitByYear = $this->login_model->getProfitByYear(date("Y"));


        // Get revenue data
        $revenueByDay = $this->login_model->getRevenueByDay(date("m"), date("Y"));
        $revenueByMonth = $this->login_model->getRevenueByMonth(date("Y"));
        $revenueByYear = $this->login_model->getRevenueByYear();

        // Get profit data
        $getprofitByDay = $this->login_model->ProfitByDay(date("m"), date("Y"));
        $getprofitByMonth = $this->login_model->ProfitByMonth(date("Y"));
        $getprofitByYear = $this->login_model->ProfitByYear();


        $top_customers = $this->login_model->getTopCustomers();



        require_once("MVC/Views/Admin/index.php");
    }
    // public function logout()
    // {
    //     $this->login_model->logout();
    // }
}
