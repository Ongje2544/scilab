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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">General Form</li>
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">เพิ่มรายชื่อโรงเรียน</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="insertSchool" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/lab/insertSchool" method="post">
                    <input name="inputID" type="hidden" value="<?php echo $row->School_id ?>">
                        <div class="card-body" style="background-color: rgb(245, 245, 245);">
                            <div class="form-group mt-3 mr-5 d-flex">
                                <label for="nameSchool" class="mid mt-2 col-sm-4 text-right">ชื่อโรงเรียน/สถาบัน</label>
                                <input type="text" name="SchoolName" class="form-control col-sm-8" id="nameSchool" placeholder="กรอกชื่อโรงเรียน/สถาบัน" value="<?php echo $row->School_name ?>">
                            </div>
                            <div class="form-group mt-3 mr-5 d-flex">
                                <label for="address" class="mid mt-2 col-sm-4 text-right">ที่อยู่</label>
                                <textarea name="Address" rows="4" class="form-control col-sm-8" id="address" placeholder="กรอกที่อยู่"><?php echo $row->School_address ?></textarea>
                            </div>
                            <div class="form-group mt-3 mr-5 d-flex">
                                <label for="callNumber" class="mid mt-2 col-sm-4 text-right">โทรศัพท์</label>
                                <input type="text" name="Callnum" class="form-control col-sm-8" id="callNumber1" placeholder="กรอกโทรศัพท์" value="<?php echo $row->School_callnum ?>">
                            </div>
                            <div class="form-group mt-3 mr-5 d-flex">
                                <label for="fax" class="mid mt-2 col-sm-4 text-right">แฟกซ์(ถ้ามี)</label>
                                <input type="text" name="Fax" class="form-control col-sm-8" id="fax" placeholder="กรอกแฟกซ์" value="<?php echo $row->School_fax ?>">
                            </div>
                            <div class="form-group mt-3 mr-5 d-flex">
                                <label for="email" class="mid mt-2 col-sm-4 text-right">อีเมล</label>
                                <input type="email" name="Email" class="form-control col-sm-8" id="email" placeholder="กรอกอีเมล" value="<?php echo $row->School_email ?>">
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgb(255, 255, 255);">
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/.col (left) -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
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