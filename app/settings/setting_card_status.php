<?php
require_once 'procress/dataSetting.php';
?>
<?php echo @$alert; ?>

<div class="row">
	<div class="col-12">
		<h3 class="page-header"><i class="fa fa-tag fa-fw"></i> สถานะรายการต่าง ๆ</h3>
		<hr class="mt-2">
	</div>
</div>

<nav aria-label="breadcrumb" class="mt-3 mb-3">
	<ol class="breadcrumb breadcrumb-inverse">
		<li class="breadcrumb-item">
			<a href="index.php">หน้าแรก</a>
		</li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?p=setting">ตั้งค่า</a></li>
		<li class="breadcrumb-item active" aria-current="page">ตั้งค่าสถานะรายการ</li>
	</ol>
</nav>

<!-- New status -->
<div class="modal fade" id="modal_new_prefix" role="dialog" aria-labelledby="modal_new_prefix" aria-hidden="true">
	<form method="post" enctype="multipart/form-data" action="<?php echo $SERVER_NAME; ?>" class="was-validated">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><strong>เพิ่มสถานะรายการ</strong></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					<hr class="mt-0" />
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-12">
							<label class="form-label-md fw-semibold mb-2" for="status_name">ชื่อสถานะ</label>
							<input type="text" name="status_name" id="status_name" class="form-control" required>
							<div class="invalid-feedback">
								ระบุ ชื่อสถานะ
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12">
							<label class="form-label-md fw-semibold mb-2" for="color_tag">Color Tag</label>
							<input type="color" name="color_tag" id="color_tag" class="form-control" value="" required>
							<div class="invalid-feedback">
								เลือก สีสถานะ
							</div>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
						<i class="bx bx-exit"></i>
						ปิด
					</button>
					<button type="submit" name="save_status" class="btn btn-primary"><i class="bx bx-save"></i>
						บันทึกข้อมูล</button>
				</div>

			</div><!-- /.modal-content -->
		</div>
	</form>
</div><!-- /.modal -->


<!-- End New status -->

<!-- Edit Status -->
<div class="modal fade" id="edit_status" aria-labelledby="edit_status" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
				<div class="edit_status">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
						<i class="bx bx-exit"></i>
						ปิด
					</button>
					<button type="submit" name="save_edit_status" class="btn btn-warning"><i class="bx bx-save"></i>
						บันทึกข้อมูล</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- End Edit status -->

<div class="card mt-3">
	<div class="card-body">
		<div class="col-12">
			<h5 class="fw-semibold">ตารางแสดงข้อมูลรายการสถานะ</h4>
			<hr class="mt-0" />
		</div>
		<div class="text-end mb-3">
			<button type="button" data-bs-toggle="modal" data-bs-target="#modal_new_prefix"
				class="btn btn-success btn-md"><i class="bx bx-save"></i> เพิ่มข้อมูล</button>
		</div>
		<table class="table table-bordered table-hover text-center">
			<thead class="table-success text-center font-weight-bold">
				<tr>
					<td>#</td>
					<td>Color Tag</td>
					<td>ชื่อสถานะ</td>
					<td>การใช้งาน</td>
					<td>จัดการ</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$t = 0;
					$getcat = $getdata->my_sql_select($connect, NULL, "use_status", "status_name <> '' AND status != '2' ORDER BY status_use DESC");
					while ($showcat = mysqli_fetch_object($getcat)) {
						$t++;
					?>
				<tr>
					<td><?php echo $t; ?></td>
					<td><i class="fa fa-circle" style="color:<?php echo @$showcat->status_color; ?>"></i></td>
					<td><?php echo @$showcat->status_name; ?></td>

					<td>
						<?php if ($showcat->status_use != 0) { ?>
						<div class="custom-control custom-checkbox custom-control-inline font-weight-bold">
							<?php if (@$showcat->status_use == '1') { ?>
							<label class="custom-control-label text-warning">ใช้งานรายการหน้าแรก</label>
							<?php } elseif (@$showcat->status_use == '2') { ?>
							<label class="custom-control-label text-info">ใช้งานแจ้งซ่อม</label>
							<?php } elseif (@$showcat->status_use == '3') { ?>
							<label class="custom-control-label text-success">ใช้งานทุกระบบ</label>
							<?php } ?>
						</div>
						<?php } else { ?>
						<label class="text-danger font-weight-bold">ปิดการใช้งาน</label>
						<?php } ?>
					</td>
					<td>

						<?php if($showcat->status_key != 'befb5e146e599a9876757fb18ce5fa2e' && $showcat->status_key != '2e34609794290a770cb0349119d78d21' && $showcat->status_key != '57995055c28df9e82476a54f852bd214'){ ?>
						<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit_status"
							data-whatever="<?php echo @$showcat->status_key; ?>" data-top="toptitle"
							data-placement="top" title="แก้ไข"><i class="fa fa-edit fa-fw"></i></button>
						<?php if ($_SESSION['uclass'] == 3) { ?>
						<a href="#" onclick="deleteStatus('<?php echo @$showcat->status_key; ?>');"
							class="btn btn-sm btn-danger" data-toggle="toptitle" data-placement="top"
							title="ลบรายการนี้"><i class="fa fa-times"></i></a>
						<?php } ?>
						<?php } ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>
	<div class="card-footer text-center">
        <a class="btn btn-info" href="index.php?p=setting"><i class="fa fa-reply"></i> กลับ</a>
        
    </div>
</div>