<?php
function changeDateShow($date)
{
    if (!empty($date)) {
        list($yy, $mm, $dd) = explode("-", $date);
        return $dd . "/" . $mm . "/" . $yy;
    }
}

$today = date("Y-m-d");
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>แจ้งเตือนประวัติการใช้</h1>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body" style="background-color: rgb(230, 230, 230);">
                    <?php foreach ($result as $key => $v) { ?>
                        <div class="col-12">
                            <div class="card shadow-sm" style="border-radius: 8px;">
                                <div class="card-body d-flex justify-content-between align-items-center" style="background-color: #f8f9fa; padding: 1rem;">
                                    <div class="col-sm-1 font-weight-bold"><?php echo $v->logID ?></div>
                                    <div class="col-sm-4 text-muted">มีการแก้ไขฐานข้อมูล <?php echo $v->logTable ?></div>
                                    <div class="col-sm-4 text-left"><?php echo $v->logAction ?></div>
                                    <div class="col-sm-3 text-right text-muted"><?php echo changeDateShow($v->logCreate); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- Pagination -->
                    <div class="row justify-content-center mt-3">
                        <nav>
                            <ul class="pagination">
                                <?php if ($current_page > 1): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=1" aria-label="First">หน้าแรก</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <!-- ปุ่มเลขหน้าที่จะถูกย่อ -->
                                <?php
                                $start_page = max(1, $current_page - 2); // หน้าเริ่มต้น
                                $end_page = min($total_pages, $current_page + 2); // หน้าสิ้นสุด

                                for ($page = $start_page; $page <= $end_page; $page++): ?>
                                    <li class="page-item <?php if ($page == $current_page) echo 'active'; ?>">
                                        <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($current_page < $total_pages): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $current_page + 1; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $total_pages; ?>" aria-label="Last">หน้าสุดท้าย</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>

                    <!-- ช่องกรอกเลขหน้า -->
                    <div class="row justify-content-center">
                        <form action="" method="get">
                            <div class="input-group" style="max-width: 200px;">
                                <input type="number" name="page" class="form-control" min="1" max="<?php echo $total_pages; ?>" placeholder="ไปยังหน้า" value="<?php echo $current_page; ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">ไป</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <br>
</section>