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
				$("#addBranch").off('submit').submit(); // ยกเลิก event.preventDefault() ชั่วคราวเพื่อส่ง form
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
					<li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/home/">หน้าหลัก</a></li>
					<li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/branch/">ตารางหมวดหมู่</a></li>
					<li class="breadcrumb-item active">เพิ่มรายการ</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">เพิ่มหมวดหมู่</h3>
					</div>
					<form role="form" id="addBranch" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/branch/addBranch" method="post">
					<?php if (isset($_GET['Success'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.success('บันทึกข้อมูลสำเร็จ!');
                                });
                            </script>
                        <?php } ?>
                        <?php if (isset($_GET['Error'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    toastr.error('เกิดข้อผิดพลาดในการบันทึกข้อมูล!');
                                });
                            </script>
                        <?php } ?>
						<div class="card-body" style="background-color: rgb(245, 245, 245);">
							<div class="form-group mt-3 mr-5 d-flex">
								<label class="mid mt-2 col-sm-4 text-right">เพิ่มหมวดหมู่รายวิชา<span class="text-red">*</span></label>
								<input type="text" name="Branch" class="form-control col-sm-8" id="MoreBranch" placeholder="กรอกเพิ่มหมวดหมู่รายวิชา">
							</div>
						</div>
						<div class="card-footer" style="background-color: rgb(255, 255, 255);">
						<a href="<?PHP echo config_item("base_url"); ?>/branch/" class="btn btn-default">กลับ</a>
							<button type="submit" class="btn btn-info" id="btBranch">บันทึก</button>
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