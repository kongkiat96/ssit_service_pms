<?php
if (isset($_POST['save_prefix'])) {
	if (addslashes($_POST['prefix_title']) != null) {
		$mbkey = md5(rand() . time('now'));
		$getdata->my_sql_insert(
			$connect,
			'members_prefix',
			"prefix_key='" . $mbkey . "',
			prefix_title='" . addslashes($_POST['prefix_title']) . "',
			prefix_status='1'"
		);

		$alert = $success2;
	} else {
		$alert = $warning;
	}
}
if (isset($_POST['save_department'])) {
	if (addslashes($_POST['department_name']) != null) {
		$getdata->my_sql_insert(
			$connect,
			'department_name',
			"department_name='" . addslashes($_POST['department_name']) . "'"
		);

		$alert = $success2;
	} else {
		$alert = $warning;
	}
}
if (isset($_POST['save_brand'])) {
	if (addslashes($_POST['brand_name']) != null) {
		$getdata->my_sql_insert(
			$connect,
			'brand_type',
			"brand_type='" . addslashes($_POST['brand_name']) . "'"
		);

		$alert = $success2;
	} else {
		$alert = $warning;
	}
}

if (isset($_POST['save_layout'])) {
	if (addslashes($_POST['layout_name']) != null) {
		$getdata->my_sql_insert(
			$connect,
			'layout_type',
			"layout_name='" . addslashes($_POST['layout_name']) . "'"
		);

		$alert = $success2;
	} else {
		$alert = $warning;
	}
}
if (isset($_POST['save_edit_prefix'])) {
	if (addslashes($_POST['edit_prefix_title']) != null) {
		$getdata->my_sql_update(
			$connect,
			'members_prefix',
			"prefix_title='" . addslashes($_POST['edit_prefix_title']) . "'",
			"prefix_key='" . addslashes($_POST['prefix_key']) . "'"
		);

		$alert = $saveedit;
	} else {
		$alert = $warning;
	}
}
if (isset($_POST['save_edit_department'])) {
	if (addslashes($_POST['edit_department']) != null) {
		$getdata->my_sql_update(
			$connect,
			'department_name',
			"department_name='" . addslashes($_POST['edit_department']) . "'",
			"id='" . addslashes($_POST['dep_id']) . "'"
		);

		$alert = $saveedit;
	} else {
		$alert = $warning;
	}
}
if (isset($_POST['save_edit_brand'])) {
	if (addslashes($_POST['edit_brand']) != null) {
		$getdata->my_sql_update(
			$connect,
			'brand_type',
			"brand_type='" . addslashes($_POST['edit_brand']) . "'",
			"id='" . addslashes($_POST['dev_id']) . "'"
		);

		$alert = $saveedit;
	} else {
		$alert = $warning;
	}
}

if (isset($_POST['save_edit_layout'])) {
	if (addslashes($_POST['edit_layout']) != null) {
		$getdata->my_sql_update(
			$connect,
			'layout_type',
			"layout_name='" . addslashes($_POST['edit_layout']) . "'",
			"id='" . addslashes($_POST['dev_id']) . "'"
		);

		$alert = $saveedit;
	} else {
		$alert = $warning;
	}
}


if (isset($_POST['save_edit_user'])) {
	if (addslashes($_POST['edit_password']) != NULL && addslashes($_POST['edit_repassword']) != NULL) {
		if (addslashes($_POST['edit_password']) == addslashes($_POST['edit_repassword'])) {
			$getdata->my_sql_update(
				$connect,
				"user",
				"username ='" . addslashes($_POST['edit_username']) . "',
      			password ='" . md5(addslashes($_POST['edit_password'])) . "',
      			user_class='" . addslashes($_POST['edit_class']) . "'",
				"id='" . addslashes($_POST['id_user']) . "'"
			);

			$alert = $saveedit;
		} else {
			$alert = $ck_pass;
		}
	} else {
		$getdata->my_sql_update(
			$connect,
			"user",
			"username ='" . addslashes($_POST['edit_username']) . "',
			user_class='" . addslashes($_POST['edit_class']) . "'",
			"id='" . addslashes($_POST['id_user']) . "'"
		);


		$alert = $saveedit;
	}
}

if (isset($_POST['save_access'])) {
	$getdata->my_sql_delete($connect, "access_user", "user_key='" . addslashes($_POST['key']) . "'");
	for ($ac = 0; $ac < count($_POST['access_list']); $ac++) {
		$getdata->my_sql_insert($connect, "access_user", "access_key='" . addslashes($_POST['access_list'][$ac]) . "',user_key='" . addslashes($_POST['key']) . "'");
	}
	$alert = $success2;
}


