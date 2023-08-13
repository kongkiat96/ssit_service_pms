<?php require_once 'procress/dataSetting.php'; ?>
<?php echo @$alert; ?>
<!-- Modal new name Prefix -->
<div class="modal fade" id="modal_new_prefix" role="dialog" aria-labelledby="modal_new_prefix" aria-hidden="true">
	<form method="post" enctype="multipart/form-data" action="<?php echo $SERVER_NAME; ?>" class="was-validated">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><strong>เพิ่มข้อมูล</strong></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					<hr class="mt-0" />
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="form-label-md fw-semibold mb-2" for="prefix_title">ชื่อคำนำหน้านาม</label>
						<input type="text" name="prefix_title" id="prefix_title" class="form-control" required>
						<div class="invalid-feedback">
							ระบุ คำนำหน้านาม
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
						<i class="bx bx-exit"></i>
						ปิด
					</button>
					<button type="submit" name="save_prefix" class="btn btn-primary"><i class="bx bx-save"></i>
						บันทึกข้อมูล</button>
				</div>

			</div><!-- /.modal-content -->
		</div>
	</form>
</div><!-- /.modal -->

<!-- Modal new company -->
<div class="modal fade" id="modal_new_company" role="dialog" aria-labelledby="modal_new_company" aria-hidden="true">
	<form method="post" enctype="multipart/form-data" action="<?php echo $SERVER_NAME; ?>" class="was-validated">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><strong>เพิ่มข้อมูล</strong></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					<hr class="mt-0" />
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="form-label-md fw-semibold mb-2" for="new_company">ชื่อบริษัท</label>
						<input type="text" name="new_company" id="new_company" class="form-control" required>
						<div class="invalid-feedback">
							ระบุ ชื่อบริษัท
						</div>
					</div>
					<hr class="sidebar-divider d-none d-block">
				</div>


				<div class="modal-footer">
					<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
						<i class="bx bx-exit"></i>
						ปิด
					</button>
					<button type="submit" name="save_company" class="btn btn-primary"><i class="bx bx-save"></i>
						บันทึกข้อมูล</button>
				</div>
			</div><!-- /.modal-content -->
		</div>
	</form>
</div><!-- /.modal -->

<!-- Modal new Department -->
<div class="modal fade" id="modal_new_department" role="dialog" aria-labelledby="modal_new_department"
	aria-hidden="true">
	<form method="post" enctype="multipart/form-data" action="<?php echo $SERVER_NAME; ?>" class="was-validated">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><strong>เพิ่มข้อมูล</strong></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					<hr class="mt-0" />
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="form-label-md fw-semibold mb-2" for="department_name">ชื่อแผนก</label>
						<input type="text" name="department_name" id="department_name" class="form-control" required>
						<div class="invalid-feedback">
							ระบุ ชื่อแผนก
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
						<i class="bx bx-exit"></i>
						ปิด
					</button>
					<button type="submit" name="save_department" class="btn btn-primary"><i class="bx bx-save"></i>
						บันทึกข้อมูล</button>
				</div>
			</div><!-- /.modal-content -->
		</div>
	</form>
</div><!-- /.modal -->

<!-- Modal new location -->
<div class="modal fade" id="modal_new_location" role="dialog" aria-labelledby="modal_new_location" aria-hidden="true">
	<form method="post" enctype="multipart/form-data" action="<?php echo $SERVER_NAME; ?>" class="was-validated">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><strong>เพิ่มข้อมูล</strong></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					<hr class="mt-0" />
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="form-label-md fw-semibold mb-2" for="new_location">สถานที่ตั้ง</label>
						<input type="text" name="new_location" id="new_location" class="form-control" required>
						<div class="invalid-feedback">
							ระบุ สถานที่ตั้ง
						</div>
					</div>
					<hr class="sidebar-divider d-none d-block">
				</div>


				<div class="modal-footer">
					<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
						<i class="bx bx-exit"></i>
						ปิด
					</button>
					<button type="submit" name="save_location" class="btn btn-primary"><i class="bx bx-save"></i>
						บันทึกข้อมูล</button>
				</div>
			</div><!-- /.modal-content -->
		</div>
	</form>
