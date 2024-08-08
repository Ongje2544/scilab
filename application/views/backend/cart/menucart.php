<style>
	textarea {
		resize: none;
	}

	.checkbox-wrapper-1 *,
	.checkbox-wrapper-1 ::after,
	.checkbox-wrapper-1 ::before {
		box-sizing: border-box;
	}

	.checkbox-wrapper-1 [type=checkbox].substituted {
		margin: 0;
		width: 0;
		height: 0;
		display: inline;
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
	}

	.checkbox-wrapper-1 [type=checkbox].substituted+label:before {
		content: "";
		display: inline-block;
		vertical-align: top;
		height: 1.15em;
		width: 1.15em;
		margin-right: 0.6em;
		color: rgba(0, 0, 0, 0.275);
		border: solid 0.06em;
		box-shadow: 0 0 0.04em, 0 0.06em 0.16em -0.03em inset, 0 0 0 0.07em transparent inset;
		border-radius: 0.2em;
		background: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xml:space="preserve" fill="white" viewBox="0 0 9 9"><rect x="0" y="4.3" transform="matrix(-0.707 -0.7072 0.7072 -0.707 0.5891 10.4702)" width="4.3" height="1.6" /><rect x="2.2" y="2.9" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 12.1877 2.9833)" width="6.1" height="1.7" /></svg>') no-repeat center, white;
		background-size: 0;
		will-change: color, border, background, background-size, box-shadow;
		transform: translate3d(0, 0, 0);
		transition: color 0.1s, border 0.1s, background 0.15s, box-shadow 0.1s;
	}

	.checkbox-wrapper-1 [type=checkbox].substituted:enabled:active+label:before,
	.checkbox-wrapper-1 [type=checkbox].substituted:enabled+label:active:before {
		box-shadow: 0 0 0.04em, 0 0.06em 0.16em -0.03em transparent inset, 0 0 0 0.07em rgba(0, 0, 0, 0.1) inset;
		background-color: #f0f0f0;
	}

	.checkbox-wrapper-1 [type=checkbox].substituted:checked+label:before {
		background-color: #3B99FC;
		background-size: 0.75em;
		color: rgba(0, 0, 0, 0.075);
	}

	.checkbox-wrapper-1 [type=checkbox].substituted:checked:enabled:active+label:before,
	.checkbox-wrapper-1 [type=checkbox].substituted:checked:enabled+label:active:before {
		background-color: #0a7ffb;
		color: rgba(0, 0, 0, 0.275);
	}

	.checkbox-wrapper-1 [type=checkbox].substituted:focus+label:before {
		box-shadow: 0 0 0.04em, 0 0.06em 0.16em -0.03em transparent inset, 0 0 0 0.07em rgba(0, 0, 0, 0.1) inset, 0 0 0 3.3px rgba(65, 159, 255, 0.55), 0 0 0 5px rgba(65, 159, 255, 0.3);
	}

	.checkbox-wrapper-1 [type=checkbox].substituted:focus:active+label:before,
	.checkbox-wrapper-1 [type=checkbox].substituted:focus+label:active:before {
		box-shadow: 0 0 0.04em, 0 0.06em 0.16em -0.03em transparent inset, 0 0 0 0.07em rgba(0, 0, 0, 0.1) inset, 0 0 0 3.3px rgba(65, 159, 255, 0.55), 0 0 0 5px rgba(65, 159, 255, 0.3);
	}

	.checkbox-wrapper-1 [type=checkbox].substituted:disabled+label:before {
		opacity: 0.5;
	}

	.checkbox-wrapper-1 [type=checkbox].substituted.dark+label:before {
		color: rgba(255, 255, 255, 0.275);
		background-color: #222;
		background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xml:space="preserve" fill="rgba(34, 34, 34, 0.999)" viewBox="0 0 9 9"><rect x="0" y="4.3" transform="matrix(-0.707 -0.7072 0.7072 -0.707 0.5891 10.4702)" width="4.3" height="1.6" /><rect x="2.2" y="2.9" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 12.1877 2.9833)" width="6.1" height="1.7" /></svg>');
	}

	.checkbox-wrapper-1 [type=checkbox].substituted.dark:enabled:active+label:before,
	.checkbox-wrapper-1 [type=checkbox].substituted.dark:enabled+label:active:before {
		background-color: #444;
		box-shadow: 0 0 0.04em, 0 0.06em 0.16em -0.03em transparent inset, 0 0 0 0.07em rgba(255, 255, 255, 0.1) inset;
	}

	.checkbox-wrapper-1 [type=checkbox].substituted.dark:checked+label:before {
		background-color: #a97035;
		color: rgba(255, 255, 255, 0.075);
	}

	.checkbox-wrapper-1 [type=checkbox].substituted.dark:checked:enabled:active+label:before,
	.checkbox-wrapper-1 [type=checkbox].substituted.dark:checked:enabled+label:active:before {
		background-color: #c68035;
		color: rgba(0, 0, 0, 0.275);
	}

	.checkbox-wrapper-1 [type=checkbox].substituted+label {
		-webkit-user-select: none;
		user-select: none;
	}

	.bt {
		position: absolute;
	}
	
	.bd{
		border: none;
		border-radius: 5px;
		background-color: rgb(255, 255, 255);
		padding-left: 50px;
		padding-right: 50px;
		font-weight: 800;
	}

