<?php
// ฟังก์ชันสำหรับแปลงปี ค.ศ. เป็น พ.ศ.
function changeDateShow($date)
{
    if (!empty($date)) {
        list($yy) = explode("-", $date);
        return ($yy + 543);
    }
}

// ฟังก์ชันเพื่อดึงเดือนจากวันที่
function getMonthFromDate($date)
{
    if (!empty($date)) {
        list(, $mm) = explode("-", $date);
        return (int)$mm;
    }
    return 0;
}

// ตั้งค่าเริ่มต้นจำนวนผู้เข้าร่วมในแต่ละเดือน
$participantsByMonth = array_fill(1, 12, 0); // เดือน 1 ถึง 12

// ลูปข้อมูลเพื่อรวมจำนวนผู้เข้าร่วมแยกตามเดือนในปีปัจจุบัน
$currentYear = date("Y");
foreach ($online['row'] as $v) {
    $createDate = $v->CreateDate;
    list($year) = explode("-", $createDate);
    
    // ตรวจสอบว่าเป็นปีปัจจุบันหรือไม่
    if ($year == $currentYear) {
        $month = getMonthFromDate($createDate);
        if ($month > 0 && $month <= 12) {
            $participantsByMonth[$month] += $v->numCount;
        }
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
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- NEW STACKED BAR CHART (สถานะจำนวนผู้เข้าร่วมตามเดือน) -->
        <div class="card card-blue">
          <div class="card-header">
            <h3 class="card-title">จำนวนผู้เข้าร่วม (ปีปัจจุบัน)</h3>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="monthlyBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  $(function () {
    //-------------------------------
    //- NEW MONTHLY STACKED BAR CHART -
    //-------------------------------
    var monthlyBarChartCanvas = $('#monthlyBarChart').get(0).getContext('2d')
    var monthlyBarChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          label               : 'จำนวนผู้เข้าร่วม',
          backgroundColor     : 'rgba(75,192,192,0.8)',
          borderColor         : 'rgba(75,192,192,0.8)',
          data                : <?php echo json_encode(array_values($participantsByMonth)); ?>
        },
      ]
    }

    var monthlyBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(monthlyBarChartCanvas, {
      type: 'bar',
      data: monthlyBarChartData,
      options: monthlyBarChartOptions
    })
  })
</script>