</div><!-- /.modal -->

<!-- Edit name Prefix -->
<div class="modal fade" id="edit_prefix" aria-labelledby="edit_prefix" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
				<div class="edit_prefix">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
						<i class="bx bx-exit"></i>
						ปิด
					</button>
					<button type="submit" name="save_edit_prefix" class="btn btn-warning"><i class="bx bx-save"></i>
						บันทึกข้อมูล</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Edit Company -->
<div class="modal fade" id="edit_company" aria-labelledby="edit_company" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
				<div class="edit_company">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
						<i class="bx bx-exit"></i>
						ปิด
					</button>
					<button type="submit" name="save_edit_company" class="btn btn-warning"><i class="bx bx-save"></i>
						บันทึกข้อมูล</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Edit Department -->
<div class="modal fade" id="edit_department" aria-labelledby="edit_department" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
				<div class="edit_department">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
						<i class="bx bx-exit"></i>
						ปิด
					</button>
					<button type="submit" name="save_edit_department" class="btn btn-warning"><i class="bx bx-save"></i>
						บันทึกข้อมูล</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Edit Department -->
<div class="modal fade" id="edit_location" aria-labelledby="edit_location" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
				<div class="edit_location">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
						<i class="bx bx-exit"></i>
						ปิด
					</button>
					<button type="submit" name="save_edit_location" class="btn btn-warning"><i class="bx bx-save"></i>
						บันทึกข้อมูล</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal -->



<div class="row">
	<div class="col-12">
		<h3 class="page-header"><i class="fa fa-sliders-h fa-fw"></i> ตั้งค่าภายในระบบ</h3>
		<hr class="mt-2">
	</div>
</div>
<nav aria-label="breadcrumb" class="mt-3 mb-3">
	<ol class="breadcrumb breadcrumb-inverse">
		<li class="breadcrumb-item">
			<a href="index.php">หน้าแรก</a>
		</li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?p=setting">ตั้งค่า</a></li>
		<li class="breadcrumb-item active" aria-current="page">ตั้งค่าภายในระบบ</li>
	</ol>
