<?php require_once 'procress/dataSetting.php'; ?>
<?php echo @$alert; ?>

<!-- New type -->
<div class="modal fade" id="modal_new_type" tabindex="-1" role="dialog" aria-labelledby="modal_new_type" aria-hidden="true">
	<form method="post" enctype="multipart/form-data" action="<?php echo $SERVER_NAME; ?>" class="was-validated">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title font-weight-bold">เพิ่มสถานะประเภท</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-12">
							<label for="type_name">ชื่อสถานะประเภท</label>
							<input type="text" name="type_name" id="type_name" class="form-control" required>
							<div class="invalid-feedback">
								ระบุ ชื่อสถานะประเภท
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12">
							<label for="color_tag">Color Tag</label>
							<input type="color" name="color_tag" id="color_tag" class="form-control" value="" required>
							<div class="invalid-feedback">
								เลือก สีสถานะประเภท
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<div class="col text-center">

						<button class="ladda-button btn btn-primary btn-square btn-ladda bg-success" type="submit" name="save_type" data-style="expand-left">
							<span class="mdi mdi-content-save"> บันทึก</span>
							<span class="ladda-spinner"></span>
						</button>
					</div>
				</div>
			</div><!-- /.modal-content -->
		</div>
	</form><!-- /.modal-dialog -->
</div>
<!-- End New type -->

<!-- Edit type -->
<div class="modal fade" id="edit_type" tabindex="-1" role="dialog" aria-labelledby="modal_edit_type" aria-hidden="true">
	<form method="post" action="<?php echo $SERVER_NAME; ?>" class="was-validated">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title font-weight-bold">แก้ไขข้อมูล</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="edit_type">

				</div>
				<div class="modal-footer">
					<div class="col text-center">
						<button class="ladda-button btn btn-primary btn-square btn-ladda bg-warning" type="submit" name="save_edit_type" data-style="expand-left">
							<span class="mdi mdi-content-save"> บันทึก</span>
							<span class="ladda-spinner"></span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</form><!-- /.modal-dialog -->
</div>
<!-- End Edit type -->

<!-- New status -->
<div class="modal fade" id="modal_new_status" tabindex="-1" role="dialog" aria-labelledby="modal_new_status" aria-hidden="true">
	<form method="post" enctype="multipart/form-data" action="<?php echo $SERVER_NAME; ?>" class="was-validated">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title font-weight-bold">เพิ่มสถานะ</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-12">
							<label for="status_name">ชื่อสถานะ</label>
							<input type="text" name="status_name" id="status_name" class="form-control" required>
							<div class="invalid-feedback">
								ระบุ ชื่อสถานะ
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12">
							<label for="color_tag">Color Tag</label>
							<input type="color" name="color_tag" id="color_tag" class="form-control" value="" required>
							<div class="invalid-feedback">
								เลือก สีสถานะ
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<div class="col text-center">

						<button class="ladda-button btn btn-primary btn-square btn-ladda bg-success" type="submit" name="save_status" data-style="expand-left">
							<span class="mdi mdi-content-save"> บันทึก</span>
							<span class="ladda-spinner"></span>
						</button>
					</div>
				</div>
			</div><!-- /.modal-content -->
		</div>
	</form><!-- /.modal-dialog -->
</div>
<!-- End New status -->

<!-- Edit Status -->
<div class="modal fade" id="edit_status" tabindex="-1" role="dialog" aria-labelledby="modal_edit_status" aria-hidden="true">
	<form method="post" action="<?php echo $SERVER_NAME; ?>" class="was-validated">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title font-weight-bold">แก้ไขข้อมูล</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="edit_status">

				</div>
				<div class="modal-footer">
					<div class="col text-center">
						<button class="ladda-button btn btn-primary btn-square btn-ladda bg-warning" type="submit" name="save_edit_status" data-style="expand-left">
							<span class="mdi mdi-content-save"> บันทึก</span>
							<span class="ladda-spinner"></span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</form><!-- /.modal-dialog -->
</div>
<!-- End Edit status -->




<div class="row">
	<div class="col-12">
		<h1 class="page-header"><i class="fa fa-tag fa-fw"></i> สถานะประเภทต่าง ๆ</h1>
	</div>
</div>

<nav aria-label="breadcrumb" class="mt-3 mb-3">
	<ol class="breadcrumb breadcrumb-inverse">
		<li class="breadcrumb-item">
			<a href="index.php">หน้าแรก</a>
		</li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?p=setting">ตั้งค่า</a></li>
		<li class="breadcrumb-item active" aria-current="page">ตั้งค่าสถานะประเภท</li>
	</ol>
</nav>

