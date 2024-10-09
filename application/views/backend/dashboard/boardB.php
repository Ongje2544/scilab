<?php
$today = date("Y-m-d");
$currentYear = date("Y");
$months = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];

// เตรียมข้อมูลเดือนสำหรับค่ายที่ยังไม่จัด
$notOrganizedCamps = array_fill(0, 12, 0);
foreach ($result['row'] as $v) {
    $campMonth = date("n", strtotime($v->CreateDate)) - 1; // แปลงเดือนเป็นตัวเลข (1-12) และลดลง 1 เพื่อให้ตรงกับ index array
    if (date("Y", strtotime($v->CreateDate)) == $currentYear) {
        $notOrganizedCamps[$campMonth]++;
    }
}

// เตรียมข้อมูลเดือนสำหรับค่ายที่จัดแล้ว
$organizedCamps = array_fill(0, 12, 0);
foreach ($online['row'] as $v) {
    $campMonth = date("n", strtotime($v->CreateDate)) - 1;
    if (date("Y", strtotime($v->CreateDate)) == $currentYear) {
        $organizedCamps[$campMonth]++;
    }
}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>ยอดผู้ใช้</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/home/">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">ยอดผู้ใช้</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- BAR CHART -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">สถานะการจัดจองรายเดือน (ปีปัจจุบัน)</h3>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="monthlyStatusBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  $(function() {
    var monthlyStatusBarChartCanvas = $('#monthlyStatusBarChart').get(0).getContext('2d');
    
    var monthlyStatusBarChartData = {
      labels: <?php echo json_encode($months); ?>,
      datasets: [

        {
          label: 'ค่ายที่จัดแล้ว',
          backgroundColor: 'rgba(54,162,235,0.9)',
          borderColor: 'rgba(54,162,235,0.8)',
          data: <?php echo json_encode($organizedCamps); ?>
        },
        {
          label: 'ค่ายที่ยังไม่จัด',
          backgroundColor: 'rgba(255,99,132,0.9)',
          borderColor: 'rgba(255,99,132,0.8)',
          data: <?php echo json_encode($notOrganizedCamps); ?>
        }
      ]
    };

    var monthlyStatusBarChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true,
          ticks: {
            beginAtZero: true,
            callback: function(value) { if (value % 1 === 0) { return value; } }
          }
        }]
      }
    };

    new Chart(monthlyStatusBarChartCanvas, {
      type: 'bar',
      data: monthlyStatusBarChartData,
      options: monthlyStatusBarChartOptions
    });
  });
</script>
