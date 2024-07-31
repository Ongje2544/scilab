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
					<li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
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
						<div class="card-body" style="background-color: rgb(245, 245, 245);">
						<div class="form-group mt-3 mr-5 d-flex">
								<label for="School_process" class="mid mt-2 col-sm-4 text-right">ชื่อโรงเรียน/สถาบัน</label>
								<select class="form-control select2bs4" id="School_process" style="width: 100%;" placeholder="กรอกเนื้อหาวิชา" disabled>
									<?php

									foreach ($school as $c) {
										echo "<option value='" . $c->School_id . "' ";
										if ($row->SchoolID_process == $c->School_id) {
											echo "selected='selected' ";
										}
										echo ">" . $c->School_name . "</option>";
									}
									?>
									</select>
							</div>
							<div class="form-group mt-3 mr-5 d-flex">
								<label for="class" class="mid mt-2 col-sm-4 text-right">ระดับชั้น</label>
								<?php foreach ($class as $select) {
									if ($row->ID == $select->Queue_id) {
										if ($select->Class_id == "A") {
											echo '<div class="checkbox-wrapper-1 bt" style="left: 27.5rem; top: 9rem;">
											<input  id="example-1" class="substituted" type="checkbox" aria-hidden="true" checked disabled/>
											<label for="example-1">มัธยม 1</label>
										</div>';
										}elseif($select->Class_id != "A"){
											echo '<div class="checkbox-wrapper-1 bt" style="left: 27.5rem; top: 9rem;">
											<input  id="example-1" class="substituted" type="checkbox" aria-hidden="true" disabled/>
											<label for="example-1">มัธยม 1</label>
										</div>';
										}
										
										if ($select->Class_id == "B") {
											echo '<div class="checkbox-wrapper-1 bt" style="left: 38rem; top: 9rem;">
											<input  id="example-2" class="substituted" type="checkbox" aria-hidden="true" checked disabled/>
											<label for="example-2">มัธยม 2</label>
										</div>';
										}elseif($select->Class_id != "B"){
											echo '<div class="checkbox-wrapper-1 bt" style="left: 38rem; top: 9rem;">
											<input  id="example-2" class="substituted" type="checkbox" aria-hidden="true" disabled/>
											<label for="example-2">มัธยม 2</label>
										</div>';
										}

										if ($select->Class_id == "C") {
											echo '<div class="checkbox-wrapper-1 bt" style="left: 48.5rem; top: 9rem;">
											<input id="example-3" class="substituted" type="checkbox" aria-hidden="true" checked disabled />
											<label for="example-3">มัธยม 3</label>
										</div>';
										}elseif($select->Class_id != "C"){
											echo '<div class="checkbox-wrapper-1 bt" style="left: 48.5rem; top: 9rem;">
											<input id="example-3" class="substituted" type="checkbox" aria-hidden="true" disabled />
											<label for="example-3">มัธยม 3</label>
										</div>';
										}
										if ($select->Class_id == "D") {
											echo '<div class="checkbox-wrapper-1 bt" style="left: 27.5rem; top: 11rem;">
											<input id="example-4" class="substituted" type="checkbox" aria-hidden="true" checked disabled />
											<label for="example-4">มัธยม 4</label>
										</div>';
										}elseif($select->Class_id != "D"){
											echo '<div class="checkbox-wrapper-1 bt" style="left: 27.5rem; top: 11rem;">
											<input id="example-4" class="substituted" type="checkbox" aria-hidden="true" disabled />
											<label for="example-4">มัธยม 4</label>
										</div>';
										}
										if ($select->Class_id == "E") {
											echo '<div class="checkbox-wrapper-1 bt" style="left: 38rem; top: 11rem;">
											<input id="example-5" class="substituted" type="checkbox" aria-hidden="true" checked disabled />
											<label for="example-5">มัธยม 5</label>
										</div>';
										}elseif($select->Class_id != "E"){
											echo '<div class="checkbox-wrapper-1 bt" style="left: 38rem; top: 11rem;">
											<input id="example-5" class="substituted" type="checkbox" aria-hidden="true" disabled />
											<label for="example-5">มัธยม 5</label>
										</div>';
										}
										if ($select->Class_id == "F") {
											echo '<div class="checkbox-wrapper-1 bt" style="left: 48.5rem; top: 11rem;">
											<input id="example-6" class="substituted" type="checkbox" aria-hidden="true" checked disabled />
											<label for="example-6">มัธยม 6</label>
										</div>';
										}elseif($select->Class_id != "F"){
											echo '<div class="checkbox-wrapper-1 bt" style="left: 48.5rem; top: 11rem;">
											<input id="example-6" class="substituted" type="checkbox" aria-hidden="true" disabled />
											<label for="example-6">มัธยม 6</label>
										</div>';
										}
									}
								} ?>
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