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
                <h1>ฐานข้อมูลโรงเรียน</h1>
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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="background-color: rgb(248, 248, 248);">
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
                                                <p class="text-red" title="" style="margin-bottom: 0px;"><?php echo $s->Status ?></p>
                                                <a href="<?PHP echo config_item("base_url"); ?>/school/confirmRestoreandeleteSchool/<?php echo $s->School_id ?>">
                                                    <span class="btn btn-xs btn-warning">ดูรายละเอียด</span>
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