<?php
function changeDateShow($date)
{
    if (!empty($date)) {
        list($yy, $mm, $dd) = explode("-", $date);
        return $dd . "/" . $mm . "/" . $yy;
    }
}

$today = date("Y");
$months = ['01' => 'มกราคม', '02' => 'กุมภาพันธ์', '03' => 'มีนาคม', '04' => 'เมษายน', '05' => 'พฤษภาคม', '06' => 'มิถุนายน', '07' => 'กรกฎาคม', '08' => 'สิงหาคม', '09' => 'กันยายน', '10' => 'ตุลาคม', '11' => 'พฤศจิกายน', '12' => 'ธันวาคม'];

$amounts = array_fill_keys(array_keys($months), 0);
$netIncomes = array_fill_keys(array_keys($months), 0);

foreach ($online['row'] as $v) {
    $dateParts = explode("-", $v->CreateDate);
    $year = $dateParts[0];
    $month = $dateParts[1];

    if ($year == $today) {
        $amounts[$month] += $v->Amount;
        $netIncomes[$month] += $v->NetIncome;
    }
}

$amountData = array_values($amounts);
$netIncomeData = array_values($netIncomes);
$monthLabels = array_values($months);
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>รายได้</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/home/">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">รายได้</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- BAR CHART -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">ยอดเงิน-สุทธิ</h3>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="barChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<script>
  $(function() {
    var barChartCanvas = $('#barChart').get(0).getContext('2d');
    var barChartData = {
      labels: <?php echo json_encode($monthLabels); ?>, // แสดงเดือน
      datasets: [{
          label: 'ยอดเงินทั้งหมด',
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          hoverBackgroundColor: 'rgba(60,141,188,1)',
          hoverBorderColor: 'rgba(60,141,188,1)',
          data: <?php echo json_encode($amountData); ?> // ยอดเงินทั้งหมด
        },
        {
          label: 'รายได้',
          backgroundColor: 'rgba(210, 214, 222, 0.8)',
          borderColor: 'rgba(210, 214, 222, 1)',
          hoverBackgroundColor: 'rgba(210, 214, 222, 1)',
          hoverBorderColor: 'rgba(210, 214, 222, 1)',
          data: <?php echo json_encode($netIncomeData); ?> // รายได้
        }
      ]
    };

    var barChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true,
            stepSize: 50000 // ตั้งค่า step ของกราฟแกน y
          }
        }]
      },
      legend: {
        display: true,
        position: 'top', // ตั้งตำแหน่งของ legend
        labels: {
          fontColor: '#333', // สีของ label
          fontSize: 14 // ขนาดตัวอักษรของ label
        }
      },
      tooltips: {
        enabled: true,
        backgroundColor: 'rgba(0,0,0,0.7)',
        titleFontSize: 14,
        bodyFontSize: 12,
        bodyFontColor: '#fff',
        callbacks: {
          label: function(tooltipItem, data) {
            return data.datasets[tooltipItem.datasetIndex].label + ': ' + tooltipItem.yLabel.toLocaleString() + ' บาท';
          }
        }
      }
    };

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    });
  });
</script>