if (isset($_POST['save_type'])) {
	if (addslashes($_POST['type_name']) != NULL) {
		$ctype_key = md5(addslashes($_POST['type_name']));
		$getdata->my_sql_insert(
			$connect,
			"card_type",
			"ctype_key='" . $ctype_key . "',
		ctype_name='" . addslashes($_POST['type_name']) . "',
		ctype_color='" . addslashes($_POST['color_tag']) . "'"
		);
		$alert = $success2;
	} else {
		$alert = $warning;
	}
}

if (isset($_POST['save_edit_type'])) {
	if (addslashes($_POST['edit_name_type']) != NULL) {
		$getdata->my_sql_update(
			$connect,
			"card_type",
			"ctype_name ='" . addslashes($_POST['edit_name_type']) . "',
			ctype_color ='" . addslashes($_POST['edit_color_type']) . "'",
			"ctype_key ='" . addslashes($_POST['ctype_key']) . "'"
		);
		$alert = $saveedit;
	} else {
		$alert = $warning;
	}
}


if (isset($_POST['save_status'])) {
	if (addslashes($_POST['status_name']) != NULL) {
		$stype_key = md5(addslashes($_POST['status_name']));
		$getdata->my_sql_insert(
			$connect,
			"status_type",
			"stype_key='" . $stype_key . "',
		stype_name='" . addslashes($_POST['status_name']) . "',
		stype_color='" . addslashes($_POST['color_tag']) . "'"
		);
		$alert = $success2;
	} else {
		$alert = $warning;
	}
}

if (isset($_POST['save_edit_status'])) {
	if (addslashes($_POST['edit_name_status']) != NULL) {
		$getdata->my_sql_update(
			$connect,
			"status_type",
			"stype_name ='" . addslashes($_POST['edit_name_status']) . "',
			stype_color ='" . addslashes($_POST['edit_color_status']) . "'",
			"stype_key ='" . addslashes($_POST['stype_key']) . "'"
		);
		$alert = $saveedit;
	} else {
		$alert = $warning;
	}
}


if (isset($_POST['save_info'])) {
	if (!defined('UPLOADDIR')) define('UPLOADDIR', '../resource/system/logo/');
	if (is_uploaded_file($_FILES["site_logo"]["tmp_name"])) {
		$File_name = $_FILES["site_logo"]["name"];
		$File_tmpname = $_FILES["site_logo"]["tmp_name"];
		if (move_uploaded_file($File_tmpname, (UPLOADDIR . $File_name)));
	}
	if (!defined('UPLOADDIR2')) define('UPLOADDIR2', '../resource/system/favicon/');
	if (is_uploaded_file($_FILES["site_favicon"]["tmp_name"])) {
		$File_name2 = $_FILES["site_favicon"]["name"];
		$File_tmpname2 = $_FILES["site_favicon"]["tmp_name"];
		if (move_uploaded_file($File_tmpname2, (UPLOADDIR2 . $File_name2)));
	}

	$site_name = htmlspecialchars($_POST['site_name']);
	$site_color_name = $_POST['site_color_name'];
	$site_color_form = $_POST['site_color_form'];

	if ($File_name != NULL && $File_name2 != NULL) {
		$getdata->my_sql_update($connect, "system_info", "site_logo='" . $File_name . "',site_favicon='" . $File_name2 . "'", NULL);
	} else if ($File_name != NULL && $File_name2 == NULL) {
		$getdata->my_sql_update($connect, "system_info", "site_logo='" . $File_name . "'", NULL);
	} else if ($File_name == NULL && $File_name2 != NULL) {
		$getdata->my_sql_update($connect, "system_info", "site_favicon='" . $File_name2 . "'", NULL);
	} else if ($File_name == NULL && $File_name2 == NULL && $site_name != NULL && $site_color_name != NULL && $site_color_form != NULL) {
		$getdata->my_sql_update($connect, "system_info", "site_name = '" . $site_name . "',site_color_name = '" . $site_color_name . "',site_color_form = '" . $site_color_form . "'", NULL);
	} else if ($File_name == NULL && $File_name2 == NULL && $site_name != NULL && $site_color_name != NULL && $site_color_form == NULL) {
		$getdata->my_sql_update($connect, "system_info", "site_name = '" . $site_name . "',site_color_name = '" . $site_color_name . "'", NULL);
	} else if ($File_name == NULL && $File_name2 == NULL && $site_name != NULL && $site_color_name == NULL && $site_color_form != NULL) {
		$getdata->my_sql_update($connect, "system_info", "site_name = '" . $site_name . "',site_color_form = '" . $site_color_form . "'", NULL);
	} else {
		$getdata->my_sql_update($connect, "system_info", "site_title='" . htmlspecialchars($_POST['site_title']) . "',site_footer='" . htmlspecialchars($_POST['site_footer']) . "'", NULL);
	}
	$alert = $success_admin;
}

