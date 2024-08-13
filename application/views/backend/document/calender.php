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


<script>
    $(function() {
        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        var Calendar = FullCalendar.Calendar;

        var calendarEl = document.getElementById('calendar');

        var calendar = new Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            //Random default events
            events: [
                <?php foreach ($result['row'] as $key => $v) {
                    // Convert date format from "Y-m-d" to "new Date(y, m-1, d)"
                    list($startYear, $startMonth, $startDay) = explode("-", $v->StartDate);
                    list($endYear, $endMonth, $endDay) = explode("-", $v->EndDate);
                ?> {
                        title: '<?php echo $v->SchoolName ?>',
                        start: new Date(<?php echo $startYear; ?>, <?php echo $startMonth - 1; ?>, <?php echo $startDay; ?>), // วันที่เริ่มจัด
                        end: new Date(<?php echo $endYear; ?>, <?php echo $endMonth - 1; ?>, <?php echo $endDay; ?>), // วันที่สิ้นสุด
                        url: '<?php echo config_item("base_url"); ?>/menuprocess/process/<?php echo $v->ID ?>/?sID=<?php echo $v->ID ?>',

                        backgroundColor: '#3c8dbc', //Primary (light-blue)
                        borderColor: '#3c8dbc' //Primary (light-blue)
                    },
                <?php } ?>
                <?php foreach ($online['row'] as $key => $v) {
                    // Convert date format from "Y-m-d" to "new Date(y, m-1, d)"
                    list($startYear, $startMonth, $startDay) = explode("-", $v->StartDate);
                    list($endYear, $endMonth, $endDay) = explode("-", $v->EndDate);
                ?> {
                        title: '<?php echo $v->SchoolName ?>',
                        start: new Date(<?php echo $startYear; ?>, <?php echo $startMonth - 1; ?>, <?php echo $startDay; ?>), // วันที่เริ่มจัด
                        end: new Date(<?php echo $endYear; ?>, <?php echo $endMonth - 1; ?>, <?php echo $endDay; ?>), // วันที่สิ้นสุด
                        url: '<?php echo config_item("base_url"); ?>/menuprocess/viewprocessed/<?php echo $v->ID ?>/?sID=<?php echo $v->ID ?>',

                        backgroundColor: '#3c8c', //Primary (light-blue)
                        borderColor: '#3c8c' //Primary (light-blue)
                    },
                <?php } ?>
                
            ],
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                    // if so, remove the element from the "Draggable Events" list
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            }
        });

        calendar.render();
    })
</script>