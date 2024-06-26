<style>
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
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DataTables</h1>
                <a href="<?PHP echo config_item("base_url"); ?>/lab/addMenuLab/" class="btn bg-blue bt" style=" top: 0px; right:-39.75rem;">เพิ่มรายการ</a>
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
                    <div class="card-header bg-pink">
                        <h2 class="card-title">รายการรายวิชา</h2>
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
                    <div class="card-body" style="background-color: rgb(255, 250, 255);">
                        <table id="tablelab1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="">#</th>
                                    <th class="col-sm-5">ชื่อรายวิชา</th>
                                    <th class="col-sm-4">หมวดหมู่</th>
                                    <th class="">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($result['row'] as $key => $v) {
                                ?>
                                    <tr>
                                        <td><?php echo $v->Idlab ?></td>
                                        <td><?php echo $v->Namelist ?></td>
                                        <td><?php if ($v->Branch == 'Online') {
                                                echo $v->BranchName;
                                            } ?></td>
                                        <td>
                                            <center>
                                                <p class="<?php echo ($v->Lab == 'Online') ? "text-green" : "text-red"; ?>" title="" style="margin-bottom: 0px;"><?php echo $v->Lab ?></p>
                                                <a href="<?PHP echo config_item("base_url"); ?>/lab/ViewMenuLab/<?php echo $v->Idlab ?>">
                                                    <span class="btn btn-xs btn-primary">ดูรายละเอียด</span>
                                                </a>

                                                <a href="<?PHP echo config_item("base_url"); ?>/lab/EditMenuLab/<?php echo $v->Idlab ?>/?sID=<?php echo $v->Idlab ?>">
                                                    <span class="btn btn-xs btn-warning">แก้ไข</span>
                                                </a>

                                                <a href="<?PHP echo config_item("base_url"); ?>/lab/confirmDeleteLablist/<?php echo $v->Idlab ?>" style="display:">
                                                    <span class="btn btn-xs btn-danger">ลบ</span>
                                                </a>
                                                <?php
                                                foreach ($teach_lab as $select) {
                                                    if ($v->Idlab == $select->Lab_id) {
                                                        echo  "<div hidden>" . $select->Teach_name . "</div>";
                                                    }
                                                }

                                                ?>
                                            </center>
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-header bg-green">
                        <h2 class="card-title">รายการผู้สอน/อาจารย์</h2>
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
                    <div class="card-body">
                        <table id="tablelab3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="col-sm-1">#</th>
                                    <th class="col-sm-9">ชื่อผู้สอน/อาจารย์</th>
                                    <th class="">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $numId = '1';
                                foreach ($teacher['row'] as $k => $t) {
                                ?>
                                    <tr>
                                        <td><?php echo $numId ?></td>
                                        <td><?php echo $t->Teach_name ?></td>
                                        <td>
                                            <center>
                                                <a href="<?PHP echo config_item("base_url"); ?>/lab/ViewMenuTeach/<?php echo $t->Teach_id ?>">
                                                    <span class="btn btn-xs btn-primary">ดูรายละเอียด</span>
                                                </a>

                                                <a href="<?PHP echo config_item("base_url"); ?>/lab/EditMenuTeach/<?php echo $t->Teach_id ?>/?sID=<?php echo $t->Teach_id ?>">
                                                    <span class="btn btn-xs btn-warning">แก้ไข</span>
                                                </a>

                                                <a href="<?PHP echo config_item("base_url"); ?>/lab/confirmDeleteTeach/<?php echo $t->Teach_id ?>" style="display:">
                                                    <span class="btn btn-xs btn-danger">ลบ</span>
                                                </a>
                                                <?php
                                                ?>
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

                <div class="card">
                    <div class="card-header bg-yellow">
                        <h2 class="card-title">รายการหมวดหมู่</h2>
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
                    <div class="card-body">
                        <table id="tablelab4" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="col-sm-1">#</th>
                                    <th class="col-sm-9">รายชื่อหมวดหมู่</th>
                                    <th class="">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $numId = '1';
                                foreach ($branch['row'] as $d => $b) {
                                ?>
                                    <tr>
                                        <td><?php echo $numId ?></td>
                                        <td><?php echo $b->Branch_name ?></td>
                                        <td>
                                            <center>
                                                <a href="<?PHP echo config_item("base_url"); ?>/lab/ViewMenuBranch/<?php echo $b->Branch_id ?>">
                                                    <span class="btn btn-xs btn-primary">ดูรายละเอียด</span>
                                                </a>

                                                <a href="<?PHP echo config_item("base_url"); ?>/lab/EditMenuBranch/<?php echo $b->Branch_id ?>/?sID=<?php echo $b->Branch_id ?>">
                                                    <span class="btn btn-xs btn-warning">แก้ไข</span>
                                                </a>

                                                <a href="<?PHP echo config_item("base_url"); ?>/lab/confirmDeleteBranch/<?php echo $b->Branch_id ?>" style="display:">
                                                    <span class="btn btn-xs btn-danger">ลบ</span>
                                                </a>
                                                <?php
                                                ?>
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
</section>
<!-- /.content -->

<script>
    $(function() {
        $("#tablelab1 ,#tablelab2 ,#tablelab3 ,#tablelab4").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>