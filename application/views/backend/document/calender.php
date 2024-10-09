<?php
function changeDateShow($date)
{
    if (!empty($date)) {
        list($yy, $mm, $dd) = explode("-", $date);
        return $dd . "/" . $mm . "/" . $yy;
    }
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>ปฏิทิน</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/home/">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active">ปฏิทิน</li>
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
                <div class="card card-primary">
                    <div class="card-body p-0">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<!-- โหลดสคริปต์ภาษาไทยสำหรับ FullCalendar -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales/th.js"></script>

<script>
    $(function() {
        var Calendar = FullCalendar.Calendar;
        var calendarEl = document.getElementById('calendar');

        // ฟังก์ชันสำหรับแปลงปี ค.ศ. เป็น พ.ศ.
        function toThaiDate(date) {
            const eventDate = new Date(date);
            const thaiYear = eventDate.getFullYear() + 543; // เพิ่ม 543 เพื่อแสดงผลเป็น พ.ศ.
            const thaiDate = eventDate.getDate();
            const thaiMonth = eventDate.getMonth() + 1; // เดือนเริ่มจาก 0, ดังนั้นต้องบวก 1
            return `${thaiDate}/${thaiMonth}/${thaiYear}`;
        }

        var calendar = new Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            locale: 'th', // ตั้งค่า locale เป็นภาษาไทย
            events: [
                <?php foreach ($result['row'] as $key => $v) {
                    list($startYear, $startMonth, $startDay) = explode("-", $v->StartDate);
                    list($endYear, $endMonth, $endDay) = explode("-", $v->EndDate);
                ?> {
                        title: '<?php echo $v->SchoolName ?>',
                        start: new Date(<?php echo $startYear; ?>, <?php echo $startMonth - 1; ?>, <?php echo $startDay; ?>),
                        end: new Date(<?php echo $endYear; ?>, <?php echo $endMonth - 1; ?>, <?php echo $endDay; ?>),
                        url: '<?php echo config_item("base_url"); ?>/menuprocess/process/<?php echo $v->ID ?>/?sID=<?php echo $v->ID ?>',
                        allDay: true,
                        backgroundColor: '#3c8dbc',
                        borderColor: '#3c8dbc',
                        description: 'ยังไม่ได้จัดค่าย',
                        startDate: toThaiDate('<?php echo $v->StartDate; ?>'),
                        endDate: toThaiDate('<?php echo $v->EndDate; ?>')
                    },
                <?php } ?>
                <?php foreach ($online['row'] as $key => $v) {
                    list($startYear, $startMonth, $startDay) = explode("-", $v->StartDate);
                    list($endYear, $endMonth, $endDay) = explode("-", $v->EndDate);
                ?> {
                        title: '<?php echo $v->SchoolName ?>',
                        start: new Date(<?php echo $startYear; ?>, <?php echo $startMonth - 1; ?>, <?php echo $startDay; ?>),
                        end: new Date(<?php echo $endYear; ?>, <?php echo $endMonth - 1; ?>, <?php echo $endDay; ?>),
                        url: '<?php echo config_item("base_url"); ?>/menuprocess/viewprocessed/<?php echo $v->ID ?>/?sID=<?php echo $v->ID ?>',
                        allDay: true,
                        backgroundColor: '#3c8', // สีเขียวสำหรับกิจกรรมที่จัดแล้ว
                        borderColor: '#3c8',
                        description: 'จัดค่ายแล้ว',
                        startDate: toThaiDate('<?php echo $v->StartDate; ?>'),
                        endDate: toThaiDate('<?php echo $v->EndDate; ?>')
                    },
                <?php } ?>
            ],
            editable: true,
            droppable: true,

            eventMouseEnter: function(info) {
                // ตรวจสอบสีตามสถานะ description
                var statusColor = info.event.extendedProps.description === 'จัดค่ายแล้ว' ? '#3c8' : '#3c8dbc';

                var tooltipContent =`<div>
                                        <strong>โรงเรียน:&nbsp</strong> ${info.event.title} <br>
                                        <strong>เวลา:&nbsp</strong> ${info.event.extendedProps.startDate} - ${info.event.extendedProps.endDate} <br>
                                        <strong>สถานะ:&nbsp&nbsp&nbsp<span style="display: inline-block; width: 10px; height: 10px; background-color: ${statusColor}; border-radius: 50%; margin-right: 5px;"></span></strong> ${info.event.extendedProps.description}
                                    </div>`;

                var $tooltip = $('<div class="custom-tooltip"></div>').html(tooltipContent);
                $tooltip.hide().appendTo('body').fadeIn(200);

                $(info.el).on('mousemove', function(e) {
                    $tooltip.css({
                        top: e.pageY + 15 + 'px',
                        left: e.pageX + 15 + 'px',
                        position: 'absolute'
                    });
                });

                info.el.tooltipElement = $tooltip;
            },

            eventMouseLeave: function(info) {
                if (info.el.tooltipElement) {
                    $(info.el.tooltipElement).fadeOut(200, function() {
                        $(this).remove();
                    });
                    info.el.tooltipElement = null;
                }
            }
        });

        calendar.render();
    });
