<!doctype html>
<html class="no-js" lang="vi-vn">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OverGod' Store - Quần áo OverGod </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="public/img/icon2.png">

    <link rel="apple-touch-icon" href="public/apple-touch-icon.png">
    <!-- Place icon.png in the root directory -->
    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,900,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="public/css/animate.css">
    <!-- pe-icon-7-stroke -->
    <link rel="stylesheet" href="public/css/materialdesignicons.min.css">
    <!-- pe-icon-7-stroke -->
    <link rel="stylesheet" href="public/css/jquery.simpleLens.css">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="public/css/jquery-ui.min.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="public/css/meanmenu.min.css">
    <!-- nivo.slider css -->
    <link rel="stylesheet" href="public/css/nivo-slider.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="public/css/owl.carousel.css">
    <!-- style css -->
    <link rel="stylesheet" href="public/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="public/css/responsive.css">
    <!-- modernizr js -->
    <script src="public/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>
    <?php
    require_once("header_footer/header.php")
    ?>
    <!-- header section end -->
    <div id="content">

        <!-- slider-section-start -->
        <?php
        require_once("dieuhuong.php")
        ?>
        <!-- slider section end -->

        <!-- footer section start -->
        
    </div>
    <?php
        require_once("header_footer/footer.php")
    ?>
    <!-- header section start -->
    
    <!-- footer section end -->
    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="public/js/vendor/jquery-1.12.3.min.js"></script>
    <!-- bootstrap js -->
    <script src="public/js/bootstrap.min.js"></script>
    <!-- owl.carousel js -->
    <script src="public/js/owl.carousel.min.js"></script>
    <!-- meanmenu js -->
    <script src="public/js/jquery.meanmenu.js"></script>
    <!-- countdown JS -->
    <script src="public/js/countdown.js"></script>
    <!-- nivo.slider JS -->
    <script src="public/js/jquery.nivo.slider.pack.js"></script>
    <!-- simpleLens JS -->
    <script src="public/js/jquery.simpleLens.min.js"></script>
    <!-- jquery-ui js -->
    <script src="public/js/jquery-ui.min.js"></script>
    <!-- load-more js -->
    <script src="public/js/load-more.js"></script>
    <!-- plugins js -->
    <script src="public/js/plugins.js"></script>
    <!-- main js -->
    <script src="public/js/main.js"></script>

</body>
<script>
     function showLoginForm() {
        document.getElementById('login-modal').classList.remove('hidden');
    }

    function closeLoginForm() {
        document.getElementById('login-modal').classList.add('hidden');
    }
</script>

</html>