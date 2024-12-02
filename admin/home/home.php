<?php
// Lấy tổng giá đơn hàng
$rsorder = $mysqli->query('SELECT SUM(total_price) as total FROM orders');
$sumorder = $rsorder->fetch_assoc()['total'];
// Lấy tổng giá nhập hàng
$rsimport = $mysqli->query("SELECT SUM(total) as total FROM import_orders");
$sumimport = $rsimport->fetch_assoc()["total"];
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="midde_cont">
  <div class="container-fluid">
    <div class="row column_title">
      <div class="col-md-12">
        <div class="page_title">
          <h2>TRANG CHỦ</h2>
        </div>
      </div>
    </div>
    <div class="row column1">
      <div class="col-md-6 col-lg-6">
        <div class="full counter_section margin_bottom_30">
          <div class="couter_icon">
            <div>
              <i class="fa fa-user yellow_color"></i>
            </div>
          </div>
          <div class="counter_no">
            <div>
              <p class="total_no">250</p>
              <p class="head_couter">Đơn hàng</p>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="col-md-6 col-lg-3">
        <div class="full counter_section margin_bottom_30">
          <div class="couter_icon">
            <div>
              <i class="fa fa-clock-o blue1_color"></i>
            </div>
          </div>
          <div class="counter_no">
            <div>
              <p class="total_no">123.50</p>
              <p class="head_couter">Average Time</p>
            </div>
          </div>
        </div>
      </div> -->
      <!-- <div class="col-md-6 col-lg-3">
        <div class="full counter_section margin_bottom_30">
          <div class="couter_icon">
            <div>
              <i class="fa fa-cloud-download green_color"></i>
            </div>
          </div>
          <div class="counter_no">
            <div>
              <p class="total_no">1,805</p>
              <p class="head_couter">Collections</p>
            </div>
          </div>
        </div>
      </div> -->
      <div class="col-md-6 col-lg-6">
        <div class="full counter_section margin_bottom_30">
          <div class="couter_icon">
            <div>
              <i class="fa fa-comments-o red_color"></i>
            </div>
          </div>
          <div class="counter_no">
            <div>
              <p class="total_no">54</p>
              <p class="head_couter">Bình luận</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- graph -->
    <div class="row column2 graph margin_bottom_30">
      <div class="col-md-l2 col-lg-12">
        <div class="white_shd full">
          <div class="full graph_head">
            <div class="heading1 margin_0">
              <h2>Đơn hàng</h2>
            </div>
          </div>
          <div class="full graph_revenue">
            <div class="row">
              <div class="col-md-12">
                <div class="content">
                  <div class="area_chart">
                    <canvas height="120" id="order"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row column2 graph margin_bottom_30">
      <div class="col-md-l2 col-lg-12">
        <div class="white_shd full">
          <div class="full graph_head">
            <div class="heading1 margin_0">
              <h2>Doanh thu</h2>
            </div>
          </div>
          <div class="full graph_revenue">
            <div class="row">
              <div class="col-md-12">
                <div class="content">
                  <div class="area_chart">
                    <canvas height="90" id="revenue"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end graph -->
  </div>
  <!-- footer -->
  <div class="container-fluid">
    <div class="footer">
      <p>BALO STORE</p>
    </div>
  </div>
</div>
<script>
  const order = document.getElementById('order');
  const revenue = document.getElementById('revenue');

  new Chart(order, {
    type: 'bar',
    data: {
      labels: ['Mon', 'Tues', 'Fri', 'Thur', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Đơn hàng',
        data: [10, 9],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        }
      }
    }
  });
  new Chart(revenue, {
    type: 'pie',
    data: {
      labels: ['Chi tiêu', 'Thu nhập'],
      datasets: [{
        data: [<?= $sumimport ?>, <?= $sumorder ?>, ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        }
      }
    }
  });
</script>