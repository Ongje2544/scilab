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
                <h1>กู้คืนฐานข้อมูลโรงเรียน</h1>
                <a href="<?PHP echo config_item("base_url"); ?>/school/addMenuSchool/" class="btn bg-blue bt" style=" top: 0px; right: -31rem;">เพิ่มรายการ</a>
                <a href="<?PHP echo config_item("base_url"); ?>/school/restoreMenuSchool/" class="btn btn-outline-danger bt" style=" top: 0px; right:-39.75rem;">กู้ข้อมูลโรงเรียน</a>
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
                    <div class="card-header bg-blue">
                        <h2 class="card-title">รายการรายชื่อโรงเรียน</h2>
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
                    <div class="card-body" style="background-color: rgb(248, 248, 248);">
                        <table id="tablelab2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="col-sm-1">#</th>
                                    <th class="col-sm-5">ชื่อโรงเรียน</th>
                                    <th class="col-sm-4">เบอร์ติดต่อ</th>
                                    <th class="">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $numId = '1';
                                foreach ($school['row'] as $index => $s) {
                                ?>
                                    <tr>
                                        <td><?php echo $numId ?></td>
                                        <td><?php echo $s->School_name ?></td>
                                        <td><?php echo $s->School_callnum ?></td>
                                        <td>
                                            <center>
                                                <p class="<?php echo ($s->Status == 'Online') ? "text-green" : "text-red"; ?>" title="" style="margin-bottom: 0px;"><?php echo $s->Status ?></p>
                                                <a href="<?PHP echo config_item("base_url"); ?>/school/ViewMenuSchool/<?php echo $s->School_id ?>">
                                                    <span class="btn btn-xs btn-primary">ดูรายละเอียด</span>
                                                </a>

                                                <a href="<?PHP echo config_item("base_url"); ?>/school/EditMenuSchool/<?php echo $s->School_id ?>/?sID=<?php echo $s->School_id ?>">
                                                    <span class="btn btn-xs btn-warning">แก้ไข</span>
                                                </a>

                                                <a href="<?PHP echo config_item("base_url"); ?>/school/confirmDeleteSchool/<?php echo $s->School_id ?>" style="display:">
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