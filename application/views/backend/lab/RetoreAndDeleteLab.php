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
                    <li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/home/">หน้าหลัก</a></li>
                    <li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/lab/restoreMenuLab">การกู้ข้อมูลรายวิชา</a></li>
                    <li class="breadcrumb-item active">รายละเอียดข้อมูลรายวิชา</li>
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
                        <h3 class="card-title">ดูเนื้อหาวิชา</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12 ">
                            <div class="form-group mt-3 mr-5 d-flex">
                                <div class="mid col-sm-4 text-right">ชื่อรายวิชา</div>
                                <div class="form-group col-sm-8">
                                    <div class="board"><?php echo $row->name_list ?></div>
                                </div>
                            </div>
                            <div class="form-group mt-3 mr-5 d-flex">
                                <div class="mid col-sm-4 text-right">สาขา</div>
                                <div class="form-group col-sm-8">
                                    <div class="board"><?php echo $row->BranchName ?></div>
                                </div>
                            </div>
                            <div class="form-group mt-3 mr-5 d-flex">
                                <div class="mid col-sm-4 text-right">เนื้อหา</div>
                                <div class="form-group col-sm-8">
                                    <div class="board"><?php echo $row->concept_list ?></div>
                                </div>
                            </div>
                            <div class="form-group mt-3 mr-5 d-flex">
                                <div class="mid col-sm-4 text-right">ผู้สอน/อาจารย์</div>
                                <div class="form-group col-sm-8">
                                    <div class="board"><?php
                                                        foreach ($teach_type_list as $option) {
                                                            foreach ($teach_type as $select) {
                                                                if ($option->Teach_id == $select->Teach_id) {
                                                                    echo  "<div class='boardfines'>" . $select->Teach_name . "</div></br>";
                                                                }
                                                            }
                                                        }
                                                        ?></div>
                                </div>
                            </div>
                            <div class="form-group mt-3 mr-5 d-flex">
                                <div class="mid col-sm-4 text-right">ราคา</div>
                                <div class="form-group col-sm-8">
                                    <div class="board"><?php echo $row->price_list ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <a href="<?PHP echo config_item("base_url"); ?>/lab/" class="btn btn-default">กลับ</a>
                        <form role="form" id="insertLablist" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/lab/RestoreLab" method="post">
                            <input name="inputID" type="hidden" value="<?php echo $row->ID ?>">
                            <button type="submit" class="btn btn-primary bt" style="bottom : 12px; left:5rem">กู้ข้อมูล</button>
                        </form>
                        <form role="form" id="insertLablist" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/lab/SuredeleteLab" method="post">
                            <input name="inputID" type="hidden" value="<?php echo $row->ID ?>">
                            <button type="submit" class="btn btn-danger bt" style="bottom : 12px; left:9.9rem">ลบข้อมูล</button>
                        </form>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->