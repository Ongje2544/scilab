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
                <h1>กู้คืนฐานข้อมูลรายการ</h1>
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
                        <?php if (isset($_GET['ErrorDelete'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.error('เกิดข้อผิดพลาดในการลบข้อมูล!');
                                });
                            </script>
                        <?php } ?>
                        <?php if (isset($_GET['SuccessRestore'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.success('กู้ข้อมูลสำเร็จ!');
                                });
                            </script>
                        <?php } ?>
                        <?php if (isset($_GET['ErrorRestore'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.success('เกิดข้อผิดพลาดในการกู้ข้อมูล!');
                                });
                            </script>
                        <?php } ?>
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
                                                <p class="text-red" title="" style="margin-bottom: 0px;"><?php echo $v->Lab ?></p>
                                                <a href="<?PHP echo config_item("base_url"); ?>/lab/confirmRestoreandeleteLab/<?php echo $v->Idlab ?>">
                                                    <span class="btn btn-xs btn-warning">ดูรายละเอียด</span>
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