</script>
<!-- เพิ่มสไตล์เพื่อทำให้ปฏิทินมีขนาดเล็กลงเล็กน้อย -->
<style>
    /* ลดขนาดปฏิทินโดยรวม */
    #calendar {
        background-color: #f4f6f9;
        /* พื้นหลังปฏิทิน */
        border-radius: 8px;
        /* ขอบมน */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* เงา */
        padding: 5px;
        /* ลด padding ด้านใน */
        width: 100%;
        /* ลดขนาดความกว้าง */
        height: 0%;
        /* ลดขนาดความสูง */
        margin: 0 auto;
        /* ทำให้ปฏิทินอยู่กึ่งกลาง */
        font-size: 0.8rem;
        /* ลดขนาดฟอนต์โดยรวม */
    }

    .fc-toolbar-title {
        font-family: 'Prompt', sans-serif;
        /* ใช้ฟอนต์ภาษาไทย */
        font-size: 1.1rem;
        /* ลดขนาดตัวอักษรของชื่อเดือน */
        color: #007bff;
        /* สีของชื่อเดือน */
        font-weight: 600;
    }

    .fc-button {
        background-color: #007bff !important;
        color: #fff !important;
        border: none !important;
        box-shadow: none !important;
        font-family: 'Prompt', sans-serif;
        font-size: 0.75rem;
        /* ลดขนาดฟอนต์ของปุ่ม */
        padding: 4px 8px;
        /* ลดขนาดปุ่ม */
    }

    .fc-button:hover {
        background-color: #0056b3 !important;
        /* เปลี่ยนสีเมื่อ hover */
    }

    .fc-daygrid-day {
        font-family: 'Prompt', sans-serif;
        /* ใช้ฟอนต์ภาษาไทย */
        color: #343a40;
        font-size: 0.75rem;
        /* ลดขนาดฟอนต์วันที่ */
    }

    .fc-day-today {
        background-color: rgba(0, 123, 255, 0.1) !important;
        /* ไฮไลต์วันที่ปัจจุบัน */
    }

    .fc-day-sat,
    .fc-day-sun {
        background-color: #f8f9fa !important;
        /* ไฮไลต์วันเสาร์และอาทิตย์ */
    }

    .fc-event {
        font-family: 'Prompt', sans-serif;
        font-size: 0.75rem;
        /* ลดขนาดฟอนต์กิจกรรม */
        padding: 2px 6px;
        /* ลดระยะห่างภายในกิจกรรม */
        border-radius: 6px;
        /* มุมมน */
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        /* เงา */
    }

    .custom-tooltip {
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 5px 8px;
        border-radius: 5px;
        position: absolute;
        z-index: 1000;
        font-size: 0.7rem;
        pointer-events: none;
        white-space: nowrap;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }
</style>