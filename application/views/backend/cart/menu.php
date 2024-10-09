<style>
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

    .dataTables_filter input {
        width: 550px;
        /* Increase the width as needed */
        height: 40px;
        /* Increase the height as needed */
        padding: 10px;
        /* Add padding if needed */
        font-size: 16px;
        /* Adjust the font size as needed */
    }
</style>
<script type="text/javascript">
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultError').click(function() {
            Toast.fire({
                icon: 'error',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
    });

    // function checkID(id) {
    // 	if (id.length != 13) return false;
    // 	for (i = 0, sum = 0; i < 12; i++)
    // 		sum += parseFloat(id.charAt(i)) * (13 - i);
    // 	if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12)))
    // 		return false;
    // 	return true;
    // }
    $(document).ready(function() {

        $(".num").on("keypress", function(e) {

            var code = e.keyCode ? e.keyCode : e.which;

            if (code > 57) {
                return false;
            } else if ((code < 48) && (code != 46)) {
                return false;
            }

        });

        $("#btQueue").click(function(event) {
            event.preventDefault(); // ป้องกันการ submit form โดยตรง

            var txt_error = "";
            var obj_err = "";

            $(".col-lg-12 input, .col-lg-12 textarea, .col-lg-12 select, .panel-body input, .panel-body textarea").css("background-color", "#FFFFFF");

            if ($("#school").val().trim() == "") {
                txt_error += "- กรุณาเลือกสถาศึกษา/โรงเรียน\n";
                $("#school").css("background-color", "#ffebe6");
                if (!obj_err) {
                    obj_err = $("#school");
                }
            }
            if ($('input[name="Class_process[]"]:checked').length == 0) {
                txt_error += "- กรุณาเลือกระดับชั้น\n";
                $('input[name="Class_process[]"]').css("background-color", "#ffebe6");
                if (!obj_err) {
                    obj_err = $('input[name="Class_process[]"]');
                }
            }
            if (txt_error) {
                $("#modal-text").html(txt_error.replace(/\n/g, '<br>'));
                $("#modal-default").modal('show');
            } else {
                $("#insertQueuelist").off('submit').submit(); // ยกเลิก event.preventDefault() ชั่วคราวเพื่อส่ง form
            }
        });
    });
</script>

