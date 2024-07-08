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

                    <?php
$ss_user = $this->session->userdata('logged_in');
$this->load->helper('function_helper');
$i = $result['num_rows'];
$sum = $result['num_rows'];

?>
<h1 class="page-header">รายการแจ้งข้อกล่าวหาการกระทำความผิดทางพินัย </h1>

<div class="panel panel-default">
	<div class="panel-heading">
		<a href="<?PHP echo config_item("base_url"); ?>/fines/add">
			<button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> เพิ่มรายการแจ้งข้อกล่าวหาการกระทำความผิดทางพินัย </button>
		</a>
	</div>
	<!-- /.panel-heading -->

	<div class="panel-body">
		<div class="col-md-12">
			<div style="float:left">
				<p class="text-light-blue">จำนวนทั้งหมด <?php echo $sum ?> รายการ</p>
			</div>
			<div style="float:right">
				<form role="form" class="form-inline box-search" name="frm" action="<?PHP echo config_item("base_url"); ?>/fines">
					<table width="100%" border="0px">
						<tr>
							<td style="padding:0 2px 2px 0">
								<select class="form-control" name="select" style="font-size:12px;width:150px">
									<option value="Name" <?php echo ($result['select'] == "Name") ? "selected" : "" ?>>ชื่อผู้ถูกกล่าวหา </option>
									<option value="pv" <?php echo ($result['select'] == "pv") ? "selected" : "" ?>>สถานที่ออกหนักสือ</option>
								</select>
							</td>
							<td style="padding:0 2px 2px 0"><input type="text" class="form-control" name="word" value="<?php echo $result['word'] ?>" placeholder="คำค้นหา" style="width:150px;font-size:12px"></td>
							<td style="padding:0 2px 2px 0">
								<button type="submit" id="btSubmit" class="btn btn-primary">ค้นหา</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div class="box-body" style="margin-top: 40px;">
			<table id="table1" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">ที่.</th>
						<th>สถานะทางคดี</th>
						<th>ช่องทางการชี้แจง</th>
						<th>ชื่อผู้ถูกกล่าวหา</th>
						<th>วันที่กระทำความผิด</th>
						<th>ชื่อเจ้าหน้า</th>
						<th>สถานที่ออกหนังสือ</th>
						<th class="center">เอกสาร</th>
						<th class="center" style="width:90px">สถานะ</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($result['row'] as $k => $v) {
					?>
						<tr>
							<td class="center"><?php echo $sum - $result['goto']; ?></td>
							<td><?php if ($v->StatusFines == '0') {
									echo '<span class="label label-warning">รอพิจารณา</span>';
								} elseif ($v->StatusFines == '1') {
									echo '<span class="label label-success">ยุติพิจารณา</span>';
								} elseif ($v->StatusFines == '2') {
									echo '<span class="label label-primary">สั่งปรับ</span>';
								} elseif ($v->StatusFines == '3') {
									echo '<span class="label label-danger">ยื่นอัยการ</span>';
								} ?></td>
							<td><?php if (empty($v->ExplainName)) {
									echo 'ยังไม่มีการชี้แจงข้อกล่าวหา';
								} else {
									echo $v->ExplainName;
								}
								?>
								</td>
							<td><?php echo $v->NameAccused ?></td>
							<td><?php echo DateThai_helper($v->DateOffence); ?></td>
							<td><?php echo $v->Officers ?></td>
							<td><?php echo $v->PlaceRelease ?></td>
							<td class="center">
								<?php if (!empty($v->FileName)) { ?>
									<a href="<?PHP echo config_item("base_url"); ?>/fines/viewfile/<?php echo $v->FileName ?>" target="_blank">
										<img src="<?PHP echo config_item("assets_url"); ?>/images/icon/file-blue.png" width="30px" alt="File">
									</a>
								<?php } ?>
							</td>
							<td class="center">
								<p class="<?php echo ($v->Status == 'Online') ? "text-green" : "text-red"; ?>" title="<?php echo DateThai_helper($v->UpdateDate); ?>"><?php echo $v->Status ?></p>
								<a href="<?PHP echo config_item("base_url"); ?>/fines/view/<?php echo $v->ID ?>">
									<span class="label label-primary">ดูรายละเอียด</span>
								</a>

								<a href="<?PHP echo config_item("base_url"); ?>/fines/edit/<?php echo $v->ID ?>/?sID=<?php echo $v->ID ?>">
								<span class="label label-warning">แก้ไข</span>
								</a>

								<a href="<?PHP echo config_item("base_url"); ?>/fines/confirmDelete/<?php echo $v->ID ?>" style="display:">
								<span class="label label-danger">ลบ</span>
								</a>

							</td>
						</tr>
					<?php $sum--;
					} ?>
				</tbody>
			</table>
			<nav>
				<ul class="pagination">
					<?php
					if ($result['page'] > 1) {
						$back = $result['page'] - 1;
					?>
						<li class="page-item">
							<a class="page-link" href="<?php echo config_item("base_url") . "/fines/index/?page=1&select=" . $result['select'] . "&word=" . $result['word'] . "&status=" . $result['status'] ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">First</span>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="<?php echo config_item("base_url") . "/fines/index/?page=$back&select=" . $result['select'] . "&word=" . $result['word'] . "&status=" . $result['status'] ?>" aria-label="Previous">
								<span aria-hidden="true">&lsaquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
					<?php } ?>
					<?php
					for ($p = $result['start']; $p <= $result['end']; $p++) {
						if ($p == $result['page']) {
							echo "<li class=\"page-item active\"><a class=\"page-link\">$p</a></li>";
						} else {
							echo "<li class=\"page-item\"><a class=\"page-link\" href=\"" . config_item("base_url") . "/fines/index/?page=$p&select=" . $result['select'] . "&word=" . $result['word'] . "&status=" . $result['status'] . "\">$p</a></li>";
						}
					}
					?>
					<?php
					if ($result['page'] < $result['totalpage']) {
						$next = $result['page'] + 1;
					?>
						<li class="page-item">
							<a class="page-link" href="<?php echo config_item("base_url") . "/fines/index/?page=$next&select=" . $result['select'] . "&word=" . $result['word'] . "&status=" . $result['status'] ?>" aria-label="Next">
								<span aria-hidden="true">&rsaquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="<?php echo config_item("base_url") . "/fines/index/?page=" . $result['totalpage'] . "&select=" . $result['select'] . "&word=" . $result['word'] . "&status=" . $result['status'] ?>" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">End</span>
							</a>
						</li>
					<?php $i--;
					} ?>
				</ul>
			</nav>
		</div>
	</div>
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