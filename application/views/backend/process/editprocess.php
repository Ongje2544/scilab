<?php
function changeDateShow($date)
{
    if (!empty($date)) {
        list($yy, $mm, $dd) = explode("-", $date);
        return $dd . "/" . $mm . "/" . $yy;
    }
}

$today = date("Y-m-d");
?>

<style>
    textarea {
        resize: none;
    }

    .checkbox-wrapper-1 *,
    .checkbox-wrapper-1 ::after,
    .checkbox-wrapper-1 ::before {
        box-sizing: border-box;
    }

    .checkbox-wrapper-1 [type=checkbox].substituted {
        margin: 0;
        width: 0;
        height: 0;
        display: inline;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .checkbox-wrapper-1 [type=checkbox].substituted+label:before {
        content: "";
        display: inline-block;
        vertical-align: top;
        height: 1.15em;
        width: 1.15em;
        margin-right: 0.6em;
        color: rgba(0, 0, 0, 0.275);
        border: solid 0.06em;
        box-shadow: 0 0 0.04em, 0 0.06em 0.16em -0.03em inset, 0 0 0 0.07em transparent inset;
        border-radius: 0.2em;
        background: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xml:space="preserve" fill="white" viewBox="0 0 9 9"><rect x="0" y="4.3" transform="matrix(-0.707 -0.7072 0.7072 -0.707 0.5891 10.4702)" width="4.3" height="1.6" /><rect x="2.2" y="2.9" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 12.1877 2.9833)" width="6.1" height="1.7" /></svg>') no-repeat center, white;
        background-size: 0;
        will-change: color, border, background, background-size, box-shadow;
        transform: translate3d(0, 0, 0);
        transition: color 0.1s, border 0.1s, background 0.15s, box-shadow 0.1s;
    }

    .checkbox-wrapper-1 [type=checkbox].substituted:enabled:active+label:before,
    .checkbox-wrapper-1 [type=checkbox].substituted:enabled+label:active:before {
        box-shadow: 0 0 0.04em, 0 0.06em 0.16em -0.03em transparent inset, 0 0 0 0.07em rgba(0, 0, 0, 0.1) inset;
        background-color: #f0f0f0;
    }

    .checkbox-wrapper-1 [type=checkbox].substituted:checked+label:before {
        background-color: #3B99FC;
        background-size: 0.75em;
        color: rgba(0, 0, 0, 0.075);
    }

    .checkbox-wrapper-1 [type=checkbox].substituted:checked:enabled:active+label:before,
    .checkbox-wrapper-1 [type=checkbox].substituted:checked:enabled+label:active:before {
        background-color: #0a7ffb;
        color: rgba(0, 0, 0, 0.275);
    }

    .checkbox-wrapper-1 [type=checkbox].substituted:focus+label:before {
        box-shadow: 0 0 0.04em, 0 0.06em 0.16em -0.03em transparent inset, 0 0 0 0.07em rgba(0, 0, 0, 0.1) inset, 0 0 0 3.3px rgba(65, 159, 255, 0.55), 0 0 0 5px rgba(65, 159, 255, 0.3);
    }

    .checkbox-wrapper-1 [type=checkbox].substituted:focus:active+label:before,
    .checkbox-wrapper-1 [type=checkbox].substituted:focus+label:active:before {
        box-shadow: 0 0 0.04em, 0 0.06em 0.16em -0.03em transparent inset, 0 0 0 0.07em rgba(0, 0, 0, 0.1) inset, 0 0 0 3.3px rgba(65, 159, 255, 0.55), 0 0 0 5px rgba(65, 159, 255, 0.3);
    }

    .checkbox-wrapper-1 [type=checkbox].substituted:disabled+label:before {
        opacity: 0.5;
    }

    .checkbox-wrapper-1 [type=checkbox].substituted.dark+label:before {
        color: rgba(255, 255, 255, 0.275);
        background-color: #222;
        background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xml:space="preserve" fill="rgba(34, 34, 34, 0.999)" viewBox="0 0 9 9"><rect x="0" y="4.3" transform="matrix(-0.707 -0.7072 0.7072 -0.707 0.5891 10.4702)" width="4.3" height="1.6" /><rect x="2.2" y="2.9" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 12.1877 2.9833)" width="6.1" height="1.7" /></svg>');
    }

    .checkbox-wrapper-1 [type=checkbox].substituted.dark:enabled:active+label:before,
    .checkbox-wrapper-1 [type=checkbox].substituted.dark:enabled+label:active:before {
        background-color: #444;
        box-shadow: 0 0 0.04em, 0 0.06em 0.16em -0.03em transparent inset, 0 0 0 0.07em rgba(255, 255, 255, 0.1) inset;
    }

    .checkbox-wrapper-1 [type=checkbox].substituted.dark:checked+label:before {
        background-color: #a97035;
        color: rgba(255, 255, 255, 0.075);
    }

    .checkbox-wrapper-1 [type=checkbox].substituted.dark:checked:enabled:active+label:before,
    .checkbox-wrapper-1 [type=checkbox].substituted.dark:checked:enabled+label:active:before {
        background-color: #c68035;
        color: rgba(0, 0, 0, 0.275);
    }

    .checkbox-wrapper-1 [type=checkbox].substituted+label {
        -webkit-user-select: none;
        user-select: none;
    }

    .bt {
        position: absolute;
    }

    .checkbox-wrapper-1 [type=checkbox].substituted:disabled+label:before {
        background-color: #3B99FC;
        /* สีพื้นหลังเดียวกับสถานะปกติ */
        color: rgba(0, 0, 0, 0.075);
        background-size: 0.75em;
        opacity: 0.12;
        /* ทำให้สีเข้มเต็มที่ */
    }

    .bd {
        border: none;
        border-radius: 5px;
        background-color: rgb(255, 255, 255);
        padding-left: 50px;
        padding-right: 50px;
        font-weight: 800;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {

        $("#btfix").click(function(event) {
            event.preventDefault(); // ป้องกันการ submit form โดยตรง

            var txt_error = "";
            var obj_err = "";
            var invalidFileUploaded = false;

            // รีเซ็ตสีพื้นหลังให้เป็นสีขาว
            $(".col-lg-12 input, .col-lg-12 textarea, .col-lg-12 select, .panel-body input, .panel-body textarea").css("background-color", "#FFFFFF");

            // ตรวจสอบ textarea
            if ($("#place").val().trim() == "") {
                txt_error += "- กรุณากรอกสถานที่จัด\n";
                $("#place").css("background-color", "#ffebe6");
                if (!obj_err) {
                    obj_err = $("#place");
                }
            }
            if ($("#selected_camps").val().trim() == "") {
                txt_error += "- กรุณาเลือกแคมค์วิชา\n";
                $("#selected_camps").css("background-color", "#ffebe6");
                if (!obj_err) {
                    obj_err = $("#selected_camps");
                }
            }
            if ($("#start_date").val() == "") {
                txt_error += "- กรุณาเลือกวันที่เริ่มการจัดค่าย \n";
                $("#start_date").css("background-color", "#ffebe6");
                if (!obj_err) {
                    obj_err = $("#start_date");
                }
            }
            if ($("#end_date").val() == "") {
                txt_error += "- กรุณาเลือกวันที่สิ้นสุดการจัดค่าย \n";
                $("#end_date").css("background-color", "#ffebe6");
                if (!obj_err) {
                    obj_err = $("#end_date");
                }
            }
            if ($("#numCount").val() == "" || $("#numCount").val() <= 9) {
                txt_error += "- กรุณากรอกจำนวนผู้เข้าร่วม/นักเรียน(มากกว่า 10 คนขึ้นไป) \n";
                $("#numCount").css("background-color", "#ffebe6");
                if (!obj_err) {
                    obj_err = $("#numCount");
                }
            }
            if ($("#TeachType").val() == "") {
                txt_error += "- กรุณาเลือกผู้สอน/อาจารย์(ตามที่แนะนำให้เลือก)\n";
                $("#TeachType").css("background-color", "#ffebe6");
                if (!obj_err) {
                    obj_err = $("#TeachType");
                }
            }

            // แสดงข้อความเตือนถ้ามีข้อผิดพลาด
            if (txt_error) {
                $("#modal-text").html(txt_error.replace(/\n/g, '<br>'));
                $("#modal-default").modal('show');
            } else {
                $("#fixprocess").off('submit').submit(); // ยกเลิก event.preventDefault() ชั่วคราวเพื่อส่ง form
            }

        });
    });
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>General Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/home/">หน้าหลัก</a></li>
                    <li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/menuprocess/">ตารางดำเนินการ</a></li>
                    <li class="breadcrumb-item active">แก้ไขข้อมูลโรงเรียน</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-yellow">
                    <div class="card-header">
                        <h3 class="card-title">แก้ไขบันทึกเงิน</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="fixprocess" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/menuprocess/fixprocess" method="post">
                        <input name="inputID" type="hidden" value="<?php echo $row->ID ?>">
                        <div class="card-body" style="background-color: rgb(245, 245, 245);">
                            <div class="form-group mt-3 mr-5 d-flex">
                                <label for="School_process" class="mid mt-2 col-sm-4 text-right">ชื่อโรงเรียน/สถาบัน</label>
                                <div class="mt-1 ml-3 pt-1 bd"><?php foreach ($school as $c) {
                                                                    if ($row->SchoolID_process == $c->School_id) {
                                                                        echo  $c->School_name;
                                                                    }
                                                                } ?></div>
                            </div>
                            <div class="form-group mt-3 mr-5 d-flex">
                                <label for="class" class="mid mt-2 col-sm-4 text-right">ระดับชั้น</label>
                                <?php foreach ($class as $select) {
                                    if ($row->ID == $select->Queue_id) {
                                        if ($select->Class_id == "A1") {
                                            echo '<div class="bg-success btn-sm ml-3 mt-2 mb-2">ประถม 1</div>';
                                        }
                                        if ($select->Class_id == "A2") {
                                            echo '<div class="bg-success btn-sm ml-3 mt-2 mb-2">ประถม 2</div>';
                                        }
                                        if ($select->Class_id == "A3") {
                                            echo '<div class="bg-success btn-sm ml-3 mt-2 mb-2">ประถม 3</div>';
                                        }
                                        if ($select->Class_id == "A4") {
                                            echo '<div class="bg-success btn-sm ml-3 mt-2 mb-2">ประถม 4</div>';
                                        }
                                        if ($select->Class_id == "A5") {
                                            echo '<div class="bg-success btn-sm ml-3 mt-2 mb-2">ประถม 5</div>';
                                        }
                                        if ($select->Class_id == "A6") {
                                            echo '<div class="bg-success btn-sm ml-3 mt-2 mb-2">ประถม 6</div>';
                                        }
                                        if ($select->Class_id == "B1") {
                                            echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 1</div>';
                                        }
                                        if ($select->Class_id == "B2") {
                                            echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 2</div>';
                                        }
                                        if ($select->Class_id == "B3") {
                                            echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 3</div>';
                                        }
                                        if ($select->Class_id == "B4") {
                                            echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 4</div>';
                                        }
                                        if ($select->Class_id == "B5") {
                                            echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 5</div>';
                                        }
                                        if ($select->Class_id == "B6") {
                                            echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 6</div>';
                                        }
                                    }
                                } ?>
                            </div>

                            <div class="form-group mr-5 d-flex">
                                <label for="School_process" class="mid mt-2 col-sm-4 text-right">สถานที่จัดค่าย</label>
                                <textarea name="place" rows="4" class="form-control col-sm-8 ml-3" id="place" placeholder="กรอกสถานที่จัดงาน"><?php echo $row->Place_address ?></textarea>
                            </div>
                            <div class="form-group mr-5 d-flex">
                                <label for="" class="mid mt-2 col-sm-4 text-right">วันที่จัด</label>
                                <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker" readonly>
                                        <input type="text" name="StartDate" class="form-control datetimepicker-input ml-3" id="start_date" data-target="#reservationdate1" data-date-language="th-th" value="<?php echo changeDateShow($row->StartDate); ?>" readonly />
                                    </div>
                                </div>
                                <label for="" class="mt-2 col-sm-1 text-right">วันที่สิ้นสุด</label>
                                <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker" readonly>
                                        <input type="text" name="EndDate" class="form-control datetimepicker-input ml-3" id="end_date" data-target="#reservationdate2" data-date-language="th-th" value="<?php echo changeDateShow($row->EndDate); ?>" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mr-5 d-flex">
                                <label for="" class="mid mt-2 col-sm-4 text-right">จำนวนนักเรียน</label>
                                <input name="numCount" class="form-control col-sm-2 ml-3" id="numCount" placeholder="กรอกจำนวน" value="<?php echo $row->numCount ?>">
                            </div>
                            <div class="form-group mr-5 d-flex">
                                <label class="mid mt-2 col-sm-4 text-right">อาจารย์/ครูผู้สอน</label>
                                <select class="form-control select2bs4" multiple="multiple" name="Teach_type[]" id="TeachType" data-placeholder="เลือกรายชื่อผู้สอนรายวิชา(ที่แนะนำ)" style="word-break: break-word;">
                                    <?php
                                    foreach ($teach_type as $option) {
                                    ?>
                                        <option value="<?php echo $option->Teach_id; ?>" <?php foreach ($teach_type_list as $select) { ?> <?php if ($option->Teach_id == $select->Teach_id) {
                                                                                                                                                echo 'selected', '';
                                                                                                                                            } ?> <?php } ?>>
                                            <?php
                                            echo $option->Teach_name;
                                            ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" name="cart[]" id="selected_camps" readonly value="<?php echo $row->Lab_process ?>">
                            <div class="card">
                                <div class="card-header" style="background-color: rgb(255, 245, 255);">
                                    <h3 class="card-title">รายการที่เลือก</h3>
                                </div>
                                <div class="card-body" style="background-color: rgb(255, 245, 255);">
                                    <table id="selectedItemsTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th class="col-sm-4">ชื่อรายวิชา</th>
                                                <th class="col-sm-3">หมวดหมู่</th>
                                                <th class="col-sm-3">ผู้สอน(แนะนำ)</th>
                                                <th>ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($result['row'] as $key => $v) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $v->Idlab ?></td>
                                                    <td><?php echo $v->Namelist ?></td>
                                                    <td><?php echo $v->BranchName ?></td>
                                                    <td><?php
                                                        foreach ($teach_lab as $select) {
                                                            if ($v->Idlab == $select->Lab_id) {
                                                                echo  "<div>" . $select->Teach_name . "</div>";
                                                            }
                                                        }
                                                        ?></td>
                                                    <td>
                                                        <center>
                                                            <b data-id="<?php echo $v->Idlab ?>" style="color: rgb(250, 0, 0); background:none; border:none; cursor: pointer;">นำออก</b>
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-header" style="background-color: rgb(230, 230, 230);">
                                    <h3 class="card-title">รายการค่าย</h3>
                                    <div class="card-tools" bis_skin_checked="1">
                                        <button type="button" class="btn btn-tool bg-white" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color: rgb(230, 230, 230);">
                                    <table id="tablelab1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th class="col-sm-4">ชื่อรายวิชา</th>
                                                <th class="col-sm-3">หมวดหมู่</th>
                                                <th class="col-sm-3">ผู้สอน</th>
                                                <th>ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($result['row'] as $key => $v) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $v->Idlab ?></td>
                                                    <td><?php echo $v->Namelist ?></td>
                                                    <td><?php echo $v->BranchName ?></td>
                                                    <td><?php
                                                        foreach ($teach_lab as $select) {
                                                            if ($v->Idlab == $select->Lab_id) {
                                                                echo  "<div>" . $select->Teach_name . "</div>";
                                                            }
                                                        }
                                                        ?></td>
                                                    <td>
                                                        <center>
                                                            <i class="fa fa-shopping-cart" data-id="<?php echo $v->Idlab ?>" style="color: rgb(0, 110, 250); cursor: pointer;"></i>
                                                        </center>

                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgb(255, 255, 255);">
                            <a href="javascript:history.back()" class="btn btn-success">กลับ</a>
                            <button type="submit" class="btn btn-primary" id="btfix">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/.col (left) -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">แจ้งเตือน</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="modal-text"></p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<script>
    $(function() {
        // ตั้งค่า DataTable ให้ไม่ใช้การแบ่งหน้า
        $("#tablelab1").DataTable({
            "paging": false, // ปิดการแบ่งหน้า
            "searching": true, // เปิดใช้งานการค้นหา
            "info": false, // ปิดการแสดงข้อมูลของตาราง
            "responsive": true,
            "autoWidth": false
        });

        // Initialize Select2 Elements
        $('.select2').select2();

        // Initialize Select2 Elements with Bootstrap4 theme
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        // Initialize DateTimePicker
        $('#reservationdate1').datetimepicker({
            format: 'DD/MM/YYYY', // ใช้รูปแบบวันที่ไทย
            locale: 'th' // กำหนดให้ใช้ locale ภาษาไทย
        });

        $('#reservationdate2').datetimepicker({
            format: 'DD/MM/YYYY', // ใช้รูปแบบวันที่ไทย
            locale: 'th' // กำหนดให้ใช้ locale ภาษาไทย
        });

        // ตัวอย่างการแปลงวันที่จากรูปแบบภาษาอังกฤษเป็นไทย
        function formatDateToThai(date) {
            if (date) {
                var parts = date.split("-");
                return parts[2] + "/" + parts[1] + "/" + (parseInt(parts[0]) + 543);
            }
            return "";
        }

        // ตัวอย่างการใช้งานฟังก์ชัน formatDateToThai
        var englishDate = "2024-08-13"; // วันที่ในรูปแบบภาษาอังกฤษ
        var thaiDate = formatDateToThai(englishDate); // แปลงเป็นวันที่ไทย
        console.log(thaiDate); // แสดงวันที่ไทยใน console

        // Phone number input restriction
        $("#callNumber1,#callNumber2 ,#NumId").on('input', function(e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });

        // Initialize DataTable
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        // Initialize custom file input
        bsCustomFileInput.init();
    });
</script>

<script>
    $(document).ready(function() {
        // ฟังก์ชันเพื่ออัปเดตการแสดงผลของแถวในตาราง 'รายการที่เลือก'
        function updateSelectedItems() {
            var $inputField = $('#selected_camps');
            var selectedIds = $inputField.val().split(',').filter(Boolean); // ดึงค่า ID ที่เลือก
            $('#selectedItemsTable tbody tr').each(function() {
                var rowId = $(this).find('td').first().text(); // ดึง ID จากคอลัมน์แรกของแถว
                if (selectedIds.includes(rowId)) {
                    $(this).show(); // แสดงแถว
                } else {
                    $(this).hide(); // ซ่อนแถว
                }
            });
        }

        // ฟังก์ชันเพื่ออัปเดตค่าใน input และซ่อนแถว
        function removeItemFromCart(id) {
            var $inputField = $('#selected_camps');
            var existingValues = $inputField.val().split(',').filter(Boolean); // ดึงค่า ID ที่มีอยู่แล้ว
            existingValues = existingValues.filter(value => value !== id); // ลบ ID ออก
            $inputField.val(existingValues.join(',')); // อัปเดตค่าใน input

            // อัปเดตการแสดงผลของแถว
            updateSelectedItems();
            updateAvailableItems(); // เรียกใช้งานฟังก์ชันเพื่ออัปเดตการแสดงผลของแถวใน 'รายการค่าย'
        }

        // ฟังก์ชันเพื่ออัปเดตการแสดงผลของแถวในตาราง 'รายการค่าย'
        function updateAvailableItems() {
            var $inputField = $('#selected_camps');
            var selectedIds = $inputField.val().split(',').filter(Boolean); // ดึงค่า ID ที่เลือก
            $('#tablelab1 tbody tr').each(function() {
                var rowId = $(this).find('td').first().text(); // ดึง ID จากคอลัมน์แรกของแถว
                if (selectedIds.includes(rowId)) {
                    $(this).hide(); // ซ่อนแถวถ้า ID อยู่ใน input
                } else {
                    $(this).show(); // แสดงแถวถ้า ID ไม่อยู่ใน input
                }
            });
        }

        // ฟังก์ชันเพื่อเพิ่มรายการใหม่
        function addItemToCart(id) {
            var $inputField = $('#selected_camps');
            var existingValues = $inputField.val().split(',').filter(Boolean); // ดึงค่า ID ที่มีอยู่แล้ว
            if (!existingValues.includes(id)) {
                existingValues.push(id); // เพิ่ม ID ใหม่
                $inputField.val(existingValues.join(',')); // อัปเดตค่าใน input
            }

            // อัปเดตการแสดงผลของแถว
            updateSelectedItems();
            updateAvailableItems(); // เรียกใช้งานฟังก์ชันเพื่ออัปเดตการแสดงผลของแถวใน 'รายการค่าย'
        }

        // จัดการคลิกที่ไอคอนรถเข็น
        $('#tablelab1').on('click', '.fa-shopping-cart', function() {
            var id = $(this).data('id').toString(); // ดึง ID จาก data-id และแปลงเป็นสตริง
            addItemToCart(id); // เพิ่ม ID ลงใน input และอัปเดตแถว
        });

        // จัดการคลิกที่ <b> เพื่อนำออก
        $('#selectedItemsTable').on('click', 'b', function() {
            var id = $(this).data('id').toString(); // ดึง ID จาก data-id และแปลงเป็นสตริง
            removeItemFromCart(id); // ลบ ID ออกจาก input และอัปเดตแถว
        });

        // ตรวจสอบเมื่อโหลดหน้าเพื่อซ่อนแถวที่มี ID ใน input และแสดงแถวที่เหลือ
        (function() {
            var ids = $('#selected_camps').val().split(',').filter(Boolean); // ดึง IDs จาก input
            $('#tablelab1 tbody tr').each(function() {
                var rowId = $(this).find('td').first().text(); // ดึง ID จากคอลัมน์แรกของแถว
                if (ids.includes(rowId)) {
                    $(this).hide(); // ซ่อนแถวถ้า ID อยู่ใน input
                }
            });

            updateSelectedItems(); // อัปเดตการแสดงผลของแถวใน 'รายการที่เลือก'
        })();
    });
</script>