if (isset($_POST['save_company'])) {
	if (htmlspecialchars($_POST['new_company']) != null) {
		$getdata->my_sql_insert(
			$connect,
			'company',
			"company_name='" . htmlspecialchars($_POST['new_company']) . "',
				cp_status = '1'"
		);
		$alert = $success2;
	} else {
		$alert = $warning;
	}
}
if (isset($_POST['save_edit_company'])) {
	if (htmlspecialchars($_POST['edit_company']) != null) {
		$getdata->my_sql_update(
			$connect,
			"company",
			"company_name = '" . htmlspecialchars($_POST['edit_company']) . "',
			show_it = '1',
			show_asset = '2'",
			"id='" . htmlspecialchars($_POST['dep_id']) . "'"
		);

		$alert = $saveedit;
	} else {
		$alert = $warning;
	}
}


if (isset($_POST['save_edit_device'])) {
	if (htmlspecialchars($_POST['edit_device']) != null) {
		$getdata->my_sql_update(
			$connect,
			'device_type',
			"device_type='" . htmlspecialchars($_POST['edit_device']) . "'",
			"id='" . htmlspecialchars($_POST['dev_id']) . "'"
		);

		$alert = $saveedit;
	} else {
		$alert = $warning;
	}
}
if (isset($_POST['save_device'])) {
	if (htmlspecialchars($_POST['device_name']) != null) {
		$getdata->my_sql_insert(
			$connect,
			'device_type',
			"device_type='" . htmlspecialchars($_POST['device_name']) . "'"
		);

		$alert = $success2;
	} else {
		$alert = $warning;
	}
}

if (isset($_POST['save_detail'])) {
	$getdata->my_sql_update(
		$connect,
		"detail_index",
		"detail = '" . $_POST['detail'] . "'",
		"id = '1'"

	);
	
	$alert = $success_admin;
}

//------------------------------------------------------------------------------

if (isset($_POST['save_service'])) {
	if (htmlspecialchars($_POST['service_name']) != NULL && htmlspecialchars($_POST['service_group']) != NULL) {
		$getdata->my_sql_insert(
			$connect,
			"service",
			"se_name ='" . htmlspecialchars($_POST['service_name']) . "',
            se_group = '" . htmlspecialchars($_POST['service_group']) . "'"
		);

		$alert = $success2;
	} else {
		$alert = $warning;
	}
}

if (isset($_POST['save_service_list'])) {
	if (htmlspecialchars($_POST['se_group']) != NULL && htmlspecialchars($_POST['se_id']) != NULL) {
		$getdata->my_sql_insert(
			$connect,
			"service_list",
			"se_id = '" . htmlspecialchars($_POST['se_id']) . "',
			se_group = '" . htmlspecialchars($_POST['se_group']) . "',
            se_li_name ='" . htmlspecialchars($_POST['service_list_name']) . "'"
		);

		$alert = $success2;
	} else {
		$alert = $warning;
	}
}

if (isset($_POST['save_edit_service'])) {
	if (htmlspecialchars($_POST['edit_se_name']) != NULL) {
		$getdata->my_sql_update(
			$connect,
			"service",
			"se_name ='" . htmlspecialchars($_POST['edit_se_name']) . "',
			se_group = '" . htmlspecialchars($_POST['edit_se_group']) . "'",
			"se_id = '" . htmlspecialchars($_POST['se_id']) . "'"
		);
		$alert = $saveedit;
	} else {
		$alert = $warning;
	}
}

if (isset($_POST['save_edit_service_list'])) {
	if (htmlspecialchars($_POST['edit_se_li_name']) != NULL) {
		$getdata->my_sql_update(
			$connect,
			"service_list",
			"se_id ='" . htmlspecialchars($_POST['se_id_edit']) . "',
			se_group ='" . htmlspecialchars($_POST['se_group_edit']) . "',
            se_li_name ='" . htmlspecialchars($_POST['edit_se_li_name']) . "'",
			"se_li_id = '" . htmlspecialchars($_POST['se_li_id']) . "'"
		);

		$alert = $saveedit;;
	} else {
		$alert = $warning;;
	}
}
