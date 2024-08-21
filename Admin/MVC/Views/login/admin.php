<div class="container-fluid">
  <div class="row">
    <?php if ($data_hd['Count'] > 0): ?>
      <p class="my-3 heigh-line">Hóa đơn chưa duyệt</p>
      <a href="../admin?mod=hoadon&id=0" class="col-xl-4 col-md-6 mb-4 text-decoration-none">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row px-3 no-gutters align-items-center">
              <div class="col mr-2">
                <div class="font-weight-bold text-danger text-uppercase mb-1 text-decoration-none">Hóa đơn chưa duyệt</div>
                <div class=" mb-0 font-weight-bold text-gray-800 text-decoration-none"><?= $data_hd['Count'] ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    <?php endif; ?>
  </div>
</div>
<div class="container-fluid">
  <div class="revenue">
    <p class="my-3 heigh-line">Doanh thu</p>
    <div class="row">
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row px-3 no-gutters align-items-center">
              <div class="col mr-2">
                <div class=" font-weight-bold text-info text-uppercase mb-1">Hôm nay</div>
                <div class=" mb-0 font-weight-bold text-gray-800">
                  <?= number_format($data_countToday['Count'] ?? 0) ?> VNĐ
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row px-3 no-gutters align-items-center">
              <div class="col mr-2">
                <div class=" font-weight-bold text-info text-uppercase mb-1">Tháng này</div>
                <div class=" mb-0 font-weight-bold text-gray-800">
                  <?= number_format($data_countM['Count'] ?? 0) ?> VNĐ
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (yearly) Card Example -->

      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row px-3 no-gutters align-items-center">
              <div class="col mr-2">
                <div class=" font-weight-bold text-info text-uppercase mb-1">Năm nay</div>
                <div class=" mb-0 font-weight-bold text-gray-800">
                  <?= number_format($data_countY['Count'] ?? 0) ?> VNĐ
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid">
  <div class="revenue">
    <p class="my-3 heigh-line">Lợi nhuận</p>
    <div class="row">
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row px-3 no-gutters align-items-center">
              <div class="col mr-2">
                <div class=" font-weight-bold text-success text-uppercase mb-1">Hôm nay</div>
                <div class=" mb-0 font-weight-bold text-gray-800">
                  <?= number_format($profitByDay['Count'] ?? 0) ?> VNĐ
                </div>
              </div>
              <div class="col-auto">
                <i class="fas far fa-money-bill-wave fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row px-3 no-gutters align-items-center">
              <div class="col mr-2">
                <div class=" font-weight-bold text-success text-uppercase mb-1">Tháng này</div>
                <div class=" mb-0 font-weight-bold text-gray-800">
                  <?= number_format($profitByMonth['Count'] ?? 0) ?> VNĐ
                </div>
              </div>
              <div class="col-auto">
                <i class="fas far fa-money-bill-wave fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row px-3 no-gutters align-items-center">
              <div class="col mr-2">
                <div class=" font-weight-bold text-success text-uppercase mb-1">Năm nay</div>
                <div class=" mb-0 font-weight-bold text-gray-800">
                  <?= number_format($profitByYear['Count'] ?? 0) ?> VNĐ
                </div>
              </div>
              <div class="col-auto">
                <i class="fas far fa-money-bill-wave fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Biểu đồ doanh thu -->
<div class="container-fluid ">
  <div class="row">
    <div class="form-group">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
      </div>
      <div class="d-flex gap-10 justify-content-between">
        <div class="d-flex gap-10 align-content-center w-50">
          <p class="mb-0  heigh-line">Thống kê theo </p>
          <select id="revenueType" class="form-control">
            <option value="day">Ngày</option>
            <option value="month">Tháng</option>
            <option value="year">Năm</option>
          </select>
        </div>
        <p class="mb-0 text-black w-50 heigh-line">Khách hàng mua nhiều nhất</p>
      </div>
    </div>
  </div>
  <div class="row ">
    <div class="d-flex gap-10 justify-content-between">
      <canvas id="revenueChart"></canvas>
      <div style="width:50%">
        <table class="table table-hover table-top-customer-index">
          <thead>
            <tr>
              <th scope="col">Top</th>
              <th scope="col">Tên</th>
              <th scope="col">Sản phẩm đã mua</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($top_customers) && is_array($top_customers)): ?>
              <?php for ($i = 0; $i < count($top_customers); $i++): ?>
                <tr>
                  <th scope="row"><?php echo $i + 1 ?></th>
                  <td><?php echo $top_customers[$i]['HoTen']; ?></td>
                  <td><?php echo $top_customers[$i]['TotalQuantity']; ?></td>
                </tr>
              <?php endfor; ?>
            <?php else: ?>
              <p>Không có dữ liệu khách hàng.</p>
            <?php endif; ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Tài khoản  -->


