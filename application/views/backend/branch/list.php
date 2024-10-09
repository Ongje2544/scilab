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
                <h1>ฐานข้อมูลรายการ</h1>
                <a href="<?PHP echo config_item("base_url"); ?>/branch/addMenuBranch/" class="btn bg-blue bt" style=" top: 0px; right:-31.35rem;">เพิ่มหมวดหมู่</a>
                <a href="<?PHP echo config_item("base_url"); ?>/branch/restoreMenuBranch/" class="btn btn-outline-danger bt" style=" top: 0px; right:-39.75rem;">กู้ข้อมูลรายการ</a>
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
                    <div class="card-header bg-yellow">
                        <h2 class="card-title">รายการหมวดหมู่</h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="background-color: rgb(255, 250, 255);">
                    <?php if (isset($_GET['SuccessDelete'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.success('ลบข้อมูลสำเร็จ!');
                                });
                            </script>
                        <?php } ?>
                        <?php if (isset($_GET['Error'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.error('เกิดข้อผิดพลาดในการลบข้อมูล!');
                                });
                            </script>
                        <?php } ?>
                        <table id="tablelab1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="col-sm-1">#</th>
                                    <th class="col-sm-9">ชื่อหมวดหมู่</th>
                                    <th class="">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($branch['row'] as $key => $v) {
                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $v->Branch_name ?></td>
                                        <td>
                                            <center>
                                                <a href="<?PHP echo config_item("base_url"); ?>/branch/ViewMenuBranch/<?php echo $v->Branch_id ?>">
                                                    <span class="btn btn-xs btn-primary">ดูรายละเอียด</span>
                                                </a>

                                                <a href="<?PHP echo config_item("base_url"); ?>/branch/EditMenuBranch/<?php echo $v->Branch_id ?>/?sID=<?php echo $v->Branch_id ?>">
                                                    <span class="btn btn-xs btn-warning">แก้ไข</span>
                                                </a>

                                                <a href="<?PHP echo config_item("base_url"); ?>/branch/confirmDeleteBranch/<?php echo $v->Branch_id ?>" style="display:">
                                                    <span class="btn btn-xs btn-danger">ลบ</span>
                                                </a>
                                            </center>
                                        </td>
                                    </tr>
                                <?php
                                $i++;
                                } ?>
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