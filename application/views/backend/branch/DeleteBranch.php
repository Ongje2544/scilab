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
                    <li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/branch/">ตารางหมวดหมู่</a></li>
                    <li class="breadcrumb-item active">ลบหมวดหมู่</li>
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
                        <h3 class="card-title">ดูเนื้อหาหมวดหมู่</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="mid">หมวดหมู่</div>
                                <div class="board"><?php echo $row->Branch_name ?></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <form role="form" id="insertLablist" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/branch/deleteBranch" method="post">
                        <input name="inputID" type="hidden" value="<?php echo $row->Branch_id ?>">
                        <div class="card-footer">
                            <a href="<?PHP echo config_item("base_url"); ?>/branch/" class="btn btn-default">กลับ</a>
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
                                    $i = '1';
                                    foreach ($lab as $option) {
                                        if ($option->branch_list == $row->Branch_id) {
                                            if ($option->name_list != Null) {
                                                echo "<div class='boardfines'><a href='" . config_item("base_url") . "/lab/ViewMenuLab/" . $option->ID . "'>" . "*" . $option->name_list . "</a></div>";
                                            } else {
                                                echo "ไม่กำหนดชื่อรายวิชา";
                                            }
                                            $i++;
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