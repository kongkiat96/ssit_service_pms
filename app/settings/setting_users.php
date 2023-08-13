<?php
require_once 'procress/dataSetting.php';
$getadmin_delete = $getdata->my_sql_show_rows($connect, "user", "user_class IN ('2','3') AND user_status = '0' ");
$getemployee_delete = $getdata->my_sql_show_rows($connect, "employee", "em_class = '1' AND em_status = '0'");
?>
<?php echo @$alert; ?>
<div class="row">
	<div class="col-12">
		<h3 class="page-header"><i class="fa fa-users fa-fw"></i> ตั้งค่าผู้ใช้งาน</h3>
		<hr class="mt-2">
	</div>
</div>

<nav aria-label="breadcrumb" class="mt-3 mb-3">
	<ol class="breadcrumb breadcrumb-inverse">
		<li class="breadcrumb-item">
			<a href="index.php">หน้าแรก</a>
		</li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?p=setting">ตั้งค่า</a></li>
		<li class="breadcrumb-item active" aria-current="page">ตั้งค่าผู้ใช้งาน</li>
	</ol>
</nav>
<!-- Eddit Username & password -->
<div class="modal fade" id="edit_user" aria-labelledby="edit_user" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
				<div class="edit_user">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
						<i class="bx bx-exit"></i>
						ปิด
					</button>
					<button type="submit" name="save_edit_user" class="btn btn-warning"><i class="bx bx-save"></i>
						บันทึกข้อมูล</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Edit Username & password -->