</style>
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>General Form</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/home/">หน้าหลัก</a></li>
					<li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/menulist/">ตารางจัดจอง</a></li>
					<li class="breadcrumb-item active">แก้ไขข้อมูลโรงเรียน</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">เพิ่มรายชื่อโรงเรียน</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" id="insertSchool" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/school/updateSchool" method="post">
						<input name="inputID" type="hidden" value="<?php echo $row->ID ?>">
						<div class="card-body" style="background-color: rgb(240, 240, 240);">
							<div class="form-group mt-3 mr-5 d-flex">
								<label for="School_process" class="mid mt-2 col-sm-4 text-right">ชื่อโรงเรียน/สถาบัน</label>
								<div class="mt-1 ml-3 pt-1 bd"><?php foreach ($school as $c) {
										if ($row->SchoolID_process == $c->School_id) {
											echo  $c->School_name;
										}
									}?></div>
							</div>
							<div class="form-group mt-3 mr-5 d-flex">
								<label for="class" class="mid mt-2 col-sm-4 text-right">ระดับชั้น</label>
								<?php foreach ($class as $select) {
									if ($row->ID == $select->Queue_id) {
										if ($select->Class_id == "A") {
											echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 1</div>';
										}
										if ($select->Class_id == "B") {
											echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 2</div>';
										}
										if ($select->Class_id == "C") {
											echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 3</div>';
										}
										if ($select->Class_id == "D") {
											echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 4</div>';
										}
										if ($select->Class_id == "E") {
											echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 5</div>';
										}
										if ($select->Class_id == "F") {
											echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 6</div>';
										}
									}
								} ?>
							</div>

							<div class="form-group mr-5 d-flex">
								<label for="School_process" class="mid mt-2 col-sm-4 text-right">สถานที่จัดค่าย</label>
								<textarea name="place" rows="4" class="form-control col-sm-8 ml-3" id="place" placeholder="กรอกสถานที่จัดงาน"></textarea>
							</div>

							<div class="card-header" style="background-color: rgb(255, 245, 255);">
								<h3 class="card-title">รายการที่เลือก</h3>
							</div>
							<div class="card-body" style="background-color: rgb(255, 245, 255);">
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th class="">#</th>
											<th class="col-sm-5">ชื่อรายวิชา</th>
											<th class="col-sm-4">หมวดหมู่</th>
											<th class="">ดำเนินการ</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>algorithm (3 ช.ม.)</td>
											<td>คณิตศาสตร์</td>
											<td>
												<center>
													<button value="" class="text-red" style="background: none; border : none;">นำออก</button>
													<i class="material-icons"></i>
													</button>
												</center>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<br>

							<div class="card-header" style="background-color: rgb(230, 230, 230);">
								<h3 class="card-title">รายการค่าย</h3>
							</div>
							<div class="card-body" style="background-color: rgb(230, 230, 230);">
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
														<button value="<?php echo $v->Idlab ?>" style="background: none; border : none;"><i class="fa fa-shopping-cart" style="color:rgb(0, 110, 250)"></i></button>
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
							<div style="background-color: rgb(200, 150, 240);">
								<div class="form-group mt-5 mr-5 d-flex">
									<label for="School_process" class="mid mt-2 col-sm-4 text-right">สถานะจัดค่าย</label>
									<div class="form-group mt-2 ml-4 custom-control custom-radio">
										<input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
										<label for="customRadio1" class="custom-control-label font-weight-normal">ดำเนินการ</label>
									</div>
									<div class="form-group mt-2 ml-3 custom-control custom-radio">
										<input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked>
										<label for="customRadio2" class="custom-control-label font-weight-normal">รอดำเนินการ (ตรวจรายการให้เรียบร้อยก่อนเลือก ดำเนินการและบันทึก)</label>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer" style="background-color: rgb(255, 255, 255);">
							<button type="submit" class="btn btn-primary">บันทึก</button>
						</div>
					</form>
				</div>
			</div>
			<!--/.col (left) -->
		</div>
		<!--/.col (right) -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->

<script>
	$(function() {
		$("#tablelab1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

		// Initialize Select2 Elements
		$('.select2').select2();

		// Initialize Select2 Elements with Bootstrap4 theme
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})

		// Phone number input restriction
		$("#callNumber1,#callNumber2 ,#NumId").on('input', function(e) {
			$(this).val($(this).val().replace(/[^0-9]/g, ''));
		});

		// Initialize DataTable
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

		// Initialize custom file input
		bsCustomFileInput.init();
	});
</script>