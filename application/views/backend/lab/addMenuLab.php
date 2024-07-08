<style>
    textarea {
        resize: none;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>General Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                    <li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/lab/">ตารางรายวิชา</a></li>
                    <li class="breadcrumb-item active">เพิ่มรายการ</li>
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
                    <form role="form" id="insertLablist" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/lab/insertLablist" method="post">
                        <div class="card-body" style="background-color: rgb(245, 245, 245);">
                            <div class="form-group">
                                <label for="NumId">รหัสรายวิชา</label>
                                <input type="text" name="Id" class="form-control" id="NumId" placeholder="กรอกรหัสรายวิชา" maxlength="5">
                            </div>
                            <div class="form-group">
                                <label for="NameList">ชื่อรายวิชา</label>
                                <input type="text" name="NameList" class="form-control" id="NameList" placeholder="กรอกชื่อรายวิชา">
                            </div>
                            <div class="form-group">
                                <label for="Branch_type">ชื่อหมวดหมู่</label>
                                <select class="form-control select2bs4" name="Branch" id="Branch_type" name="Branch_type" style="width: 100%;" placeholder="กรอกเนื้อหาวิชา" required>
                                    <option value="" selected> กรุณาเลือกหมวดหมู่</option>
                                    <?php
                                    foreach ($branch_type as $o) {
                                    ?>
                                        <option value="<?php echo $o->Branch_id; ?>">
                                            <?php
                                            echo $o->Branch_name;
                                            ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Concept">เนื้อหาวิชา</label>
                                <textarea name="Concept" rows="4" class="form-control" id="Concept" placeholder="กรอกเนื้อหาวิชา"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Teach_type">อาจารย์/ครูผู้สอน (เลือกได้มากกว่า 1 บุคลากร)</label>
                                <select class="form-control select2bs4" multiple="multiple" name="Teach_type[]" id="Teach_type" data-placeholder=" เลือกรายชื่อผู้สอนรายวิชา" style="word-break: break-word;">
                                    <?php
                                    foreach ($teach_type as $v) {
                                    ?>
                                        <option value="<?php echo $v->Teach_id; ?>">
                                            <?php
                                            echo $v->Teach_name;
                                            ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Price">ราคารายวิชา</label>
                                <input type="text" name="Price" class="form-control" id="Price" placeholder="กรอกราคารายวิชา">
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgb(255, 255, 255);">
                            <button type="submit" class="btn btn-success">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">เพิ่มหมวดหมู่</h3>
                    </div>
                    <form role="form" id="addBranch" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/lab/addBranch" method="post">
                        <div class="card-body" style="background-color: rgb(245, 245, 245);">
                            <div class="form-group">
                                <label for="MoreBranch">เพิ่มหมวดหมู่รายวิชา</label>
                                <input type="text" name="Branch" class="form-control col-sm-10" id="MoreBranch" placeholder="กรอกเพิ่มหมวดหมู่รายวิชา">
                            </div>
                            <button type="submit" class="btn btn-info " style="position: absolute; top: 98px; right: 27px;;">บันทึก</button>
                    </form>
                </div>
            </div>

            <!-- general form elements -->
            <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">เพิ่มรายชื่อผู้สอน/อาจารย์</h3>
                    </div>
                    <form role="form" id="addTeach" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/lab/addTeach" method="post">
                    <div class="card-body" style="background-color: rgb(245, 245, 245);">
                        <div class="form-group">
                            <label for="MoreTeacher">เพิ่มชื่ออาจารย์/ครูผู้สอน</label>
                            <input type="text" name="Teach" class="form-control col-sm-10" id="MoreTeacher" placeholder="กรอกเพิ่มชื่ออาจารย์/ครูผู้สอน">
                        </div>
                        <div class="form-group">
                            <label for="MoreTeacher">เบอร์ติดต่ออาจารย์/ครูผู้สอน (ถ้ามี)</label>
                            <input type="text" name="Teach_callnum" class="form-control col-sm-10" id="callNumber2" placeholder="กรอกเพิ่มชื่ออาจารย์/ครูผู้สอน">
                        </div>
                        <button type="submit" class="btn btn-info" style="position: absolute; top: 97px;; right: 27px;;">บันทึก</button>
                        </div>
                    </form>
                </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
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