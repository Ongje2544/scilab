<?php
function changeDateShow($date)
{
    if (!empty($date)) {
        list($yy) = explode("-", $date);
        return ($yy + 543);
    }
}
?>

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
                <a href="<?PHP echo config_item("base_url"); ?>/menulist/" class="btn bg-blue bt" style=" top: 0px; right:-40rem;">เพิ่มรายการ</a>
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
                    <div class="card-header bg-gray">
                        <h2 class="card-title">รายการค่าย</h2>
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
                    <?php if (isset($_GET['EditSuccess'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.warning('ดำเนินการไขข้อมูลสำเร็จ!');
                                });
                            </script>
                        <?php } ?>
                        <?php if (isset($_GET['EditError'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.error('เกิดข้อผิดพลาดในการดำเนินการไขข้อมูล!');
                                });
                            </script>
                        <?php } ?>
                        <?php if (isset($_GET['SuccessAmount'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.success('บันทึกยอดเงินสำเร็จ!');
                                });
                            </script>
                        <?php } ?>
                        <?php if (isset($_GET['ErrorAmount'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.error('เกิดข้อผิดพลาดในการบันทึกยอดเงิน!');
                                });
                            </script>
                        <?php } ?>
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
                        <table id="tablelab1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="">#</th>
                                    <th class="col-sm-4">รายการ</th>
                                    <th class="col-sm-3">ชั้น</th>
                                    <th class="col-sm-2">ปี</th>
                                    <th class="">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $numId = '1';
                                foreach ($result['row'] as $key => $v) {
                                ?>
                                    <tr>
                                        <td><?php echo $numId ?></td>
                                        <td><?php echo $v->SchoolName ?></td>
                                        <td>
                                            <div class="row"><?php foreach ($class as $select) {
                                                                    if ($v->ID == $select->Queue_id) {
                                                                        if ($select->Class_id == "A1") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 1</span>";
                                                                        } elseif ($select->Class_id == "A2") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 2</span>";
                                                                        } elseif ($select->Class_id == "A3") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 3</span>";
                                                                        } elseif ($select->Class_id == "A4") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 4</span>";
                                                                        } elseif ($select->Class_id == "A5") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 5</span>";
                                                                        } elseif ($select->Class_id == "A6") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 6</span>";
                                                                        } elseif ($select->Class_id == "B1") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 1</span>";
                                                                        } elseif ($select->Class_id == "B2") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 2</span>";
                                                                        } elseif ($select->Class_id == "B3") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 3</span>";
                                                                        } elseif ($select->Class_id == "B4") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 4</span>";
                                                                        } elseif ($select->Class_id == "B5") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 5</span>";
                                                                        } elseif ($select->Class_id == "B6") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 6</span>";
                                                                        }
                                                                    }
                                                                } ?></div>
                                        </td>
                                        <td><?php echo changeDateShow($v->CreateDate); ?></td>
                                        <td>
                                            <center>
                                                <p class="text-orange" style="margin-bottom: 0px;">กำลังดำเนินการ...

                                                </p>
                                                <a href="<?PHP echo config_item("base_url"); ?>/menuprocess/process/<?php echo $v->ID ?>/?sID=<?php echo $v->ID ?>">
                                                    <span class="btn btn-xs btn-success">บันทึกงาน</span>
                                                </a>

                                                <a href="<?PHP echo config_item("base_url"); ?>/menuprocess/editprocess/<?php echo $v->ID ?>" style="display:">
                                                    <span class="btn btn-xs btn-warning">แก้ไข</span>
                                                </a>
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
                    <div class="card-header bg-primary">
                        <h2 class="card-title">รายการค่าย</h2>
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
                                    <th class="1">#</th>
                                    <th class="col-sm-3">รายการ</th>
                                    <th class="col-sm-3">ชั้น</th>
                                    <th class="col-sm-1">ปี</th>
                                    <th class="col-sm-2">รายได้/หักเงิน%/กำไร</th>
                                    <th class="col-sm-2">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $numId = '1';
                                foreach ($online['row'] as $key => $v) {
                                ?>
                                    <tr>
                                        <td><?php echo $numId ?></td>
                                        <td><?php echo $v->SchoolName ?></td>
                                        <td>
                                            <div class="row"><?php foreach ($class as $select) {
                                                                    if ($v->ID == $select->Queue_id) {
                                                                        if ($select->Class_id == "A1") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 1</span>";
                                                                        } elseif ($select->Class_id == "A2") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 2</span>";
                                                                        } elseif ($select->Class_id == "A3") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 3</span>";
                                                                        } elseif ($select->Class_id == "A4") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 4</span>";
                                                                        } elseif ($select->Class_id == "A5") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 5</span>";
                                                                        } elseif ($select->Class_id == "A6") {
                                                                            echo "<span class='bg-success btn-xm ml-2 mt-1 col-3'>ประถม 6</span>";
                                                                        } elseif ($select->Class_id == "B1") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 1</span>";
                                                                        } elseif ($select->Class_id == "B2") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 2</span>";
                                                                        } elseif ($select->Class_id == "B3") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 3</span>";
                                                                        } elseif ($select->Class_id == "B4") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 4</span>";
                                                                        } elseif ($select->Class_id == "B5") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 5</span>";
                                                                        } elseif ($select->Class_id == "B6") {
                                                                            echo "<span class='bg-primary btn-xm ml-2 mt-1 col-3'>มัธยม 6</span>";
                                                                        }
                                                                    }
                                                                } ?></div>
                                        </td>
                                        <td><?php echo changeDateShow($v->CreateDate); ?></td>
                                        <td><span class="text-green"><?php echo $v->Amount?></span> / <span class="text-red"><?php echo $v->Deduction?>%</span> / <span class="text-blue"><?php echo $v->NetIncome ?></span></td>
                                        <td>
                                            <center>
                                                <p class="text-green" style="margin-bottom: 0px;">เสร็จสิ้น

                                                </p>
                                                <a href="<?PHP echo config_item("base_url"); ?>/menuprocess/viewprocessed/<?php echo $v->ID ?>/?sID=<?php echo $v->ID ?>">
                                                    <span class="btn btn-xs btn-primary">ดูรายละเอียด</span>
                                                </a>
                                                <a href="<?PHP echo config_item("base_url"); ?>/menuprocess/confirmDeleteonline/<?php echo $v->ID ?>" class="delete-link">
                                                    <span class="btn btn-xs btn-danger">ลบ</span>
                                                </a>
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

    $(document).ready(function() {
        $('.delete-link').on('click', function(e) {
            e.preventDefault(); // ป้องกันการทำงานของลิงค์ทันที
            var href = $(this).attr('href'); // เก็บ URL ของลิงค์

            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: "การลบนี้ไม่สามารถย้อนกลับได้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ลบเลย!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'ลบสำเร็จ!',
                        text: 'รายการของคุณถูกลบแล้ว.',
                        icon: 'success'
                    }).then(() => {
                        window.location.href = href; // ดำเนินการลบโดยการเปลี่ยนหน้าไปที่ URL ของลิงค์
                    });
                }
            });
        });
    });
</script>