</nav>
<div class="card mt-3">
	<div class="card-header">
		<div class="col-12">
			<h5 class="fw-semibold">ข้อมูลแสดงการตั้งค่าภายในระบบ</h4>

				<hr class="mt-0" />
		</div>
	</div>
	<div class="card-body">
		<div class="nav-align-top mb-4">
			<ul class="nav nav-pills nav-fill mb-3" role="tablist">
				<li class="nav-item">
					<button type="button"
						class="nav-link <?php if (isset($_POST['save_prefix']) || isset($_POST['save_edit_prefix'])) { echo 'active';}?>"
						role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home"
						aria-controls="navs-pills-justified-home" aria-selected="true">
						<i class='bx bxs-purchase-tag'></i> คำนำหน้าชื่อ
					</button>
				</li>
				<li class="nav-item">
					<button type="button"
						class="nav-link <?php if (isset($_POST['save_department']) || isset($_POST['save_edit_department'])) { echo 'active';};?>"
						role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile"
						aria-controls="navs-pills-justified-profile" aria-selected="false">
						<i class='bx bx-list-ul'></i> แผนก / ฝ่าย
					</button>
				</li>
				<li class="nav-item">
					<button type="button"
						class="nav-link <?php if (isset($_POST['save_company']) || isset($_POST['save_edit_company'])) { echo 'active';};?>"
						role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-messages"
						aria-controls="navs-pills-justified-messages" aria-selected="false">
						<i class="tf-icons bx bx-message-square"></i> บริษัท / สังกัด
					</button>
				</li>
				<li class="nav-item">
					<button type="button"
						class="nav-link <?php if (isset($_POST['save_location']) || isset($_POST['save_edit_location'])) { echo 'active';};?>"
						role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-location"
						aria-controls="navs-pills-location" aria-selected="false">
						<i class="tf-icons bx bx-map"></i> สถานที่ตั้ง
					</button>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade <?php if (isset($_POST['save_prefix']) || isset($_POST['save_edit_prefix'])) { echo 'show active'; } ?>"
					id="navs-pills-justified-home" role="tabpanel">
					<div class="text-end">
						<button type="button" data-bs-toggle="modal" data-bs-target="#modal_new_prefix"
							class="btn btn-success btn-md"><i class="bx bx-save"></i> เพิ่มข้อมูล</button>
					</div>
					<p>
						<table class="table table-bordered table-hover text-center">
							<thead class="table-success text-center font-weight-bold">
								<tr>
									<td>ลำดับ</td>
									<td>รายการ</td>
									<td>การแสดงผล</td>
									<td>จัดการ</td>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 0;
									$getprefix = $getdata->my_sql_select($connect, null, "prefix_title", "prefix_code <> 'hidden' AND prefix_status = '1' OR prefix_status = '0' AND prefix_status != '2'");
									while ($showprefix = mysqli_fetch_object($getprefix)) {
										$i++
									?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo @$showprefix->prefix_title; ?></td>
									<td>
										<?php
												if ($showprefix->prefix_status == 1) {
													echo '<span class="badge bg-label-success">กำลังใช้งาน</span>';
												} elseif ($showprefix->prefix_status == 0) {
													echo '<span class="badge bg-label-danger">ปิดการใช้งาน</span>';
												} ?>
									</td>
									<td>
										<button class="btn btn-warning btn-sm" data-bs-toggle="modal"
											data-bs-target="#edit_prefix"
											data-whatever="<?php echo @$showprefix->prefix_key; ?>"><i
												class="fa fa-edit"></i></button>

										<?php if ($_SESSION['uclass'] == 3) { ?>
										<a href="#" onclick="deletePrefix('<?php echo @$showprefix->prefix_key; ?>');"
											class="btn btn-danger btn-sm" data-toggle="toptitle" data-placement="top"
											title="ลบรายการนี้"><i class="fa fa-trash-alt"></i></a>
										<?php } ?>
									</td>
								</tr>
								<?php
									} ?>
							</tbody>
						</table>
					</p>

				</div>
				<div class="tab-pane fade <?php if (isset($_POST['save_department']) || isset($_POST['save_edit_department'])) { echo 'show active'; }; ?>"
					id="navs-pills-justified-profile" role="tabpanel">
					<div class="text-end">
						<button type="button" data-bs-toggle="modal" data-bs-target="#modal_new_department"
							class="btn btn-success btn-md"><i class="bx bx-save"></i> เพิ่มข้อมูล</button>
					</div>
					<p>
						<table class="table table-bordered table-hover text-center">
							<thead class="table-success text-center font-weight-bold">
								<tr>
									<td>ลำดับ</td>
									<td>รายการ</td>
									<td>การแสดงผล</td>
									<td>จัดการ</td>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 0;
									$getdep = $getdata->my_sql_select($connect, null, "department_name", "id <> 'hidden' AND department_status = '1' OR department_status = '0' AND department_status != '2'");
									while ($showdep = mysqli_fetch_object($getdep)) {
										$i++; ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo @$showdep->department_name; ?></td>
									<td>
										<?php
												if ($showdep->department_status == 1) {
													echo '<span class="badge bg-label-success">กำลังใช้งาน</span>';
												} elseif ($showdep->department_status == 0) {
													echo '<span class="badge bg-label-danger">ปิดการใช้งาน</span>';
												} ?>
									</td>
									<td>
										<button class="btn btn-sm btn-warning" data-bs-toggle="modal"
											data-bs-target="#edit_department"
											data-whatever="<?php echo @$showdep->id; ?>"><i
												class="fa fa-edit"></i></button>
										<?php if ($_SESSION['uclass'] == 3) { ?>
										<a href="#" onclick="deleteDepartment('<?php echo @$showdep->id; ?>');"
											class="btn btn-sm btn-danger" data-toggle="toptitle" data-placement="top"
											title="ลบรายการนี้"><i class="fa fa-trash-alt"></i></a>
										<?php } ?>
									</td>
								</tr>
								<?php
									}
									?>
							</tbody>
						</table>
					</p>
				</div>
				<div class="tab-pane fade <?php if (isset($_POST['save_company']) || isset($_POST['save_edit_company'])) { echo 'show active'; }; ?>"
					id="navs-pills-justified-messages" role="tabpanel">
					<div class="text-end">
						<button type="button" data-bs-toggle="modal" data-bs-target="#modal_new_company"
							class="btn btn-success btn-md"><i class="bx bx-save"></i> เพิ่มข้อมูล</button>
					</div>
					<p>
						<table class="table table-bordered table-hover text-center">
							<thead class="table-success text-center font-weight-bold">
								<tr>
									<td>ลำดับ</td>
									<td>รายการ</td>
									<td>การแสดงผล</td>
									<td>จัดการ</td>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 0;
									$getcompany = $getdata->my_sql_select($connect, null, "company", "id <> 'hidden' AND cp_status = '1' OR cp_status = '0' AND cp_status != '2'");
									while ($showcompany = mysqli_fetch_object($getcompany)) {
										$i++; ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo @$showcompany->company_name; ?></td>
									<td>
										<?php
												if ($showcompany->cp_status == 1) {
													echo '<span class="badge bg-label-success">กำลังใช้งาน</span>';
												} elseif ($showcompany->cp_status == 0) {
													echo '<span class="badge bg-label-danger">ปิดการใช้งาน</span>';
												} ?>
									</td>
									<td>
										<button class="btn btn-sm btn-info" data-bs-toggle="modal"
											data-bs-target="#edit_company"
											data-whatever="<?php echo @$showcompany->id; ?>"><i
												class="fa fa-edit"></i></button>
										<?php if ($_SESSION['uclass'] == 3) { ?>
										<a href="#" onclick="deleteCompany('<?php echo @$showcompany->id; ?>');"
											class="btn btn-sm btn-danger" data-toggle="toptitle" data-placement="top"
											title="ลบรายการนี้"><i class="fa fa-trash-alt"></i></a>
										<?php } ?>
									</td>

								</tr>
								<?php
									}
									?>
							</tbody>
						</table>
					</p>
				</div>
				<div class="tab-pane fade <?php if (isset($_POST['save_location']) || isset($_POST['save_edit_location'])) { echo 'show active'; }; ?>"
					id="navs-pills-location" role="tabpanel">
					<div class="text-end">
						<button type="button" data-bs-toggle="modal" data-bs-target="#modal_new_location"
							class="btn btn-success btn-md"><i class="bx bx-save"></i> เพิ่มข้อมูล</button>
					</div>
					<p>
						<table class="table table-bordered table-hover text-center">
							<thead class="table-success text-center font-weight-bold">
								<tr>
									<td>ลำดับ</td>
									<td>รายการ</td>
									<td>การแสดงผล</td>
									<td>จัดการ</td>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 0;
									$getlocation = $getdata->my_sql_select($connect, null, "locations", "id <> 'hidden' AND status = '1'");
									while ($showlocation = mysqli_fetch_object($getlocation)) {
										$i++; ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo @$showlocation->name; ?></td>
									<td>
										<?php
												if ($showlocation->status == 1) {
													echo '<span class="badge bg-label-success">กำลังใช้งาน</span>';
												} elseif ($showlocation->status == 0) {
													echo '<span class="badge bg-label-danger">ปิดการใช้งาน</span>';
												} ?>
									</td>
									<td>
										<button class="btn btn-sm btn-info" data-bs-toggle="modal"
											data-bs-target="#edit_location"
											data-whatever="<?php echo @$showlocation->id; ?>"><i
												class="fa fa-edit"></i></button>
										<?php if ($_SESSION['uclass'] == 3) { ?>
										<a href="#" onclick="deletelocation('<?php echo @$showlocation->id; ?>');"
											class="btn btn-sm btn-danger" data-toggle="toptitle" data-placement="top"
											title="ลบรายการนี้"><i class="fa fa-trash-alt"></i></a>
										<?php } ?>
									</td>

								</tr>
								<?php
									}
									?>
							</tbody>
						</table>
					</p>
				</div>
			</div>
		</div>

	</div>
	<div class="card-footer text-center">
		<a class="btn btn-info" href="index.php?p=setting"><i class="fa fa-reply"></i> กลับ</a>
	</div>
</div>