<?php
function changeDateShow($date)
{
    if (!empty($date)) {
        list($yy) = explode("-", $date);
        return ($yy + 543);
    }
}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>ฐานข้อมูลรายการ</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header bg-gray">
                        <h2 class="card-title">เพิ่มรายชื่อโรงเรียน</h2>
                        <div class="card-tools" bis_skin_checked="1">
                            <button type="button" class="btn btn-tool bg-white" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool bg-white" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="insertQueuelist" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/menulist/insertQueue" method="post">
                        <?php if (isset($_GET['Success'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.success('บันทึกข้อมูลสำเร็จ!');
                                });
                            </script>
                        <?php } ?>
                        <?php if (isset($_GET['Error'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.error('เกิดข้อผิดพลาดในการบันทึกข้อมูล!');
                                });
                            </script>
                        <?php } ?>
                        <?php if (isset($_GET['SuccessDelete'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.success('ลบข้อมูลสำเร็จ!');
                                });
                            </script>
                        <?php } ?>
                        <?php if (isset($_GET['ErrorDelete'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.error('เกิดข้อผิดพลาดในการลบข้อมูล!');
                                });
                            </script>
                        <?php } ?>
                        <div class="card-body" style="background-color: rgb(245, 245, 245); padding-bottom: 5rem;">
                            <div class="form-group mt-3 mr-5 d-flex">
                                <label class="mid mt-2 col-sm-4 text-right">โรงเรียน</label>
                                <select class="form-control select2bs4" name="SchoolID_process" id="school" style="width: 100%;" placeholder="เลือกโรงเรียน" required>
                                    <option value="" selected> กรุณาเลือกโรงเรียน/สถาบัน</option>
                                    <?php
                                    foreach ($school as $key) {
                                    ?>
                                        <option value="<?php echo $key->School_id; ?>">
                                            <?php
                                            echo $key->School_name;
                                            ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <a class="form-control col-sm-1 ml-4 btn btn-primary" href="<?PHP echo config_item("base_url"); ?>/school/addMenuSchool/">เพิ่มข้อมูล</a>
                            </div>
                            <div class="form-group mt-3 mr-5 d-flex">
                                <label for="class" class="mid mt-2 col-sm-4 text-right">ระดับชั้น</label>
                                <div class="checkbox-wrapper-1 bt" style="left: 28.5rem; top: 9.5rem;">
                                    <input name="Class_process[]" id="example-1" class="substituted" type="checkbox" aria-hidden="true" value="A1" />
                                    <label for="example-1">ประถม 1</label>
                                </div>
                                <div class="checkbox-wrapper-1 bt" style="left: 39rem; top: 9.5rem;">
                                    <input name="Class_process[]" id="example-2" class="substituted" type="checkbox" aria-hidden="true" value="A2" />
                                    <label for="example-2">ประถม 2</label>
                                </div>
                                <div class="checkbox-wrapper-1 bt" style="left: 49.5rem; top: 9.5rem;">
                                    <input name="Class_process[]" id="example-3" class="substituted" type="checkbox" aria-hidden="true" value="A3" />
                                    <label for="example-3">ประถม 3</label>
                                </div>
                                <div class="checkbox-wrapper-1 bt" style="left: 28.5rem; top: 11.5rem;">
                                    <input name="Class_process[]" id="example-4" class="substituted" type="checkbox" aria-hidden="true" value="A4" />
                                    <label for="example-4">ประถม 4</label>
                                </div>
                                <div class="checkbox-wrapper-1 bt" style="left: 39rem; top: 11.5rem;">
                                    <input name="Class_process[]" id="example-5" class="substituted" type="checkbox" aria-hidden="true" value="A5" />
                                    <label for="example-5">ประถม 5</label>
                                </div>
                                <div class="checkbox-wrapper-1 bt" style="left: 49.5rem; top: 11.5rem;">
                                    <input name="Class_process[]" id="example-6" class="substituted" type="checkbox" aria-hidden="true" value="A6" />
                                    <label for="example-6">ประถม 6</label>
                                </div>
                                <div class="checkbox-wrapper-1 bt" style="left: 28.5rem; top: 13.6rem;">
                                    <input name="Class_process[]" id="example-7" class="substituted" type="checkbox" aria-hidden="true" value="B1" />
                                    <label for="example-7">มัธยม 1</label>
                                </div>
                                <div class="checkbox-wrapper-1 bt" style="left: 39rem; top: 13.6rem;">
                                    <input name="Class_process[]" id="example-8" class="substituted" type="checkbox" aria-hidden="true" value="B2" />
                                    <label for="example-8">มัธยม 2</label>
                                </div>
                                <div class="checkbox-wrapper-1 bt" style="left: 49.5rem; top: 13.6rem;">
                                    <input name="Class_process[]" id="example-9" class="substituted" type="checkbox" aria-hidden="true" value="B3" />
                                    <label for="example-9">มัธยม 3</label>
                                </div>
                                <div class="checkbox-wrapper-1 bt" style="left: 28.5rem; top: 15.5rem;">
                                    <input name="Class_process[]" id="example-10" class="substituted" type="checkbox" aria-hidden="true" value="B4" />
                                    <label for="example-10">มัธยม 4</label>
                                </div>
                                <div class="checkbox-wrapper-1 bt" style="left: 39rem; top: 15.5rem;">
                                    <input name="Class_process[]" id="example-11" class="substituted" type="checkbox" aria-hidden="true" value="B5" />
                                    <label for="example-11">มัธยม 5</label>
                                </div>
                                <div class="checkbox-wrapper-1 bt" style="left: 49.5rem; top: 15.5rem;">
                                    <input name="Class_process[]" id="example-12" class="substituted" type="checkbox" aria-hidden="true" value="B6" />
                                    <label for="example-12">มัธยม 6</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgb(245, 245, 245); display:flex ;  justify-content: end;">
                            <button type="submit" class="btn btn-primary" id="btQueue">บันทึก</button>
                        </div>
                    </form>
                    <!-- /.card-header -->
                    <div class="card-header">
                        <h3 class="card-title">รายการค่าย</h3>
                    </div>

                    <div class="card-body" style="background-color: rgb(255, 250, 255);">
                        <table id="tablelab1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="">#</th>
                                    <th class="col-sm-4">รายการ</th>
                                    <th class="col-sm-3">ชั้น</th>
                                    <th class="col-sm-2">ปี</th>
                                    <th class="">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $numId = '1';
                                foreach ($result['row'] as $key => $v) {
                                ?>
                                    <tr>
                                        <td><?php echo $numId ?></td>
                                        <td><?php echo $v->SchoolName ?></td>
                                        <td>
                                            <div class="row"><?php foreach ($class as $select) {
                                                                    if ($v->ID == $select->Queue_id) {
                                                                        if ($select->Class_id == "A1") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 1</span>";
                                                                        } elseif ($select->Class_id == "A2") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 2</span>";
                                                                        } elseif ($select->Class_id == "A3") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 3</span>";
                                                                        } elseif ($select->Class_id == "A4") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 4</span>";
                                                                        } elseif ($select->Class_id == "A5") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 5</span>";
                                                                        } elseif ($select->Class_id == "A6") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 6</span>";
                                                                        } elseif ($select->Class_id == "B1") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 1</span>";
                                                                        } elseif ($select->Class_id == "B2") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 2</span>";
                                                                        } elseif ($select->Class_id == "B3") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 3</span>";
                                                                        } elseif ($select->Class_id == "B4") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 4</span>";
                                                                        } elseif ($select->Class_id == "B5") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 5</span>";
                                                                        } elseif ($select->Class_id == "B6") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 6</span>";
                                                                        }
                                                                    }
                                                                } ?></div>
                                        </td>
                                        <td><?php echo changeDateShow($v->CreateDate); ?></td>
                                        <td>
                                            <center>
                                                <p class="text-yellow" style="margin-bottom: 0px;">รอการจัดการ

                                                </p>
                                                <a href="<?PHP echo config_item("base_url"); ?>/menulist/cart/<?php echo $v->ID ?>/?sID=<?php echo $v->ID ?>">
                                                    <span class="btn btn-xs btn-warning">จัดค่าย/แก้ไข</span>
                                                </a>
                                                <a href="<?PHP echo config_item("base_url"); ?>/menulist/confirmDeletewaiting/<?php echo $v->ID ?>" class="delete-link">
                                                    <span class="btn btn-xs btn-danger">ลบ</span>
                                                </a>
                                            </center>
                                        </td>
                                    </tr>
                                <?php
                                    $numId++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
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
        // Initialize Select2 Elements
        $('.select2').select2();

        // Initialize Select2 Elements with Bootstrap4 theme
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        $("#tablelab1 ,#tablelab2 ,#tablelab3 ,#tablelab4").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    $(document).ready(function() {
        $('.delete-link').on('click', function(e) {
            e.preventDefault(); // ป้องกันการทำงานของลิงค์ทันที
            var href = $(this).attr('href'); // เก็บ URL ของลิงค์

            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: "การลบนี้ไม่สามารถย้อนกลับได้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ลบเลย!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'ลบสำเร็จ!',
                        text: 'รายการของคุณถูกลบแล้ว.',
                        icon: 'success'
                    }).then(() => {
                        window.location.href = href; // ดำเนินการลบโดยการเปลี่ยนหน้าไปที่ URL ของลิงค์
                    });
                }
            });
        });
    });
</script>