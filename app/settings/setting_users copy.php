<?php
require_once 'procress/dataSetting.php';
?>
<div class="row">
	<div class="col-12">
		<h1 class="page-header"><i class="fa fa-users fa-fw"></i> ตั้งค่าผู้ใช้งาน</h1>
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
<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="modal_edit_user" aria-hidden="true">
	<form method="post" action="<?php echo $SERVER_NAME; ?>" class="was-validated">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title font-weight-bold">แก้ไขข้อมูล</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="edit_user">

				</div>
				<div class="modal-footer">
					<div class="col text-center">


						<button class="ladda-button btn btn-primary btn-square btn-ladda bg-warning" type="submit" name="save_edit_user" data-style="expand-left">
							<span class="mdi mdi-content-save"> บันทึก</span>
							<span class="ladda-spinner"></span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</form><!-- /.modal-dialog -->
</div>
<!-- End Edit Username & password -->
<!-- Add access -->
<div class="modal fade" id="access" tabindex="-1" role="dialog" aria-labelledby="modal_access" aria-hidden="true">
	<form method="post" action="<?php echo $SERVER_NAME; ?>" class="was-validated">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title font-weight-bold">รายการเข้าถึงเมนู</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="access">

				</div>
				<div class="modal-footer">
					<div class="col text-center">

						<button class="ladda-button btn btn-primary btn-square btn-ladda bg-warning" type="submit" name="save_access" data-style="expand-left">
							<span class="mdi mdi-content-save"> บันทึก</span>
							<span class="ladda-spinner"></span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</form><!-- /.modal-dialog -->
