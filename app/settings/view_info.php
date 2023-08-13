<?php
$getmember_info = $getdata->my_sql_query($connect, null, 'user', "user_key='" . $_SESSION['ukey'] . "'");
$getemployee_info = $getdata->my_sql_query($connect, null, 'employee', "em_key ='" . $_SESSION['ukey'] . "'");

if (isset($_POST['save_mail'])) {
    if (htmlspecialchars($_POST['mail']) != NULL) {
        $getdata->my_sql_update(
            $connect,
            'user',
            "email='" . htmlspecialchars($_POST['mail']) . "'",
            "user_key='" . $_SESSION['ukey'] . "'"
        );
        $alert = $success;
        echo "<META HTTP-EQUIV='Refresh' CONTENT = '2; URL='" . $SERVER_NAME . "'>";
    } else {
        $alert = $warning;
        echo "<META HTTP-EQUIV='Refresh' CONTENT = '2; URL='" . $SERVER_NAME . "'>";
    }
}
if (isset($_POST['save_img'])) {

	if (!defined('UPLOADDIR')) define('UPLOADDIR', '../resource/users/images/');
	if (is_uploaded_file($_FILES["user_photo"]["tmp_name"])) {
        $remove_charname = array(' ', '`', '"', '\'', '\\', '/', '_');
        $pic = str_replace($remove_charname, '', $_FILES['user_photo']['name']);
        $path = $_FILES['user_photo']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
		$File_name = $_SESSION['ukey'].'.'.$ext;
		$File_tmpname = $_FILES["user_photo"]["tmp_name"];
		if (move_uploaded_file($File_tmpname, (UPLOADDIR . $File_name)));
	}

	if ($File_name != NULL) {
        $getdata->my_sql_update(
            $connect,
            'user',
            "user_photo='" . $File_name . "'",
            "user_key='" . $_SESSION['ukey'] . "'"
        );
	}
	$alert = $success_admin;
}
echo @$alert;
?>
<div class="row">
    <div class="col-12">
        <h3 class="page-header"><i class="fa fa-user-tie fa-fw"></i> ข้อมูลส่วนตัว</h3>
        <hr class="mt-2">
    </div>
</div>

<nav aria-label="breadcrumb" class="mt-3 mb-3">
    <ol class="breadcrumb breadcrumb-inverse">
        <li class="breadcrumb-item">
            <a href="index.php">หน้าแรก</a>
        </li>
        <li class="breadcrumb-item" aria-current="page"><a href="index.php?p=setting">ตั้งค่า</a></li>
        <li class="breadcrumb-item active" aria-current="page">ข้อมูลส่วนตัว</li>
    </ol>
</nav>
<div class="card shadow">
<div class="card-header">
		<div class="col-12">
			<h5 class="fw-semibold">เปลี่ยนแปลงข้อมูลส่วนตัว</h4>
				<hr class="mt-0" />
		</div>
	</div>
    <div class="card-body">
        <div class="row mb-2 text-center">
        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <img src="../resource/users/images/<?php echo $getmember_info->user_photo; ?>"
                                            width="200" alt="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4 mx-auto">
                                    <input type="file" name="user_photo" id="user_photo" class="form-control input-sm mt-2" accept="image/png, image/jpeg">
                                    </div>
                                </div>
<input type="hidden" name="key" value="<?php echo $getmember_info->user_key; ?>">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="save_img" class="btn btn-primary"><i
                                        class="bx bx-save"></i>
                                    บันทึกข้อมูล</button>
                            </div>

                        </form>
        </div>
        <div class="row">
            <div class="form-group col-md-2 col-sm-12">
                <label class="form-label-md fw-semibold mb-2" for="prefix_name">คำนำหน้า</label>
                <input type="text" class="form-control" id="prefix_name" value="<?php echo @prefixConvertor($getemployee_info->title_name); ?>" readonly>
            </div>
            <div class="form-group col-md-5 col-sm-12">
                <label class="form-label-md fw-semibold mb-2" for="name">ชื่อ</label>
                <input type="text" class="form-control" id="name" value="<?php echo $getemployee_info->em_name; ?>" readonly>
            </div>
            <div class="form-group col-md-5 col-sm-12">
                <label class="form-label-md fw-semibold mb-2" for="lastname">นามสกุล</label>
                <input type="text" class="form-control" id="lastname" value="<?php echo $getemployee_info->em_lastname; ?>" readonly>
            </div>
        </div>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="row">
            <div class="form-group col-md-6 col-sm-12">
                <label class="form-label-md fw-semibold mb-2" for="position">ตำแหน่ง</label>
                <input type="text" class="form-control" id="position" value="<?php echo $getemployee_info->em_position; ?>" readonly>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label class="form-label-md fw-semibold mb-2" for="department">แผนก</label>
                <input type="text" class="form-control" id="department" value="<?php echo @getDepartment($getemployee_info->em_department); ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label class="form-label-md fw-semibold mb-2" for="company">บริษัท / สังกัด</label>
                <input type="text" class="form-control" id="company" value="<?php echo @getCompany($getemployee_info->em_company); ?>" readonly>
            </div>
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label class="form-label-md fw-semibold mb-2" for="mail">E-mail</label>
                <?php if ($getmember_info->email != NULL) { ?>
                    <input type="text" class="form-control" id="mail" value="<?php echo $getmember_info->email; ?>" readonly>
                <?php } else { ?>
                    <form method="post" enctype="multipart/form-data" class="was-validated" id="waitsave">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="mail" id="mail" value="<?php echo $getmember_info->email; ?>" required>
                            <div class=" input-group-append">
                                <button class="btn btn-outline-primary" type="submit" name="save_mail"><i class="fa fa-save fa-fw"></i></button>
                            </div>
                            <div class="invalid-feedback">
                                ระบุ E-mail.
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="card-footer text-center">
        <a class="btn btn-info" href="index.php?p=setting"><i class="fa fa-reply"></i> กลับ</a>
    </div>
</div>