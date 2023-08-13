<?php include_once 'procress/dataprocress.php'; ?>
<?php echo @$alert; ?>
<div class="row">
	<div class="col-12">
		<h3 class="page-header"><i class="fa fa-bezier-curve"></i> [ผู้ดูแลระบบ] ตั้งลิงค์หน้า</h3>
		<hr class="mt-2">
	</div>
</div>


<nav aria-label="breadcrumb" class="mt-3 mb-3">
	<ol class="breadcrumb breadcrumb-inverse">
		<li class="breadcrumb-item">
			<a href="index.php">หน้าแรก</a>
		</li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?p=setting">ตั้งค่า</a></li>
		<li class="breadcrumb-item active" aria-current="page">ตั้งลิงค์หน้า</li>
	</ol>
</nav>


<!-- New link -->
<div class="modal fade" id="modal_new_link" tabindex="-1" role="dialog" aria-labelledby="modal_new_link"
	aria-hidden="true">
	<form method="post" enctype="multipart/form-data" action="<?php echo $SERVER_NAME; ?>" class="was-validated">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title font-weight-bold">เพิ่มรายการลิงค์หน้า</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-md-4 col-sm-12">
							<label for="page_name">ชื่อไฟล์</label>
							<input type="text" name="page_name" id="page_name" class="form-control" required
								autocomplete="off">
							<div class="invalid-feedback">
								*** ใส่เฉพาะชื่อไฟล์ไม่ต้องมี .php ***
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<label for="folder_name">หมวดหมู่</label>
							<input type="text" name="folder_name" id="folder_name" class="form-control" required
								autocomplete="off">
						</div>
						<div class="col-md-4 col-sm-12">
							<label for="link_name">Part File</label>
							<input type="text" name="link_name" id="link_name" class="form-control" required
								autocomplete="off">
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<div class="col text-center">

						<button class="ladda-button btn btn-primary btn-square btn-ladda bg-warning" type="submit"
							name="save_new_link" data-style="expand-left">
							<span class="mdi mdi-content-save"> บันทึก</span>
							<span class="ladda-spinner"></span>
						</button>
					</div>
				</div>
			</div><!-- /.modal-content -->
		</div>
	</form><!-- /.modal-dialog -->
</div>
<!-- End New link -->

<!-- Edit Page list -->
<div class="modal fade" id="edit_page" aria-labelledby="edit_page" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
				<div class="edit_page">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
						<i class="bx bx-exit"></i>
						ปิด
					</button>
					<button type="submit" name="save_edit_page" class="btn btn-warning"><i class="bx bx-save"></i>
						บันทึกข้อมูล</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- End edit Page list -->

<div class="card mt-3">
	<div class="card-body">
		<div class="col-12">
			<h5 class="fw-semibold">ตารางแสดงข้อมูลรายการลิงค์หน้าระบบ</h4>
			<hr class="mt-0" />
		</div>
		<table id="responsive-data-table-1" class="table dt-responsive nowrap hover text-center" width="100%">
			<thead class="bg-danger text-white font-weight-bold">
				<tr>
					<td width="5%">ลำดับ</td>
					<td>ชื่อไฟล์ระบบ</td>
					<td>หมวดหมู่</td>
					<td>ที่อยู่ไฟล์</td>
					<td>Edit</td>
				</tr>
			</thead>
			<tbody>
				<?php
									$l = 0;
									$getlink = $getdata->my_sql_select($connect, NULL, "list", "case_status !='2' ORDER BY menu ASC");
									while ($showlink = mysqli_fetch_object($getlink)) {
										$l++;
									?>
				<tr>
					<td><?php echo @$l; ?></td>
					<td><?php echo @$showlink->cases; ?></td>
					<td><?php echo @$showlink->menu; ?></td>
					<td>

						<?php echo @$showlink->pages; ?>
					</td>

					<td>

						<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit_page"
							data-whatever="<?php echo @$showlink->id; ?>" data-top="toptitle" data-placement="top"
							title="แก้ไข"><i class="fa fa-edit fa-fw"></i></button>
						<button type="button" class="btn btn-danger btn-sm"
							onclick="delect_link('<?php echo @$showlink->id; ?>');" data-top="toptitle"
							data-placement="top" title="ลบรายการ"><i class="fa fa-trash-alt fa-fw"></i></button>

					</td>


				</tr>
				<?php
									}
									?>
			</tbody>
		</table>

	</div>
	<div class="card-footer text-center">
		<a class="btn btn-info" href="index.php?p=setting"><i class="fa fa-reply"></i> กลับ</a>

	</div>
</div>