<div class="container-fluid">
  <div class="revenue">
    <p class="my-3 heigh-line">tài khoản</p>
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row px-3 no-gutters align-items-center">
              <div class="col mr-2">
                <div class="font-weight-bold text-primary text-uppercase mb-1">Quản lý</div>
                <div class=" mb-0 font-weight-bold text-gray-800"><?= $data_quanly['Count'] ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fas fa-user-circle fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row px-3 no-gutters align-items-center">
              <div class="col mr-2">
                <div class="font-weight-bold text-primary text-uppercase mb-1">Nhân viên</div>
                <div class=" mb-0 font-weight-bold text-gray-800"><?= $data_nhanvien['Count'] ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fas fa-user-circle fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row px-3 no-gutters align-items-center">
              <div class="col mr-2">
                <div class="font-weight-bold text-primary text-uppercase mb-1">Khách hàng</div>
                <div class=" mb-0 font-weight-bold text-gray-800"><?= $data_nguoidung['Count'] ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fas fa-user-circle fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="revenue">
    <p class="my-3 heigh-line">Hàng hóa</p>
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
          <div class="card-body">
            <div class="row px-3 no-gutters align-items-center">
              <div class="col mr-2">
                <div class="font-weight-bold text-dark text-uppercase mb-1">Sản phẩm trong kho</div>
                <div class=" mb-0 font-weight-bold text-gray-800"><?= number_format($data_tonkho['Count'] ?? 0) ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-boxes fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row px-3 no-gutters align-items-center">
              <div class="col mr-2">
                <div class="font-weight-bold text-info text-uppercase mb-1">Đầm</div>
                <div class=" mb-0 font-weight-bold text-gray-800"><?= $data_tksp1['Count'] ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-boxes fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row px-3 no-gutters align-items-center">
              <div class="col mr-2">
                <div class="font-weight-bold text-info text-uppercase mb-1">Váy</div>
                <div class=" mb-0 font-weight-bold text-gray-800"><?= $data_tksp2['Count'] ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-boxes fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row px-3 no-gutters align-items-center">
              <div class="col mr-2">
                <div class="font-weight-bold text-info text-uppercase mb-1">Áo dài</div>
                <div class=" mb-0 font-weight-bold text-gray-800"><?= $data_tksp3['Count'] ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-boxes fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<canvas id="revenueChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctx = document.getElementById('revenueChart').getContext('2d');
  var revenueChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [], // Sẽ được cập nhật dựa trên lựa chọn
      datasets: [{
          label: 'Doanh thu (VNĐ)',
          data: [],
          borderColor: 'rgba(75, 192, 192, 1)',
          fill: false
        },
        {
          label: 'Lợi nhuận (VNĐ)',
          data: [],
          borderColor: 'rgba(255, 99, 132, 1)',
          fill: false
        }
      ]
    }
  });

  var chartData = {
    day: {
      labels: <?= json_encode(array_column($revenueByDay, 'Day')) ?>,
      revenue: <?= json_encode(array_column($revenueByDay, 'Revenue')) ?>,
      profit: <?= json_encode(array_column($getprofitByDay, 'Revenue')) ?>
    },
    month: {
      labels: <?= json_encode(array_column($revenueByMonth, 'Month')) ?>,
      revenue: <?= json_encode(array_column($revenueByMonth, 'Revenue')) ?>,
      profit: <?= json_encode(array_column($getprofitByMonth, 'Revenue')) ?>
    },
    year: {
      labels: <?= json_encode(array_column($revenueByYear, 'Year')) ?>,
      revenue: <?= json_encode(array_column($revenueByYear, 'Revenue')) ?>,
      profit: <?= json_encode(array_column($getprofitByYear, 'Revenue')) ?>
    }
  };

  function updateChart(type) {
    revenueChart.data.labels = chartData[type].labels;
    revenueChart.data.datasets[0].data = chartData[type].revenue;
    revenueChart.data.datasets[1].data = chartData[type].profit;
    revenueChart.update();
  }

  // Khi người dùng thay đổi lựa chọn trong combobox
  document.getElementById('revenueType').addEventListener('change', function() {
    updateChart(this.value);
  });

  // Hiển thị dữ liệu theo ngày mặc định
  updateChart('day');
</script>