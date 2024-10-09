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
                <a href="<?PHP echo config_item("base_url"); ?>/teach/addMenuTeach/" class="btn bg-blue bt" style=" top: 0px; right:-31.35rem;">เพิ่มผู้สอน</a>
                <a href="<?PHP echo config_item("base_url"); ?>/teach/restoreMenuTeach/" class="btn btn-outline-danger bt" style=" top: 0px; right:-39.75rem;">กู้ข้อมูลรายการ</a>
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
                    <div class="card-header bg-green">
                        <h2 class="card-title">รายการผู้สอน</h2>
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
                                    <th class="col-sm-5">ชื่อหมวดหมู่</th>
                                    <th class="col-sm-4">เบอร์ติดต่อ</th>
                                    <th class="">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($teacher['row'] as $key => $v) {
                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $v->Teach_name ?></td>
                                        <td><?php if(!empty($v->Teach_callnum)){
                                            echo $v->Teach_callnum ;
                                        }else{
                                            echo "ไม่ระบุ" ;
                                        } ?></td>
                                        <td>
                                            <center>
                                                <a href="<?PHP echo config_item("base_url"); ?>/teach/ViewMenuTeach/<?php echo $v->Teach_id ?>">
                                                    <span class="btn btn-xs btn-primary">ดูรายละเอียด</span>
                                                </a>

                                                <a href="<?PHP echo config_item("base_url"); ?>/teach/EditMenuTeach/<?php echo $v->Teach_id ?>/?sID=<?php echo $v->Teach_id ?>">
                                                    <span class="btn btn-xs btn-warning">แก้ไข</span>
                                                </a>

                                                <a href="<?PHP echo config_item("base_url"); ?>/teach/confirmDeleteTeach/<?php echo $v->Teach_id ?>" style="display:">
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