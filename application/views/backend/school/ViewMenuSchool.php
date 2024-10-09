<style>
    .board {
        margin: 0px 0px 0px 0px;
        border-radius: 6px;
        padding: 10px 10px;
        background-color: rgb(245, 245, 245);
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
    }

    .mid {
        padding-top: 11px;
        padding-bottom: 11px;
        font-size: 19px;
    }

    .boardfines {
        font-weight: bold;
        padding: 5px;
        text-decoration: underline;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/home/">หน้าหลัก</a></li>
                    <li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/school/">ตารางโรงเรียน</a></li>
                    <li class="breadcrumb-item active">ดูข้อมูลโรงเรียน</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ดูเนื้อข้อมูลโรงเรียน</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12 ">
                            <div class="form-group mt-3 mr-5 d-flex">
                                <div class="mid col-sm-4 text-right">ชื่อโรงเรียน</div>
                                <div class="form-group col-sm-8">
                                    <div class="board"><?php echo $row->School_name ?></div>
                                </div>
                            </div>
                            <div class="form-group mt-3 mr-5 d-flex">
                                <div class="mid col-sm-4 text-right">ที่อยู่</div>
                                <div class="form-group col-sm-8">
                                    <div class="board"><?php echo $row->School_address ?></div>
                                </div>
                            </div>
                            <div class="form-group mt-3 mr-5 d-flex">
                                <div class="mid col-sm-4 text-right">อีเมล</div>
                                <div class="form-group col-sm-8">
                                    <div class="board"><?php echo $row->School_email ?></div>
                                </div>
                            </div>
                            <div class="form-group mt-3 mr-5 d-flex">
                                <div class="mid col-sm-4 text-right">เบอร์ติดต่อ</div>
                                <div class="form-group col-sm-8">
                                    <div class="board"><?php echo $row->School_callnum ?></div>
                                </div>
                            </div>
                            <div class="form-group mt-3 mr-5 d-flex">
                                <div class="mid col-sm-4 text-right">Fax</div>
                                <div class="form-group col-sm-8">
                                    <div class="board"><?php echo $row->School_fax ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="<?PHP echo config_item("base_url"); ?>/school/" class="btn btn-default">กลับ</a>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->