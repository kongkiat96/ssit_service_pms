<?php
if (isset($_POST['save_new_menu'])) {
	if (htmlspecialchars($_POST['menu_name']) != NULL && htmlspecialchars($_POST['menu_link']) != NULL) {
		$menu_key = md5(htmlspecialchars($_POST['menu_name']));

		$getdata->my_sql_insert(
			$connect,
			"menus",
			"menu_key='" . $menu_key . "',
		menu_icon='" . htmlspecialchars($_POST['menu_icon']) . "',
		menu_name='" . htmlspecialchars($_POST['menu_name']) . "',
		menu_case='" . htmlspecialchars($_POST['menu_folder']) . "',
		menu_link='" . htmlspecialchars($_POST['menu_link']) . "',
		menu_sorting='" . htmlspecialchars($_POST['sorting']) . "'"
		);

		$getdata->my_sql_insert(
			$connect,
			"access_list",
			"access_key='" . $menu_key . "',
		access_name='" . htmlspecialchars($_POST['menu_name']) . "',
		access_detail='" . htmlspecialchars($_POST['menu_folder']) . "'"
		);

		$alert = $success;
	} else {
		$alert = $warning;
	}
}

if (isset($_POST['save_edit_menu'])) {
	if (htmlspecialchars($_POST['edit_menu_name']) != NULL && htmlspecialchars($_POST['edit_menu_icon']) != NULL) {
		$getdata->my_sql_update(
			$connect,
			"menus",
			"menu_icon='" . htmlspecialchars($_POST['edit_menu_icon']) . "',
			menu_name='" . htmlspecialchars($_POST['edit_menu_name']) . "',
			menu_case='" . htmlspecialchars($_POST['edit_menu_folder']) . "',
			menu_link='" . htmlspecialchars($_POST['edit_menu_link']) . "',
			menu_sorting='" . htmlspecialchars($_POST['sorting']) . "'",
			"menu_key='" . htmlspecialchars($_POST['menu_key']) . "'"
		);

		$getdata->my_sql_update(
			$connect,
			"access_list",
			"access_name='" . htmlspecialchars($_POST['edit_menu_name']) . "',
    		access_detail='" . htmlspecialchars($_POST['edit_menu_folder']) . "'",
			"access_key='" . htmlspecialchars($_POST['menu_key']) . "'"
		);

		$alert = $saveedit;
	} else {
		$alert = $warning;
	}
}

$count = $getdata->my_sql_show_rows($connect, "list", "cases='" . addslashes($_POST['page_name']) . "'");
if (isset($_POST['save_new_link'])) {
	if (addslashes($_POST['page_name']) != NULL && addslashes($_POST['link_name']) != NULL) {
		if ($count < 1) {
			$getdata->my_sql_insert(
				$connect,
				"list",
				"cases = '" . addslashes($_POST['page_name']) . "',
			menu = '" . addslashes($_POST['folder_name']) . "',
			pages = '" . addslashes($_POST['link_name']) . "'"
			);
			$alert = $success;
		} else {
			$alert = $counterror;
		}
	} else {
		$alert = $warning;
	}
}

if (isset($_POST['save_edit_page'])) {
	if (addslashes($_POST['edit_page_name']) != NULL && addslashes($_POST['edit_link']) != NULL) {
		$getdata->my_sql_update(
			$connect,
			"list",
			"cases ='" . addslashes($_POST['edit_page_name']) . "',
			menu ='" . addslashes($_POST['edit_folder']) . "',
			pages='" . addslashes($_POST['edit_link']) . "'",
			"id='" . addslashes($_POST['id_link']) . "'"
		);
		$alert = $saveedit;
	} else {
		$alert = $warning;
	}
}
