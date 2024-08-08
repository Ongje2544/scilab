<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>แจ้งเตือนประวัติการใช้</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- /.card -->
            <?php
            foreach ($result['row'] as $key => $v) {
            ?>
                <div class="col-12">
                    <div class="card" style="margin-left: 6rem; width:68rem; height:4rem;">
                        <!-- /.card-header -->
                        <div class="card-body" style="background-color: rgb(240, 240, 240);">
                            <div class="form-group col-12 d-flex">
                                <div class="col-sm-2"><?php echo $v->logID ?></div>
                                <div class="col-sm-5"><?php echo $v->logTable ?></div>
                                <div class="col-sm-5"><?php echo $v->logAction ?></div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- /.card -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>