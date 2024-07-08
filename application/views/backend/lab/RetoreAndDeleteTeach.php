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
    
    .bt{
        position: absolute;
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
                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                    <li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/lab/restoreMenuLab">การกู้ข้อมูลรายวิชา</a></li>
                    <li class="breadcrumb-item active">รายละเอียดข้อมูลผู้สอน</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ดูข้อมูลผู้สอน/อาจารย์</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="mid">ชื่อผู้สอน/อาจารย์</div>
                                <div class="board"><?php echo $row->Teach_name ?></div>
                            </div>
                            <div class="form-group">
                                <div class="mid">เบอร์ติดต่อผู้สอน/อาจารย์</div>
                                <div class="board"><?php
                                                    if ($row->Teach_callnum != Null) {
                                                        echo $row->Teach_callnum;
                                                    } else {
                                                        echo 'ไม่มีเบอร์ติดต่อ';
                                                    } ?></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="javascript:history.back()" class="btn btn-success">กลับ</a>
                        <form role="form" id="insertLablist" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/lab/RestoreTeach" method="post">
                            <input name="inputID" type="hidden" value="<?php echo $row->Teach_id ?>">
                            <button type="submit" class="btn btn-primary bt" style="bottom : 12px; left:5rem">กู้ข้อมูล</button>
                        </form>
                        <form role="form" id="insertLablist" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/lab/SuredeleteTeach" method="post">
                            <input name="inputID" type="hidden" value="<?php echo $row->Teach_id ?>">
                            <button type="submit" class="btn btn-danger bt" style="bottom : 12px; left:9.9rem">ลบข้อมูล</button>
                        </form>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-6">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">รายวิชาที่เกี่ยวข้อง</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="mid">รายวิชา</div>
                                <div class="board">
                                    <?php
                                    foreach ($teach_type_list as $v) {
                                        foreach ($lab as $select) {
                                            if ($v->Lab_id == $select->ID) {
                                                if ($select->name_list != Null) {
                                                    echo $select->name_list;
                                                } else {
                                                    echo 'Untitle name';
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->