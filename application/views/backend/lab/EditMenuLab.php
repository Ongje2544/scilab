<style>
    textarea {
        resize: none;
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

        $("#btSubmit").click(function(event) {
            event.preventDefault(); // ป้องกันการ submit form โดยตรง

            var txt_error = "";
            var obj_err = "";

            $(".col-lg-12 input, .col-lg-12 textarea, .col-lg-12 select, .panel-body input, .panel-body textarea").css("background-color", "#FFFFFF");

            if ($("#NumId").val().trim() == "") {
                txt_error += "- กรุณากรอกรหัสรายวิชา\n";
                $("#NumId").css("background-color", "#ffebe6");
                if (!obj_err) {
                    obj_err = $("#NumId");
                }
            }
            if ($("#NameList").val().trim() == "") {
                txt_error += "- กรุณากรอกชื่อรายวิชา\n";
                $("#NameList").css("background-color", "#ffebe6");
                if (!obj_err) {
                    obj_err = $("#NameList");
                }
            }
            if ($("#Branch_type").val() == "") {
                txt_error += "- กรุณาเลือกหมวดหมู่\n";
                $("#Branch_type").css("background-color", "#ffebe6");
                if (!obj_err) {
                    obj_err = $("#Branch_type");
                }
            }
            if ($("#Conceptlab").val() == "") {
                txt_error += "- กรุณากรอกเนื้อหารายวิชา\n";
                $("#Conceptlab").css("background-color", "#ffebe6");
                if (!obj_err) {
                    obj_err = $("#Conceptlab");
                }
            }
            if ($("#TeachType").val() == "") {
                txt_error += "- กรุณาเลือกผู้สอน/อาจารย์\n";
                $("#TeachType").css("background-color", "#ffebe6");
                if (!obj_err) {
                    obj_err = $("#TeachType");
                }
            }
            if ($("#Pricelab").val() == "") {
                txt_error += "- กรุณากรอกราคารายวิชา\n";
                $("#Pricelab").css("background-color", "#ffebe6");
                if (!obj_err) {
                    obj_err = $("#Pricelab");
                }
            }

            if (txt_error) {
                $("#modal-text").html(txt_error.replace(/\n/g, '<br>'));
                $("#modal-default").modal('show');
            } else {
                $("#editLablist").off('submit').submit(); // ยกเลิก event.preventDefault() ชั่วคราวเพื่อส่ง form
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
                    <li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/lab/">ตารางรายวิชา</a></li>
                    <li class="breadcrumb-item active">แก้ไขข้อมูลรายวิชา</li>
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
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">เพิ่มรายวิชา</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="editLablist" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/lab/updateLablist" method="post">
                        <input name="inputID" type="hidden" value="<?php echo $row->ID ?>">
                        <div class="card-body" style="background-color: rgb(245, 245, 245);">
                            <div class="form-group">
                                <label>รหัสรายวิชา</label>
                                <input type="text" class="form-control" id="NumId" placeholder="กรอกรหัสรายวิชา" maxlength="5" value="<?php echo $row->ID ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>ชื่อรายวิชา</label>
                                <input type="text" name="NameList" class="form-control" id="NameList" placeholder="กรอกชื่อรายวิชา" value="<?php echo $row->name_list ?>">
                            </div>
                            <div class="form-group">
                                <label>ชื่อหมวดหมู่</label>
                                <select class="form-control select2bs4" name="Branch" id="Branch_type" name="Branch_type" style="width: 100%;" placeholder="กรอกเนื้อหาวิชา" required>
                                    <?php

                                    foreach ($branch_type as $c) {
                                        echo "<option value='" . $c->Branch_id . "' ";
                                        if ($row->branch_list == $c->Branch_id) {
                                            echo "selected='selected' ";
                                        }
                                        echo ">" . $c->Branch_name . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>เนื้อหาวิชา</label>
                                <textarea name="Concept" rows="4" class="form-control" id="Conceptlab" placeholder="กรอกเนื้อหาวิชา"><?php echo $row->concept_list ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>อาจารย์/ครูผู้สอน (เลือกได้มากกว่า 1 บุคลากร)</label>
                                <select class="form-control select2bs4" multiple="multiple" name="Teach_type[]" id="TeachType" data-placeholder=" เลือกรายชื่อผู้สอนรายวิชา" style="word-break: break-word;">
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
                            <div class="form-group">
                                <label>ราคารายวิชา</label>
                                <input type="text" name="Price" class="form-control" id="Pricelab" placeholder="กรอกราคารายวิชา" value="<?php echo $row->price_list ?>">
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgb(255, 255, 255);">
                            <button type="submit" class="btn btn-success" id="btSubmit">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-gray">
                    <div class="card-header">
                        <h3 class="card-title">เพิ่มหมวดหมู่</h3>
                    </div>
                    <div class="card-body" style="background-color: rgb(245, 245, 245);">
                        <div class="form-group">
                            <label for="MoreBranch">เพิ่มหมวดหมู่รายวิชา</label>
                            <input type="text" name="Branch" class="form-control col-sm-10" id="MoreBranch" placeholder="กรอกเพิ่มหมวดหมู่รายวิชา" disabled>
                        </div>
                        <button type="submit" class="btn bg-gray " style="position: absolute; top: 98px; right: 27px;;" disabled>บันทึก</button>
                        </form>
                    </div>
                </div>

                <!-- general form elements -->
                <div class="card card-gray">
                    <div class="card-header">
                        <h3 class="card-title">เพิ่มรายชื่อผู้สอน/อาจารย์</h3>
                    </div>
                    <div class="card-body" style="background-color: rgb(245, 245, 245);">
                        <div class="form-group">
                            <label for="MoreTeacher">เพิ่มชื่ออาจารย์/ครูผู้สอน</label>
                            <input type="text" name="Teach" class="form-control col-sm-10" id="MoreTeacher" placeholder="กรอกเพิ่มชื่ออาจารย์/ครูผู้สอน" disabled>
                        </div>
                        <div class="form-group">
                            <label for="MoreTeacher">เบอร์ติดต่ออาจารย์/ครูผู้สอน (ถ้ามี)</label>
                            <input type="text" name="Teach_callnum" class="form-control col-sm-10" id="callNumber2" placeholder="กรอกเพิ่มชื่ออาจารย์/ครูผู้สอน" disabled>
                        </div>
                        <button type="submit" class="btn bg-gray" style="position: absolute; top: 97px;; right: 27px;;">บันทึก</button>
                    </div>
                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
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