<!-- Add access -->
<div class="modal fade" id="access" aria-labelledby="access" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
				<div class="access">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
						<i class="bx bx-exit"></i>
						ปิด
					</button>
					<button type="submit" name="save_access" class="btn btn-warning"><i class="bx bx-save"></i>
						บันทึกข้อมูล</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="card mt-3">
	<div class="card-header">
		<div class="col-12">
			<h5 class="fw-semibold">ข้อมูลแสดงผู้เข้าใช้งาน</h4>

				<hr class="mt-0" />
		</div>
	</div>
	<div class="card-body">
		<div class="nav-align-top mb-4">
			<ul class="nav nav-pills nav-fill mb-3" role="tablist">
				<li class="nav-item">
					<button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
						data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home"
						aria-selected="true">
						<i class='bx bxs-user-rectangle'></i> ผู้ดูแลระบบ
					</button>
				</li>
				<li class="nav-item">
					<button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
						data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile"
						aria-selected="false">
						<i class='bx bxs-user-account'></i> เจ้าหน้าที่
					</button>
				</li>

			</ul>
			<div class="tab-content">
				<div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
					<p>
						<table class="table table-bordered table-hover text-center">
							<thead class="table-success text-center font-weight-bold">
								<tr>
									<td>ลำดับ</td>
									<td>ชื่อ - นามสกุล</td>
									<td>Username</td>
									<td>จัดการ</td>
								</tr>
							</thead>
							<tbody>
								<?php
								$u = 0;
								$getalluser  = $getdata->my_sql_select($connect, NULL, "user", "user_class='3' AND user_status != '0' ORDER BY username");
								while ($showalluser = mysqli_fetch_object($getalluser)) {
									$u++;
								?>
								<tr>
									<td><?php echo $u; ?></td>
									<td><?php echo @getemployeeName($showalluser->user_key); ?></td>
									<?php if (@$_SESSION['uclass'] == 3) { ?>
									<td><?php echo @$showalluser->username; ?></td>
									<td>
										<button class="btn btn-warning btn-sm" data-bs-toggle="modal"
											data-bs-target="#edit_user" data-whatever="<?php echo @$showalluser->id; ?>"
											data-top="toptitle" data-placement="top" title="แก้ไข"><i
												class="fa fa-edit fa-fw"></i></button>
										<button class="btn btn-primary btn-sm" data-bs-toggle="modal"
											data-bs-target="#access"
											data-whatever="<?php echo @$showalluser->user_key; ?>" data-top="toptitle"
											data-placement="right" title="การเข้าถึงเมนู"><i
												class="fa fa-sitemap fa-fw"></i></button>
										<?php
												if ($_SESSION['uclass'] == 3) { ?>
										<!-- if ($showalluser->user_status == '1') {
												echo '<button type="button" class="btn btn-success btn-sm" id="btn-' . @$showalluser->user_key . '" onclick="javascript:changeUserStatus(\'' . @$showalluser->user_key . '\');" data-top="toptitle" data-placement="top" title="เปิด/ปิดการใช้งาน"><i class="fa fa-user-clock" id="icon-' . @$showalluser->user_key . '"></i> <span id="text-' . @$showalluser->user_key . '"></span></button>';
												} else {
												echo '<button type="button" class="btn btn-danger btn-sm" id="btn-' . @$showalluser->user_key . '" onclick="javascript:changeUserStatus(\'' . @$showalluser->user_key . '\');" data-top="toptitle" data-placement="top" title="เปิด/ปิดการใช้งาน"><i class="fa fa-user-lock" id="icon-' . @$showalluser->user_key . '"></i> <span id="text-' . @$showalluser->user_key . '"></span></button>';
												} -->
										<a href="#" onclick="deletemployee('<?php echo @$showalluser->user_key; ?>');"
											class="btn btn-sm btn-danger" data-toggle="toptitle" data-placement="top"
											title="ลบรายการนี้"><i class="fa fa-times"></i></a>
										<?php } ?>


									</td>

									<?php } else { ?>
									<td align="center"><strong style="color: red">จำกัดสิทธิ์การแสดงข้อมูล</strong></td>
									<td align="center"><strong style="color: red">จำกัดสิทธิ์การแสดงข้อมูล</strong></td>
									<?php } ?>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</p>

				</div>
				<div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
					<p>
						<table class="table table-bordered table-hover text-center">
							<thead class="table-success text-center font-weight-bold">
								<tr>
									<td>ลำดับ</td>
									<td>ชื่อ - นามสกุล</td>
									<td>Username</td>
									<td>จัดการ</td>
								</tr>
							</thead>
							<tbody>
								<?php
								$u = 0;
								$getalluser  = $getdata->my_sql_select($connect, NULL, "user", "user_class='2' AND user_status != '0' ORDER BY username");
								while ($showalluser = mysqli_fetch_object($getalluser)) {
									$u++;
								?>
								<tr>
									<td><?php echo $u; ?></td>
									<td><?php echo @getemployeeName($showalluser->user_key); ?></td>

									<td><?php echo @$showalluser->username; ?></td>
									<td>
										<button class="btn btn-warning btn-sm" data-bs-toggle="modal"
											data-bs-target="#edit_user" data-whatever="<?php echo @$showalluser->id; ?>"
											data-top="toptitle" data-placement="top" title="แก้ไข"><i
												class="fa fa-edit fa-fw"></i></button>
										<?php
											if ($_SESSION['uclass'] == 3) { ?>
										<button class="btn btn-primary btn-sm" data-bs-toggle="modal"
											data-bs-target="#access"
											data-whatever="<?php echo @$showalluser->user_key; ?>" data-top="toptitle"
											data-placement="right" title="การเข้าถึงเมนู"><i
												class="fa fa-sitemap fa-fw"></i></button>

										<a href="#" onclick="deletemployee('<?php echo @$showalluser->user_key; ?>');"
											class="btn btn-sm btn-danger" data-toggle="toptitle" data-placement="top"
											title="ลบรายการนี้"><i class="fa fa-times"></i></a>
										<?php } ?>


									</td>
								</tr>
								<?php } ?>
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

<?php 
if($_SESSION['uclass'] == '3'){ 
	if($getadmin_delete >= '1'){
?>

<div class="card mt-3">
	<div class="card-header">
		<div class="col-12">
			<h5 class="fw-semibold">กู้ข้อมูลเจ้าหน้าที่ที่ถูกลบ</h4>
				<hr class="mt-0" />
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-hover text-center">
			<thead class="table-success text-center font-weight-bold">
				<tr>
					<td>ลำดับ</td>
					<td>ชื่อ - นามสกุล</td>
					<td>Username</td>
					<td>จัดการ</td>
				</tr>
			</thead>
			<tbody>
				<?php
								$u = 0;
								$getalluser  = $getdata->my_sql_select($connect, NULL, "user", "user_class IN ('2','3') AND user_status = '0' ORDER BY username");
								while ($showalluser = mysqli_fetch_object($getalluser)) {
									$u++;
								?>
				<tr>
					<td><?php echo $u; ?></td>
					<td><?php echo @getemployeeName($showalluser->user_key); ?></td>

					<td><?php echo @$showalluser->username; ?></td>
					<td>

						<a href="#" onclick="restore('<?php echo @$showalluser->user_key; ?>');"
							class="btn btn-sm btn-danger" data-toggle="toptitle" data-placement="top"
							title="กู้รายการนี้"><i class="fa fa-reply"></i></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php } ?>
	<?php if($getemployee_delete >= '1'){ ?>
	<div class="card mt-3">
		<div class="card-header">
			<div class="col-12">
				<h5 class="fw-semibold">กู้ข้อมูลพนักงานที่ถูกลบ</h4>
					<hr class="mt-0" />
			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-hover text-center">
				<thead class="table-success text-center font-weight-bold">
					<tr>
						<td>ลำดับ</td>
						<td>ชื่อ - นามสกุล</td>
						<td>จัดการ</td>
					</tr>
				</thead>
				<tbody>
					<?php
									$u = 0;
									$getalluser  = $getdata->my_sql_select($connect, NULL, "employee", "em_class IN ('1') AND em_status = '0' ORDER BY date_create");
									while ($showalluser = mysqli_fetch_object($getalluser)) {
										$u++;
									?>
					<tr>
						<td><?php echo $u; ?></td>
						<td><?php echo @prefixConvertor($showalluser->title_name).' '. $showalluser->em_name .' '. $showalluser->em_lastname; ?>
						</td>
						<td>

							<a href="#" onclick="restoreemployee('<?php echo @$showalluser->em_key ?>');"
								class="btn btn-sm btn-danger" data-toggle="toptitle" data-placement="top"
								title="กู้รายการนี้"><i class="fa fa-reply"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php } ?>
<?php } ?>