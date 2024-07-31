<style>
	textarea {
		resize: none;
	}
</style>

<script type="text/javascript">
	$(function() {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});

		$('.swalDefaultSuccess').click(function() {
			Toast.fire({
				icon: 'success',
				title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
		$('.swalDefaultError').click(function() {
			Toast.fire({
				icon: 'error',
				title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
			})
		});
	});

	// function checkID(id) {
	// 	if (id.length != 13) return false;
	// 	for (i = 0, sum = 0; i < 12; i++)
	// 		sum += parseFloat(id.charAt(i)) * (13 - i);
	// 	if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12)))
	// 		return false;
	// 	return true;
	// }
	$(document).ready(function() {

		$(".num").on("keypress", function(e) {

			var code = e.keyCode ? e.keyCode : e.which;

			if (code > 57) {
				return false;
			} else if ((code < 48) && (code != 46)) {
				return false;
			}

		});

		$("#btSubmit").click(function(event) {
			event.preventDefault(); // ป้องกันการ submit form โดยตรง

			var txt_error = "";
			var obj_err = "";

			$(".col-lg-12 input, .col-lg-12 textarea, .col-lg-12 select, .panel-body input, .panel-body textarea").css("background-color", "#FFFFFF");

			if ($("#NumId").val().trim() == "") {
				txt_error += "- กรุณากรอกรหัสรายวิชา\n";
				$("#NumId").css("background-color", "#ffebe6");
				if (!obj_err) {
					obj_err = $("#NumId");
				}
			}
			if ($("#NameList").val().trim() == "") {
				txt_error += "- กรุณากรอกชื่อรายวิชา\n";
				$("#NameList").css("background-color", "#ffebe6");
				if (!obj_err) {
					obj_err = $("#NameList");
				}
			}
			if ($("#Branch_type").val() == "") {
				txt_error += "- กรุณาเลือกหมวดหมู่\n";
				$("#Branch_type").css("background-color", "#ffebe6");
				if (!obj_err) {
					obj_err = $("#Branch_type");
				}
			}
			if ($("#Conceptlab").val() == "") {
				txt_error += "- กรุณากรอกเนื้อหารายวิชา\n";
				$("#Conceptlab").css("background-color", "#ffebe6");
				if (!obj_err) {
					obj_err = $("#Conceptlab");
				}
			}
			if ($("#TeachType").val() == "") {
				txt_error += "- กรุณาเลือกผู้สอน/อาจารย์\n";
				$("#TeachType").css("background-color", "#ffebe6");
				if (!obj_err) {
					obj_err = $("#TeachType");
				}
			}
			if ($("#Pricelab").val() == "") {
				txt_error += "- กรุณากรอกราคารายวิชา\n";
				$("#Pricelab").css("background-color", "#ffebe6");
				if (!obj_err) {
					obj_err = $("#Pricelab");
				}
			}

			if (txt_error) {
				$("#modal-text").html(txt_error.replace(/\n/g, '<br>'));
				$("#modal-default").modal('show');
			} else {
				$("#addTeach").off('submit').submit(); // ยกเลิก event.preventDefault() ชั่วคราวเพื่อส่ง form
			}
		});

		$("#btBranch").click(function(event) {
			event.preventDefault(); // ป้องกันการ submit form โดยตรง

			var txt_error = "";
			var obj_err = "";

			$(".col-lg-12 input, .col-lg-12 textarea, .col-lg-12 select, .panel-body input, .panel-body textarea").css("background-color", "#FFFFFF");

			if ($("#MoreBranch").val().trim() == "") {
				txt_error += "- กรุณากรอกชื่อหมวดหมู่\n";
				$("#MoreBranch").css("background-color", "#ffebe6");
				if (!obj_err) {
					obj_err = $("#MoreBranch");
				}
			}

			if (txt_error) {
				$("#modal-text").html(txt_error.replace(/\n/g, '<br>'));
				$("#modal-default").modal('show');
			} else {
				$("#addTeach").off('submit').submit(); // ยกเลิก event.preventDefault() ชั่วคราวเพื่อส่ง form
			}
		});

		$("#btTeach").click(function(event) {
			event.preventDefault(); // ป้องกันการ submit form โดยตรง

			var txt_error = "";
			var obj_err = "";	
			var invalidFileUploaded = false;

			$(".col-lg-12 input, .col-lg-12 textarea, .col-lg-12 select, .panel-body input, .panel-body textarea").css("background-color", "#FFFFFF");

			if ($("#TeachName").val().trim() == "") {
				txt_error += "- กรุณากรอกชื่อผู้สอน/อาจารย์\n";
				$("#TeachName").css("background-color", "#ffebe6");
				if (!obj_err) {
					obj_err = $("#TeachName");
				}
			}

			var vFile = 0;
			var file = $("input#image").val();
			var ext = file.split(".").pop().toLowerCase();
			var arrayExtensions = ["jpg", "jpeg", "png", "bmp", "pdf"];

			if (file) {
				if (arrayExtensions.lastIndexOf(ext) == -1) {
					vFile = 1;
					invalidFileUploaded = true;
				} else {
					invalidFileUploaded = false;
				}
			}

			if (vFile == 1) {
				txt_error += "- กรุณาแนบไฟล์ (jpg, jpeg, png, bmp, pdf)\n";
			}

			if (txt_error || invalidFileUploaded) {
				$("#modal-text").html(txt_error.replace(/\n/g, '<br>'));
				$("#modal-default").modal('show');
			} else {
				$("#addTeach").off('submit').submit();
			}
		});
	});
</script>

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
					<li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/lab/">ตารางรายวิชา</a></li>
					<li class="breadcrumb-item active">เพิ่มรายการ</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php if (isset($_GET['Error'])) { ?>
			<div class="col-lg-12 alert alert-danger" role="alert" style="text-align:center;font-size:18px"><strong>ไม่สามารถบันทึกข้อมูลได้เนื่องจากอาจจะมีข้อมูลอยู่แล้ว</strong>
				<a href="<?PHP echo config_item("base_url"); ?>/scilab/lab">
					<button type="button" class="btn btn-outline btn-danger"> กลับ </button>
				</a>
			</div>
		<?php } ?>
		<div class="row">
			<!-- left column -->
			<div class="col-md-6">
				<!-- general form elements -->
				<div class="card card-success">
					<div class="card-header">
						<h3 class="card-title">เพิ่มรายวิชา</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" id="insertLablist" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/lab/insertLablist" method="post">
						<div class="card-body" style="background-color: rgb(245, 245, 245);">
							<div class="form-group">
								<label>รหัสรายวิชา<span class="text-red">*</span></label>
								<input type="text" name="Id" class="form-control" id="NumId" placeholder="กรอกรหัสรายวิชา" maxlength="5">
							</div>
							<div class="form-group">
								<label>ชื่อรายวิชา<span class="text-red">*</span></label>
								<input type="text" name="NameList" class="form-control" id="NameList" placeholder="กรอกชื่อรายวิชา">
							</div>
							<div class="form-group">
								<label>ชื่อหมวดหมู่<span class="text-red">*</span></label>
								<select class="form-control select2bs4" name="Branch" id="Branch_type" style="width: 100%;" placeholder="กรอกเนื้อหาวิชา" required>
									<option value="" selected> กรุณาเลือกหมวดหมู่</option>
									<?php
									foreach ($branch_type as $o) {
									?>
										<option value="<?php echo $o->Branch_id; ?>">
											<?php
											echo $o->Branch_name;
											?>
										</option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>เนื้อหาวิชา<span class="text-red">*</span></label>
								<textarea name="Concept" rows="4" class="form-control" id="Conceptlab" placeholder="กรอกเนื้อหาวิชา"></textarea>
							</div>
							<div class="form-group">
								<label >อาจารย์/ครูผู้สอน (เลือกได้มากกว่า 1 บุคลากร)<span class="text-red">*</span></label>
								<select class="form-control select2bs4" multiple="multiple" name="Teach_type[]" id="TeachType" data-placeholder=" เลือกรายชื่อผู้สอนรายวิชา" style="word-break: break-word;">
									<?php
									foreach ($teach_type as $v) {
									?>
										<option value="<?php echo $v->Teach_id; ?>">
											<?php
											echo $v->Teach_name;
											?>
										</option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>ราคารายวิชา<span class="text-red">*</span></label>
								<input type="text" name="Price" class="form-control" id="Pricelab" placeholder="กรอกราคารายวิชา">
							</div>
						</div>
						<div class="card-footer" style="background-color: rgb(255, 255, 255);">
							<button type="submit" class="btn btn-success" id="btSubmit">บันทึก</button>
						</div>
					</form>
				</div>
			</div>
			<!--/.col (left) -->
			<!-- right column -->
			<div class="col-md-6">
				<!-- general form elements -->
				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">เพิ่มหมวดหมู่</h3>
					</div>
					<form role="form" id="addBranch" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/lab/addBranch" method="post">
						<div class="card-body" style="background-color: rgb(245, 245, 245);">
							<div class="form-group">
								<label>เพิ่มหมวดหมู่รายวิชา<span class="text-red">*</span></label>
								<input type="text" name="Branch" class="form-control col-sm-12" id="MoreBranch" placeholder="กรอกเพิ่มหมวดหมู่รายวิชา">
							</div>
						</div>
						<div class="card-footer" style="background-color: rgb(255, 255, 255);">
							<button type="submit" class="btn btn-info" id="btBranch">บันทึก</button>
						</div>
					</form>
				</div>
				<!-- general form elements -->
				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">เพิ่มรายชื่อผู้สอน/อาจารย์</h3>
					</div>
					<form role="form" id="addTeach" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/lab/addTeach" method="post">
						<div class="card-body" style="background-color: rgb(245, 245, 245);">
							<div class="form-group">
								<label>เพิ่มชื่ออาจารย์/ครูผู้สอน<span class="text-red">*</span></label>
								<input type="text" name="Teach" class="form-control col-sm-12" id="TeachName" placeholder="กรอกเพิ่มชื่ออาจารย์/ครูผู้สอน">
							</div>
							<div class="form-group">
								<label>เบอร์ติดต่ออาจารย์/ครูผู้สอน (ถ้ามี)</label>
								<input type="text" name="Teach_callnum" class="form-control col-sm-12" id="callNumber2" placeholder="กรอกเพิ่มชื่ออาจารย์/ครูผู้สอน">
							</div>
							<div class="form-group">
								<label>รูปอาจารย์/ผู้สอน (ถ้ามี)</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" name="image" class="custom-file-input" id="image">
										<label class="custom-file-label">เลือกรูปภาพ</label>
									</div>

								</div>
							</div>
						</div>
						<div class="card-footer" style="background-color: rgb(255, 255, 255);">
							<button type="submit" class="btn btn-info" id="btTeach">บันทึก</button>
						</div>
					</form>
				</div>
			</div>
			<!--/.col (right) -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->

	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">แจ้งเตือน</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p id="modal-text"></p>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

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