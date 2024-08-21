<div class="sidebar left-sidebar">
    <div class="s-side-text">
        <div class="sidebar-title clearfix">
            <h4 class="floatleft">Danh mục</h4>
        </div>
        <div class="categories left-right-p">
            <ul id="accordion" class="panel-group clearfix">
                <?php
                foreach ($data_danhmuc as $index => $danhmuc) {
                    // Chỉ số $index bắt đầu từ 0 nhưng MaDM bắt đầu từ 1, vì vậy cộng thêm 1 nếu cần
                    $dm_id = $danhmuc['MaDM'];
                ?>
                    <li class="panel">
                        <div data-toggle="collapse" data-parent="#accordion" data-target="#collapse<?= $dm_id ?>">
                            <div class="medium-a">
                                <b><?= $danhmuc['TenDM'] ?></b>
                            </div>
                        </div>
                        <div class="paypal-dsc panel-collapse collapse" id="collapse<?= $dm_id ?>">
                            <div class="normal-a">
                                <?php
                                // Kiểm tra xem có tồn tại thông tin chi tiết danh mục này không
                                if (isset($data_chitietDM[$dm_id])) {
                                    foreach ($data_chitietDM[$dm_id] as $value) { ?>
                                        <a href="?act=shop&sp=<?= $dm_id ?>&loai=<?= $value['MaLSP'] ?>">
                                            <?= $value['TenLSP'] ?>
                                        </a>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="s-side-text">
        <div class="sidebar-title">
            <h4>Giá</h4>
        </div>
        <div class="range-slider clearfix">
            <form action="index.php?act=shop" method="post">
                <label><span>Giá: </span> <input type="text" id="amount" readonly /></label>
                <input type="hidden" id="amount2" name="shop" />
                <div id="slider-range"></div></br>
                <button type="submit">Tìm kiếm</button>
            </form>
        </div>
    </div>
    <!-- <div class="s-side-text">
        <div class="sidebar-title clearfix">
            <h5 class="floatleft">Thương Hiệu </h5>
        </div>
        <div class="brands-select clearfix">
            <ul>
                <?php foreach ($data_loaisp as $loaisp) { ?>
                    <li>
                        <a href="?act=shop&sp=<?= $loaisp['MaDM'] ?>&loai=<?= $loaisp['TenLSP'] ?>"><?= $loaisp['TenLSP'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div> -->
    <div class="s-side-text">
        <div class="banner clearfix">
            <!-- <a href="?act=detail&id=<?= $data_noibat['MaSP'] ?>"><img src="./public/<?= $data_noibat['HinhAnh1'] ?>" alt="" /></a> -->
            <!-- <div class="banner-text">
                <h2>Sản phẩm</h2> <br />
                <h2 class="banner-brand">Quan tâm</h2>
            </div> -->
        </div>
    </div>
</div>