</div>
<!-- End Add access -->
<?php echo @$alert; ?>
<div class="card mb-2">
	<div class="card-header">
		<ul class="nav nav-tabs card-header-tabs">
			<li class="nav-item">
				<a class="nav-link text-info active" id="superadmin-tab" data-toggle="tab" href="#superadmin" role="tab" aria-controls="superadmin" aria-selected="true">ผู้ดูแลระบบ</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-info" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">เจ้าหน้าที่</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-info" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="false">ผู้ใช้งาน</a>
			</li>
		</ul>
	</div>
	<div class="card-body">
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="superadmin" role="tabpanel" aria-labelledby="superadmin-tab">
				<div class="card shadow">
					<div class="card-body m-3">
						<div class="responsive-data-table-1">
							<table id="responsive-data-table-1" class="table dt-responsive nowrap hover text-center" width="100%">
								<thead class="bg-info text-white font-weight-bold">
									<tr>
										<td width="10">ลำดับ</td>
										<td>ชื่อ - นามสกุล</td>
										<td>Username</td>
										<td>จัดการ</td>
									</tr>
								</thead>
								<tbody>
									<?php
									$u = 0;
									$getalluser  = $getdata->my_sql_select($connect, NULL, "user", "user_class='3' AND user_status <> '2' ORDER BY username");
									while ($showalluser = mysqli_fetch_object($getalluser)) {
										$u++;
									?>
										<tr>
											<td><?php echo $u; ?></td>
											<td>คุณ <?php echo @$showalluser->name . "&nbsp;" . $showalluser->lastname; ?></td>
											<?php if (@$_SESSION['uclass'] == 3) { ?>
												<td><?php echo @$showalluser->username; ?></td>
												<td>
													<?php
													if ($showalluser->user_status == '1') {
														echo '<button type="button" class="btn btn-success btn-sm" id="btn-' . @$showalluser->user_key . '" onclick="javascript:changeUserStatus(\'' . @$showalluser->user_key . '\');" data-top="toptitle" data-placement="top" title="เปิด/ปิดการใช้งาน"><i class="fa fa-user-clock" id="icon-' . @$showalluser->user_key . '"></i> <span id="text-' . @$showalluser->user_key . '"></span></button>';
													} else {
														echo '<button type="button" class="btn btn-danger btn-sm" id="btn-' . @$showalluser->user_key . '" onclick="javascript:changeUserStatus(\'' . @$showalluser->user_key . '\');" data-top="toptitle" data-placement="top" title="เปิด/ปิดการใช้งาน"><i class="fa fa-user-lock" id="icon-' . @$showalluser->user_key . '"></i> <span id="text-' . @$showalluser->user_key . '"></span></button>';
													}
													?>
													<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_user" data-whatever="<?php echo @$showalluser->id; ?>" data-top="toptitle" data-placement="top" title="แก้ไข"><i class="fa fa-edit fa-fw"></i></button>
													<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#access" data-whatever="<?php echo @$showalluser->user_key; ?>" data-top="toptitle" data-placement="right" title="การเข้าถึงเมนู"><i class="fa fa-sitemap fa-fw"></i></button>
												</td>

											<?php } else { ?>
												<td align="center"><strong style="color: red">จำกัดสิทธิ์การแสดงข้อมูล</strong></td>
												<td align="center"><strong style="color: red">จำกัดสิทธิ์การแสดงข้อมูล</strong></td>
											<?php } ?>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
				<div class="card shadow">
					<div class="card-body m-3">
						<div class="responsive-data-table-2">
							<table id="responsive-data-table-2" class="table dt-responsive nowrap hover text-center" width="100%">
								<thead class="bg-info text-white font-weight-bold">
									<tr>
										<td width="10">ลำดับ</td>
										<td>ชื่อ - นามสกุล</td>
										<td>Username</td>
										<td>จัดการ</td>
									</tr>
								</thead>
								<tbody>
									<?php
									$u = 0;
									$getalluser  = $getdata->my_sql_select($connect, NULL, "user", "user_class='2' AND user_status <> '2' ORDER BY username");
									while ($showalluser = mysqli_fetch_object($getalluser)) {
										$u++;
									?>
										<tr>
											<td><?php echo $u; ?></td>
											<td>คุณ <?php echo @$showalluser->name . "&nbsp;" . $showalluser->lastname; ?></td>

											<td><?php echo @$showalluser->username; ?></td>
											<td>
												<?php
												if ($_SESSION['uclass'] == 3) {
													if ($showalluser->user_status == '1') {
														echo '<button type="button" class="btn btn-success btn-sm" id="btn-' . @$showalluser->user_key . '" onclick="javascript:changeUserStatus(\'' . @$showalluser->user_key . '\');" data-top="toptitle" data-placement="top" title="เปิด/ปิดการใช้งาน"><i class="fa fa-user-clock" id="icon-' . @$showalluser->user_key . '"></i> <span id="text-' . @$showalluser->user_key . '"></span></button>';
													} else {
														echo '<button type="button" class="btn btn-danger btn-sm" id="btn-' . @$showalluser->user_key . '" onclick="javascript:changeUserStatus(\'' . @$showalluser->user_key . '\');" data-top="toptitle" data-placement="top" title="เปิด/ปิดการใช้งาน"><i class="fa fa-user-lock" id="icon-' . @$showalluser->user_key . '"></i> <span id="text-' . @$showalluser->user_key . '"></span></button>';
													}
												}
												?>
												<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_user" data-whatever="<?php echo @$showalluser->id; ?>" data-top="toptitle" data-placement="top" title="แก้ไข"><i class="fa fa-edit fa-fw"></i></button>
												<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#access" data-whatever="<?php echo @$showalluser->user_key; ?>" data-top="toptitle" data-placement="right" title="การเข้าถึงเมนู"><i class="fa fa-sitemap fa-fw"></i></button>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
				<div class="card shadow">
					<div class="card-body m-3">
						<div class="responsive-data-table-3">
							<table id="responsive-data-table-3" class="table dt-responsive nowrap hover text-center" width="100%">
								<thead class="bg-info text-white font-weight-bold">
									<tr>
										<td width="10">ลำดับ</td>
										<td>ชื่อ - นามสกุล</td>
										<td>Username</td>
										<td>จัดการ</td>
									</tr>
								</thead>
								<tbody>
									<?php
									$u = 0;
									$getalluser  = $getdata->my_sql_select($connect, NULL, "user", "user_class='1' AND user_status <> '2' ORDER BY username");
									while ($showalluser = mysqli_fetch_object($getalluser)) {
										$u++;
									?>
										<tr>
											<td><?php echo $u; ?></td>
											<td><?php echo @getemployee($showalluser->user_key); ?></td>

											<td><?php echo @$showalluser->username; ?></td>
											<td>
												<?php
												if ($_SESSION['uclass'] == 3) {
													if ($showalluser->user_status == '1') {
														echo '<button type="button" class="btn btn-success btn-sm" id="btn-' . @$showalluser->user_key . '" onclick="javascript:changeUserStatus(\'' . @$showalluser->user_key . '\');" data-top="toptitle" data-placement="top" title="เปิด/ปิดการใช้งาน"><i class="fa fa-user-clock" id="icon-' . @$showalluser->user_key . '"></i> <span id="text-' . @$showalluser->user_key . '"></span></button>';
													} else {
														echo '<button type="button" class="btn btn-danger btn-sm" id="btn-' . @$showalluser->user_key . '" onclick="javascript:changeUserStatus(\'' . @$showalluser->user_key . '\');" data-top="toptitle" data-placement="top" title="เปิด/ปิดการใช้งาน"><i class="fa fa-user-lock" id="icon-' . @$showalluser->user_key . '"></i> <span id="text-' . @$showalluser->user_key . '"></span></button>';
													}
												}
												?>

												<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_user" data-whatever="<?php echo @$showalluser->id; ?>" data-top="toptitle" data-placement="top" title="แก้ไข"><i class="fa fa-edit fa-fw"></i></button>
												<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#access" data-whatever="<?php echo @$showalluser->user_key; ?>" data-top="toptitle" data-placement="right" title="การเข้าถึงเมนู"><i class="fa fa-sitemap fa-fw"></i></button>
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