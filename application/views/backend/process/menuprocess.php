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

	.checkbox-wrapper-1 [type=checkbox].substituted:disabled+label:before {
		background-color: #3B99FC;
		/* สีพื้นหลังเดียวกับสถานะปกติ */
		color: rgba(0, 0, 0, 0.075);
		background-size: 0.75em;
		opacity: 0.12;
		/* ทำให้สีเข้มเต็มที่ */
	}

	.bd {
		border: none;
		border-radius: 5px;
		background-color: rgb(255, 255, 255);
		padding-left: 50px;
		padding-right: 50px;
		font-weight: 800;
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {

		$("#btAmount").click(function(event) {
			event.preventDefault(); // ป้องกันการ submit form โดยตรง

			var txt_error = "";
			var obj_err = "";
			var invalidFileUploaded = false;
			var selectedRadio = $("input[name='Status']:checked").val();

			// รีเซ็ตสีพื้นหลังให้เป็นสีขาว
			$(".col-lg-12 input, .col-lg-12 textarea, .col-lg-12 select, .panel-body input, .panel-body textarea").css("background-color", "#FFFFFF");

			// ตรวจสอบ textarea
			if ($("#amount").val().trim() == "") {
				txt_error += "- กรุณากรอกสถานที่จัด\n";
				$("#amount").css("background-color", "#ffebe6");
				if (!obj_err) {
					obj_err = $("#amount");
				}
			}
			if ($("#netincome").val().trim() == "") {
				txt_error += "- กรุณาเลือกแคมค์วิชา\n";
				$("#netincome").css("background-color", "#ffebe6");
				if (!obj_err) {
					obj_err = $("#netincome");
				}
			}


			// แสดงข้อความเตือนถ้ามีข้อผิดพลาด
			if (txt_error) {
				$("#modal-text").html(txt_error.replace(/\n/g, '<br>'));
				$("#modal-default").modal('show');
			} else {
				$("#insertAmount").off('submit').submit(); // ยกเลิก event.preventDefault() ชั่วคราวเพื่อส่ง form
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
					<li class="breadcrumb-item"><a href="<?PHP echo config_item("base_url"); ?>/menuprocess/">ตารางดำเนินการ</a></li>
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
						<h3 class="card-title">บันทึกเงิน</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" id="insertAmount" enctype="multipart/form-data" action="<?PHP echo config_item("base_url"); ?>/menuprocess/insertAmount" method="post">
						<input name="inputID" type="hidden" value="<?php echo $row->ID ?>">
						<div class="card-body" style="background-color: rgb(245, 245, 245);">
							<div class="form-group mt-3 mr-5 d-flex">
								<label for="School_process" class="mid mt-2 col-sm-4 text-right">ชื่อโรงเรียน/สถาบัน</label>
								<div class="mt-1 ml-3 pt-1 bd"><?php foreach ($school as $c) {
																	if ($row->SchoolID_process == $c->School_id) {
																		echo  $c->School_name;
																	}
																} ?></div>
							</div>
							<div class="form-group mt-3 mr-5 d-flex">
								<label for="class" class="mid mt-2 col-sm-4 text-right">ระดับชั้น</label>
								<?php foreach ($class as $select) {
									if ($row->ID == $select->Queue_id) {
										if ($select->Class_id == "A1") {
											echo '<div class="bg-success btn-sm ml-3 mt-2 mb-2">ประถม 1</div>';
										}
										if ($select->Class_id == "A2") {
											echo '<div class="bg-success btn-sm ml-3 mt-2 mb-2">ประถม 2</div>';
										}
										if ($select->Class_id == "A3") {
											echo '<div class="bg-success btn-sm ml-3 mt-2 mb-2">ประถม 3</div>';
										}
										if ($select->Class_id == "A4") {
											echo '<div class="bg-success btn-sm ml-3 mt-2 mb-2">ประถม 4</div>';
										}
										if ($select->Class_id == "A5") {
											echo '<div class="bg-success btn-sm ml-3 mt-2 mb-2">ประถม 5</div>';
										}
										if ($select->Class_id == "A6") {
											echo '<div class="bg-success btn-sm ml-3 mt-2 mb-2">ประถม 6</div>';
										}
										if ($select->Class_id == "B1") {
											echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 1</div>';
										}
										if ($select->Class_id == "B2") {
											echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 2</div>';
										}
										if ($select->Class_id == "B3") {
											echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 3</div>';
										}
										if ($select->Class_id == "B4") {
											echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 4</div>';
										}
										if ($select->Class_id == "B5") {
											echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 5</div>';
										}
										if ($select->Class_id == "B6") {
											echo '<div class="bg-primary btn-sm ml-3 mt-2 mb-2">มัธยม 6</div>';
										}
									}
								} ?>
							</div>

							<div class="form-group mr-5 d-flex">
								<label for="School_process" class="mid mt-2 col-sm-4 text-right">สถานที่จัดค่าย</label>
								<textarea rows="4" class="form-control col-sm-8 ml-3" id="place" placeholder="กรอกสถานที่จัดงาน" readonly style="border: none; background-color:rgb(255, 255, 255); font-weight:600;"><?php echo $row->Place_address ?></textarea>
							</div>
							<div class="form-group mr-5 d-flex">
								<label for="" class="mid mt-2 col-sm-4 text-right">วันที่จัด</label>
								<div class="mt-1 ml-3 pt-1 bd"><?php echo changeDateShow($row->StartDate); ?></div>
								<label for="" class="mt-2 col-sm-1 text-right">วันที่สิ้นสุด</label>
								<div class="mt-1 ml-3 pt-1 bd"><?php echo changeDateShow($row->EndDate); ?></div>
							</div>
							<div class="form-group mr-5 d-flex">
								<label for="" class="mid mt-2 col-sm-4 text-right">จำนวนนักเรียน</label>
								<div class="mt-1 ml-3 pt-1 bd"><?php echo $row->numCount ?></div>
							</div>
							<div class="card">
								<div class="card-header" style="background-color: rgb(245, 255, 255);">
									<h3 class="card-title">ครูผู้สอน/อาจารย์</h3>
								</div>
								<div class="card-body" style="background-color: rgb(245, 255, 255);">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>ชื่อผู้สอน/อาจารย์</th>
												<th>เบอร์ติดต่อ</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$counter = 1;
											// วนลูป teach_type_list เพื่อดึงชื่อครูตาม Teach_id ที่ตรงกัน
											foreach ($teach_type_list as $option) {
												foreach ($teach_type as $select) {
													// ตรวจสอบว่า Teach_id ตรงกัน
													if ($option->Teach_id == $select->Teach_id) {
														echo "<tr>";
														echo "<td>" . $counter++ . "</td>"; // ลำดับที่
														echo "<td>" . $select->Teach_name . "</td>"; // แสดงชื่อครู
														echo "<td>" . (!empty($select->Teach_callnum) ? $select->Teach_callnum : '-') . "</td>"; // แสดงเบอร์โทร
														echo "</tr>";
														break; // เจอชื่อครูที่ตรงแล้ว ให้หยุดลูปภายในเพื่อป้องกันการเช็คซ้ำ
													}
												}
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<input type="hidden" id="selected_camps" readonly value="<?php echo $row->Lab_process ?>">
							<div class="card">
								<div class="card-header" style="background-color: rgb(255, 245, 255);">
									<h3 class="card-title">รายการที่เลือก</h3>
								</div>
								<div class="card-body" style="background-color: rgb(255, 245, 255);">
									<table id="selectedItemsTable" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>ชื่อรายวิชา</th>
												<th>หมวดหมู่</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($result['row'] as $key => $v) {
											?>
												<tr>
													<td><?php echo $v->Idlab ?></td>
													<td><?php echo $v->Namelist ?></td>
													<td><?php echo $v->BranchName ?></td>
												</tr>
											<?php
											} ?>
										</tbody>
									</table>
								</div>
							</div>
							<br>
							<div class="form-group mt-3 mr-5 d-flex">
								<label for="School_process" class="mid mt-2 col-sm-4 text-right">ยอดเงิดทั้งหมด</label>
								<input type="text" name="Amount" id="amount" class="form-control col-3" oninput="calculateDeduction()" value="<?php echo $row->Amount; ?>" placeholder="กรอกยอดเงินทั้งหมด">
							</div>
							<div class="form-group mt-3 mr-5 d-flex">
								<label for="School_process" class="mid mt-2 col-sm-4 text-right">หักเข้าสาขา(%)</label>
								<input type="text" name="Deduction" class="form-control col-1" id="netincome" oninput="calculateDeduction()" value="<?php echo $row->Deduction; ?>" placeholder="เปอร์เซ็น%">
							</div>
							<div class="form-group mt-3 mr-5 d-flex">
								<label for="School_process" class="mid mt-2 col-sm-4 text-right">เงินสุทธิ</label>
								<input type="text" name="NetIncome" id="deductionAmount" class="form-control col-3" value="<?php echo $row->NetIncome; ?>" readonly>
							</div>
						</div>
						<div class="card-footer" style="background-color: rgb(255, 255, 255);">
							<a href="javascript:history.back()" class="btn btn-success">กลับ</a>
							<button type="submit" class="btn btn-primary" id="btAmount">บันทึก</button>
						</div>
					</form>
				</div>
			</div>
			<!--/.col (left) -->
		</div>
		<!--/.col (right) -->
	</div>
	<!-- /.row -->
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
		$("#callNumber1,#callNumber2 ,#NumId ,#amount ,#netincome").on('input', function(e) {
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

<script>
	function calculateDeduction() {
		// ดึงค่าจากช่อง input
		var totalAmount = parseFloat(document.getElementById("amount").value) || 0;
		var percentage = parseFloat(document.getElementById("netincome").value) || 0;

		// คำนวณเงินที่ถูกหัก
		var deductionAmount = (totalAmount * percentage) / 100;

		// แสดงผลลัพธ์ในช่องที่สาม
		document.getElementById("deductionAmount").value = deductionAmount.toFixed(2);
	}
</script>

<script>
$(document).ready(function() {
    // ฟังก์ชันเพื่ออัปเดตการแสดงผลของแถวในตาราง 'รายการที่เลือก'
    function updateSelectedItems() {
        var $inputField = $('#selected_camps');
        var selectedIds = $inputField.val().split(',').filter(Boolean); // ดึงค่า ID ที่เลือก
        $('#selectedItemsTable tbody tr').each(function() {
            var rowId = $(this).find('td').first().text(); // ดึง ID จากคอลัมน์แรกของแถว
            if (selectedIds.includes(rowId)) {
                $(this).show(); // แสดงแถวที่มี ID อยู่ใน input
            } else {
                $(this).hide(); // ซ่อนแถวที่ไม่มี ID ใน input
            }
        });
    }

    // ฟังก์ชันเพื่ออัปเดตการแสดงผลของแถวในตาราง 'ครูผู้สอน'
    function updateAvailableItems() {
        var $inputField = $('#selected_camps');
        var selectedIds = $inputField.val().split(',').filter(Boolean); // ดึงค่า ID ที่เลือก
        $('#tablelab1 tbody tr').each(function() {
            var rowId = $(this).find('td').first().text(); // ดึง ID จากคอลัมน์แรกของแถว
            if (selectedIds.includes(rowId)) {
                $(this).hide(); // ซ่อนแถวที่มี ID อยู่ใน input
            } else {
                $(this).show(); // แสดงแถวที่ไม่มี ID ใน input
            }
        });
    }

    // ฟังก์ชันเพื่อเพิ่มรายการใหม่ในตาราง 'รายการที่เลือก'
    function addItemToCart(id) {
        var $inputField = $('#selected_camps');
        var existingValues = $inputField.val().split(',').filter(Boolean); // ดึงค่า ID ที่มีอยู่แล้ว
        if (!existingValues.includes(id)) {
            existingValues.push(id); // เพิ่ม ID ใหม่
            $inputField.val(existingValues.join(',')); // อัปเดตค่าใน input
        }

        // อัปเดตการแสดงผลของแถว
        updateSelectedItems();
        updateAvailableItems(); // อัปเดตการแสดงผลของแถวใน 'ครูผู้สอน'
    }

    // ฟังก์ชันเพื่อนำออกรายการจากตาราง 'รายการที่เลือก'
    function removeItemFromCart(id) {
        var $inputField = $('#selected_camps');
        var existingValues = $inputField.val().split(',').filter(Boolean); // ดึงค่า ID ที่มีอยู่แล้ว
        existingValues = existingValues.filter(value => value !== id); // ลบ ID ออก
        $inputField.val(existingValues.join(',')); // อัปเดตค่าใน input

        // อัปเดตการแสดงผลของแถว
        updateSelectedItems();
        updateAvailableItems(); // อัปเดตการแสดงผลของแถวใน 'ครูผู้สอน'
    }

    // จัดการคลิกที่ไอคอนรถเข็นในตาราง 'ครูผู้สอน'
    $('#tablelab1').on('click', '.fa-shopping-cart', function() {
        var id = $(this).data('id').toString(); // ดึง ID จาก data-id และแปลงเป็นสตริง
        addItemToCart(id); // เพิ่ม ID ลงใน input และอัปเดตแถว
    });

    // จัดการคลิกที่ <b> เพื่อนำออกในตาราง 'รายการที่เลือก'
    $('#selectedItemsTable').on('click', 'b', function() {
        var id = $(this).data('id').toString(); // ดึง ID จาก data-id และแปลงเป็นสตริง
        removeItemFromCart(id); // ลบ ID ออกจาก input และอัปเดตแถว
    });

    // ตรวจสอบเมื่อโหลดหน้าเพื่อซ่อนแถวที่มี ID ใน input และแสดงแถวที่เหลือ
    (function() {
        var ids = $('#selected_camps').val().split(',').filter(Boolean); // ดึง IDs จาก input
        $('#tablelab1 tbody tr').each(function() {
            var rowId = $(this).find('td').first().text(); // ดึง ID จากคอลัมน์แรกของแถว
            if (ids.includes(rowId)) {
                $(this).hide(); // ซ่อนแถวถ้า ID อยู่ใน input
            } else {
                $(this).show(); // แสดงแถวถ้า ID ไม่อยู่ใน input
            }
        });

        updateSelectedItems(); // อัปเดตการแสดงผลของแถวใน 'รายการที่เลือก'
    })();
});

</script>