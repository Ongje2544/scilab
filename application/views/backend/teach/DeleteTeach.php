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
                    <li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/lab/">ตารางรายวิชา</a></li>
                    <li class="breadcrumb-item active">ลบผู้สอน</li>
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
                            <div class="mid">รูปประจำตัว</div>
                            <?php if (!empty($row->FileName)) { ?>
                                    <center>
                                        <img src="<?PHP echo config_item("base_url"); ?>/uploads/teach_type/<?php echo $row->FileName ?>" alt="รูปผู้สอน" width="200">
                                    </center>
                                <?php } else { ?>
                                    <center>
                                        <img src="<?PHP echo config_item("uploads_url"); ?>/unknow.jpg" alt="รูปไม่พบ" width="100">
                                    </center>
                                <?php } ?>
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
                    <form role="form" id="insertLablist" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/teach/deleteTeach" method="post">
                        <input name="inputID" type="hidden" value="<?php echo $row->Teach_id ?>">
                        <div class="card-footer">
                            <a href="<?PHP echo config_item("base_url"); ?>/teach/" class="btn btn-default">กลับ</a>
                            <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                        </div>
                    </form>
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
                                                    echo "<div class='boardfines'><a href='" . config_item("base_url") . "/lab/ViewMenuLab/" . $select->ID . "'>" . "*" . $select->name_list . "</a></div>";
                                                } else {
                                                    echo 'ไม่กำหนดชื่อรายวิชา' . ' (' . $select->ID . ')';
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