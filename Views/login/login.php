<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>Tài khoản</h2>
                    <ul class="text-left">
                        <li><a href="index.php?act=home">Trang chủ</a></li>
                        <li><span> // </span>Tài Khoản</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="login-page-wrapper">
    <div class="container">
        <div class="row-content-form">
            <div class="row" id="login-form">
                <div class="col-lg-6 border-right">
                    <div class="text-login text-center">
                        <h3>Đăng nhập</h3>
                    </div>
                    <?php if (isset($_COOKIE['msg1'])) { ?>
                        <div class="alert alert-success">
                            <strong>Thông báo:</strong> <?= $_COOKIE['msg1'] ?>
                        </div>
                    <?php } ?>
                    <form action="?act=taikhoan&xuli=dangnhap" method="post" id="login">
                        <input type="text" name="taikhoan" placeholder="Tài khoản" required />
                        <input type="password" name="matkhau" placeholder="Mật khẩu" required />
                        <a href="?act=taikhoan&xuli=forgot_password">Quên mật khẩu ?</a>
                        <div class="submit-text">
                            <button name="submit" type="submit" form="login">Đăng nhập</button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6" id="register-form"> <!-- Thêm ID register-form -->
                    <div class="text-login text-center">
                        <h3>Đăng ký</h3>
                    </div>
                    <?php if (isset($_COOKIE['msg']) && $_COOKIE['msg'] !== "") { ?>
                        <div class="alert alert-success">
                            <strong>Thông báo:</strong> <?= $_COOKIE['msg'] ?>
                        </div>
                    <?php } ?>
                    <form action="?act=taikhoan&xuli=dangky" method="post" id="form2">
                        <div class="info sign-input" id="info">
                            <input type="text" name="Ho" placeholder="Họ" required />
                            <input type="text" name="Ten" placeholder="Tên" required />
                            <button class="next" type="button" onclick="showPhone()">
                                <img src="public/img/next.svg" alt="next">
                            </button>
                        </div>
                        <div class="sign-input hidden" id="phone">
                            <input type="email" name="Email" placeholder="Email" required />
                            <input type="text" name="SĐT" placeholder="Số điện thoại" pattern="[0-9]+" minlength="10" required />
                            <button class="next" type="button" onclick="showSex()">
                                <img src="public/img/next.svg" alt="next">
                            </button>
                        </div>
                        <div class="sign-input hidden" id="sex">
                            <input type="text" name="DiaChi" placeholder="Địa chỉ" required />
                            <select id="GioiTinh" name="GioiTinh" class="form-control" required>
                                <option selected disabled>Choose your gender</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                            <button class="next" type="button" onclick="showAccount()">
                                <img src="public/img/next.svg" alt="next">
                            </button>
                        </div>
                        <div class="sign-input hidden" id="account">
                            <input type="text" name="TaiKhoan" placeholder="Tên tài khoản đăng nhập" required minlength="6" />
                            <input type="password" name="MatKhau" placeholder="Mật khẩu" required minlength="6" />
                            <input type="password" name="check_password" placeholder="Xác nhận mật khẩu" required minlength="6" />
                            <div class="submit-text coupon sign-up">
                                <button class="next" type="submit" form="form2">Đăng ký</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
	document.addEventListener('DOMContentLoaded', function () {
    var loginForm = document.getElementById('login-form');
    var registerForm = document.getElementById('register-form');

    if (loginForm && registerForm) {
        window.showRegisterForm = function () {
            loginForm.classList.add('hidden');
            registerForm.classList.remove('hidden');
        };

        window.showLoginForm = function () {
            registerForm.classList.add('hidden');
            loginForm.classList.remove('hidden');
        };

        async function checkCredentials(email, username) {
            return fetch('check-email.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    email: email,
                    username: username
                })
            })
            .then(response => response.json())
            .then(data => data)
            .catch(error => {
                console.error('Error:', error);
                return { emailExists: false, usernameExists: false };
            });
        }

        window.showPhone = function () {
            var ho = document.querySelector('input[name="Ho"]').value;
            var ten = document.querySelector('input[name="Ten"]').value;

            if (ho && ten) {
                document.getElementById('info').classList.add('hidden');
                document.getElementById('phone').classList.remove('hidden');
            } else {
                alert("Vui lòng điền đầy đủ họ và tên.");
            }
        };

        window.showSex = function () {
            var email = document.querySelector('input[name="Email"]').value;
            var sdt = document.querySelector('input[name="SĐT"]').value;

            if (email && sdt) {
                document.getElementById('phone').classList.add('hidden');
                document.getElementById('sex').classList.remove('hidden');
            } else {
                alert("Vui lòng điền đầy đủ email và số điện thoại.");
            }
        };

        window.showAccount = async function () {
            var diachi = document.querySelector('input[name="DiaChi"]').value;
            var gioitinh = document.querySelector('select[name="GioiTinh"]').value;
            var email = document.querySelector('input[name="Email"]').value;
            var username = document.querySelector('input[name="TaiKhoan"]').value;

            if (diachi && gioitinh) {
                var { emailExists, usernameExists } = await checkCredentials(email, username);

                if (emailExists) {
                    alert("Email đã tồn tại. Vui lòng sử dụng email khác.");
                    return;
                }

                if (usernameExists) {
                    alert("Tên tài khoản đã tồn tại. Vui lòng chọn tên khác.");
                    return;
                }

                document.getElementById('sex').classList.add('hidden');
                document.getElementById('account').classList.remove('hidden');
            } else {
                alert("Vui lòng điền đầy đủ địa chỉ và giới tính.");
            }
        };
    } else {
        console.error('Element not found: login-form or register-form');
    }
});

</script>