<div class="card card-default">
	<div class="card-header card-header-border-bottom">
		<h2>ตั้งค่าสถานะประเภท</h2>
	</div>
	<div class="card-body">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="type-tab" data-toggle="tab" href="#type" role="tab" aria-controls="type" aria-selected="true">
					<i class="mdi mdi-format-list-bulleted-type mr-1"></i> ประเภท</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">
					<i class="mdi mdi-tag mr-1"></i> สถานะ</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent2">
			<div class="tab-pane pt-3 fade show active" id="type" role="tabpanel" aria-labelledby="type-tab">

				<div class="card shadow">
					<div class="card-body">
						<div class="row">
							<button class="btn btn-success btn-xs float-right mb-2 btn-outline" data-toggle="modal" data-target="#modal_new_type"><i class="fa fa-plus fa-fw"></i> เพิ่มสถานะประเภท</button>
						</div>
						<div class="responsive-data-table-1">
							<table id="responsive-data-table-1" class="table dt-responsive nowrap hover text-center" width="100%">
								<thead class="bg-info text-white font-weight-bold">
									<tr>
										<td>#</td>
										<td>Color Tag</td>
										<td>ชื่อสถานะประเภท</td>
										<td>จัดการ</td>
									</tr>
								</thead>
								<tbody>
									<?php
									$t = 0;
									$getcat = $getdata->my_sql_select($connect, NULL, "card_type", "ctype_name <> 'hidden' AND ctype_status = '1' ORDER BY ctype_insert DESC");
									while ($showcat = mysqli_fetch_object($getcat)) {
										$t++;
									?>
										<tr>
											<td><?php echo $t; ?></td>
											<td><i class="fa fa-circle" style="color:<?php echo @$showcat->ctype_color; ?>"></i></td>
											<td><?php echo @$showcat->ctype_name; ?></td>

											<td>
												<?php
												if ($showcat->ctype_status == '1') {
													echo '<button type="button" class="btn btn-success btn-sm" id="btn-' . @$showcat->ctype_key . '" onclick="javascript:changeTypeStatus(\'' . @$showcat->ctype_key . '\');" data-top="toptitle" data-placement="top" title="เปิด/ปิดการใช้งาน"><i class="fa fa-eye fa-fw" id="icon-' . @$showcat->ctype_key . '"></i> <span id="text-' . @$showcat->ctype_key . '"></span></button>';
												} else {
													echo '<button type="button" class="btn btn-danger btn-sm" id="btn-' . @$showcat->ctype_key . '" onclick="javascript:changeTypeStatus(\'' . @$showcat->ctype_key . '\');" data-top="toptitle" data-placement="top" title="เปิด/ปิดการใช้งาน"><i class="fa fa-eye-slash fa-fw" id="icon-' . @$showcat->ctype_key . '"></i> <span id="text-' . @$showcat->ctype_key . '"></span></button>';
												}
												?>
												<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_type" data-whatever="<?php echo @$showcat->ctype_key; ?>" data-top="toptitle" data-placement="top" title="แก้ไข"><i class="fa fa-edit fa-fw"></i></button>
												<a href="#" onclick="deleteType('<?php echo @$showcat->ctype_key; ?>');" class="btn btn-sm btn-outline-danger" data-toggle="toptitle" data-placement="top" title="ลบประเภทนี้"><i class="fa fa-times"></i></a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>

			<div class="tab-pane pt-3 fade" id="status" role="tabpanel" aria-labelledby="status-tab">

				<div class="card shadow">
					<div class="card-body">
						<div class="row">
							<button class="btn btn-success btn-xs float-right mb-2" data-toggle="modal" data-target="#modal_new_status"><i class="fa fa-plus fa-fw"></i> เพิ่มสถานะ</button>
						</div>
						<div class="responsive-data-table-2">
							<table id="responsive-data-table-2" class="table dt-responsive nowrap hover text-center" width="100%">
								<thead class="bg-info text-white font-weight-bold">
									<tr>
										<td>#</td>
										<td>Color Tag</td>
										<td>ชื่อสถานะ</td>
										<td>จัดการ</td>
									</tr>
								</thead>
								<tbody>
									<?php
									$t = 0;
									$getstatus = $getdata->my_sql_select($connect, NULL, "status_type", "stype_name <> 'hidden' AND stype_status = '1' ORDER BY stype_insert DESC");
									while ($showstatus = mysqli_fetch_object($getstatus)) {
										$t++;
									?>
										<tr>
											<td><?php echo $t; ?></td>
											<td><i class="fa fa-circle" style="color:<?php echo @$showstatus->stype_color; ?>"></i></td>
											<td><?php echo @$showstatus->stype_name; ?></td>

											<td>
												<?php
												if ($showstatus->stype_status == '1') {
													echo '<button type="button" class="btn btn-success btn-sm" id="btn-' . @$showstatus->stype_key . '" onclick="javascript:changeStatus(\'' . @$showstatus->stype_key . '\');" data-top="toptitle" data-placement="top" title="เปิด/ปิดการใช้งาน"><i class="fa fa-eye fa-fw" id="icon-' . @$showstatus->stype_key . '"></i> <span id="text-' . @$showstatus->stype_key . '"></span></button>';
												} else {
													echo '<button type="button" class="btn btn-danger btn-sm" id="btn-' . @$showstatus->stype_key . '" onclick="javascript:changeStatus(\'' . @$showstatus->stype_key . '\');" data-top="toptitle" data-placement="top" title="เปิด/ปิดการใช้งาน"><i class="fa fa-eye-slash fa-fw" id="icon-' . @$showstatus->stype_key . '"></i> <span id="text-' . @$showstatus->stype_key . '"></span></button>';
												}
												?>
												<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_status" data-whatever="<?php echo @$showstatus->stype_key; ?>" data-top="toptitle" data-placement="top" title="แก้ไข"><i class="fa fa-edit fa-fw"></i></button>
												<a href="#" onclick="deleteStatus('<?php echo @$showstatus->stype_key; ?>');" class="btn btn-sm btn-outline-danger" data-toggle="toptitle" data-placement="top" title="ลบประเภทนี้"><i class="fa fa-times"></i></a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="card-footer text-center">
		<a class="btn btn-info" href="index.php?p=setting"><i class="fa fa-reply"></i> กลับ</a>
	</div>
</div>